<?php

session_start();

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

if (!$userInfo || empty($userInfo['role'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

/* =====================
   BIDDING MODULE CONFIG
===================== */
const BIDDING_CATEGORIES = [
    'Bidding Opportunities',
    'Bid Bulletin/Addendum',
    'Notice of Postponement',
    'Post Award Information',
];
const BIDDING_EDITOR_ROLES = ['superadmin', 'bidding'];
const MAX_UPLOAD_BYTES = 25 * 1024 * 1024; // 25 MB
const BIDDING_UPLOAD_DIR = 'uploads/bidding'; // relative to the project root (parent of modules/), not modules/ itself
const PROJECT_ROOT = __DIR__ . '/..'; // modules/bidding.php -> project root is one level up

function biddingUploadRoot(): string
{
    return realpath(PROJECT_ROOT) . '/' . BIDDING_UPLOAD_DIR;
}

$canEdit = in_array($userInfo['role'], BIDDING_EDITOR_ROLES, true);

/* =====================
   HELPERS
===================== */
function quarterFromDate(?string $ymd): string
{
    if (!$ymd) return '—';
    $month = (int) substr($ymd, 5, 2);
    if ($month <= 3) return 'Q1';
    if ($month <= 6) return 'Q2';
    if ($month <= 9) return 'Q3';
    return 'Q4';
}

function validateDate(string $date): bool
{
    $d = DateTime::createFromFormat('Y-m-d', $date);
    return $d && $d->format('Y-m-d') === $date;
}

function validateUploadedFile(array $file): array
{
    // Returns [ext, error]
    if ($file['size'] > MAX_UPLOAD_BYTES) {
        return [null, 'File exceeds the 25MB limit.'];
    }
    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, ['pdf', 'zip'], true)) {
        return [null, 'Only PDF or ZIP files are allowed.'];
    }
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);
    $allowedMime = [
        'pdf' => ['application/pdf'],
        'zip' => ['application/zip', 'application/x-zip-compressed', 'multipart/x-zip'],
    ];
    if (!in_array($mime, $allowedMime[$ext], true)) {
        return [null, 'File content does not match its extension.'];
    }
    return [$ext, null];
}

function storeUploadedFile(array $file, string $ext, string $uploadDate): array
{
    // Returns [relativePath, error]
    // Post Award Information uploads may have a blank upload_date; fall back to the current year for the folder.
    $year = $uploadDate !== '' ? substr($uploadDate, 0, 4) : date('Y');
    $destDir = biddingUploadRoot() . '/' . $year;
    if (!is_dir($destDir) && !mkdir($destDir, 0755, true) && !is_dir($destDir)) {
        return [null, 'Could not create upload directory.'];
    }
    $storedName = bin2hex(random_bytes(16)) . '.' . $ext;
    $destPath = $destDir . '/' . $storedName;
    if (!move_uploaded_file($file['tmp_name'], $destPath)) {
        return [null, 'Failed to save uploaded file.'];
    }
    return ['uploads/bidding/' . $year . '/' . $storedName, null];
}

function setFlash(string $type, string $message): void
{
    $_SESSION['bidding_flash'] = ['type' => $type, 'message' => $message];
}

function redirectBackToList(): void
{
    $category = $_POST['redirect_category'] ?? $_GET['category'] ?? 'Bidding Opportunities';
    $quarter  = $_POST['redirect_quarter']  ?? $_GET['quarter']  ?? '';
    $year     = $_POST['redirect_year']     ?? $_GET['year']     ?? date('Y');

    $params = http_build_query(array_filter([
        'category' => $category,
        'quarter'  => $quarter,
        'year'     => $year,
    ]));

    header("Location: " . basename($_SERVER['PHP_SELF']) . "?" . $params);
    exit;
}

