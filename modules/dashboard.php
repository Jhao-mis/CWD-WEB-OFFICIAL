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
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
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

    <!-- Main Content -->
<div class="sm:ml-64 min-h-screen relative p-6">

    <!-- Center Logo (Background Style) -->
    <div class="absolute inset-0 flex items-center justify-center pointer-events-none">
        <div class="w-72 sm:w-96 opacity-10">
            <img src="../img/CWDIcon.png" alt="Logo" class="w-full h-auto object-contain">
        </div>
    </div>

    <!-- TOP BASIC PROFILE INFO -->
    <div class="relative z-10 max-w-6xl mx-auto bg-white/70 backdrop-blur rounded-xl shadow-md p-4 mt-6">

        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 text-sm">

            <div>
                <p class="text-gray-500 text-xs">Employee</p>
                <p class="font-semibold text-gray-900">
                    <?= htmlspecialchars($userInfo['firstname'] . ' ' . $userInfo['lastname']) ?>
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Employee ID</p>
                <p class="font-semibold text-gray-900">
                    <?= htmlspecialchars($userInfo['emp_id']) ?>
                </p>
            </div>

            <div>
                <p class="text-gray-500 text-xs">Department</p>
                <p class="font-semibold text-gray-900">
                    <?= htmlspecialchars($userInfo['department']) ?>
                </p>
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

    </script>

</body>

</html>