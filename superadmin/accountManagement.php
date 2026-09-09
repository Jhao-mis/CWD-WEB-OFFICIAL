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

$formError = '';
$allowedRoles = ['superadmin', 'bidding', 'gad', 'job', 'news'];
$allowedDepartments = [
    'Office of the General Manager',
    'Management Information Services Section',
    'Administrative Department',
    'Finance Department',
    'Commercial Department',
    'Technical Services Department',
    'Operations Department',
];

/* =====================
   UPDATE USER ROLE
===================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update_role'
    && isset($_POST['user_id'], $_POST['role'])) {

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
   EDIT ACCOUNT (EMAIL / PASSWORD)
===================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'update_account'
    && isset($_POST['user_id'], $_POST['email'], $_POST['username'])) {

    $editUserId = (int) $_POST['user_id'];
    $username = trim($_POST['username']);
    $email = trim($_POST['email']);
    $newPassword = $_POST['password'] ?? '';

    if ($username === '' || !preg_match('/^[A-Za-z0-9_.]{3,50}$/', $username)) {
        $formError = 'Username must be 3-50 characters (letters, numbers, . and _ only).';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formError = 'Please enter a valid email address.';
    } elseif ($newPassword !== '' && strlen($newPassword) < 8) {
        $formError = 'Password must be at least 8 characters.';
    } else {
        // Check username/email aren't already used by a different account
        $dupStmt = $conn->prepare("SELECT id FROM users WHERE (email = ? OR username = ?) AND id != ? LIMIT 1");
        $dupStmt->execute([$email, $username, $editUserId]);

        if ($dupStmt->fetch()) {
            $formError = 'That username or email is already in use by another account.';
        } else {
            if ($newPassword !== '') {
                $hashed = password_hash($newPassword, PASSWORD_DEFAULT);
                $stmt = $conn->prepare("UPDATE users SET username = ?, email = ?, password = ? WHERE id = ?");
                $stmt->execute([$username, $email, $hashed, $editUserId]);
            } else {
                $stmt = $conn->prepare("UPDATE users SET username = ?, email = ? WHERE id = ?");
                $stmt->execute([$username, $email, $editUserId]);
            }

            header("Location: accountManagement.php");
            exit;
        }
    }
}

/* =====================
   REGISTER NEW ACCOUNT
===================== */
if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add_account') {

    $empId = trim($_POST['emp_id'] ?? '');
    $firstname = trim($_POST['firstname'] ?? '');
    $middlename = trim($_POST['middlename'] ?? '');
    $lastname = trim($_POST['lastname'] ?? '');
    $username = trim($_POST['username'] ?? '');
    $email = trim($_POST['email'] ?? '');
    $department = $_POST['department'] ?? '';
    $role = $_POST['role'] ?? '';
    $password = $_POST['password'] ?? '';

    if ($empId === '' || !ctype_digit($empId) || $firstname === '' || $lastname === '') {
        $formError = 'Please fill in all required fields. Employee ID must be numeric.';
    } elseif (!preg_match('/^[A-Za-z0-9_.]{3,50}$/', $username)) {
        $formError = 'Username must be 3-50 characters (letters, numbers, . and _ only).';
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $formError = 'Please enter a valid email address.';
    } elseif (!in_array($department, $allowedDepartments, true)) {
        $formError = 'Please select a valid department.';
    } elseif (!in_array($role, $allowedRoles, true)) {
        $formError = 'Please select a valid role.';
    } elseif (strlen($password) < 8) {
        $formError = 'Password must be at least 8 characters.';
    } else {
        $dupStmt = $conn->prepare("SELECT id FROM users WHERE email = ? OR username = ? OR emp_id = ? LIMIT 1");
        $dupStmt->execute([$email, $username, (int) $empId]);

        if ($dupStmt->fetch()) {
            $formError = 'That username, email, or employee ID is already registered.';
        } else {
            $hashed = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $conn->prepare("
                INSERT INTO users (emp_id, username, firstname, middlename, lastname, email, department, role, password)
                VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)
            ");
            $stmt->execute([
                (int) $empId,
                $username,
                $firstname,
                $middlename,
                $lastname,
                $email,
                $department,
                $role,
                $hashed,
            ]);

            header("Location: accountManagement.php");
            exit;
        }
    }
}