/* =====================
   HANDLE POST ACTIONS (Post/Redirect/Get)
===================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'])) {

    if (!$canEdit) {
        setFlash('error', 'You do not have permission to do this.');
        redirectBackToList();
    }

    switch ($_POST['action']) {

        /* ---------- UPLOAD ---------- */
        case 'upload': {
            $category      = trim($_POST['category'] ?? '');
            $bid_code      = trim($_POST['bid_code'] ?? '');
            $bidding_title = trim($_POST['bidding_title'] ?? '');
            $upload_date   = trim($_POST['upload_date'] ?? '');

            if (!in_array($category, BIDDING_CATEGORIES, true)) {
                setFlash('error', 'Invalid category.');
                redirectBackToList();
            }
            if ($bid_code === '' || strlen($bid_code) > 50) {
                setFlash('error', 'Bid code is required (max 50 characters).');
                redirectBackToList();
            }
            if ($bidding_title === '' || strlen($bidding_title) > 255) {
                setFlash('error', 'Bidding title is required (max 255 characters).');
                redirectBackToList();
            }
            // Post Award Information has no upload date; every other category requires one.
            if ($category === 'Post Award Information') {
                $upload_date = '';
            } elseif (!validateDate($upload_date)) {
                setFlash('error', 'Invalid upload date.');
                redirectBackToList();
            }
            if (!isset($_FILES['document_file']) || $_FILES['document_file']['error'] !== UPLOAD_ERR_OK) {
                setFlash('error', 'A document file (PDF or ZIP) is required.');
                redirectBackToList();
            }

            $file = $_FILES['document_file'];
            [$ext, $error] = validateUploadedFile($file);
            if ($error) {
                setFlash('error', $error);
                redirectBackToList();
            }

            [$relativePath, $error] = storeUploadedFile($file, $ext, $upload_date);
            if ($error) {
                setFlash('error', $error);
                redirectBackToList();
            }

            try {
                $stmt = $conn->prepare(
                    "INSERT INTO bidding_documents
                        (category, bid_code, bidding_title, upload_date, file_name, file_path, file_type, file_size, created_by)
                     VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)"
                );
                $stmt->execute([
                    $category, $bid_code, $bidding_title, ($upload_date !== '' ? $upload_date : null),
                    $file['name'], $relativePath, $ext, $file['size'], $userInfo['id'],
                ]);
                setFlash('success', 'Bidding document uploaded successfully.');
            } catch (PDOException $e) {
                @unlink(realpath(PROJECT_ROOT) . '/' . $relativePath);
                setFlash('error', 'Database error while saving document.');
            }

            $_POST['redirect_category'] = $category;
            redirectBackToList();
        }

        /* ---------- UPDATE ---------- */
        case 'update': {
            $id            = (int) ($_POST['id'] ?? 0);
            $bid_code      = trim($_POST['bid_code'] ?? '');
            $bidding_title = trim($_POST['bidding_title'] ?? '');
            $upload_date   = trim($_POST['upload_date'] ?? '');

            if ($id <= 0 || $bid_code === '' || $bidding_title === '') {
                setFlash('error', 'Please fill in all fields correctly.');
                redirectBackToList();
            }

            $stmt = $conn->prepare("SELECT * FROM bidding_documents WHERE id = ? AND is_deleted = 0 LIMIT 1");
            $stmt->execute([$id]);
            $existing = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$existing) {
                setFlash('error', 'Document not found.');
                redirectBackToList();
            }

            // Post Award Information has no upload date; every other category requires one.
            if ($existing['category'] === 'Post Award Information') {
                $upload_date = '';
            } elseif (!validateDate($upload_date)) {
                setFlash('error', 'Invalid upload date.');
                redirectBackToList();
            }

            $newRelativePath = $existing['file_path'];
            $newFileName     = $existing['file_name'];
            $newFileType     = $existing['file_type'];
            $newFileSize     = $existing['file_size'];
            $oldAbsPathToDelete = null;

            if (isset($_FILES['document_file']) && $_FILES['document_file']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['document_file'];
                [$ext, $error] = validateUploadedFile($file);
                if ($error) {
                    setFlash('error', $error);
                    redirectBackToList();
                }
                [$relativePath, $error] = storeUploadedFile($file, $ext, $upload_date);
                if ($error) {
                    setFlash('error', $error);
                    redirectBackToList();
                }
                $oldAbsPathToDelete = realpath(PROJECT_ROOT) . '/' . $existing['file_path'];
                $newRelativePath = $relativePath;
                $newFileName     = $file['name'];
                $newFileType     = $ext;
                $newFileSize     = $file['size'];
            }

            try {
                $stmt = $conn->prepare(
                    "UPDATE bidding_documents
                     SET bid_code = ?, bidding_title = ?, upload_date = ?,
                         file_name = ?, file_path = ?, file_type = ?, file_size = ?
                     WHERE id = ?"
                );
                $stmt->execute([
                    $bid_code, $bidding_title, ($upload_date !== '' ? $upload_date : null),
                    $newFileName, $newRelativePath, $newFileType, $newFileSize,
                    $id,
                ]);
                if ($oldAbsPathToDelete && file_exists($oldAbsPathToDelete)) {
                    unlink($oldAbsPathToDelete);
                }
                setFlash('success', 'Document updated successfully.');
            } catch (PDOException $e) {
                setFlash('error', 'Database error while updating document.');
            }

            $_POST['redirect_category'] = $existing['category'];
            redirectBackToList();
        }

        /* ---------- DELETE ---------- */
        case 'delete': {
            $id = (int) ($_POST['id'] ?? 0);
            if ($id <= 0) {
                setFlash('error', 'Invalid document.');
                redirectBackToList();
            }

            $stmt = $conn->prepare("SELECT category FROM bidding_documents WHERE id = ? AND is_deleted = 0 LIMIT 1");
            $stmt->execute([$id]);
            $existing = $stmt->fetch(PDO::FETCH_ASSOC);
            if (!$existing) {
                setFlash('error', 'Document not found.');
                redirectBackToList();
            }

            try {
                $stmt = $conn->prepare("UPDATE bidding_documents SET is_deleted = 1 WHERE id = ?");
                $stmt->execute([$id]);
                setFlash('success', 'Document deleted successfully.');
            } catch (PDOException $e) {
                setFlash('error', 'Database error while deleting document.');
            }

            $_POST['redirect_category'] = $existing['category'];
            redirectBackToList();
        }
    }
}

