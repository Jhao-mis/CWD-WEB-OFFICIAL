<?php
/* =====================
   AUTH + SESSION GUARD
===================== */
session_start();
ob_start(); // catch any stray output (warnings, whitespace from includes) before it reaches the browser

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit;
}

include '../db.php';

/* =====================
   FETCH LOGGED-IN USER
===================== */
function getLoggedInUser(PDO $conn, int $userId): ?array
{
    $sql = "SELECT 
                id, emp_id, username, firstname, middlename, lastname,
                email, department, role
            FROM users
            WHERE id = ?
            LIMIT 1";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

$userInfo = getLoggedInUser($conn, (int) $_SESSION['user_id']);

/* =====================
   HARD FAIL IF USER NOT FOUND
===================== */
if (!$userInfo || empty($userInfo['role'])) {
    // Session exists but user no longer valid
    session_destroy();
    header("Location: login.php");
    exit;
}

/* =====================================================
   BACKEND API ROUTER
   All AJAX calls hit THIS SAME FILE with ?action=...
   If an action is present, handle it as JSON and exit
   before any HTML is rendered below.
===================================================== */

const CAREER_MANAGER_ROLES = ['superadmin', 'job']; // roles allowed to create/edit/delete

function career_requireManagerRole(array $userInfo): void
{
    if (!in_array($userInfo['role'], CAREER_MANAGER_ROLES, true)) {
        http_response_code(403);
        echo json_encode(['success' => false, 'message' => 'You do not have permission to do this.']);
        exit;
    }
}

function career_uploadDir(): string
{
    $dir = __DIR__ . '/../uploads/career/';
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    return $dir;
}

function career_validatePdf(array $file): ?string
{
    $maxSizeBytes = 20 * 1024 * 1024; // 20 MB
    if ($file['size'] > $maxSizeBytes) {
        return 'File is too large (max 20MB).';
    }

    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

    if ($mime !== 'application/pdf' || $ext !== 'pdf') {
        return 'Only PDF files are allowed.';
    }

    return null; // valid
}

$action = $_GET['action'] ?? $_POST['action'] ?? null;

if ($action !== null) {
    // Discard anything that leaked into the buffer before this point
    // (e.g. notices/warnings from db.php or getLoggedInUser) so it
    // can't corrupt the JSON response below.
    if (ob_get_level() > 0) {
        ob_clean();
    }
    // Don't let any further PHP notices/warnings print into the
    // response body either — log them instead of displaying them.
    ini_set('display_errors', '0');
    error_reporting(E_ALL);

    header('Content-Type: application/json');

    switch ($action) {

        /* ---------- LIST ---------- */
        case 'list': {
            if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
                http_response_code(405);
                echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
                exit;
            }

            $year = $_GET['year'] ?? null;
            $allowedYears = ['2024', '2025', '2026', 'Archives'];
            // Years explicitly listed in the dropdown; anything older
            // falls under "Archives".
            $knownYears = ['2024', '2025', '2026'];

            if ($year !== null && !in_array($year, $allowedYears, true)) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Invalid year filter.']);
                exit;
            }

            try {
                $sql = "SELECT co.id, co.plantilla_title, co.date_published, co.deadline_date,
                               co.file_name, co.file_path, co.file_type, co.file_size,
                               u.firstname, u.lastname
                        FROM career_opportunities co
                        LEFT JOIN users u ON u.id = co.created_by
                        WHERE co.is_deleted = 0";
                $params = [];

                if ($year === 'Archives') {
                    $placeholders = implode(',', array_fill(0, count($knownYears), '?'));
                    $sql .= " AND YEAR(co.date_published) NOT IN ($placeholders)";
                    $params = array_merge($params, $knownYears);
                } elseif ($year !== null) {
                    $sql .= " AND YEAR(co.date_published) = ?";
                    $params[] = $year;
                }

                $sql .= " ORDER BY co.date_published DESC, co.id DESC";

                $stmt = $conn->prepare($sql);
                $stmt->execute($params);

                echo json_encode(['success' => true, 'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)]);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Database error while fetching records.']);
            }
            exit;
        }

        /* ---------- UPLOAD (create) ---------- */
        case 'upload': {
            career_requireManagerRole($userInfo);

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405);
                echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
                exit;
            }

            $title = trim($_POST['plantille_title'] ?? '');
            $datePublished = trim($_POST['date_published'] ?? '');
            $deadlineDate = trim($_POST['deadline_date'] ?? '');

            if ($title === '' || $datePublished === '' || $deadlineDate === '') {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Plantilla title, date published, and deadline date are required.']);
                exit;
            }

            $d = DateTime::createFromFormat('Y-m-d', $datePublished);
            if (!$d || $d->format('Y-m-d') !== $datePublished) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Invalid date_published format, expected YYYY-MM-DD.']);
                exit;
            }

            $dl = DateTime::createFromFormat('Y-m-d', $deadlineDate);
            if (!$dl || $dl->format('Y-m-d') !== $deadlineDate) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Invalid deadline_date format, expected YYYY-MM-DD.']);
                exit;
            }

            if ($deadlineDate < $datePublished) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Deadline date cannot be earlier than the date published.']);
                exit;
            }

            if (!isset($_FILES['pdf_file']) || $_FILES['pdf_file']['error'] !== UPLOAD_ERR_OK) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'A PDF file is required.']);
                exit;
            }

            $file = $_FILES['pdf_file'];
            if ($err = career_validatePdf($file)) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => $err]);
                exit;
            }

            $uploadDir = career_uploadDir();
            $storedName = bin2hex(random_bytes(16)) . '.pdf';
            $destPath = $uploadDir . $storedName;

            if (!move_uploaded_file($file['tmp_name'], $destPath)) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Failed to save uploaded file.']);
                exit;
            }

            $relativePath = 'uploads/career/' . $storedName;

            try {
                $stmt = $conn->prepare(
                    "INSERT INTO career_opportunities
                        (plantilla_title, date_published, deadline_date, file_name, file_path, file_type, file_size, created_by)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?)"
                );
                $stmt->execute([
                    $title, $datePublished, $deadlineDate,
                    $file['name'], $relativePath, 'pdf', (int) $file['size'],
                    (int) $userInfo['id'],
                ]);

                echo json_encode([
                    'success' => true,
                    'message' => 'Career opportunity published successfully.',
                    'id' => (int) $conn->lastInsertId(),
                ]);
            } catch (PDOException $e) {
                if (file_exists($destPath)) {
                    unlink($destPath);
                }
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Database error while saving the record.']);
            }
            exit;
        }

        /* ---------- UPDATE ---------- */
        case 'update': {
            career_requireManagerRole($userInfo);

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405);
                echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
                exit;
            }

            $id = (int) ($_POST['id'] ?? 0);
            $title = trim($_POST['plantille_title'] ?? '');
            $datePublished = trim($_POST['date_published'] ?? '');
            $deadlineDate = trim($_POST['deadline_date'] ?? '');

            if ($id <= 0 || $title === '' || $datePublished === '' || $deadlineDate === '') {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'id, plantille_title, date_published, and deadline_date are required.']);
                exit;
            }

            $d = DateTime::createFromFormat('Y-m-d', $datePublished);
            if (!$d || $d->format('Y-m-d') !== $datePublished) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Invalid date_published format, expected YYYY-MM-DD.']);
                exit;
            }

            $dl = DateTime::createFromFormat('Y-m-d', $deadlineDate);
            if (!$dl || $dl->format('Y-m-d') !== $deadlineDate) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Invalid deadline_date format, expected YYYY-MM-DD.']);
                exit;
            }

            if ($deadlineDate < $datePublished) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Deadline date cannot be earlier than the date published.']);
                exit;
            }

            $stmt = $conn->prepare("SELECT * FROM career_opportunities WHERE id = ? AND is_deleted = 0 LIMIT 1");
            $stmt->execute([$id]);
            $existing = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$existing) {
                http_response_code(404);
                echo json_encode(['success' => false, 'message' => 'Record not found.']);
                exit;
            }

            $newPath = $existing['file_path'];
            $newFileName = $existing['file_name'];
            $newFileSize = $existing['file_size'];
            $oldFileToDelete = null;

            if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['pdf_file'];
                if ($err = career_validatePdf($file)) {
                    http_response_code(422);
                    echo json_encode(['success' => false, 'message' => $err]);
                    exit;
                }

                $uploadDir = career_uploadDir();
                $storedName = bin2hex(random_bytes(16)) . '.pdf';
                $destPath = $uploadDir . $storedName;

                if (!move_uploaded_file($file['tmp_name'], $destPath)) {
                    http_response_code(500);
                    echo json_encode(['success' => false, 'message' => 'Failed to save uploaded file.']);
                    exit;
                }

                $oldFileToDelete = __DIR__ . '/../' . $existing['file_path'];
                $newPath = 'uploads/career/' . $storedName;
                $newFileName = $file['name'];
                $newFileSize = (int) $file['size'];
            }

            try {
                $stmt = $conn->prepare(
                    "UPDATE career_opportunities
                     SET plantilla_title = ?, date_published = ?, deadline_date = ?,
                         file_name = ?, file_path = ?, file_size = ?
                     WHERE id = ?"
                );
                $stmt->execute([$title, $datePublished, $deadlineDate, $newFileName, $newPath, $newFileSize, $id]);

                if ($oldFileToDelete && file_exists($oldFileToDelete)) {
                    unlink($oldFileToDelete);
                }

                echo json_encode(['success' => true, 'message' => 'Career opportunity updated successfully.']);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Database error while updating the record.']);
            }
            exit;
        }

        /* ---------- DELETE ---------- */
        case 'delete': {
            career_requireManagerRole($userInfo);

            if (!in_array($_SERVER['REQUEST_METHOD'], ['POST', 'DELETE'], true)) {
                http_response_code(405);
                echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
                exit;
            }

            $input = json_decode(file_get_contents('php://input'), true) ?? [];
            $id = (int) ($input['id'] ?? $_POST['id'] ?? 0);

            if ($id <= 0) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'A valid id is required.']);
                exit;
            }

            $stmt = $conn->prepare("SELECT id FROM career_opportunities WHERE id = ? AND is_deleted = 0 LIMIT 1");
            $stmt->execute([$id]);
            $existing = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$existing) {
                http_response_code(404);
                echo json_encode(['success' => false, 'message' => 'Record not found.']);
                exit;
            }

            try {
                // Soft delete, matching the bidding_documents convention.
                // The underlying PDF is left on disk.
                $stmt = $conn->prepare("UPDATE career_opportunities SET is_deleted = 1 WHERE id = ?");
                $stmt->execute([$id]);

                echo json_encode(['success' => true, 'message' => 'Career opportunity deleted successfully.']);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Database error while deleting the record.']);
            }
            exit;
        }

        default:
            http_response_code(400);
            echo json_encode(['success' => false, 'message' => 'Unknown action.']);
            exit;
    }
}

