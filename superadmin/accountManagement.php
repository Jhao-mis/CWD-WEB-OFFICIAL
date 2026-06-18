<?php
/* =====================
   AUTH + SESSION GUARD
===================== */
session_start();

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");
header("Expires: 0");

if (!isset($_SESSION['user_id'])) {
    header("Location: ../login.php");
    exit;
}

include '../db.php';

/* =====================
   FETCH LOGGED-IN USER
===================== */
function getLoggedInUser(PDO $conn, int $userId): ?array
{
    $stmt = $conn->prepare("
        SELECT id, firstname, lastname, role
        FROM users
        WHERE id = ?
        LIMIT 1
    ");
    $stmt->execute([$userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

$userInfo = getLoggedInUser($conn, (int) $_SESSION['user_id']);

/* =====================
   SUPERADMIN ONLY
===================== */
if (!$userInfo || $userInfo['role'] !== 'superadmin') {
    session_destroy();
    header("Location: ../login.php");
    exit;
}

/* =====================
   UPDATE USER ROLE
===================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['user_id'], $_POST['role'])) {

    $allowedRoles = ['superadmin', 'bidding', 'gad', 'job', 'news'];

    if (in_array($_POST['role'], $allowedRoles, true)) {
        $stmt = $conn->prepare("
            UPDATE users 
            SET role = ?
            WHERE id = ?
        ");
        $stmt->execute([
            $_POST['role'],
            (int) $_POST['user_id']
        ]);
    }

    header("Location: accountManagement.php");
    exit;
}

/* =====================
   FETCH ALL USERS
===================== */
$usersStmt = $conn->query("
    SELECT id, emp_id, firstname, lastname, email, department, role
    FROM users
    ORDER BY lastname ASC
");
$users = $usersStmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Management</title>
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


<body class="bg-gray-100">

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

    <!-- MAIN CONTENT -->
    <div class="sm:ml-64 p-6">

        <h1 class="text-2xl font-bold mb-6">Account Management</h1>

        <div class="overflow-x-auto bg-white rounded-xl shadow">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Emp ID</th>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Email</th>
                        <th class="px-4 py-3 text-left">Department</th>
                        <th class="px-4 py-3 text-left">Role</th>
                        <th class="px-4 py-3 text-center">Action</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    <?php foreach ($users as $u): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="px-4 py-3"><?= htmlspecialchars($u['emp_id']) ?></td>
                            <td class="px-4 py-3 font-medium">
                                <?= htmlspecialchars($u['firstname'] . ' ' . $u['lastname']) ?>
                            </td>
                            <td class="px-4 py-3"><?= htmlspecialchars($u['email']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($u['department']) ?></td>

                            <td class="px-4 py-3">
                                <form method="POST" class="flex gap-2 items-center">
                                    <input type="hidden" name="user_id" value="<?= $u['id'] ?>">

                                    <select name="role" class="border rounded-lg px-2 py-1 text-sm">
                                        <?php
                                        foreach (['superadmin', 'bidding', 'gad', 'job', 'news'] as $role):
                                            ?>
                                            <option value="<?= $role ?>" <?= $u['role'] === $role ? 'selected' : '' ?>>
                                                <?= strtoupper($role) ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                            </td>

                            <td class="px-4 py-3 text-center">
                                <button type="submit"
                                    class="px-3 py-1 bg-blue-600 text-white rounded-lg text-xs hover:bg-blue-700">
                                    Save
                                </button>
                                </form>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        xintegrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/flowbite/2.3.0/flowbite.min.js"></script>

    <script src="../js/sidenav.js"></script>
    <script src="../js/style.js"></script>
    <script src="../js/db_adv.js"></script>

</body>

</html>