/* =====================
   READ FLASH MESSAGE
===================== */
$flash = $_SESSION['bidding_flash'] ?? null;
unset($_SESSION['bidding_flash']);

/* =====================
   GET PARAMS FOR FILTER + LIST
===================== */
$filterCategory = $_GET['category'] ?? 'Bidding Opportunities';
if (!in_array($filterCategory, BIDDING_CATEGORIES, true)) {
    $filterCategory = 'Bidding Opportunities';
}
$filterQuarter = $_GET['quarter'] ?? '';
$filterYear    = $_GET['year'] ?? date('Y');
if (!ctype_digit((string) $filterYear) || strlen((string) $filterYear) !== 4) {
    $filterYear = date('Y');
}
$searchTerm = trim($_GET['search'] ?? '');
if (strlen($searchTerm) > 100) {
    $searchTerm = substr($searchTerm, 0, 100);
}

$perPage = 10;
$page = (int) ($_GET['page'] ?? 1);
if ($page < 1) $page = 1;

/* =====================
   FETCH DOCUMENTS FOR TABLE
===================== */
$quarterMonths = ['Q1' => [1, 3], 'Q2' => [4, 6], 'Q3' => [7, 9], 'Q4' => [10, 12]];

$sql = "SELECT
            d.id, d.category, d.bid_code, d.bidding_title, d.upload_date,
            d.file_name, d.file_path, d.file_type, d.file_size,
            u.firstname, u.lastname
        FROM bidding_documents d
        JOIN users u ON u.id = d.created_by
        WHERE d.is_deleted = 0
          AND d.category = ?
          AND (d.upload_date IS NULL OR YEAR(d.upload_date) = ?)";
$params = [$filterCategory, $filterYear];

if ($filterQuarter && isset($quarterMonths[$filterQuarter])) {
    [$mStart, $mEnd] = $quarterMonths[$filterQuarter];
    $sql .= " AND (d.upload_date IS NULL OR MONTH(d.upload_date) BETWEEN ? AND ?)";
    $params[] = $mStart;
    $params[] = $mEnd;
}
if ($searchTerm !== '') {
    $sql .= " AND (d.bid_code LIKE ? OR d.bidding_title LIKE ?)";
    $like = '%' . str_replace(['%', '_'], ['\%', '\_'], $searchTerm) . '%';
    $params[] = $like;
    $params[] = $like;
}

// Total count for pagination (same filters, no LIMIT).
$countStmt = $conn->prepare(str_replace(
    'SELECT
            d.id, d.category, d.bid_code, d.bidding_title, d.upload_date,
            d.file_name, d.file_path, d.file_type, d.file_size,
            u.firstname, u.lastname',
    'SELECT COUNT(*)',
    $sql
));
$countStmt->execute($params);
$totalDocuments = (int) $countStmt->fetchColumn();
$totalPages = max(1, (int) ceil($totalDocuments / $perPage));
if ($page > $totalPages) $page = $totalPages;
$offset = ($page - 1) * $perPage;

$sql .= " ORDER BY d.upload_date IS NULL DESC, d.upload_date DESC, d.id DESC";
$sql .= " LIMIT " . $perPage . " OFFSET " . $offset;

$stmt = $conn->prepare($sql);
$stmt->execute($params);
$documents = $stmt->fetchAll(PDO::FETCH_ASSOC);

