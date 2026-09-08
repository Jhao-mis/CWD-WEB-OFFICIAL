<?php
/* =====================
   AUTH + SESSION GUARD
===================== */
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

/* =====================
   HARD FAIL IF USER NOT FOUND
===================== */
if (!$userInfo || empty($userInfo['role'])) {
    // Session exists but user no longer valid
    session_destroy();
    header("Location: login.php");
    exit;
}

$userId    = (int) $userInfo['id'];
$canManage = in_array($userInfo['role'], ['superadmin', 'news'], true);

/* =====================================================
   UPLOAD DIRECTORIES
===================================================== */
$uploadDirImages = "../uploads/waterlife/covers/";
$uploadDirPdfs   = "../uploads/waterlife/pdf/";

foreach ([$uploadDirImages, $uploadDirPdfs] as $dir) {
    if (!is_dir($dir)) {
        mkdir($dir, 0777, true);
    }
}

/* =====================================================
   HELPERS
===================================================== */
function failBack(string $message): void
{
    $_SESSION['wl_error'] = $message;
    header("Location: waterlife.php?error=1");
    exit;
}

function handleUpload(string $fieldName, string $destDir, array $allowedExt, bool $required = true): ?string
{
    if (!isset($_FILES[$fieldName]) || $_FILES[$fieldName]['error'] === UPLOAD_ERR_NO_FILE) {
        if ($required) {
            failBack("Missing required file: $fieldName");
        }
        return null;
    }

    $file = $_FILES[$fieldName];

    if ($file['error'] !== UPLOAD_ERR_OK) {
        failBack("There was a problem uploading: $fieldName");
    }

    $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
    if (!in_array($ext, $allowedExt, true)) {
        failBack("Invalid file type for $fieldName");
    }

    $storedName = time() . '_' . bin2hex(random_bytes(4)) . '_' . preg_replace('/[^A-Za-z0-9._-]/', '_', basename($file['name']));
    $destPath   = $destDir . $storedName;

    if (!move_uploaded_file($file['tmp_name'], $destPath)) {
        failBack("Failed to save uploaded file: $fieldName");
    }

    return $storedName;
}

function deleteFileIfExists(string $dir, ?string $filename): void
{
    if ($filename && is_file($dir . $filename)) {
        @unlink($dir . $filename);
    }
}

