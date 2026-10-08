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

const GAD_MANAGER_ROLES = ['superadmin', 'gad']; // roles allowed to create/edit/delete

function gad_requireManagerRole(array $userInfo): void
{
    if (!in_array($userInfo['role'], GAD_MANAGER_ROLES, true)) {
        http_response_code(403);
        echo json_encode(['success' => false, 'message' => 'You do not have permission to do this.']);
        exit;
    }
}

function gad_memoUploadDir(): string
{
    $dir = __DIR__ . '/../uploads/gad/memos/';
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    return $dir;
}

function gad_eventImagesDir(): string
{
    $dir = __DIR__ . '/../uploads/gad/events/';
    if (!is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
    return $dir;
}

function gad_validatePdf(array $file): ?string
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

function gad_validateImage(array $file): ?string
{
    $maxSizeBytes = 8 * 1024 * 1024; // 8 MB per photo
    if ($file['size'] > $maxSizeBytes) {
        return 'One of the photos is too large (max 8MB each).';
    }

    $allowedMimes = ['image/jpeg', 'image/png', 'image/webp'];
    $finfo = finfo_open(FILEINFO_MIME_TYPE);
    $mime = finfo_file($finfo, $file['tmp_name']);
    finfo_close($finfo);

    if (!in_array($mime, $allowedMimes, true)) {
        return 'Only JPG, PNG, or WEBP photos are allowed.';
    }

    return null; // valid
}

/**
 * Normalizes the $_FILES['event_images'] superglobal (which PHP gives
 * back as parallel arrays for a multi-file input) into a flat list of
 * per-file arrays, e.g. [['name'=>..,'type'=>..,'tmp_name'=>..,'error'=>..,'size'=>..], ...]
 */
function gad_normalizeMultiFiles(array $filesField): array
{
    $count = count($filesField['name']);
    $files = [];
    for ($i = 0; $i < $count; $i++) {
        if ($filesField['error'][$i] !== UPLOAD_ERR_OK) {
            continue;
        }
        $files[] = [
            'name' => $filesField['name'][$i],
            'type' => $filesField['type'][$i],
            'tmp_name' => $filesField['tmp_name'][$i],
            'error' => $filesField['error'][$i],
            'size' => $filesField['size'][$i],
        ];
    }
    return $files;
}

/**
 * Saves an array of uploaded image files to disk and returns their
 * relative paths in the same order. Throws a RuntimeException (with a
 * user-facing message) on the first validation or filesystem failure;
 * any files already saved in this batch are cleaned up before rethrow.
 */
function gad_saveEventImages(array $files): array
{
    $dir = gad_eventImagesDir();
    $saved = [];

    foreach ($files as $file) {
        if ($err = gad_validateImage($file)) {
            foreach ($saved as $path) {
                @unlink(__DIR__ . '/../' . $path);
            }
            throw new RuntimeException($err);
        }

        $ext = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $storedName = bin2hex(random_bytes(16)) . '.' . $ext;
        $destPath = $dir . $storedName;

        if (!move_uploaded_file($file['tmp_name'], $destPath)) {
            foreach ($saved as $path) {
                @unlink(__DIR__ . '/../' . $path);
            }
            throw new RuntimeException('Failed to save one of the uploaded photos.');
        }

        $saved[] = 'uploads/gad/events/' . $storedName;
    }

    return $saved;
}

$action = $_GET['action'] ?? $_POST['action'] ?? null;

if ($action !== null) {
    // Discard anything that leaked into the buffer before this point
    // (e.g. notices/warnings from db.php or getLoggedInUser) so it
    // can't corrupt the JSON response below.
    if (ob_get_level() > 0) {
        ob_clean();
    }
    ini_set('display_errors', '0');
    error_reporting(E_ALL);

    header('Content-Type: application/json');

    switch ($action) {

        /* =====================================================
           MEMOS
        ===================================================== */

        case 'memo_list': {
            if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
                http_response_code(405);
                echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
                exit;
            }

            try {
                $stmt = $conn->prepare(
                    "SELECT gm.id, gm.memo_title, gm.file_name, gm.file_path, gm.file_size, gm.created_at,
                            u.firstname, u.lastname
                     FROM gad_memos gm
                     LEFT JOIN users u ON u.id = gm.created_by
                     WHERE gm.is_deleted = 0
                     ORDER BY gm.created_at DESC, gm.id DESC"
                );
                $stmt->execute();
                echo json_encode(['success' => true, 'data' => $stmt->fetchAll(PDO::FETCH_ASSOC)]);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Database error while fetching memos.']);
            }
            exit;
        }

        case 'memo_upload': {
            gad_requireManagerRole($userInfo);

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405);
                echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
                exit;
            }

            $title = trim($_POST['memo_title'] ?? '');
            if ($title === '') {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Memo title is required.']);
                exit;
            }

            if (!isset($_FILES['pdf_file']) || $_FILES['pdf_file']['error'] !== UPLOAD_ERR_OK) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'A PDF file is required.']);
                exit;
            }

            $file = $_FILES['pdf_file'];
            if ($err = gad_validatePdf($file)) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => $err]);
                exit;
            }

            $uploadDir = gad_memoUploadDir();
            $storedName = bin2hex(random_bytes(16)) . '.pdf';
            $destPath = $uploadDir . $storedName;

            if (!move_uploaded_file($file['tmp_name'], $destPath)) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Failed to save uploaded file.']);
                exit;
            }

            $relativePath = 'uploads/gad/memos/' . $storedName;

            try {
                $stmt = $conn->prepare(
                    "INSERT INTO gad_memos (memo_title, file_name, file_path, file_type, file_size, created_by)
                     VALUES (?, ?, ?, ?, ?, ?)"
                );
                $stmt->execute([
                    $title, $file['name'], $relativePath, 'pdf', (int) $file['size'],
                    (int) $userInfo['id'],
                ]);

                echo json_encode([
                    'success' => true,
                    'message' => 'GAD memo published successfully.',
                    'id' => (int) $conn->lastInsertId(),
                ]);
            } catch (PDOException $e) {
                if (file_exists($destPath)) {
                    unlink($destPath);
                }
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Database error while saving the memo.']);
            }
            exit;
        }

        case 'memo_update': {
            gad_requireManagerRole($userInfo);

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405);
                echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
                exit;
            }

            $id = (int) ($_POST['id'] ?? 0);
            $title = trim($_POST['memo_title'] ?? '');

            if ($id <= 0 || $title === '') {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'id and memo_title are required.']);
                exit;
            }

            $stmt = $conn->prepare("SELECT * FROM gad_memos WHERE id = ? AND is_deleted = 0 LIMIT 1");
            $stmt->execute([$id]);
            $existing = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$existing) {
                http_response_code(404);
                echo json_encode(['success' => false, 'message' => 'Memo not found.']);
                exit;
            }

            $newPath = $existing['file_path'];
            $newFileName = $existing['file_name'];
            $newFileSize = $existing['file_size'];
            $oldFileToDelete = null;

            if (isset($_FILES['pdf_file']) && $_FILES['pdf_file']['error'] === UPLOAD_ERR_OK) {
                $file = $_FILES['pdf_file'];
                if ($err = gad_validatePdf($file)) {
                    http_response_code(422);
                    echo json_encode(['success' => false, 'message' => $err]);
                    exit;
                }

                $uploadDir = gad_memoUploadDir();
                $storedName = bin2hex(random_bytes(16)) . '.pdf';
                $destPath = $uploadDir . $storedName;

                if (!move_uploaded_file($file['tmp_name'], $destPath)) {
                    http_response_code(500);
                    echo json_encode(['success' => false, 'message' => 'Failed to save uploaded file.']);
                    exit;
                }

                $oldFileToDelete = __DIR__ . '/../' . $existing['file_path'];
                $newPath = 'uploads/gad/memos/' . $storedName;
                $newFileName = $file['name'];
                $newFileSize = (int) $file['size'];
            }

            try {
                $stmt = $conn->prepare(
                    "UPDATE gad_memos
                     SET memo_title = ?, file_name = ?, file_path = ?, file_size = ?
                     WHERE id = ?"
                );
                $stmt->execute([$title, $newFileName, $newPath, $newFileSize, $id]);

                if ($oldFileToDelete && file_exists($oldFileToDelete)) {
                    unlink($oldFileToDelete);
                }

                echo json_encode(['success' => true, 'message' => 'GAD memo updated successfully.']);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Database error while updating the memo.']);
            }
            exit;
        }

        case 'memo_delete': {
            gad_requireManagerRole($userInfo);

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

            $stmt = $conn->prepare("SELECT id FROM gad_memos WHERE id = ? AND is_deleted = 0 LIMIT 1");
            $stmt->execute([$id]);
            $existing = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$existing) {
                http_response_code(404);
                echo json_encode(['success' => false, 'message' => 'Memo not found.']);
                exit;
            }

            try {
                // Soft delete; the underlying PDF is left on disk.
                $stmt = $conn->prepare("UPDATE gad_memos SET is_deleted = 1 WHERE id = ?");
                $stmt->execute([$id]);

                echo json_encode(['success' => true, 'message' => 'GAD memo deleted successfully.']);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Database error while deleting the memo.']);
            }
            exit;
        }

        /* =====================================================
           EVENTS (Annual GAD Reports / photo-article posts)
        ===================================================== */

        case 'event_list': {
            if ($_SERVER['REQUEST_METHOD'] !== 'GET') {
                http_response_code(405);
                echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
                exit;
            }

            try {
                $stmt = $conn->prepare(
                    "SELECT ge.id, ge.event_title, ge.date_published, ge.excerpt, ge.article_body,
                            ge.cover_image, ge.created_at, u.firstname, u.lastname
                     FROM gad_events ge
                     LEFT JOIN users u ON u.id = ge.created_by
                     WHERE ge.is_deleted = 0
                     ORDER BY ge.date_published DESC, ge.id DESC"
                );
                $stmt->execute();
                $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

                if (!empty($events)) {
                    $ids = array_column($events, 'id');
                    $placeholders = implode(',', array_fill(0, count($ids), '?'));
                    $imgStmt = $conn->prepare(
                        "SELECT id, event_id, image_path, caption
                         FROM gad_event_images
                         WHERE event_id IN ($placeholders)
                         ORDER BY event_id, sort_order ASC, id ASC"
                    );
                    $imgStmt->execute($ids);
                    $imagesByEvent = [];
                    foreach ($imgStmt->fetchAll(PDO::FETCH_ASSOC) as $img) {
                        $imagesByEvent[$img['event_id']][] = $img;
                    }
                    foreach ($events as &$ev) {
                        $ev['images'] = $imagesByEvent[$ev['id']] ?? [];
                    }
                    unset($ev);
                }

                echo json_encode(['success' => true, 'data' => $events]);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Database error while fetching events.']);
            }
            exit;
        }

        case 'event_upload': {
            gad_requireManagerRole($userInfo);

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405);
                echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
                exit;
            }

            $title = trim($_POST['event_title'] ?? '');
            $datePublished = trim($_POST['date_published'] ?? '');
            $articleBody = trim($_POST['article_body'] ?? '');
            $excerpt = trim($_POST['excerpt'] ?? '');

            if ($title === '' || $datePublished === '' || $articleBody === '') {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Event title, date published, and article body are required.']);
                exit;
            }

            $d = DateTime::createFromFormat('Y-m-d', $datePublished);
            if (!$d || $d->format('Y-m-d') !== $datePublished) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Invalid date_published format, expected YYYY-MM-DD.']);
                exit;
            }

            if (!isset($_FILES['event_images']) || empty($_FILES['event_images']['name'][0])) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'At least one photo is required.']);
                exit;
            }

            $files = gad_normalizeMultiFiles($_FILES['event_images']);
            if (empty($files)) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'At least one valid photo is required.']);
                exit;
            }

            try {
                $savedPaths = gad_saveEventImages($files);
            } catch (RuntimeException $e) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => $e->getMessage()]);
                exit;
            }

            if ($excerpt === '') {
                $excerpt = mb_strimwidth($articleBody, 0, 180, '...');
            }

            try {
                $conn->beginTransaction();

                $stmt = $conn->prepare(
                    "INSERT INTO gad_events (event_title, date_published, excerpt, article_body, cover_image, created_by)
                     VALUES (?, ?, ?, ?, ?, ?)"
                );
                $stmt->execute([$title, $datePublished, $excerpt, $articleBody, $savedPaths[0], (int) $userInfo['id']]);
                $eventId = (int) $conn->lastInsertId();

                $imgStmt = $conn->prepare(
                    "INSERT INTO gad_event_images (event_id, image_path, sort_order) VALUES (?, ?, ?)"
                );
                foreach ($savedPaths as $index => $path) {
                    $imgStmt->execute([$eventId, $path, $index]);
                }

                $conn->commit();

                echo json_encode([
                    'success' => true,
                    'message' => 'GAD event published successfully.',
                    'id' => $eventId,
                ]);
            } catch (PDOException $e) {
                $conn->rollBack();
                foreach ($savedPaths as $path) {
                    @unlink(__DIR__ . '/../' . $path);
                }
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Database error while saving the event.']);
            }
            exit;
        }

        case 'event_update': {
            gad_requireManagerRole($userInfo);

            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                http_response_code(405);
                echo json_encode(['success' => false, 'message' => 'Method not allowed.']);
                exit;
            }

            $id = (int) ($_POST['id'] ?? 0);
            $title = trim($_POST['event_title'] ?? '');
            $datePublished = trim($_POST['date_published'] ?? '');
            $articleBody = trim($_POST['article_body'] ?? '');
            $excerpt = trim($_POST['excerpt'] ?? '');

            if ($id <= 0 || $title === '' || $datePublished === '' || $articleBody === '') {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'id, event_title, date_published, and article_body are required.']);
                exit;
            }

            $d = DateTime::createFromFormat('Y-m-d', $datePublished);
            if (!$d || $d->format('Y-m-d') !== $datePublished) {
                http_response_code(422);
                echo json_encode(['success' => false, 'message' => 'Invalid date_published format, expected YYYY-MM-DD.']);
                exit;
            }

            $stmt = $conn->prepare("SELECT * FROM gad_events WHERE id = ? AND is_deleted = 0 LIMIT 1");
            $stmt->execute([$id]);
            $existing = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$existing) {
                http_response_code(404);
                echo json_encode(['success' => false, 'message' => 'Event not found.']);
                exit;
            }

            if ($excerpt === '') {
                $excerpt = mb_strimwidth($articleBody, 0, 180, '...');
            }

            // Photos are only replaced if new ones were provided; otherwise
            // the existing gallery is left untouched.
            $replaceImages = isset($_FILES['event_images']) && !empty($_FILES['event_images']['name'][0]);
            $newSavedPaths = [];

            if ($replaceImages) {
                $files = gad_normalizeMultiFiles($_FILES['event_images']);
                if (empty($files)) {
                    http_response_code(422);
                    echo json_encode(['success' => false, 'message' => 'At least one valid photo is required.']);
                    exit;
                }
                try {
                    $newSavedPaths = gad_saveEventImages($files);
                } catch (RuntimeException $e) {
                    http_response_code(422);
                    echo json_encode(['success' => false, 'message' => $e->getMessage()]);
                    exit;
                }
            }

            $coverImage = $replaceImages ? $newSavedPaths[0] : $existing['cover_image'];
            $oldImagePaths = [];

            try {
                $conn->beginTransaction();

                $stmt = $conn->prepare(
                    "UPDATE gad_events
                     SET event_title = ?, date_published = ?, excerpt = ?, article_body = ?, cover_image = ?
                     WHERE id = ?"
                );
                $stmt->execute([$title, $datePublished, $excerpt, $articleBody, $coverImage, $id]);

                if ($replaceImages) {
                    $oldStmt = $conn->prepare("SELECT image_path FROM gad_event_images WHERE event_id = ?");
                    $oldStmt->execute([$id]);
                    $oldImagePaths = array_column($oldStmt->fetchAll(PDO::FETCH_ASSOC), 'image_path');

                    $delStmt = $conn->prepare("DELETE FROM gad_event_images WHERE event_id = ?");
                    $delStmt->execute([$id]);

                    $imgStmt = $conn->prepare(
                        "INSERT INTO gad_event_images (event_id, image_path, sort_order) VALUES (?, ?, ?)"
                    );
                    foreach ($newSavedPaths as $index => $path) {
                        $imgStmt->execute([$id, $path, $index]);
                    }
                }

                $conn->commit();

                foreach ($oldImagePaths as $path) {
                    @unlink(__DIR__ . '/../' . $path);
                }

                echo json_encode(['success' => true, 'message' => 'GAD event updated successfully.']);
            } catch (PDOException $e) {
                $conn->rollBack();
                foreach ($newSavedPaths as $path) {
                    @unlink(__DIR__ . '/../' . $path);
                }
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Database error while updating the event.']);
            }
            exit;
        }

        case 'event_delete': {
            gad_requireManagerRole($userInfo);

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

            $stmt = $conn->prepare("SELECT id FROM gad_events WHERE id = ? AND is_deleted = 0 LIMIT 1");
            $stmt->execute([$id]);
            $existing = $stmt->fetch(PDO::FETCH_ASSOC);

            if (!$existing) {
                http_response_code(404);
                echo json_encode(['success' => false, 'message' => 'Event not found.']);
                exit;
            }

            try {
                // Soft delete; photos are left on disk (matching the
                // module's soft-delete convention used elsewhere).
                $stmt = $conn->prepare("UPDATE gad_events SET is_deleted = 1 WHERE id = ?");
                $stmt->execute([$id]);

                echo json_encode(['success' => true, 'message' => 'GAD event deleted successfully.']);
            } catch (PDOException $e) {
                http_response_code(500);
                echo json_encode(['success' => false, 'message' => 'Database error while deleting the event.']);
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
   Below this point: normal page render
===================================================== */
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>GAD</title>
    <link rel="icon" type="image/svg+xml" href="../img/CWDIcon.png">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/db_bg.css">
    <link rel="stylesheet" href="../css/gad.css">

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

            <div id="message-box" class="hidden fixed top-4 right-4 w-full max-w-sm z-50"></div>

            <!-- ==================== UPLOAD: MEMO ==================== -->
            <div class="container mx-auto max-w-4xl py-6">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Upload GAD Memo</h1>

                <div class="bg-white block max-w-5xl p-6 rounded-lg border-t-4 shadow-xl border-pink-500 mx-auto my-6">
                    <form id="gadmemo-upload-form" class="bg-white">

                        <div class="mb-6">
                            <label for="memo_title" class="block text-lg font-semibold text-gray-700 mb-2">Memo
                                Title</label>
                            <input type="text" id="memo_title" name="memo_title" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                placeholder="GAD Memo 2026-01">
                        </div>

                        <div>
                            <label for="pdf_file" class="block text-lg font-semibold text-gray-700 mb-2">
                                Upload Document</label>
                            <input type="file" id="pdf_file" name="pdf_file" accept="application/pdf" required
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 mb-4">
                        </div>

                        <div class="text-center">
                            <button type="submit"
                                class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                Publish Memo
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================== LIST: MEMOS ==================== -->
            <div class="container mx-auto max-w-4xl pb-6">
                <h2 class="text-xl font-bold text-gray-800 mb-4">Existing GAD Memos</h2>
                <div id="memo-list-container" class="bg-white rounded-xl shadow-lg border border-gray-200 divide-y divide-gray-100 overflow-hidden">
                    <div class="text-center text-gray-500 py-10">Loading memos...</div>
                </div>
            </div>

            <br>

            <!-- ==================== UPLOAD: EVENT ==================== -->
            <div class="container mx-auto max-w-4xl py-6">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-8 text-center">Upload GAD Event</h1>

                <div class="bg-white block max-w-5xl p-6 rounded-lg border-t-4 shadow-xl border-pink-500 mx-auto my-6">
                    <form id="gad-event-upload-form" class="bg-white">

                        <div class="mb-6">
                            <label for="event_title" class="block text-lg font-semibold text-gray-700 mb-2">Event
                                Title</label>
                            <input type="text" id="event_title" name="event_title" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                placeholder="2026 GAD Event Kick Off">
                        </div>

                        <div class="mb-6">
                            <label for="date_published" class="block text-lg font-semibold text-gray-700 mb-2">Date
                                Published</label>
                            <input type="date" id="date_published" name="date_published" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150">
                        </div>

                        <div class="mb-6">
                            <label for="excerpt" class="block text-lg font-semibold text-gray-700 mb-2">Short
                                Description <span class="text-sm font-normal text-gray-400">(optional, shown on the card)</span></label>
                            <input type="text" id="excerpt" name="excerpt" maxlength="200"
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150"
                                placeholder="Theme: ...">
                        </div>

                        <div class="mb-6">
                            <label for="article_body" class="block text-lg font-semibold text-gray-700 mb-2">Article
                                Body (Content)</label>
                            <textarea id="article_body" name="article_body" rows="10" required
                                class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150 resize-y"
                                placeholder="Start writing your event content here..."></textarea>
                        </div>

                        <div>
                            <label for="event_images" class="block text-lg font-semibold text-gray-700">
                                Upload Event Photos
                            </label>
                            <input type="file" id="event_images" name="event_images[]" accept="image/*" multiple required
                                class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 mb-4
                                       file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
                                       file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                            <p class="text-xs text-gray-500 mt-1">The first photo becomes the card thumbnail. You can
                                select multiple photos (JPG, PNG, WEBP).</p>
                        </div>

                        <div class="text-center mt-4">
                            <button type="submit"
                                class="w-full md:w-auto px-8 py-3 bg-[#1a589e] text-white font-bold text-lg rounded-full shadow-lg hover:bg-pink-600 focus:outline-none focus:ring-4 focus:ring-[#1a589e]/50 transition duration-300 ease-in-out">
                                Publish Event
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- ==================== LIST: EVENTS ==================== -->
            <div class="container mx-auto max-w-7xl py-6">
                <h1 class="text-3xl font-extrabold text-gray-900 mb-6 border-b-2 border-pink-500 pb-2">
                    Annual GAD Reports & Accomplishments</h1>

                <nav id="event-year-tabs" class="flex flex-wrap gap-2 mb-6"></nav>

                <div id="event-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="col-span-full text-center text-gray-500 py-10">Loading events...</div>
                </div>
            </div>

        </div>
    </div>

    <!-- Edit Gad Memo Modal -->
    <div id="editGadMemoModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-75 hidden items-center justify-center p-4 z-50 transition-opacity duration-300">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all sm:my-8 sm:align-middle">
            <div class="bg-white px-6 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-xl leading-6 font-bold text-gray-900 mb-4">Edit GAD Memo</h3>
                <form id="gadmemo-edit-form" class="bg-white">
                    <input type="hidden" id="edit_memo_id" name="id">

                    <div class="mb-6">
                        <label for="edit_memo_title" class="block text-lg font-semibold text-gray-700 mb-2">Memo
                            Title</label>
                        <input type="text" id="edit_memo_title" name="memo_title" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150">
                    </div>

                    <div>
                        <label for="edit_memo_pdf_file" class="block text-lg font-semibold text-gray-700 mb-2">
                            Replace Document <span class="text-sm font-normal text-gray-400">(optional)</span></label>
                        <input type="file" id="edit_memo_pdf_file" name="pdf_file" accept="application/pdf"
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 mb-4">
                    </div>
                </form>
            </div>
            <div class="bg-gray-50 px-6 py-3 flex justify-end gap-3 rounded-b-xl">
                <button type="button" class="js-close-modal" data-modal="editGadMemoModal"
                    class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                    Cancel
                </button>
                <button type="button" id="save-memo-edit-btn"
                    class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#1a589e] text-base font-medium text-white hover:bg-[#15467e] focus:outline-none focus:ring-4 focus:ring-[#5b8ec5] sm:w-auto sm:text-sm">
                    Save Changes
                </button>
            </div>
        </div>
    </div>

    <!-- Edit Gad Event Modal -->
    <div id="editGadEventModal"
        class="fixed inset-0 bg-gray-600 bg-opacity-75 hidden items-center justify-center p-4 z-50 transition-opacity duration-300">
        <div class="bg-white rounded-xl shadow-2xl w-full max-w-lg overflow-hidden transform transition-all sm:my-8 sm:align-middle max-h-[90vh] overflow-y-auto">
            <div class="bg-white px-6 pt-5 pb-4 sm:p-6 sm:pb-4">
                <h3 class="text-xl leading-6 font-bold text-gray-900 mb-4">Edit GAD Event</h3>
                <form id="gad-event-edit-form" class="bg-white">
                    <input type="hidden" id="edit_event_id" name="id">

                    <div class="mb-6">
                        <label for="edit_event_title" class="block text-lg font-semibold text-gray-700 mb-2">Event
                            Title</label>
                        <input type="text" id="edit_event_title" name="event_title" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150">
                    </div>

                    <div class="mb-6">
                        <label for="edit_date_published" class="block text-lg font-semibold text-gray-700 mb-2">Date
                            Published</label>
                        <input type="date" id="edit_date_published" name="date_published" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150">
                    </div>

                    <div class="mb-6">
                        <label for="edit_excerpt" class="block text-lg font-semibold text-gray-700 mb-2">Short
                            Description</label>
                        <input type="text" id="edit_excerpt" name="excerpt" maxlength="200"
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150">
                    </div>

                    <div class="mb-6">
                        <label for="edit_article_body" class="block text-lg font-semibold text-gray-700 mb-2">Article
                            Body (Content)</label>
                        <textarea id="edit_article_body" name="article_body" rows="8" required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-pink-500 focus:border-pink-500 transition duration-150 resize-y"></textarea>
                    </div>

                    <div>
                        <label for="edit_event_images" class="block text-lg font-semibold text-gray-700">
                            Replace Photos <span class="text-sm font-normal text-gray-400">(optional — leave empty to keep current photos)</span>
                        </label>
                        <input type="file" id="edit_event_images" name="event_images[]" accept="image/*" multiple
                            class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 p-2.5 mb-4
                                   file:mr-4 file:py-1 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold
                                   file:bg-blue-50 file:text-blue-700 hover:file:bg-blue-100 transition-all">
                        <p class="text-xs text-gray-500 mt-1">Uploading new photos here replaces the entire gallery for this event.</p>
                    </div>
                </form>
            </div>
            <div class="bg-gray-50 px-6 py-3 flex justify-end gap-3 rounded-b-xl">
                <button type="button" class="js-close-modal" data-modal="editGadEventModal"
                    class="inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none sm:mt-0 sm:w-auto sm:text-sm">
                    Cancel
                </button>
                <button type="button" id="save-event-edit-btn"
                    class="inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-[#1a589e] text-base font-medium text-white hover:bg-[#15467e] focus:outline-none focus:ring-4 focus:ring-[#5b8ec5] sm:w-auto sm:text-sm">
                    Save Changes
                </button>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="../js/sidenav.js"></script>

    <script>
    // ===== Inline GAD module frontend logic =====
    // All AJAX calls hit THIS SAME gad.php file with ?action=...
    document.addEventListener('DOMContentLoaded', () => {
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
            const d = new Date(dateStr + 'T00:00:00');
            return d.toLocaleDateString('en-US', { year: 'numeric', month: 'long', day: 'numeric' });
        }

        function escapeHtml(str) {
            const div = document.createElement('div');
            div.textContent = str ?? '';
            return div.innerHTML;
        }

        async function parseJsonResponse(res) {
            const raw = await res.text();
            try {
                return JSON.parse(raw);
            } catch (err) {
                console.error('Expected JSON but got:', raw);
                throw new Error(`Server returned an unexpected response (HTTP ${res.status}). Check the console.`);
            }
        }

        function openModal(id) {
            const modal = document.getElementById(id);
            modal.classList.remove('hidden');
            modal.classList.add('flex');
        }

        function closeModal(id) {
            const modal = document.getElementById(id);
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }

        document.querySelectorAll('.js-close-modal').forEach(btn => {
            btn.addEventListener('click', () => closeModal(btn.dataset.modal));
        });

        /* =====================================================
           MEMOS
        ===================================================== */
        const memoUploadForm = document.getElementById('gadmemo-upload-form');
        const memoListContainer = document.getElementById('memo-list-container');
        const memoEditForm = document.getElementById('gadmemo-edit-form');

        async function loadMemos() {
            memoListContainer.innerHTML = '<div class="text-center text-gray-500 py-10">Loading memos...</div>';
            try {
                const res = await fetch('gad.php?action=memo_list');
                const result = await parseJsonResponse(res);

                if (!result.success) {
                    memoListContainer.innerHTML = `<div class="text-center text-red-500 py-10">${escapeHtml(result.message)}</div>`;
                    return;
                }
                if (result.data.length === 0) {
                    memoListContainer.innerHTML = '<div class="text-center text-gray-500 py-10">No GAD memos uploaded yet.</div>';
                    return;
                }

                memoListContainer.innerHTML = result.data.map(memo => `
                    <div class="p-4 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                        <div>
                            <p class="font-semibold text-gray-800">${escapeHtml(memo.memo_title)}</p>
                            <a href="../${memo.file_path}" target="_blank" rel="noopener"
                               class="text-xs text-pink-600 hover:underline">
                               <i class="fa-solid fa-file-pdf mr-1"></i>${escapeHtml(memo.file_name)}
                            </a>
                        </div>
                        <div class="flex gap-4 text-sm">
                            <button class="text-[#1a589e] hover:underline js-edit-memo"
                                    data-id="${memo.id}" data-title="${escapeHtml(memo.memo_title)}">Edit</button>
                            <button class="text-red-600 hover:underline js-delete-memo" data-id="${memo.id}">Delete</button>
                        </div>
                    </div>
                `).join('');

                attachMemoRowHandlers();
            } catch (err) {
                console.error(err);
                memoListContainer.innerHTML = `<div class="text-center text-red-500 py-10">${escapeHtml(err.message)}</div>`;
            }
        }

        function attachMemoRowHandlers() {
            document.querySelectorAll('.js-edit-memo').forEach(btn => {
                btn.addEventListener('click', () => {
                    document.getElementById('edit_memo_id').value = btn.dataset.id;
                    document.getElementById('edit_memo_title').value = btn.dataset.title;
                    document.getElementById('edit_memo_pdf_file').value = '';
                    openModal('editGadMemoModal');
                });
            });

            document.querySelectorAll('.js-delete-memo').forEach(btn => {
                btn.addEventListener('click', async () => {
                    if (!confirm('Delete this GAD memo? This cannot be undone.')) return;
                    try {
                        const res = await fetch('gad.php?action=memo_delete', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ id: btn.dataset.id }),
                        });
                        const result = await parseJsonResponse(res);
                        showMessage(result.message, !result.success);
                        if (result.success) loadMemos();
                    } catch (err) {
                        console.error(err);
                        showMessage(err.message || 'Failed to delete memo.', true);
                    }
                });
            });
        }

        memoUploadForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(memoUploadForm);
            try {
                const res = await fetch('gad.php?action=memo_upload', { method: 'POST', body: formData });
                const result = await parseJsonResponse(res);
                showMessage(result.message, !result.success);
                if (result.success) {
                    memoUploadForm.reset();
                    loadMemos();
                }
            } catch (err) {
                console.error(err);
                showMessage(err.message || 'Failed to publish memo.', true);
            }
        });

        document.getElementById('save-memo-edit-btn').addEventListener('click', async () => {
            const formData = new FormData(memoEditForm);
            try {
                const res = await fetch('gad.php?action=memo_update', { method: 'POST', body: formData });
                const result = await parseJsonResponse(res);
                showMessage(result.message, !result.success);
                if (result.success) {
                    closeModal('editGadMemoModal');
                    loadMemos();
                }
            } catch (err) {
                console.error(err);
                showMessage(err.message || 'Failed to update memo.', true);
            }
        });

        /* =====================================================
           EVENTS
        ===================================================== */
        const eventUploadForm = document.getElementById('gad-event-upload-form');
        const eventEditForm = document.getElementById('gad-event-edit-form');
        const yearTabsEl = document.getElementById('event-year-tabs');
        const eventGridEl = document.getElementById('event-grid');

        let allEvents = [];
        let activeYear = null;

        function eventYear(ev) {
            return new Date(ev.date_published + 'T00:00:00').getFullYear().toString();
        }

        function renderYearTabs() {
            const years = [...new Set(allEvents.map(eventYear))].sort((a, b) => b - a);
            if (!activeYear || !years.includes(activeYear)) {
                activeYear = years[0] || null;
            }

            if (years.length === 0) {
                yearTabsEl.innerHTML = '';
                return;
            }

            yearTabsEl.innerHTML = years.map(year => `
                <button type="button" data-year="${year}"
                    class="js-year-tab px-4 py-2 rounded-full text-sm font-bold transition ${
                        year === activeYear
                            ? 'bg-[#1a589e] text-white shadow'
                            : 'bg-gray-100 text-gray-600 hover:bg-gray-200'
                    }">
                    ${year}
                </button>
            `).join('');

            yearTabsEl.querySelectorAll('.js-year-tab').forEach(btn => {
                btn.addEventListener('click', () => {
                    activeYear = btn.dataset.year;
                    renderYearTabs();
                    renderEventGrid();
                });
            });
        }

        function renderEventGrid() {
            const events = allEvents.filter(ev => eventYear(ev) === activeYear);

            if (events.length === 0) {
                eventGridEl.innerHTML = '<div class="col-span-full text-center text-gray-500 py-10">No events for this year yet.</div>';
                return;
            }

            eventGridEl.innerHTML = events.map(ev => {
                const thumb = ev.cover_image
                    ? `../${ev.cover_image}`
                    : 'https://placehold.co/400x225/1a589e/ffffff?text=GAD+Event';
                return `
                <div class="bg-white rounded-xl border border-gray-200 shadow-sm overflow-hidden flex flex-col">
                    <img src="${thumb}" alt="${escapeHtml(ev.event_title)}" class="w-full h-40 object-cover">
                    <div class="p-4 flex flex-col flex-1">
                        <p class="text-xs text-gray-400 font-semibold mb-1">${formatDate(ev.date_published)}</p>
                        <h3 class="font-bold text-gray-800 mb-2 leading-snug">${escapeHtml(ev.event_title)}</h3>
                        <p class="text-sm text-gray-500 mb-4 flex-1">${escapeHtml(ev.excerpt || '')}</p>
                        <div class="flex justify-between items-center text-sm border-t pt-3">
                            <a href="../gadposts/view.php?id=${ev.id}" target="_blank"
                               class="text-[#1a589e] hover:underline font-medium">Preview</a>
                            <div class="space-x-3">
                                <button class="text-[#1a589e] hover:underline js-edit-event" data-id="${ev.id}">Edit</button>
                                <button class="text-red-600 hover:underline js-delete-event" data-id="${ev.id}">Delete</button>
                            </div>
                        </div>
                    </div>
                </div>
            `}).join('');

            attachEventCardHandlers(events);
        }

        function attachEventCardHandlers(events) {
            document.querySelectorAll('.js-edit-event').forEach(btn => {
                btn.addEventListener('click', () => {
                    const ev = events.find(e => String(e.id) === btn.dataset.id);
                    if (!ev) return;
                    document.getElementById('edit_event_id').value = ev.id;
                    document.getElementById('edit_event_title').value = ev.event_title;
                    document.getElementById('edit_date_published').value = ev.date_published;
                    document.getElementById('edit_excerpt').value = ev.excerpt || '';
                    document.getElementById('edit_article_body').value = ev.article_body;
                    document.getElementById('edit_event_images').value = '';
                    openModal('editGadEventModal');
                });
            });

            document.querySelectorAll('.js-delete-event').forEach(btn => {
                btn.addEventListener('click', async () => {
                    if (!confirm('Delete this GAD event? This cannot be undone.')) return;
                    try {
                        const res = await fetch('gad.php?action=event_delete', {
                            method: 'POST',
                            headers: { 'Content-Type': 'application/json' },
                            body: JSON.stringify({ id: btn.dataset.id }),
                        });
                        const result = await parseJsonResponse(res);
                        showMessage(result.message, !result.success);
                        if (result.success) loadEvents();
                    } catch (err) {
                        console.error(err);
                        showMessage(err.message || 'Failed to delete event.', true);
                    }
                });
            });
        }

        async function loadEvents() {
            eventGridEl.innerHTML = '<div class="col-span-full text-center text-gray-500 py-10">Loading events...</div>';
            try {
                const res = await fetch('gad.php?action=event_list');
                const result = await parseJsonResponse(res);

                if (!result.success) {
                    eventGridEl.innerHTML = `<div class="col-span-full text-center text-red-500 py-10">${escapeHtml(result.message)}</div>`;
                    return;
                }

                allEvents = result.data;
                renderYearTabs();
                renderEventGrid();
            } catch (err) {
                console.error(err);
                eventGridEl.innerHTML = `<div class="col-span-full text-center text-red-500 py-10">${escapeHtml(err.message)}</div>`;
            }
        }

        eventUploadForm.addEventListener('submit', async (e) => {
            e.preventDefault();
            const formData = new FormData(eventUploadForm);
            try {
                const res = await fetch('gad.php?action=event_upload', { method: 'POST', body: formData });
                const result = await parseJsonResponse(res);
                showMessage(result.message, !result.success);
                if (result.success) {
                    eventUploadForm.reset();
                    activeYear = null;
                    loadEvents();
                }
            } catch (err) {
                console.error(err);
                showMessage(err.message || 'Failed to publish event.', true);
            }
        });

        document.getElementById('save-event-edit-btn').addEventListener('click', async () => {
            const formData = new FormData(eventEditForm);
            try {
                const res = await fetch('gad.php?action=event_update', { method: 'POST', body: formData });
                const result = await parseJsonResponse(res);
                showMessage(result.message, !result.success);
                if (result.success) {
                    closeModal('editGadEventModal');
                    loadEvents();
                }
            } catch (err) {
                console.error(err);
                showMessage(err.message || 'Failed to update event.', true);
            }
        });

        loadMemos();
        loadEvents();
    });
    </script>

</body>

</html>