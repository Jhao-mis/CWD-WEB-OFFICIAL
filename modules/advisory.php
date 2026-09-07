<?php
/* =====================
   AUTH + SESSION GUARD
===================== */
session_start();
require '../db.php';

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

/* =====================
   FETCH LOGGED USER
===================== */
function getLoggedInUser(PDO $conn, int $userId): ?array
{
    $stmt = $conn->prepare("
        SELECT id, emp_id, username, firstname, middlename, lastname,
               email, department, role
        FROM users
        WHERE id = ?
        LIMIT 1
    ");
    $stmt->execute([$userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

$userInfo = getLoggedInUser($conn, (int) $_SESSION['user_id']);

if (!$userInfo || empty($userInfo['role'])) {
    session_destroy();
    header("Location: ../login.php");
    exit;
}

$userId = $userInfo['id'];

/* =====================================================
   HANDLE ADD ADVISORY
===================================================== */
if (isset($_POST['action']) && $_POST['action'] === 'add') {

    $type = $_POST['advisory_type'];
    $date = $_POST['advisory_date'];

    $formattedDate = date("F d, Y", strtotime($date));

    if ($type === 'General') {
        $title = "General Announcement on $formattedDate";
    } else {
        $title = "$type Water Service Interruption on $formattedDate";
    }

    $uploadDir = "../uploads/advisory/";
    if (!is_dir($uploadDir)) {
        mkdir($uploadDir, 0777, true);
    }

    $imageName = time() . "_" . basename($_FILES['notice_image']['name']);
    move_uploaded_file($_FILES['notice_image']['tmp_name'], $uploadDir . $imageName);

    $stmt = $conn->prepare("
        INSERT INTO advisories 
        (advisory_type, advisory_date, advisory_title, notice_image, created_by)
        VALUES (?, ?, ?, ?, ?)
    ");
    $stmt->execute([$type, $date, $title, $imageName, $userId]);

    header("Location: advisory.php?added=1");
    exit;
}

/* =====================================================
   DELETE
===================================================== */
if (isset($_GET['delete'])) {
    $stmt = $conn->prepare("DELETE FROM advisories WHERE id=?");
    $stmt->execute([$_GET['delete']]);
    header("Location: advisory.php?deleted=1");
    exit;
}

/* =====================================================
   PAGINATION SETTINGS
===================================================== */
$limit = 3;

/* EMERGENCY */
$emergencyPage = isset($_GET['e_page']) ? (int) $_GET['e_page'] : 1;
$emergencyOffset = ($emergencyPage - 1) * $limit;

$totalEmergency = $conn->query("SELECT COUNT(*) FROM advisories WHERE advisory_type='Emergency'")
    ->fetchColumn();
$totalEmergencyPages = ceil($totalEmergency / $limit);

$emergencyStmt = $conn->prepare("
    SELECT * FROM advisories
    WHERE advisory_type='Emergency'
    ORDER BY advisory_date DESC
    LIMIT $limit OFFSET $emergencyOffset
");
$emergencyStmt->execute();
$emergency = $emergencyStmt->fetchAll(PDO::FETCH_ASSOC);

/* SCHEDULED */
$scheduledPage = isset($_GET['s_page']) ? (int) $_GET['s_page'] : 1;
$scheduledOffset = ($scheduledPage - 1) * $limit;

$totalScheduled = $conn->query("SELECT COUNT(*) FROM advisories WHERE advisory_type='Scheduled'")
    ->fetchColumn();
$totalScheduledPages = ceil($totalScheduled / $limit);

$scheduledStmt = $conn->prepare("
    SELECT * FROM advisories
    WHERE advisory_type='Scheduled'
    ORDER BY advisory_date DESC
    LIMIT $limit OFFSET $scheduledOffset
");
$scheduledStmt->execute();
$scheduled = $scheduledStmt->fetchAll(PDO::FETCH_ASSOC);

/* GENERAL ANNOUNCEMENT */
$generalPage = isset($_GET['g_page']) ? (int) $_GET['g_page'] : 1;
$generalOffset = ($generalPage - 1) * $limit;

$totalGeneral = $conn->query("SELECT COUNT(*) FROM advisories WHERE advisory_type='General'")
    ->fetchColumn();
$totalGeneralPages = ceil($totalGeneral / $limit);

$generalStmt = $conn->prepare("
    SELECT * FROM advisories
    WHERE advisory_type='General'
    ORDER BY advisory_date DESC
    LIMIT $limit OFFSET $generalOffset
");
$generalStmt->execute();
$general = $generalStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Advisory</title>
    <link rel="icon" href="../img/CWDIcon.png">
    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/db_bg.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

</head>

<body class="bg-gray-100">

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

    <div class="sm:ml-64 p-6 mt-10">

        <!-- ADD FORM -->
        <div class="bg-white p-6 rounded shadow mb-8 max-w-4xl mx-auto">
            <h2 class="text-2xl font-bold mb-6 text-center">Add New Advisory</h2>

            <form id="publishForm" method="POST" enctype="multipart/form-data"
                class="grid grid-cols-1 md:grid-cols-4 gap-4">

                <input type="hidden" name="action" value="add">

                <select name="advisory_type" required class="border p-2 rounded col-span-1">
                    <option value="Emergency">Emergency</option>
                    <option value="Scheduled">Scheduled</option>
                    <option value="General">General Announcement</option>
                </select>

                <input type="date" name="advisory_date" required class="border p-2 rounded col-span-1">

                <input type="file" name="notice_image" required class="border p-2 rounded col-span-2">

                <button type="button" onclick="confirmPublish()"
                    class="col-span-4 bg-[#1a589e] text-white font-bold py-3 rounded hover:bg-blue-700">
                    Publish Advisory
                </button>
            </form>
        </div>

        <!-- EMERGENCY -->
        <div class="bg-white p-6 rounded shadow mb-8 max-w-4xl mx-auto">
            <h2 class="text-xl font-bold text-red-600 mb-6">Emergency Advisories</h2>

            <?php if (empty($emergency)): ?>
                <p class="text-gray-500">No emergency advisories.</p>
            <?php endif; ?>

            <?php foreach ($emergency as $row): ?>
                <div class="border rounded-xl mb-4 p-4 shadow-sm hover:shadow-md transition">
                    <div class="flex flex-col md:flex-row gap-4">

                        <img src="../uploads/advisory/<?= $row['notice_image'] ?>"
                            class="w-full md:w-48 h-40 object-cover rounded-lg border">

                        <div class="flex-1">
                            <h3 class="font-semibold text-lg mb-2">
                                <?= htmlspecialchars($row['advisory_title']) ?>
                            </h3>
                            <p class="text-sm text-gray-500">
                                Date: <?= date("F d, Y", strtotime($row['advisory_date'])) ?>
                            </p>

                            <?php if ($userInfo['role'] === 'superadmin' || $userInfo['role'] === 'news'): ?>
                                <button onclick="confirmDelete(<?= $row['id'] ?>)"
                                    class="mt-3 bg-red-600 text-white px-4 py-1.5 rounded text-sm hover:bg-red-700">
                                    Delete
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if ($totalEmergencyPages > 1): ?>
                <div class="flex justify-center mt-6 space-x-2">
                    <?php for ($i = 1; $i <= $totalEmergencyPages; $i++): ?>
                        <a href="?e_page=<?= $i ?>&s_page=<?= $scheduledPage ?>&g_page=<?= $generalPage ?>"
                            class="px-3 py-1 border rounded <?= $i == $emergencyPage ? 'bg-red-600 text-white' : 'bg-white' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- SCHEDULED -->
        <div class="bg-white p-6 rounded shadow max-w-4xl mx-auto">
            <h2 class="text-xl font-bold text-blue-600 mb-6">Scheduled Advisories</h2>

            <?php if (empty($scheduled)): ?>
                <p class="text-gray-500">No scheduled advisories.</p>
            <?php endif; ?>

            <?php foreach ($scheduled as $row): ?>
                <div class="border rounded-xl mb-4 p-4 shadow-sm hover:shadow-md transition">
                    <div class="flex flex-col md:flex-row gap-4">

                        <img src="../uploads/advisory/<?= $row['notice_image'] ?>"
                            class="w-full md:w-48 h-40 object-cover rounded-lg border">

                        <div class="flex-1">
                            <h3 class="font-semibold text-lg mb-2">
                                <?= htmlspecialchars($row['advisory_title']) ?>
                            </h3>
                            <p class="text-sm text-gray-500">
                                Date: <?= date("F d, Y", strtotime($row['advisory_date'])) ?>
                            </p>

                            <?php if ($userInfo['role'] === 'superadmin' || $userInfo['role'] === 'news'): ?>
                                <button onclick="confirmDelete(<?= $row['id'] ?>)"
                                    class="mt-3 bg-red-600 text-white px-4 py-1.5 rounded text-sm hover:bg-red-700">
                                    Delete
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if ($totalScheduledPages > 1): ?>
                <div class="flex justify-center mt-6 space-x-2">
                    <?php for ($i = 1; $i <= $totalScheduledPages; $i++): ?>
                        <a href="?e_page=<?= $emergencyPage ?>&s_page=<?= $i ?>&g_page=<?= $generalPage ?>"
                            class="px-3 py-1 border rounded <?= $i == $scheduledPage ? 'bg-blue-600 text-white' : 'bg-white' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>

        <!-- GENERAL ANNOUNCEMENT -->
        <div class="bg-white p-6 rounded shadow max-w-4xl mx-auto mt-8">
            <h2 class="text-xl font-bold text-amber-600 mb-6">General Announcements</h2>

            <?php if (empty($general)): ?>
                <p class="text-gray-500">No general announcements.</p>
            <?php endif; ?>

            <?php foreach ($general as $row): ?>
                <div class="border rounded-xl mb-4 p-4 shadow-sm hover:shadow-md transition">
                    <div class="flex flex-col md:flex-row gap-4">

                        <img src="../uploads/advisory/<?= $row['notice_image'] ?>"
                            class="w-full md:w-48 h-40 object-cover rounded-lg border">

                        <div class="flex-1">
                            <h3 class="font-semibold text-lg mb-2">
                                <?= htmlspecialchars($row['advisory_title']) ?>
                            </h3>
                            <p class="text-sm text-gray-500">
                                Date: <?= date("F d, Y", strtotime($row['advisory_date'])) ?>
                            </p>

                            <?php if ($userInfo['role'] === 'superadmin' || $userInfo['role'] === 'news'): ?>
                                <button onclick="confirmDelete(<?= $row['id'] ?>)"
                                    class="mt-3 bg-red-600 text-white px-4 py-1.5 rounded text-sm hover:bg-red-700">
                                    Delete
                                </button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>

            <?php if ($totalGeneralPages > 1): ?>
                <div class="flex justify-center mt-6 space-x-2">
                    <?php for ($i = 1; $i <= $totalGeneralPages; $i++): ?>
                        <a href="?e_page=<?= $emergencyPage ?>&s_page=<?= $scheduledPage ?>&g_page=<?= $i ?>"
                            class="px-3 py-1 border rounded <?= $i == $generalPage ? 'bg-amber-600 text-white' : 'bg-white' ?>">
                            <?= $i ?>
                        </a>
                    <?php endfor; ?>
                </div>
            <?php endif; ?>
        </div>

    </div>

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        function confirmPublish() {
            const form = document.getElementById('publishForm');
            const type = form.querySelector('[name="advisory_type"]').value;
            const date = form.querySelector('[name="advisory_date"]').value;
            const image = form.querySelector('[name="notice_image"]').value;

            if (!type || !date || !image) {
                Swal.fire({
                    icon: 'warning', title: 'Missing Fields',
                    text: 'Please complete all fields before publishing.'
                });
                return;
            }

            Swal.fire({
                title: 'Publish Advisory?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonColor: '#1a589e'
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.fire({
                        title: 'Publishing...', allowOutsideClick: false,
                        didOpen: () => { Swal.showLoading(); }
                    });
                    form.submit();
                }
            });
        }

        function confirmDelete(id) {
            Swal.fire({
                title: 'Are you sure?',
                text: 'This advisory will be permanently deleted.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "advisory.php?delete=" + id;
                }
            });
        }
    </script>

    <?php if (isset($_GET['added'])): ?>
        <script>
            Swal.fire({ icon: 'success', title: 'Advisory Published!', timer: 1500, showConfirmButton: false });
        </script>
    <?php endif; ?>

    <?php if (isset($_GET['deleted'])): ?>
        <script>
            Swal.fire({ icon: 'success', title: 'Advisory Deleted!', timer: 1500, showConfirmButton: false });
        </script>
    <?php endif; ?>

</body>

</html>