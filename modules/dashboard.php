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

$fullName = trim($userInfo['firstname'] . ' ' . $userInfo['lastname']);
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

    <main class="relative z-10 max-w-6xl mx-auto pt-6 pb-10">
        <section class="bg-white/80 backdrop-blur rounded-xl shadow-md overflow-hidden">
            <div class="bg-gradient-to-r from-[#1a589e] to-[#287fc1] px-5 py-6 sm:px-8 text-white">
                <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between gap-6">
                    <div class="flex items-center gap-4">
                        <div class="w-14 h-14 rounded-full bg-white/20 border border-white/40 flex items-center justify-center text-2xl font-bold">
                            <?= htmlspecialchars(strtoupper(substr($userInfo['firstname'], 0, 1) . substr($userInfo['lastname'], 0, 1))) ?>
                        </div>
                        <div>
                            <p class="text-blue-100 text-xs uppercase tracking-wider">Welcome back</p>
                            <h1 class="text-2xl font-bold"><?= htmlspecialchars($fullName) ?></h1>
                        </div>
                    </div>

                    <div class="lg:text-right">
                        <p id="liveDate" class="text-blue-100 text-sm" aria-live="polite">Loading date...</p>
                        <p id="liveTime" class="text-3xl font-semibold tracking-tight" aria-live="polite">--:--:--</p>
                        <p class="text-blue-100 text-xs mt-1">Philippine Standard Time</p>
                    </div>
                </div>
            </div>

            <div class="p-5 sm:p-8">
                <div class="grid gap-4 sm:grid-cols-2 lg:grid-cols-4 text-sm">
                    <div class="rounded-lg border border-gray-100 bg-gray-50 p-4">
                        <p class="text-gray-500 text-xs uppercase tracking-wide">Employee ID</p>
                        <p class="font-semibold text-gray-900 mt-2"><?= htmlspecialchars($userInfo['emp_id']) ?></p>
                    </div>
                    <div class="rounded-lg border border-gray-100 bg-gray-50 p-4">
                        <p class="text-gray-500 text-xs uppercase tracking-wide">Department</p>
                        <p class="font-semibold text-gray-900 mt-2"><?= htmlspecialchars($userInfo['department']) ?></p>
                    </div>
                    <div class="rounded-lg border border-gray-100 bg-gray-50 p-4">
                        <p class="text-gray-500 text-xs uppercase tracking-wide">Username</p>
                        <p class="font-semibold text-gray-900 mt-2 break-words"><?= htmlspecialchars($userInfo['username']) ?></p>
                    </div>
                    <div class="rounded-lg border border-gray-100 bg-gray-50 p-4">
                        <p class="text-gray-500 text-xs uppercase tracking-wide">Email</p>
                        <p class="font-semibold text-gray-900 mt-2 break-words"><?= htmlspecialchars($userInfo['email']) ?></p>
                    </div>
                </div>

                <div class="mt-8">
                    <div class="flex items-center justify-between mb-3">
                        <h2 class="text-sm font-bold text-gray-900">Account overview</h2>
                        <span class="text-xs text-gray-500">Updated live</span>
                    </div>
                    <div class="grid gap-3 sm:grid-cols-3">
                        <div class="flex items-center gap-3 rounded-lg border border-green-100 bg-green-50 px-4 py-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-green-500" aria-hidden="true"></span>
                            <div>
                                <p class="text-xs text-green-700">Account status</p>
                                <p class="font-semibold text-green-900">Active</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-3 rounded-lg border border-cyan-100 bg-cyan-50 px-4 py-3">
                            <span class="w-2.5 h-2.5 rounded-full bg-cyan-500 animate-pulse" aria-hidden="true"></span>
                            <div>
                                <p class="text-xs text-cyan-700">Session status</p>
                                <p class="font-semibold text-cyan-900">Online</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="../js/sidenav.js"></script>
    <script>
        const dateElement = document.getElementById('liveDate');
        const timeElement = document.getElementById('liveTime');
        const timeZone = 'Asia/Manila';

        function updateLiveDateTime() {
            const now = new Date();
            dateElement.textContent = new Intl.DateTimeFormat('en-PH', {
                timeZone,
                weekday: 'long',
                month: 'long',
                day: 'numeric',
                year: 'numeric'
            }).format(now);
            timeElement.textContent = new Intl.DateTimeFormat('en-PH', {
                timeZone,
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit',
                hour12: true
            }).format(now);
        }

        updateLiveDateTime();
        setInterval(updateLiveDateTime, 1000);
    </script>

</body>

</html>