/* =====================================================
   Below this point: normal page render (unchanged)
===================================================== */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Career Opportunities</title>
    <link rel="icon" type="image/svg+xml" href="../img/CWDIcon.png">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/db_bg.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body>

    <button id="sidebarToggle" type="button"
        class="text-gray-900 bg-transparent box-border border border-transparent hover:bg-gray-100 focus:ring-4 focus:ring-gray-300 font-medium leading-5 rounded-lg ms-3 mt-3 text-sm p-2 focus:outline-none inline-flex fixed top-0 left-0 z-50 sm:hidden transition duration-300">
        <span class="sr-only">Open sidebar</span>
        <svg class="w-6 h-6" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="none"
            viewBox="0 0 24 24">
            <path stroke="currentColor" stroke-linecap="round" stroke-width="2" d="M5 7h14M5 12h14M5 17h10" />
        </svg>
    </button>

    <?php
    switch ($userInfo['role']) {
        case 'superadmin':
            include '../superadmin/superadmin.php';
            break;

        case 'bidding':
            include '../users/bidding.php';
            break;

        case 'gad':
            include '../users/gad.php';
            break;

        case 'job':
            include '../users/job.php';
            break;

        case 'news':
            include '../users/news.php';
            break;

        default:
            // Invalid role in DB
            session_destroy();
            header("Location: ../login.php");
            exit;
    }
    ?>

    <!-- Main Content Area -->
    <div class="sm:ml-64 p-4 mt-16 sm:mt-4 my-auto">

        <!-- Content Placeholder: Using the previous card component structure for demonstration -->
        <div class="bg-white p-6 mb-8">

            <div class="container mx-auto max-w-4xl py-6">

                <div class="container mx-auto max-w-4xl">
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Upload Career Opportunities</h1>

                    <div
                        class="bg-white block max-w-5xl p-6 rounded-lg border-t-4 shadow-xl border-[#1a589e] mx-auto my-6">

                        <form id="jo-upload-form" class="bg-white">

                            <div class="mb-6">
                                <label for="plantille_title"
                                    class="block text-lg font-semibold text-gray-700 mb-2">Plantilla Title</label>
                                <input type="text" id="plantille_title" name="plantille_title" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                    placeholder="List of 13 Plantilla Positions">
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">

                                <div>
                                    <label for="date_published"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Date
                                        Published</label>
                                    <input type="date" id="date_published" name="date_published" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150">
                                </div>

                                <div>
                                    <label for="deadline_date"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Application
                                        Deadline</label>
                                    <input type="date" id="deadline_date" name="deadline_date" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150">
                                </div>

                                <div>
                                    <label for="pdf_link" class="block text-lg font-semibold text-gray-700 mb-2">
                                        Upload Document</label>
                                    <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" required
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                    Publish Career Opportunities
                                </button>
                            </div>

                        </form>

                    </div>

                </div>

            </div>

            <div class="container mx-auto max-w-4xl py-6">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-[#1a589e]">Career Opportunities
                </h1>

                <!-- Quarter Selector Card -->
                <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 mb-4">
                    <label for="year"
                        class="block text-sm font-semibold text-gray-600 mb-2 uppercase tracking-wider">Fiscal
                        Quarter</label>
                    <select id="year" name="year"
                        class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm transition ease-in-out cursor-pointer">
                        <option value="2026">2026</option>
                        <option value="2025">2025</option>
                        <option value="2024">2024</option>
                        <option value="Archives">Archives</option>
                    </select>
                </div>

                <!-- End Selectors Grid -->


                <!-- Dynamic Data Display Section -->
                <div>
                    <div id="message-box" class="hidden fixed top-4 right-4 w-full max-w-sm z-50"></div>

                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 gap-2">
                        <h2 id="table-title" class="text-2xl font-bold text-gray-800">Existing Job Opportunities</h2>

                    </div>

                    <div id="data-table-container"
                        class="bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                        <div class="text-center text-gray-500 py-20">Loading documents...</div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="../js/sidenav.js"></script>

    <script>
    // ===== Inline career opportunities frontend logic =====
    // All AJAX calls hit THIS SAME career.php file with ?action=...
    document.addEventListener('DOMContentLoaded', () => {
        const uploadForm = document.getElementById('jo-upload-form');
        const yearSelect = document.getElementById('year');
        const tableContainer = document.getElementById('data-table-container');
        const messageBox = document.getElementById('message-box');

        function showMessage(text, isError = false) {
            messageBox.textContent = text;
            messageBox.className =
                'fixed top-4 right-4 w-full max-w-sm z-50 p-4 rounded-lg shadow-lg text-white ' +
                (isError ? 'bg-red-600' : 'bg-green-600');
            messageBox.classList.remove('hidden');
            setTimeout(() => messageBox.classList.add('hidden'), 4000);
        }

        function formatDate(dateStr) {
            const d = new Date(dateStr);
            return d.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str;
            return div.innerHTML;
        }

        // Reads the response as text first, then parses it as JSON.
        // If the server returned anything other than clean JSON (a PHP
        // warning, an HTML error page, etc.) this logs the raw body to
        // the console so the real problem is visible instead of a
        // generic "failed" message.
        async function parseJsonResponse(res) {
            const raw = await res.text();
            try {
                return JSON.parse(raw);
            } catch (err) {
                console.error('Expected JSON but got:', raw);
                throw new Error(
                    `Server returned an unexpected response (HTTP ${res.status}). ` +
                    `Check the browser console for the raw output.`
                );
            }
        }

        async function loadTable() {
            tableContainer.innerHTML = '<div class="text-center text-gray-500 py-20">Loading documents...</div>';

            try {
                const year = yearSelect.value;
                const res = await fetch(`career.php?action=list&year=${encodeURIComponent(year)}`);
                const result = await parseJsonResponse(res);

                if (!result.success) {
                    tableContainer.innerHTML = `<div class="text-center text-red-500 py-10">${result.message}</div>`;
                    return;
                }

                if (result.data.length === 0) {
                    tableContainer.innerHTML = '<div class="text-center text-gray-500 py-10">No career opportunities found for this period.</div>';
                    return;
                }

                const todayStr = new Date().toISOString().slice(0, 10);

                const rows = result.data.map(row => {
                    const hasDeadline = !!row.deadline_date;
                    const isExpired = hasDeadline && row.deadline_date < todayStr;
                    const deadlineBadge = hasDeadline
                        ? `<span class="${isExpired ? 'text-red-600' : 'text-gray-600'}">${formatDate(row.deadline_date)}</span>
                           ${isExpired ? '<span class="ml-2 inline-block px-2 py-0.5 rounded-full text-[10px] font-bold bg-red-50 text-red-600 uppercase">Expired</span>' : ''}`
                        : '<span class="text-gray-400">—</span>';

                    return `
                    <tr class="border-b border-gray-100 hover:bg-gray-50">
                        <td class="px-6 py-4 font-medium text-gray-900">${escapeHtml(row.plantilla_title)}</td>
                        <td class="px-6 py-4 text-gray-600">${formatDate(row.date_published)}</td>
                        <td class="px-6 py-4">${deadlineBadge}</td>
                        <td class="px-6 py-4">
                            <a href="../${row.file_path}" target="_blank" rel="noopener"
                               class="text-[#1a589e] hover:underline font-medium">
                               <i class="fa-solid fa-file-pdf mr-1"></i>${escapeHtml(row.file_name)}
                            </a>
                        </td>
                        <td class="px-6 py-4 text-right space-x-3">
                            <button class="text-[#1a589e] hover:underline js-edit-btn"
                                    data-id="${row.id}"
                                    data-title="${escapeHtml(row.plantilla_title)}"
                                    data-date="${row.date_published}"
                                    data-deadline="${row.deadline_date || ''}">
                                Edit
                            </button>
                            <button class="text-red-600 hover:underline js-delete-btn" data-id="${row.id}">
                                Delete
                            </button>
                        </td>
                    </tr>
                `;
                }).join('');

                tableContainer.innerHTML = `
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Plantilla Title</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Date Published</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Deadline</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Document</th>
                                <th class="px-6 py-3"></th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100">
                            ${rows}
                        </tbody>
                    </table>
                `;

                attachRowHandlers();
            } catch (err) {
                console.error(err);
                tableContainer.innerHTML = `<div class="text-center text-red-500 py-10">${escapeHtml(err.message || 'Failed to load documents.')}</div>`;
            }
        }

        function attachRowHandlers() {
            document.querySelectorAll('.js-delete-btn').forEach(btn => {
                btn.addEventListener('click', async () => {
                    if (!confirm('Delete this career opportunity? This cannot be undone.')) return;

                    try {
                        const res = await fetch('career.php?action=delete', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ id: btn.dataset.id }),
                        });
                        const result = await parseJsonResponse(res);
                        showMessage(result.message, !result.success);
                        if (result.success) loadTable();
                    } catch (err) {
                        console.error(err);
                        showMessage(err.message || 'Failed to delete record.', true);
                    }
                });
            });

            // Simple inline edit using prompt() dialogs; swap this out
            // for the commented-out modal in career.php if you'd like a
            // richer editing UI.
            document.querySelectorAll('.js-edit-btn').forEach(btn => {
                btn.addEventListener('click', async () => {
                    const newTitle = prompt('Plantilla title:', btn.dataset.title);
                    if (newTitle === null) return;

                    const newDate = prompt('Date published (YYYY-MM-DD):', btn.dataset.date);
                    if (newDate === null) return;

                    const newDeadline = prompt('Application deadline (YYYY-MM-DD):', btn.dataset.deadline);
                    if (newDeadline === null) return;

                    const formData = new FormData();
                    formData.append('id', btn.dataset.id);
                    formData.append('plantille_title', newTitle);
                    formData.append('date_published', newDate);
                    formData.append('deadline_date', newDeadline);

                    try {
                        const res = await fetch('career.php?action=update', {
                            method: 'POST',
                            body: formData,
                        });
                        const result = await parseJsonResponse(res);
                        showMessage(result.message, !result.success);
                        if (result.success) loadTable();
                    } catch (err) {
                        console.error(err);
                        showMessage(err.message || 'Failed to update record.', true);
                    }
                });
            });
        }

        uploadForm.addEventListener('submit', async (e) => {
            e.preventDefault();

            const formData = new FormData(uploadForm);

            try {
                const res = await fetch('career.php?action=upload', {
                    method: 'POST',
                    body: formData,
                });
                const result = await parseJsonResponse(res);
                showMessage(result.message, !result.success);

                if (result.success) {
                    uploadForm.reset();
                    loadTable();
                }
            } catch (err) {
                console.error(err);
                showMessage(err.message || 'Failed to publish career opportunity.', true);
            }
        });

        yearSelect.addEventListener('change', loadTable);

        loadTable();
    });
    </script>

</body>

</html>