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
        SELECT id, emp_id, username, firstname, middlename, lastname, email, department, role
        FROM users
        WHERE id = ?
        LIMIT 1
    ");
    $stmt->execute([$userId]);
    return $stmt->fetch(PDO::FETCH_ASSOC) ?: null;
}

$userInfo = getLoggedInUser($conn, (int) $_SESSION['user_id']);

if (!$userInfo) {
    session_destroy();
    header("Location: ../login.php");
    exit;
}

/* =====================
   UPDATE OWN ACCOUNT
===================== */
$formError = '';
$formSuccess = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update_settings') {

    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $currentPassword = $_POST['current_password'] ?? '';
    $newPassword = $_POST['new_password'] ?? '';
    $confirmPassword = $_POST['confirm_password'] ?? '';

    if ($username === '' || !preg_match('/^[A-Za-z0-9_.]{3,50}$/', $username)) {
        $formError = 'Username must be 3-50 characters (letters, numbers, . and _ only).';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formError = 'Please enter a valid email address.';
    } elseif ($currentPassword === '') {
        $formError = 'Please enter your current password to confirm changes.';
    } else {
        // Verify current password
        $pwStmt = $conn->prepare("SELECT password FROM users WHERE id = ? LIMIT 1");
        $pwStmt->execute([$userInfo['id']]);
        $row = $pwStmt->fetch(PDO::FETCH_ASSOC);

        if (!$row || !password_verify($currentPassword, $row['password'])) {
            $formError = 'Current password is incorrect.';
        } elseif ($newPassword !== '' && strlen($newPassword) < 8) {
            $formError = 'New password must be at least 8 characters.';
        } elseif ($newPassword !== '' && $newPassword !== $confirmPassword) {
            $formError = 'New password and confirmation do not match.';
        } else {
            // Check username/email aren't already used by a different account
            $dupStmt = $conn->prepare("SELECT id FROM users WHERE (email = ? OR username = ?) AND id != ? LIMIT 1");
            $dupStmt->execute([$email, $username, $userInfo['id']]);

            if ($dupStmt->fetch()) {
                $formError = 'That username or email is already in use by another account.';
            } else {
                if ($newPassword !== '') {
                    $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
                    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
                    $stmt->execute([$username, $email, $hashed, $userInfo['id']]);
                } else {
                    $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
                    $stmt->execute([$username, $email, $userInfo['id']]);
                }

                $formSuccess = 'Your account settings have been updated.';
                $userInfo = getLoggedInUser($conn, (int) $_SESSION['user_id']);
            }
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Account Settings</title>
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

        <h1 class="text-2xl font-bold mb-6">Account Settings</h1>

        <?php if (!empty($formError)): ?>
            <div class="mb-4 px-4 py-3 rounded-lg bg-red-100 text-red-700 text-sm max-w-lg">
                <?= htmlspecialchars($formError) ?>
            </div>
        <?php endif; ?>

        <?php if (!empty($formSuccess)): ?>
            <div class="mb-4 px-4 py-3 rounded-lg bg-green-100 text-green-700 text-sm max-w-lg">
                <?= htmlspecialchars($formSuccess) ?>
            </div>
        <?php endif; ?>

        <div class="bg-white rounded-xl shadow p-6 max-w-lg">

            <div class="mb-6 text-sm text-gray-600 space-y-1">
                <p><span class="font-medium text-gray-800">Name:</span>
                    <?= htmlspecialchars($userInfo['firstname'] . ' ' . $userInfo['lastname']) ?>
                </p>
                <p><span class="font-medium text-gray-800">Employee ID:</span> <?= htmlspecialchars($userInfo['emp_id']) ?>
                </p>
                <p><span class="font-medium text-gray-800">Department:</span>
                    <?= htmlspecialchars($userInfo['department']) ?>
                </p>
                <!-- <p><span class="font-medium text-gray-800">Role:</span> <?= strtoupper(htmlspecialchars($userInfo['role'])) ?>
                </p> -->
            </div>

            <form method="POST" class="space-y-4">
                <input type="hidden" name="action" value="update_settings">

                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username" required minlength="3" maxlength="50"
                        pattern="[A-Za-z0-9_.]{3,50}" value="<?= htmlspecialchars($userInfo['username']) ?>"
                        class="w-full border rounded-lg px-3 py-2 text-sm">
                    <p class="text-xs text-gray-500 mt-1">Letters, numbers, "." and "_" only.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" required value="<?= htmlspecialchars($userInfo['email']) ?>"
                        class="w-full border rounded-lg px-3 py-2 text-sm">
                </div>

                <hr class="my-2">

                <div>
                    <label class="block text-sm font-medium mb-1">Current Password</label>
                    <input type="password" name="current_password" required
                        class="w-full border rounded-lg px-3 py-2 text-sm"
                        placeholder="Required to save any changes">
                    <p class="text-xs text-gray-500 mt-1">Enter your current password to confirm these changes.</p>
                </div>

                

                <hr class="my-2">

                <div>
                    <label class="block text-sm font-medium mb-1">New Password</label>
                    <input type="password" name="new_password" minlength="8"
                        class="w-full border rounded-lg px-3 py-2 text-sm" placeholder="Leave blank to keep current">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Confirm New Password</label>
                    <input type="password" name="confirm_password" minlength="8"
                        class="w-full border rounded-lg px-3 py-2 text-sm" placeholder="Repeat new password">
                </div>

                <div class="flex justify-end pt-2">
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">
                        Save Changes
                    </button>
                </div>
            </form>

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