/* =====================================================
   HANDLE: UPLOAD NEW FEATURED ISSUE (carousel)
   Form: #magazine-issue-form
===================================================== */
if (isset($_POST['action']) && $_POST['action'] === 'upload') {

    if (!$canManage) {
        failBack("You do not have permission to upload issues.");
    }

    $volumeIssue = trim($_POST['volume_issue'] ?? '');
    $issueTitle  = trim($_POST['issue_title'] ?? '');
    $description = trim($_POST['cover_description'] ?? '');
    $issueYear   = (int) ($_POST['issue_year'] ?? 0);

    if ($volumeIssue === '' || $issueTitle === '' || $description === '' || $issueYear <= 0) {
        failBack("Please fill in all required fields.");
    }

    $coverImage = handleUpload('cover_image', $uploadDirImages, ['jpg', 'jpeg', 'png', 'webp']);
    $pdfFile    = handleUpload('pdf_file', $uploadDirPdfs, ['pdf']);

    $stmt = $conn->prepare("
        INSERT INTO waterlife_issues
            (volume_issue, issue_title, cover_description, cover_image, pdf_file, issue_year, is_featured, created_by)
        VALUES (?, ?, ?, ?, ?, ?, 1, ?)
    ");
    $stmt->execute([$volumeIssue, $issueTitle, $description, $coverImage, $pdfFile, $issueYear, $userId]);

    header("Location: waterlife.php?added=1");
    exit;
}

/* =====================================================
   HANDLE: EDIT EXISTING FEATURED ISSUE
   Form: #edit-magazine-issue-form
===================================================== */
if (isset($_POST['action']) && $_POST['action'] === 'edit') {

    if (!$canManage) {
        failBack("You do not have permission to edit issues.");
    }

    $id = (int) ($_POST['id'] ?? 0);
    if ($id <= 0) {
        failBack("Missing issue id.");
    }

    $stmt = $conn->prepare("SELECT * FROM waterlife_issues WHERE id = ? LIMIT 1");
    $stmt->execute([$id]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$existing) {
        failBack("Issue not found.");
    }

    $volumeIssue = trim($_POST['volume_issue'] ?? $existing['volume_issue']);
    $issueTitle  = trim($_POST['issue_title'] ?? $existing['issue_title']);
    $description = trim($_POST['cover_description'] ?? $existing['cover_description']);
    $issueYear   = (int) ($_POST['issue_year'] ?? $existing['issue_year']);

    // Files are optional on edit — only replace if a new one was chosen
    $coverImage = handleUpload('cover_image', $uploadDirImages, ['jpg', 'jpeg', 'png', 'webp'], false) ?? $existing['cover_image'];
    $pdfFile    = handleUpload('pdf_file', $uploadDirPdfs, ['pdf'], false) ?? $existing['pdf_file'];

    if ($coverImage !== $existing['cover_image']) {
        deleteFileIfExists($uploadDirImages, $existing['cover_image']);
    }
    if ($pdfFile !== $existing['pdf_file']) {
        deleteFileIfExists($uploadDirPdfs, $existing['pdf_file']);
    }

    $stmt = $conn->prepare("
        UPDATE waterlife_issues
        SET volume_issue = ?, issue_title = ?, cover_description = ?,
            cover_image = ?, pdf_file = ?, issue_year = ?
        WHERE id = ?
    ");
    $stmt->execute([$volumeIssue, $issueTitle, $description, $coverImage, $pdfFile, $issueYear, $id]);

    header("Location: waterlife.php?updated=1");
    exit;
}

/* =====================================================
   HANDLE: ADD ARCHIVE-ONLY ISSUE
   Form: #add-issue-form
===================================================== */
if (isset($_POST['action']) && $_POST['action'] === 'add_archive') {

    if (!$canManage) {
        failBack("You do not have permission to add archive issues.");
    }

    $title = trim($_POST['new_title'] ?? '');
    $year  = (int) ($_POST['new_year'] ?? 0);

    if ($title === '' || $year <= 0) {
        failBack("Please fill in all required fields.");
    }

    $pdfFile = handleUpload('new_pdf_file', $uploadDirPdfs, ['pdf']);

    $stmt = $conn->prepare("
        INSERT INTO waterlife_issues
            (volume_issue, issue_title, cover_description, cover_image, pdf_file, issue_year, is_featured, created_by)
        VALUES (?, ?, NULL, NULL, ?, ?, 0, ?)
    ");
    $stmt->execute([$title, $title, $pdfFile, $year, $userId]);

    header("Location: waterlife.php?archived=1");
    exit;
}

/* =====================================================
   HANDLE: DELETE (carousel or archive issue)
===================================================== */
if (isset($_GET['delete'])) {

    if (!$canManage) {
        failBack("You do not have permission to delete issues.");
    }

    $id = (int) $_GET['delete'];

    $stmt = $conn->prepare("SELECT cover_image, pdf_file FROM waterlife_issues WHERE id = ? LIMIT 1");
    $stmt->execute([$id]);
    $existing = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($existing) {
        $del = $conn->prepare("DELETE FROM waterlife_issues WHERE id = ?");
        $del->execute([$id]);

        deleteFileIfExists($uploadDirImages, $existing['cover_image']);
        deleteFileIfExists($uploadDirPdfs, $existing['pdf_file']);
    }

    header("Location: waterlife.php?deleted=1");
    exit;
}

/* =====================================================
   FETCH: CAROUSEL (FEATURED) ISSUES
===================================================== */
$carouselStmt = $conn->prepare("
    SELECT id, volume_issue, issue_title, cover_description, cover_image, pdf_file, issue_year
    FROM waterlife_issues
    WHERE is_featured = 1
    ORDER BY issue_year DESC, created_at DESC
");
$carouselStmt->execute();
$carouselIssues = $carouselStmt->fetchAll(PDO::FETCH_ASSOC);

/* =====================================================
   FETCH: ARCHIVE ISSUES (paginated)
===================================================== */
$limit       = 5;
$archivePage = isset($_GET['a_page']) ? max(1, (int) $_GET['a_page']) : 1;
$archiveOffset = ($archivePage - 1) * $limit;

$totalArchive = (int) $conn->query("SELECT COUNT(*) FROM waterlife_issues WHERE is_featured = 0")->fetchColumn();
$totalArchivePages = (int) ceil($totalArchive / $limit);

$archiveStmt = $conn->prepare("
    SELECT id, volume_issue, issue_title, pdf_file, issue_year
    FROM waterlife_issues
    WHERE is_featured = 0
    ORDER BY issue_year DESC, created_at DESC
    LIMIT $limit OFFSET $archiveOffset
");
$archiveStmt->execute();
$archiveIssues = $archiveStmt->fetchAll(PDO::FETCH_ASSOC);

$wlError = $_SESSION['wl_error'] ?? null;
unset($_SESSION['wl_error']);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Waterlife</title>
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

        <div class="bg-white p-6 mb-8">

            <div class="container mx-auto max-w-4xl py-6">

                <div class="container mx-auto max-w-4xl py-6">
                    <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Upload Issue</h1>

                    <div class="container mx-auto max-w-4xl py-6">

                        <?php if ($canManage): ?>
                        <form id="magazine-issue-form" method="POST" enctype="multipart/form-data"
                            class="bg-white p-6 md:p-10 rounded-xl shadow-2xl border-t-4 border-[#1a589e]">

                            <input type="hidden" name="action" value="upload">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                                <div>
                                    <label for="volume_issue"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Volume & Issue
                                        Number</label>
                                    <input type="text" id="volume_issue" name="volume_issue" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                        placeholder="e.g., Volume 11 Issue 1">
                                </div>

                                <div>
                                    <label for="issue_title"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Issue Title
                                        (Subtitle)</label>
                                    <input type="text" id="issue_title" name="issue_title" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                        placeholder="e.g., Renewing Commitment & Strengthening Service">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                <div class="md:col-span-1">
                                    <label for="issue_year"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Year</label>
                                    <input type="number" id="issue_year" name="issue_year" required min="2000"
                                        max="2100"
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                        placeholder="e.g., 2025" value="<?= date('Y') ?>">
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="cover_description"
                                    class="block text-lg font-semibold text-gray-700 mb-2">About the Cover (Description
                                    Text)</label>
                                <textarea id="cover_description" name="cover_description" rows="5" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150 resize-y"
                                    placeholder="Enter the full description text for the magazine cover..."></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                                <div>
                                    <label for="cover_image"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Cover Image File</label>
                                    <input type="file" id="cover_image" name="cover_image" accept="image/*" required
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5">
                                </div>

                                <div>
                                    <label for="pdf_link" class="block text-lg font-semibold text-gray-700 mb-2">
                                        Upload Issue (PDF)</label>
                                    <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" required
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5">
                                </div>
                            </div>

                            <div class="text-center">
                                <button type="submit"
                                    class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                    Upload Issue
                                </button>
                            </div>

                        </form>
                        <?php else: ?>
                            <p class="text-center text-gray-500">You do not have permission to upload issues.</p>
                        <?php endif; ?>
                    </div>

                </div>

            </div>

            <div class="container mx-auto max-w-4xl py-6">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 border-b-2 border-[#1a589e]">Waterlife</h1>

                <!-- WL Body -->

                <div id="waterlifeCarousel" class="relative w-full mx-auto max-w-7xl mt-12 p-4" data-carousel="static">

                    <!-- Carousel Wrapper -->
                    <div class="relative overflow-hidden rounded-lg  min-h-[800px] sm:min-h-[400px]">

                        <?php if (empty($carouselIssues)): ?>
                            <div class="duration-700 ease-in-out" data-carousel-item="active">
                                <div class="w-full h-full p-6 flex justify-center items-center">
                                    <div class="max-w-3xl h-full bg-white rounded-xl shadow-sm border-t-4 border-[#15467e]
                                                flex flex-col md:flex-row md:items-center w-full p-8 text-center">
                                        <p class="w-full text-gray-500 text-lg">No issues have been uploaded yet.</p>
                                    </div>
                                </div>
                            </div>
                        <?php endif; ?>

                        <?php foreach ($carouselIssues as $index => $issue): ?>
                            <div class="duration-700 ease-in-out"
                                data-carousel-item="<?= $index === 0 ? 'active' : '' ?>">
                                <div class="w-full h-full p-6 flex justify-center items-center">

                                    <div class="max-w-3xl h-full bg-white rounded-xl shadow-sm border-t-4 border-[#15467e] 
                                                flex flex-col md:flex-row md:items-center w-full relative">

                                        <?php if ($canManage): ?>
                                        <div class="absolute top-0 right-0 p-3 z-10">
                                            <button id="dropdownIssueButton-<?= $issue['id'] ?>"
                                                data-dropdown-toggle="issueDropdown-<?= $issue['id'] ?>"
                                                class="p-4 text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-full"
                                                type="button">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25"
                                                    viewBox="0 0 24 24" fill="none" stroke="#1a589e" stroke-width="2"
                                                    stroke-linecap="round" stroke-linejoin="round"
                                                    class="lucide lucide-circle-ellipsis-icon lucide-circle-ellipsis">
                                                    <circle cx="12" cy="12" r="10" />
                                                    <path d="M17 12h.01" />
                                                    <path d="M12 12h.01" />
                                                    <path d="M7 12h.01" />
                                                </svg>
                                            </button>

                                            <div id="issueDropdown-<?= $issue['id'] ?>"
                                                class="z-20 hidden bg-white divide-y divide-gray-100 rounded-lg shadow w-40">
                                                <ul class="py-2 text-sm text-gray-700"
                                                    aria-labelledby="dropdownIssueButton-<?= $issue['id'] ?>">
                                                    <li>
                                                        <a href="#" class="editIssueButton block px-4 py-2 hover:bg-gray-100"
                                                            data-modal-target="editIssueModal" data-modal-toggle="editIssueModal"
                                                            data-id="<?= $issue['id'] ?>"
                                                            data-volume="<?= htmlspecialchars($issue['volume_issue']) ?>"
                                                            data-title="<?= htmlspecialchars($issue['issue_title']) ?>"
                                                            data-description="<?= htmlspecialchars($issue['cover_description']) ?>"
                                                            data-year="<?= htmlspecialchars($issue['issue_year']) ?>">
                                                            Edit Issue
                                                        </a>
                                                    </li>
                                                    <li>
                                                        <a href="waterlife.php?delete=<?= $issue['id'] ?>"
                                                            class="deleteIssueButton block px-4 py-2 text-red-600 hover:bg-red-50">
                                                            Delete Issue
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <?php endif; ?>

                                        <div class="w-full md:w-5/12 p-4 flex justify-center md:block ">
                                            <img class="object-contain w-full rounded-xl bg-[#15467e] max-h-56 md:w-full md:h-auto shadow-lg"
                                                src="../uploads/waterlife/covers/<?= htmlspecialchars($issue['cover_image']) ?>"
                                                alt="<?= htmlspecialchars($issue['volume_issue']) ?>">
                                        </div>
                                        <div
                                            class="w-full md:w-7/12 p-4 md:p-8 max-h-61 overflow-y-auto md:max-h-full md:overflow-y-visible">
                                            <h5 class="mb text-2xl font-bold tracking-tight text-gray-900">
                                                <?= htmlspecialchars($issue['volume_issue']) ?>
                                            </h5>
                                            <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900">
                                                <?= htmlspecialchars($issue['issue_title']) ?>
                                            </h5>
                                            <p class="mb-6 font-normal text-gray-700">
                                                <?= nl2br(htmlspecialchars($issue['cover_description'])) ?>
                                            </p>
                                            <a href="../uploads/waterlife/pdf/<?= htmlspecialchars($issue['pdf_file']) ?>"
                                                target="_blank"
                                                class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-center text-white bg-[#1a589e] rounded-lg
                                hover:bg-[#15467e] focus:ring-4 focus:outline-none focus:ring-blue-300 transition duration-200 shadow-md">
                                                Read Issue
                                                <svg class="w-3.5 h-3.5 ml-2" aria-hidden="true" fill="none"
                                                    viewBox="0 0 14 10" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round"
                                                        d="M1 5h12m0 0L9 1m4 4L9 9" />
                                                </svg>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>

                        <!-- Fixed CTA slide: link to the Archive modal -->
                        <div class="duration-700 ease-in-out" data-carousel-item="">
                            <div class="w-full h-full p-6 flex justify-center items-center">
                                <div class="max-w-3xl h-full bg-white rounded-xl shadow-sm border-t-4 border-[#15467e]
                                            flex flex-col md:flex-row md:items-center w-full">
                                    <div class="w-full md:w-5/12 p-4 flex justify-center md:block ">
                                        <img class="object-contain w-full rounded-xl bg-[#15467e] max-h-56 md:w-full md:h-auto shadow-lg"
                                            src="./img/wl25.png" alt="Waterlife Magazine Archives">
                                    </div>
                                    <div
                                        class="w-full md:w-7/12 p-4 md:p-8 max-h-61 overflow-y-auto md:max-h-full md:overflow-y-visible">
                                        <h5 class="mb text-2xl font-bold tracking-tight text-gray-900">Archives</h5>
                                        <h5 class="mb-2 text-sm font-bold tracking-tight text-gray-900">View all
                                            archives issues
                                        </h5>
                                        <p class="mb-6 font-normal text-gray-700">Looks like you've checked out all this
                                            year's
                                            issues. Keep
                                            reading on our past issues here!
                                        </p>
                                        <button type="button"
                                            class="inline-flex items-center px-4 py-2.5 text-sm font-medium text-center text-white bg-[#1a589e] rounded-lg
                                hover:bg-[#15467e] focus:ring-4 focus:outline-none focus:ring-blue-300 transition duration-200 shadow-md"
                                            data-modal-target="archive-modal" data-modal-toggle="archive-modal">
                                            View Archive
                                            <svg class="w-4 h-4 ml-2" aria-hidden="true" fill="none" viewBox="0 0 14 10"
                                                stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round"
                                                    d="M1 5h12m0 0L9 1m4 4L9 9" />
                                            </svg>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                    <!-- Previous Button -->
                    <button type="button"
                        class="absolute top-0 start-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-prev>

                        <span class="inline-flex items-center justify-center">

                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                fill="none" stroke="#15467e" stroke-width="5" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-left-icon lucide-chevron-left">
                                <path d="m15 18-6-6 6-6" />
                            </svg>

                        </span>
                    </button>

                    <!-- Next Button -->
                    <button type="button"
                        class="absolute top-0 end-0 z-30 flex items-center justify-center h-full px-4 cursor-pointer group focus:outline-none"
                        data-carousel-next>
                        <span class="inline-flex items-center justify-center">

                            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" viewBox="0 0 24 24"
                                fill="none" stroke="#15467e" stroke-width="5" stroke-linecap="round"
                                stroke-linejoin="round" class="lucide lucide-chevron-right-icon lucide-chevron-right">
                                <path d="m9 18 6-6-6-6" />
                            </svg>
                        </span>
                    </button>
                </div>

                <!-- WL ARCHIVE MODAL -->
                <div id="archive-modal" tabindex="-1" aria-hidden="true"
                    class="fixed top-0 left-0 right-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
                    <div class="relative w-full max-w-4xl max-h-full">
                        <div class="relative bg-white rounded-lg shadow-xl">

                            <div
                                class="flex items-start justify-between p-4 border-b rounded-t border-gray-200 bg-[#15467e]">
                                <h3 class="text-xl font-semibold text-white">
                                    Waterlife Magazine Archives (Management View)
                                </h3>
                                <button type="button"
                                    class="text-gray-200 bg-transparent hover:bg-[#0f345a] hover:text-white rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center transition duration-150"
                                    data-modal-hide="archive-modal">
                                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="none" viewBox="0 0 14 14">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                            stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                                    </svg>
                                    <span class="sr-only">Close modal</span>
                                </button>
                            </div>

                            <div class="p-6 space-y-6">
                                <h4 class="text-lg font-bold text-gray-800 mb-4">Archive Issues</h4>

                                <div
                                    class="max-h-[50vh] overflow-y-auto relative shadow-md sm:rounded-lg border border-gray-200">
                                    <div class="relative overflow-x-auto">
                                        <table class="w-full text-sm text-left text-gray-700">
                                            <thead class="text-xs text-gray-700 uppercase bg-gray-50 sticky top-0">
                                                <tr>
                                                    <th scope="col" class="px-6 py-3">
                                                        Issue Title
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center w-28">
                                                        Year
                                                    </th>
                                                    <th scope="col" class="px-6 py-3 text-center w-28">
                                                        Action
                                                    </th>
                                                    <?php if ($canManage): ?>
                                                    <th scope="col" class="px-6 py-3 text-center w-28">
                                                        Manage
                                                    </th>
                                                    <?php endif; ?>
                                                </tr>
                                            </thead>
                                            <tbody id="archive-table-body">
                                                <?php if (empty($archiveIssues)): ?>
                                                    <tr>
                                                        <td colspan="4" class="px-6 py-4 text-center text-gray-500">
                                                            No archived issues yet.
                                                        </td>
                                                    </tr>
                                                <?php endif; ?>

                                                <?php foreach ($archiveIssues as $row): ?>
                                                    <tr class="bg-white border-b hover:bg-blue-50">
                                                        <th scope="row"
                                                            class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap">
                                                            <?= htmlspecialchars($row['issue_title']) ?>
                                                        </th>
                                                        <td class="px-6 py-4 text-center">
                                                            <?= htmlspecialchars($row['issue_year']) ?>
                                                        </td>
                                                        <td class="px-6 py-4 text-center">
                                                            <a href="../uploads/waterlife/pdf/<?= htmlspecialchars($row['pdf_file']) ?>"
                                                                target="_blank"
                                                                class="font-medium text-[#1a589e] hover:underline">View</a>
                                                        </td>
                                                        <?php if ($canManage): ?>
                                                        <td class="px-6 py-4 text-center">
                                                            <button type="button"
                                                                class="deleteIssueButton text-red-500 hover:text-red-700 font-medium text-xs"
                                                                data-id="<?= $row['id'] ?>">Delete</button>
                                                        </td>
                                                        <?php endif; ?>
                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <?php if ($totalArchivePages > 1): ?>
                                    <div class="flex justify-center mt-4 space-x-2">
                                        <?php for ($i = 1; $i <= $totalArchivePages; $i++): ?>
                                            <a href="waterlife.php?a_page=<?= $i ?>#archive-modal"
                                                class="px-3 py-1 border rounded text-sm <?= $i == $archivePage ? 'bg-[#1a589e] text-white' : 'bg-white' ?>">
                                                <?= $i ?>
                                            </a>
                                        <?php endfor; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <?php if ($canManage): ?>
                            <form id="add-issue-form" method="POST" enctype="multipart/form-data"
                                class="p-6 border-t border-gray-200 rounded-b bg-gray-50">
                                <input type="hidden" name="action" value="add_archive">
                                <h4 class="text-lg font-bold text-gray-800 mb-4">Add New Issue</h4>
                                <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">

                                    <div class="md:col-span-2">
                                        <label for="new_title" class="block text-sm font-medium text-gray-700">Issue
                                            Title</label>
                                        <input type="text" id="new_title" name="new_title" required
                                            class="w-full mt-1 p-2 border border-gray-300 rounded-lg text-sm focus:ring-pink-500 focus:border-pink-500"
                                            placeholder="Volume XX Issue X: Title">
                                    </div>

                                    <div>
                                        <label for="new_year"
                                            class="block text-sm font-medium text-gray-700">Year</label>
                                        <input type="number" id="new_year" name="new_year" required min="2000"
                                            max="2100"
                                            class="w-full mt-1 p-2 border border-gray-300 rounded-lg text-sm focus:ring-pink-500 focus:border-pink-500"
                                            placeholder="e.g., 2025">
                                    </div>

                                    <div>
                                        <label for="new_pdf_file" class="block text-sm font-medium text-gray-700">PDF
                                            File Upload</label>
                                        <input type="file" id="new_pdf_file" name="new_pdf_file" accept=".pdf" required
                                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-1.5 focus:ring-pink-500 focus:border-pink-500">
                                    </div>
                                </div>

                                <div class="flex justify-end space-x-3">
                                    <button data-modal-hide="archive-modal" type="button"
                                        class="text-gray-700 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-300 border border-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-150">
                                        Close
                                    </button>
                                    <button type="submit"
                                        class="text-white bg-[#1a589e] hover:bg-[#15467e] focus:ring-4 focus:outline-none focus:ring-[#1a589e]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center transition duration-150">
                                        Add New Issue to Archive
                                    </button>
                                </div>
                            </form>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>


    <!-- Edit Issue Modal -->
    <div id="editIssueModal" tabindex="-1" aria-hidden="true"
        class="fixed top-0 left-0 right-0 z-50 hidden modal-overlay w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-full max-h-full">
        
        <div class="relative w-full max-w-4xl max-h-full my-auto mx-auto">
            <!-- Modal content -->
            <div class="relative bg-white rounded-xl shadow-2xl">
                
                <!-- Modal header -->
                <div class="flex items-start justify-between p-5 border-b rounded-t bg-gray-50 border-gray-200">
                    <h3 class="text-xl font-semibold text-gray-900">
                        Edit Issue
                    </h3>
                    <button type="button" id="closeModalHeaderButton"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ml-auto inline-flex justify-center items-center"
                        data-modal-hide="editIssueModal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>

                <!-- Modal body -->
                <div class="p-6 space-y-6 max-h-[70vh] overflow-y-auto">
                    
                    <form id="edit-magazine-issue-form" method="POST" enctype="multipart/form-data">
                            <input type="hidden" name="action" value="edit">
                            <input type="hidden" name="id" id="edit_id" value="">

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">

                                <div>
                                    <label for="edit_volume_issue"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Volume & Issue
                                        Number</label>
                                    <input type="text" id="edit_volume_issue" name="volume_issue" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                        placeholder="e.g., Volume 11 Issue 1">
                                </div>

                                <div>
                                    <label for="edit_issue_title"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Issue Title
                                        (Subtitle)</label>
                                    <input type="text" id="edit_issue_title" name="issue_title" required
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                        placeholder="e.g., Renewing Commitment & Strengthening Service">
                                </div>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-6">
                                <div class="md:col-span-1">
                                    <label for="edit_issue_year"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Year</label>
                                    <input type="number" id="edit_issue_year" name="issue_year" required min="2000"
                                        max="2100"
                                        class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150">
                                </div>
                            </div>

                            <div class="mb-6">
                                <label for="edit_cover_description"
                                    class="block text-lg font-semibold text-gray-700 mb-2">About the Cover (Description
                                    Text)</label>
                                <textarea id="edit_cover_description" name="cover_description" rows="5" required
                                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150 resize-y"></textarea>
                            </div>

                            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-8">

                                <div>
                                    <label for="edit_cover_image"
                                        class="block text-lg font-semibold text-gray-700 mb-2">Cover Image File
                                        <span class="text-xs font-normal text-gray-500">(leave blank to keep current)</span></label>
                                    <input type="file" id="edit_cover_image" name="cover_image" accept="image/*"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5">
                                </div>

                                <div>
                                    <label for="edit_pdf_file" class="block text-lg font-semibold text-gray-700 mb-2">
                                        Upload Issue (PDF)
                                        <span class="text-xs font-normal text-gray-500">(leave blank to keep current)</span></label>
                                    <input type="file" id="edit_pdf_file" name="pdf_file" accept="application/pdf"
                                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5">
                                </div>
                            </div>

                        </form>

                </div>

                <!-- Modal footer -->
                <div class="flex items-center p-6 space-x-3 border-t border-gray-200 rounded-b">
                    <button type="submit" form="edit-magazine-issue-form"
                        class="px-5 py-2.5 bg-[#1a589e] text-white font-bold rounded-lg shadow-lg hover:bg-blue-700 focus:outline-none focus:ring-4 focus:ring-blue-300 transition duration-300 ease-in-out">
                        Save Changes
                    </button>
                    <button id="cancelModalButton" data-modal-hide="editIssueModal" type="button"
                        class="px-5 py-2.5 text-sm font-medium text-gray-700 bg-white border border-gray-200 rounded-full hover:bg-gray-100 hover:text-gray-900 focus:z-10 focus:ring-4 focus:ring-gray-200 transition duration-300 ease-in-out">
                        Cancel
                    </button>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="../js/sidenav.js"></script>
    <script src="../js/db_wl.js"></script>

    <script>
        // Populate the Edit modal with the clicked issue's data
        document.addEventListener('click', function (e) {
            const trigger = e.target.closest('.editIssueButton');
            if (!trigger) return;

            document.getElementById('edit_id').value = trigger.dataset.id || '';
            document.getElementById('edit_volume_issue').value = trigger.dataset.volume || '';
            document.getElementById('edit_issue_title').value = trigger.dataset.title || '';
            document.getElementById('edit_cover_description').value = trigger.dataset.description || '';
            document.getElementById('edit_issue_year').value = trigger.dataset.year || '';
        });

        // Confirm before deleting (carousel dropdown links + archive table buttons)
        document.addEventListener('click', function (e) {
            const del = e.target.closest('.deleteIssueButton');
            if (!del) return;

            e.preventDefault();
            const href = del.tagName === 'A' ? del.getAttribute('href') : ('waterlife.php?delete=' + del.dataset.id);

            Swal.fire({
                title: 'Are you sure?',
                text: 'This issue will be permanently deleted.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = href;
                }
            });
        });

        <?php if (isset($_GET['added'])): ?>
            Swal.fire({ icon: 'success', title: 'Issue Uploaded!', timer: 1500, showConfirmButton: false });
        <?php endif; ?>

        <?php if (isset($_GET['updated'])): ?>
            Swal.fire({ icon: 'success', title: 'Issue Updated!', timer: 1500, showConfirmButton: false });
        <?php endif; ?>

        <?php if (isset($_GET['archived'])): ?>
            Swal.fire({ icon: 'success', title: 'Issue Added to Archive!', timer: 1500, showConfirmButton: false });
        <?php endif; ?>

        <?php if (isset($_GET['deleted'])): ?>
            Swal.fire({ icon: 'success', title: 'Issue Deleted!', timer: 1500, showConfirmButton: false });
        <?php endif; ?>

        <?php if ($wlError): ?>
            Swal.fire({ icon: 'error', title: 'Something went wrong', text: <?= json_encode($wlError) ?> });
        <?php endif; ?>
    </script>

</body>

</html>