/* =====================
   EDIT MODE (server-rendered, prefilled form)
===================== */
$editDoc = null;
if ($canEdit && isset($_GET['edit_id'])) {
    $stmt = $conn->prepare("SELECT * FROM bidding_documents WHERE id = ? AND is_deleted = 0 LIMIT 1");
    $stmt->execute([(int) $_GET['edit_id']]);
    $editDoc = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

/* =====================
   DELETE CONFIRMATION MODE
===================== */
$confirmDeleteDoc = null;
if ($canEdit && isset($_GET['confirm_delete'])) {
    $stmt = $conn->prepare("SELECT id, bid_code, bidding_title FROM bidding_documents WHERE id = ? AND is_deleted = 0 LIMIT 1");
    $stmt->execute([(int) $_GET['confirm_delete']]);
    $confirmDeleteDoc = $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

function formatBytes(int $bytes): string
{
    if (!$bytes) return '0 KB';
    $kb = $bytes / 1024;
    return $kb > 1024 ? number_format($kb / 1024, 2) . ' MB' : number_format($kb, 0) . ' KB';
}

function h(?string $s): string
{
    return htmlspecialchars($s ?? '', ENT_QUOTES, 'UTF-8');
}

function friendlyDate(?string $ymd): string
{
    if (!$ymd) return '';
    $d = DateTime::createFromFormat('Y-m-d', $ymd);
    return $d ? $d->format('M j, Y') : $ymd;
}

function fileIconClass(string $ext): string
{
    return $ext === 'pdf' ? 'fa-file-pdf' : 'fa-file-zipper';
}

function fileIconColor(string $ext): string
{
    return $ext === 'pdf' ? 'text-red-500' : 'text-amber-500';
}

function categoryBadgeClass(string $category): string
{
    return match ($category) {
        'Bidding Opportunities'  => 'bg-blue-100 text-blue-700',
        'Bid Bulletin/Addendum'  => 'bg-purple-100 text-purple-700',
        'Notice of Postponement' => 'bg-amber-100 text-amber-700',
        'Post Award Information' => 'bg-green-100 text-green-700',
        default                  => 'bg-gray-100 text-gray-700',
    };
}

function initials(string $first, string $last): string
{
    $a = $first !== '' ? mb_substr($first, 0, 1) : '';
    $b = $last !== '' ? mb_substr($last, 0, 1) : '';
    return mb_strtoupper($a . $b) ?: '?';
}

/** Builds a querystring for the list view, overriding only the given keys. */
function listUrl(array $overrides = []): string
{
    global $filterCategory, $filterQuarter, $filterYear, $searchTerm, $page;
    $base = [
        'category' => $filterCategory,
        'quarter'  => $filterQuarter,
        'year'     => $filterYear,
        'search'   => $searchTerm,
        'page'     => $page,
    ];
    $merged = array_merge($base, $overrides);
    return '?' . http_build_query(array_filter($merged, fn($v) => $v !== '' && $v !== null));
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bidding</title>
    <link rel="icon" type="image/svg+xml" href="../img/CWDIcon.png">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/db_bg.css">
    <link rel="stylesheet" href="../css/faqs.css">

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
            session_destroy();
            header("Location: ../login.php");
            exit;
    }
    ?>

    <!-- Main Content Area -->
    <div class="sm:ml-64 p-4 mt-16 sm:mt-4 my-auto">

        <div class="bg-white p-6 mb-8">

            <?php if ($flash): ?>
                <div class="container mx-auto max-w-4xl mb-4">
                    <div class="border rounded-lg shadow px-4 py-3 <?= $flash['type'] === 'success' ? 'bg-green-100 text-green-800 border-green-300' : 'bg-red-100 text-red-800 border-red-300' ?>">
                        <?= h($flash['message']) ?>
                    </div>
                </div>
            <?php endif; ?>

            <?php if ($canEdit): ?>
            <div class="container mx-auto max-w-4xl py-6">

                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">
                    <?= $editDoc ? 'Edit Bidding Opportunity' : 'Add Bidding Opportunity' ?>
                </h1>

                <div class="bg-white block max-w-5xl p-6 rounded-lg border-t-4 shadow-xl border-[#1a589e] mx-auto my-6">

                    <?php if ($editDoc): ?>
                        <!-- ===== EDIT FORM ===== -->
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="update">
                            <input type="hidden" name="id" value="<?= (int) $editDoc['id'] ?>">
                            <input type="hidden" name="redirect_category" value="<?= h($filterCategory) ?>">
                            <input type="hidden" name="redirect_quarter" value="<?= h($filterQuarter) ?>">
                            <input type="hidden" name="redirect_year" value="<?= h((string) $filterYear) ?>">

                            <div class="grid grid-cols-1 gap-6">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                    <input type="text" disabled value="<?= h($editDoc['category']) ?>"
                                        class="block w-full p-2.5 border border-gray-300 rounded-lg text-sm bg-gray-100 text-gray-500">
                                </div>

                                <div>
                                    <label for="bid_code" class="block text-sm font-medium text-gray-700 mb-1">Bid Code</label>
                                    <input type="text" id="bid_code" name="bid_code" required
                                        value="<?= h($editDoc['bid_code']) ?>"
                                        class="block w-full p-2.5 border border-gray-300 rounded-lg text-sm shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]">
                                </div>

                                <div>
                                    <label for="bidding_title" class="block text-sm font-medium text-gray-700 mb-1">Bidding Title</label>
                                    <input type="text" id="bidding_title" name="bidding_title" required
                                        value="<?= h($editDoc['bidding_title']) ?>"
                                        class="block w-full p-2.5 border border-gray-300 rounded-lg text-sm shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]">
                                </div>

                                <div>
                                    <label for="upload_date" class="block text-sm font-medium text-gray-700 mb-1">Upload Date</label>
                                    <?php $editIsPostAward = $editDoc['category'] === 'Post Award Information'; ?>
                                    <input type="date" id="upload_date" name="upload_date"
                                        <?= $editIsPostAward ? 'readonly' : 'required' ?>
                                        value="<?= h($editIsPostAward ? '' : $editDoc['upload_date']) ?>"
                                        class="block w-full p-2.5 border border-gray-300 rounded-lg text-sm shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e] <?= $editIsPostAward ? 'bg-gray-100 text-gray-500 cursor-not-allowed' : '' ?>">
                                    <?php if ($editIsPostAward): ?>
                                        <p class="text-xs text-gray-500 mt-1">No date is needed for Post Award Information documents.</p>
                                    <?php endif; ?>
                                </div>

                                <div class="border-t pt-4 border-gray-200">
                                    <p class="text-sm text-gray-500 mb-1">Current file</p>
                                    <a href="<?= h($editDoc['file_path']) ?>" target="_blank" rel="noopener"
                                        class="text-[#1a589e] hover:underline font-semibold text-sm">
                                        <?= h($editDoc['file_name']) ?> (<?= h(strtoupper($editDoc['file_type'])) ?>, <?= formatBytes((int) $editDoc['file_size']) ?>)
                                    </a>
                                </div>

                                <div>
                                    <label for="document_file" class="block text-sm font-medium text-gray-700 mb-1">
                                        Re-upload New File (optional — leave blank to keep current file)
                                    </label>
                                    <input type="file" id="document_file" name="document_file" accept=".pdf, .zip"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]">
                                </div>

                                <div class="text-center flex flex-col sm:flex-row gap-3 justify-center">
                                    <button type="submit"
                                        class="w-full sm:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                        Save Changes
                                    </button>
                                    <a href="?category=<?= urlencode($filterCategory) ?>&quarter=<?= urlencode($filterQuarter) ?>&year=<?= urlencode((string) $filterYear) ?>"
                                        class="w-full sm:w-auto px-8 py-3 bg-gray-200 text-gray-800 font-bold text-lg rounded-full shadow hover:bg-gray-300 transition duration-300 ease-in-out inline-block">
                                        Cancel
                                    </a>
                                </div>
                            </div>
                        </form>

                    <?php else: ?>
                        <!-- ===== UPLOAD FORM ===== -->
                        <form method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="upload">
                            <input type="hidden" name="redirect_quarter" value="<?= h($filterQuarter) ?>">
                            <input type="hidden" name="redirect_year" value="<?= h((string) $filterYear) ?>">

                            <div class="grid grid-cols-1 gap-6">

                                <div>
                                    <label for="category" class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                                    <select id="category" name="category" required
                                        class="block w-full pl-3 pr-10 py-2.5 text-base border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm">
                                        <option value="" disabled selected>Select a document type</option>
                                        <?php foreach (BIDDING_CATEGORIES as $cat): ?>
                                            <option value="<?= h($cat) ?>"><?= h($cat) ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div>
                                    <label for="bid_code" class="block text-sm font-medium text-gray-700 mb-1">Bid Code</label>
                                    <input type="text" id="bid_code" name="bid_code" required
                                        class="block w-full p-2.5 border border-gray-300 rounded-lg text-sm shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]"
                                        placeholder="e.g. CWD YYYY-##">
                                </div>

                                <div>
                                    <label for="bidding_title" class="block text-sm font-medium text-gray-700 mb-1">Bidding Title</label>
                                    <input type="text" id="bidding_title" name="bidding_title" required
                                        class="block w-full p-2.5 border border-gray-300 rounded-lg text-sm shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]"
                                        placeholder="e.g., Supply and Delivery Various Office Equipment, Furniture and Fixtures of Different Departments">
                                </div>

                                <div>
                                    <label for="upload_date" class="block text-sm font-medium text-gray-700 mb-1">Upload Date</label>
                                    <input type="date" id="upload_date" name="upload_date" required
                                        class="block w-full p-2.5 border border-gray-300 rounded-lg text-sm shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]">
                                    <p id="upload_date_hint" class="text-xs text-gray-500 mt-1 hidden">No date is needed for Post Award Information documents.</p>
                                </div>

                                <div>
                                    <label for="document_file" class="block text-sm font-medium text-gray-700 mb-1">Document File (PDF or ZIP)</label>
                                    <input type="file" id="document_file" name="document_file" accept=".pdf, .zip" required
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 shadow-sm focus:ring-[#1a589e] focus:border-[#1a589e]">
                                </div>

                                <div class="text-center">
                                    <button type="submit"
                                        class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                        Upload Opportunity
                                    </button>
                                </div>

                            </div>
                        </form>

                        <script>
                        (function () {
                            var categorySelect = document.getElementById('category');
                            var uploadDateInput = document.getElementById('upload_date');
                            var hint = document.getElementById('upload_date_hint');
                            if (!categorySelect || !uploadDateInput) return;

                            var LOCK_CATEGORY = 'Post Award Information';
                            var lockedClasses = ['bg-gray-100', 'text-gray-500', 'cursor-not-allowed'];
                            var userEnteredDate = ''; // remembers what the user typed before locking

                            function applyLockState() {
                                var isPostAward = categorySelect.value === LOCK_CATEGORY;

                                if (isPostAward) {
                                    // Remember whatever the user had typed, then blank the field.
                                    if (!uploadDateInput.readOnly) {
                                        userEnteredDate = uploadDateInput.value;
                                    }
                                    uploadDateInput.value = '';
                                    uploadDateInput.readOnly = true; // stays readonly, NOT disabled, so it still submits (as blank)
                                    uploadDateInput.required = false;
                                    uploadDateInput.classList.add.apply(uploadDateInput.classList, lockedClasses);
                                    if (hint) hint.classList.remove('hidden');
                                } else {
                                    uploadDateInput.readOnly = false;
                                    uploadDateInput.required = true;
                                    uploadDateInput.classList.remove.apply(uploadDateInput.classList, lockedClasses);
                                    if (hint) hint.classList.add('hidden');
                                    // Restore what the user had typed before, if anything.
                                    if (userEnteredDate) {
                                        uploadDateInput.value = userEnteredDate;
                                        userEnteredDate = '';
                                    }
                                }
                            }

                            categorySelect.addEventListener('change', applyLockState);
                            applyLockState(); // run once in case of pre-selected value (e.g. browser autofill)
                        })();
                        </script>
                    <?php endif; ?>

                </div>

            </div>
            <?php endif; ?>

            <?php if ($confirmDeleteDoc): ?>
                <div class="container mx-auto max-w-4xl py-6">
                    <div class="bg-white p-6 rounded-lg border-t-4 shadow-xl border-red-500 mx-auto">
                        <h2 class="text-xl font-bold text-gray-900 mb-2">Delete this document?</h2>
                        <p class="text-gray-600 mb-6">
                            <strong><?= h($confirmDeleteDoc['bid_code']) ?></strong> —
                            <?= h($confirmDeleteDoc['bidding_title']) ?><br>
                            This cannot be undone.
                        </p>
                        <form method="POST" class="flex gap-3">
                            <input type="hidden" name="action" value="delete">
                            <input type="hidden" name="id" value="<?= (int) $confirmDeleteDoc['id'] ?>">
                            <input type="hidden" name="redirect_category" value="<?= h($filterCategory) ?>">
                            <input type="hidden" name="redirect_quarter" value="<?= h($filterQuarter) ?>">
                            <input type="hidden" name="redirect_year" value="<?= h((string) $filterYear) ?>">
                            <button type="submit"
                                class="px-6 py-2.5 bg-red-600 text-white font-bold rounded-full shadow hover:bg-red-700 transition duration-300">
                                Yes, Delete
                            </button>
                            <a href="?category=<?= urlencode($filterCategory) ?>&quarter=<?= urlencode($filterQuarter) ?>&year=<?= urlencode((string) $filterYear) ?>"
                                class="px-6 py-2.5 bg-gray-200 text-gray-800 font-bold rounded-full shadow hover:bg-gray-300 transition duration-300">
                                Cancel
                            </a>
                        </form>
                    </div>
                </div>
            <?php endif; ?>

            <div class="container mx-auto max-w-4xl py-6">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-[#1a589e]">Bidding Opportunities</h1>

                <!-- ===== FILTER FORM (GET, submits on select change via native form, no JS) ===== -->
                <form method="GET" class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">

                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                        <label for="category" class="block text-sm font-semibold text-gray-600 mb-2 uppercase tracking-wider">Document Category</label>
                        <select id="category" name="category"
                            class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm">
                            <?php foreach (BIDDING_CATEGORIES as $cat): ?>
                                <option value="<?= h($cat) ?>" <?= $filterCategory === $cat ? 'selected' : '' ?>><?= h($cat) ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                        <label for="quarter" class="block text-sm font-semibold text-gray-600 mb-2 uppercase tracking-wider">Fiscal Quarter</label>
                        <select id="quarter" name="quarter"
                            class="block w-full pl-3 pr-10 py-3 text-base border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm">
                            <option value="" <?= $filterQuarter === '' ? 'selected' : '' ?>>All Quarters</option>
                            <option value="Q1" <?= $filterQuarter === 'Q1' ? 'selected' : '' ?>>First Quarter (Q1)</option>
                            <option value="Q2" <?= $filterQuarter === 'Q2' ? 'selected' : '' ?>>Second Quarter (Q2)</option>
                            <option value="Q3" <?= $filterQuarter === 'Q3' ? 'selected' : '' ?>>Third Quarter (Q3)</option>
                            <option value="Q4" <?= $filterQuarter === 'Q4' ? 'selected' : '' ?>>Fourth Quarter (Q4)</option>
                        </select>
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200">
                        <label for="year" class="block text-sm font-semibold text-gray-600 mb-2 uppercase tracking-wider">Year</label>
                        <input type="number" id="year" name="year" min="2000" max="2100" value="<?= h((string) $filterYear) ?>"
                            class="block w-full p-2.5 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm">
                    </div>

                    <div class="bg-white p-6 rounded-xl shadow-lg border border-gray-200 flex flex-col justify-between">
                        <div>
                            <label for="search" class="block text-sm font-semibold text-gray-600 mb-2 uppercase tracking-wider">Search</label>
                            <div class="relative mb-3">
                                <i class="fa-solid fa-magnifying-glass absolute left-3 top-1/2 -translate-y-1/2 text-gray-400 text-sm"></i>
                                <input type="text" id="search" name="search" value="<?= h($searchTerm) ?>"
                                    placeholder="Bid code or title…"
                                    class="block w-full pl-9 pr-3 py-2.5 border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-[#1a589e] focus:border-[#1a589e] sm:text-sm">
                            </div>
                        </div>
                        <button type="submit"
                            class="w-full px-4 py-2.5 bg-[#1a589e] text-white font-semibold rounded-lg shadow hover:bg-[#15467e] transition duration-300">
                            Apply Filters
                        </button>
                    </div>

                </form>

                <?php if ($searchTerm !== '' || $filterQuarter !== ''): ?>
                    <div class="flex flex-wrap items-center gap-2 mb-6 -mt-2">
                        <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">Active:</span>
                        <?php if ($searchTerm !== ''): ?>
                            <a href="<?= h(listUrl(['search' => null, 'page' => 1])) ?>"
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#1a589e]/10 text-[#1a589e] hover:bg-[#1a589e]/20 transition">
                                “<?= h($searchTerm) ?>” <i class="fa-solid fa-xmark"></i>
                            </a>
                        <?php endif; ?>
                        <?php if ($filterQuarter !== ''): ?>
                            <a href="<?= h(listUrl(['quarter' => null, 'page' => 1])) ?>"
                                class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-xs font-semibold bg-[#1a589e]/10 text-[#1a589e] hover:bg-[#1a589e]/20 transition">
                                <?= h($filterQuarter) ?> <i class="fa-solid fa-xmark"></i>
                            </a>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>

                <div>
                    <div class="flex flex-col md:flex-row md:items-center justify-between mb-4 gap-2">
                        <h2 class="text-2xl font-bold text-gray-800">Existing <?= h($filterCategory) ?> Documents</h2>
                        <?php if ($totalDocuments > 0): ?>
                            <span class="text-sm text-gray-500">
                                Showing <?= (int) (($page - 1) * $perPage + 1) ?>–<?= (int) min($page * $perPage, $totalDocuments) ?>
                                of <?= (int) $totalDocuments ?> document<?= $totalDocuments === 1 ? '' : 's' ?>
                            </span>
                        <?php endif; ?>
                    </div>

                    <?php if (empty($documents)): ?>
                        <div class="bg-white rounded-xl shadow-xl border border-gray-200 text-center py-20 px-6">
                            <i class="fa-regular fa-folder-open text-5xl text-gray-300 mb-4"></i>
                            <p class="text-gray-500 font-medium">
                                <?= $searchTerm !== '' ? 'No documents match “' . h($searchTerm) . '”.' : 'No documents found for this filter.' ?>
                            </p>
                            <?php if ($searchTerm !== '' || $filterQuarter !== ''): ?>
                                <a href="<?= h(listUrl(['search' => null, 'quarter' => null, 'page' => 1])) ?>"
                                    class="inline-block mt-3 text-[#1a589e] hover:underline text-sm font-semibold">Clear filters</a>
                            <?php endif; ?>
                        </div>
                    <?php else: ?>

                        <!-- ===== MOBILE: card list ===== -->
                        <div class="md:hidden space-y-3">
                            <?php foreach ($documents as $doc): ?>
                                <div class="bg-white rounded-xl shadow-lg border border-gray-200 p-4">
                                    <div class="flex items-start justify-between gap-3 mb-2">
                                        <div class="min-w-0">
                                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-wider"><?= h($doc['bid_code']) ?></p>
                                            <p class="text-base font-bold text-gray-900 leading-snug"><?= h($doc['bidding_title']) ?></p>
                                        </div>
                                        <i class="fa-solid <?= fileIconClass($doc['file_type']) ?> <?= fileIconColor($doc['file_type']) ?> text-2xl shrink-0"></i>
                                    </div>
                                    <div class="flex flex-wrap items-center gap-2 mb-3 text-xs">
                                        <?php if ($doc['upload_date']): ?>
                                            <span class="inline-flex items-center gap-1 text-gray-500">
                                                <i class="fa-regular fa-calendar"></i> <?= h(friendlyDate($doc['upload_date'])) ?>
                                            </span>
                                            <span class="px-2 py-0.5 rounded-full bg-gray-100 text-gray-600 font-semibold"><?= quarterFromDate($doc['upload_date']) ?></span>
                                        <?php else: ?>
                                            <span class="px-2 py-0.5 rounded-full bg-amber-100 text-amber-700 font-semibold">No date required</span>
                                        <?php endif; ?>
                                    </div>
                                    <div class="flex items-center justify-between border-t border-gray-100 pt-3">
                                        <a href="<?= h('../' . $doc['file_path']) ?>" target="_blank" rel="noopener"
                                            class="inline-flex items-center gap-1.5 text-[#1a589e] hover:underline font-semibold text-sm">
                                            <i class="fa-solid fa-download"></i>
                                            <?= h(strtoupper($doc['file_type'])) ?> · <?= formatBytes((int) $doc['file_size']) ?>
                                        </a>
                                        <div class="flex items-center gap-2">
                                            <span class="w-6 h-6 rounded-full bg-[#1a589e]/10 text-[#1a589e] text-[10px] font-bold flex items-center justify-center"
                                                title="<?= h(trim($doc['firstname'] . ' ' . $doc['lastname'])) ?>">
                                                <?= h(initials($doc['firstname'], $doc['lastname'])) ?>
                                            </span>
                                            <?php if ($canEdit): ?>
                                                <a href="<?= h(listUrl(['edit_id' => (int) $doc['id']])) ?>" class="text-[#1a589e] hover:underline text-sm">Edit</a>
                                                <a href="<?= h(listUrl(['confirm_delete' => (int) $doc['id']])) ?>" class="text-red-600 hover:underline text-sm">Delete</a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>

                        <!-- ===== DESKTOP: table ===== -->
                        <div class="hidden md:block bg-white rounded-xl shadow-xl overflow-hidden border border-gray-200">
                            <table class="min-w-full divide-y divide-gray-200">
                                <thead class="bg-gray-50">
                                    <tr>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Document</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Date</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Quarter</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">File</th>
                                        <th class="px-4 py-3 text-left text-xs font-semibold text-gray-500 uppercase">Uploaded By</th>
                                        <?php if ($canEdit): ?>
                                            <th class="px-4 py-3"></th>
                                        <?php endif; ?>
                                    </tr>
                                </thead>
                                <tbody class="bg-white divide-y divide-gray-100">
                                    <?php foreach ($documents as $doc): ?>
                                        <tr class="hover:bg-gray-50 transition">
                                            <td class="px-4 py-3 max-w-xs">
                                                <p class="text-xs font-semibold text-gray-400 uppercase tracking-wide"><?= h($doc['bid_code']) ?></p>
                                                <p class="text-sm font-medium text-gray-900 truncate" title="<?= h($doc['bidding_title']) ?>"><?= h($doc['bidding_title']) ?></p>
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-500 whitespace-nowrap">
                                                <?= $doc['upload_date'] ? h(friendlyDate($doc['upload_date'])) : '<span class="text-amber-600 font-medium">Not required</span>' ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <?php if ($doc['upload_date']): ?>
                                                    <span class="px-2 py-0.5 rounded-full bg-gray-100 text-gray-600 text-xs font-semibold"><?= quarterFromDate($doc['upload_date']) ?></span>
                                                <?php else: ?>
                                                    <span class="text-gray-300">—</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="px-4 py-3 text-sm">
                                                <a href="<?= h('../' . $doc['file_path']) ?>" target="_blank" rel="noopener"
                                                    class="inline-flex items-center gap-2 text-[#1a589e] hover:underline font-semibold">
                                                    <i class="fa-solid <?= fileIconClass($doc['file_type']) ?> <?= fileIconColor($doc['file_type']) ?>"></i>
                                                    <?= h(strtoupper($doc['file_type'])) ?> <span class="text-gray-400 font-normal">(<?= formatBytes((int) $doc['file_size']) ?>)</span>
                                                </a>
                                            </td>
                                            <td class="px-4 py-3 text-sm text-gray-500">
                                                <span class="inline-flex items-center gap-2">
                                                    <span class="w-6 h-6 rounded-full bg-[#1a589e]/10 text-[#1a589e] text-[10px] font-bold flex items-center justify-center">
                                                        <?= h(initials($doc['firstname'], $doc['lastname'])) ?>
                                                    </span>
                                                    <?= h(trim($doc['firstname'] . ' ' . $doc['lastname'])) ?>
                                                </span>
                                            </td>
                                            <?php if ($canEdit): ?>
                                                <td class="px-4 py-3 text-sm text-right whitespace-nowrap">
                                                    <a href="<?= h(listUrl(['edit_id' => (int) $doc['id']])) ?>"
                                                        class="text-[#1a589e] hover:underline mr-3">Edit</a>
                                                    <a href="<?= h(listUrl(['confirm_delete' => (int) $doc['id']])) ?>"
                                                        class="text-red-600 hover:underline">Delete</a>
                                                </td>
                                            <?php endif; ?>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>

                        <!-- ===== PAGINATION ===== -->
                        <?php if ($totalPages > 1): ?>
                            <div class="flex items-center justify-center gap-1 mt-6">
                                <a href="<?= h(listUrl(['page' => max(1, $page - 1)])) ?>"
                                    class="px-3 py-2 rounded-lg text-sm font-semibold <?= $page <= 1 ? 'text-gray-300 pointer-events-none' : 'text-[#1a589e] hover:bg-[#1a589e]/10' ?>">
                                    <i class="fa-solid fa-chevron-left"></i>
                                </a>
                                <?php for ($p = 1; $p <= $totalPages; $p++): ?>
                                    <?php if ($p === 1 || $p === $totalPages || abs($p - $page) <= 1): ?>
                                        <a href="<?= h(listUrl(['page' => $p])) ?>"
                                            class="w-9 h-9 flex items-center justify-center rounded-lg text-sm font-semibold <?= $p === $page ? 'bg-[#1a589e] text-white' : 'text-gray-600 hover:bg-gray-100' ?>">
                                            <?= $p ?>
                                        </a>
                                    <?php elseif (abs($p - $page) === 2): ?>
                                        <span class="px-1 text-gray-300">…</span>
                                    <?php endif; ?>
                                <?php endfor; ?>
                                <a href="<?= h(listUrl(['page' => min($totalPages, $page + 1)])) ?>"
                                    class="px-3 py-2 rounded-lg text-sm font-semibold <?= $page >= $totalPages ? 'text-gray-300 pointer-events-none' : 'text-[#1a589e] hover:bg-[#1a589e]/10' ?>">
                                    <i class="fa-solid fa-chevron-right"></i>
                                </a>
                            </div>
                        <?php endif; ?>

                    <?php endif; ?>
                </div>

            </div>

        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="../js/sidenav.js"></script>

</body>

</html>