/* =====================
   FETCH ALL USERS
===================== */
$usersStmt = $conn->query("
    SELECT id, emp_id, firstname, lastname, username, email, department, role
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

        <div class="flex items-center justify-between mb-6">
            <h1 class="text-2xl font-bold">Account Management</h1>
            <button type="button" onclick="document.getElementById('addAccountModal').classList.remove('hidden')"
                class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm hover:bg-green-700">
                <i class="fa-solid fa-user-plus mr-1"></i> Register Account
            </button>
        </div>

        <?php if (!empty($formError)): ?>
            <div class="mb-4 px-4 py-3 rounded-lg bg-red-100 text-red-700 text-sm">
                <?= htmlspecialchars($formError) ?>
            </div>
        <?php endif; ?>

        <div class="overflow-x-auto bg-white rounded-xl shadow">
            <table class="min-w-full text-sm">
                <thead class="bg-gray-100 text-gray-700">
                    <tr>
                        <th class="px-4 py-3 text-left">Emp ID</th>
                        <th class="px-4 py-3 text-left">Name</th>
                        <th class="px-4 py-3 text-left">Username</th>
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
                            <td class="px-4 py-3"><?= htmlspecialchars($u['username']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($u['email']) ?></td>
                            <td class="px-4 py-3"><?= htmlspecialchars($u['department']) ?></td>

                            <td class="px-4 py-3">
                                <form method="POST" class="flex gap-2 items-center">
                                    <input type="hidden" name="action" value="update_role">
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

                                <button type="button"
                                    onclick="openEditModal(<?= (int) $u['id'] ?>, <?= htmlspecialchars(json_encode($u['username']), ENT_QUOTES) ?>, <?= htmlspecialchars(json_encode($u['email']), ENT_QUOTES) ?>)"
                                    class="mt-1 px-3 py-1 bg-gray-600 text-white rounded-lg text-xs hover:bg-gray-700">
                                    Edit
                                </button>
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

    <!-- REGISTER ACCOUNT MODAL -->
    <div id="addAccountModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold">Register New Account</h2>
                <button type="button" onclick="document.getElementById('addAccountModal').classList.add('hidden')"
                    class="text-gray-500 hover:text-gray-800">&times;</button>
            </div>

            <form method="POST" class="space-y-3">
                <input type="hidden" name="action" value="add_account">

                <div>
                    <label class="block text-sm font-medium mb-1">Employee ID</label>
                    <input type="number" name="emp_id" required min="1" class="w-full border rounded-lg px-3 py-2 text-sm">
                </div>

                <div class="grid grid-cols-2 gap-3">
                    <div>
                        <label class="block text-sm font-medium mb-1">First Name</label>
                        <input type="text" name="firstname" required class="w-full border rounded-lg px-3 py-2 text-sm">
                    </div>
                    <div>
                        <label class="block text-sm font-medium mb-1">Last Name</label>
                        <input type="text" name="lastname" required class="w-full border rounded-lg px-3 py-2 text-sm">
                    </div>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Middle Name</label>
                    <input type="text" name="middlename" class="w-full border rounded-lg px-3 py-2 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username" required minlength="3" maxlength="50"
                        pattern="[A-Za-z0-9_.]{3,50}"
                        class="w-full border rounded-lg px-3 py-2 text-sm">
                    <p class="text-xs text-gray-500 mt-1">Letters, numbers, "." and "_" only.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" required class="w-full border rounded-lg px-3 py-2 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Department</label>
                    <select name="department" required class="w-full border rounded-lg px-3 py-2 text-sm">
                        <option value="" disabled selected>Select department</option>
                        <?php foreach ($allowedDepartments as $dept): ?>
                            <option value="<?= htmlspecialchars($dept) ?>"><?= htmlspecialchars($dept) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Role</label>
                    <select name="role" required class="w-full border rounded-lg px-3 py-2 text-sm">
                        <?php foreach (['superadmin', 'bidding', 'gad', 'job', 'news'] as $role): ?>
                            <option value="<?= $role ?>"><?= strtoupper($role) ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Password</label>
                    <input type="password" name="password" required minlength="8"
                        class="w-full border rounded-lg px-3 py-2 text-sm">
                    <p class="text-xs text-gray-500 mt-1">At least 8 characters.</p>
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button" onclick="document.getElementById('addAccountModal').classList.add('hidden')"
                        class="px-4 py-2 rounded-lg text-sm border">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm hover:bg-green-700">Create
                        Account</button>
                </div>
            </form>
        </div>
    </div>

    <!-- EDIT ACCOUNT MODAL -->
    <div id="editAccountModal" class="hidden fixed inset-0 bg-black/50 flex items-center justify-center z-50">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md p-6">
            <div class="flex items-center justify-between mb-4">
                <h2 class="text-lg font-bold">Edit Account</h2>
                <button type="button" onclick="document.getElementById('editAccountModal').classList.add('hidden')"
                    class="text-gray-500 hover:text-gray-800">&times;</button>
            </div>

            <form method="POST" class="space-y-3">
                <input type="hidden" name="action" value="update_account">
                <input type="hidden" name="user_id" id="editUserId" value="">

                <div>
                    <label class="block text-sm font-medium mb-1">Username</label>
                    <input type="text" name="username" id="editUsername" required minlength="3" maxlength="50"
                        pattern="[A-Za-z0-9_.]{3,50}"
                        class="w-full border rounded-lg px-3 py-2 text-sm">
                    <p class="text-xs text-gray-500 mt-1">Letters, numbers, "." and "_" only.</p>
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">Email</label>
                    <input type="email" name="email" id="editEmail" required
                        class="w-full border rounded-lg px-3 py-2 text-sm">
                </div>

                <div>
                    <label class="block text-sm font-medium mb-1">New Password</label>
                    <input type="password" name="password" minlength="8"
                        class="w-full border rounded-lg px-3 py-2 text-sm" placeholder="Leave blank to keep current">
                    <p class="text-xs text-gray-500 mt-1">Leave blank to keep the current password. Otherwise, at
                        least 8 characters.</p>
                </div>

                <div class="flex justify-end gap-2 pt-2">
                    <button type="button"
                        onclick="document.getElementById('editAccountModal').classList.add('hidden')"
                        class="px-4 py-2 rounded-lg text-sm border">Cancel</button>
                    <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm hover:bg-blue-700">Save
                        Changes</button>
                </div>
            </form>
        </div>
    </div>

    <script>
        function openEditModal(userId, username, email) {
            document.getElementById('editUserId').value = userId;
            document.getElementById('editUsername').value = username;
            document.getElementById('editEmail').value = email;
            document.getElementById('editAccountModal').classList.remove('hidden');
        }

        <?php if (!empty($formError)): ?>
            // Re-open the relevant modal if a submission just failed, so the user doesn't lose context
            document.addEventListener('DOMContentLoaded', function () {
                document.getElementById('addAccountModal').classList.remove('hidden');
            });
        <?php endif; ?>
    </script>

    <script src="../js/sidenav.js"></script>
    <script src="../js/style.js"></script>
    <script src="../js/db_adv.js"></script>

</body>

</html>