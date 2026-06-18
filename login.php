<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once __DIR__ . '/db.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $login = trim($_POST['login'] ?? '');
    $password = $_POST['password'] ?? '';

    if (empty($login) || empty($password)) {
        $_SESSION['error'] = "Please fill in all fields.";
        header('Location: login.php');
        exit;
    }

    try {

        $sql = "SELECT * FROM users
                WHERE username = ? OR email = ?
                LIMIT 1";

        $stmt = $conn->prepare($sql);
        $stmt->execute([$login, $login]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password'])) {
            $_SESSION['error'] = "Invalid username/email or password.";
            header('Location: login.php');
            exit;
        }

        session_regenerate_id(true);

        $_SESSION['user_id']    = $user['id'];
        $_SESSION['emp_id']     = $user['emp_id'];
        $_SESSION['username']   = $user['username'];
        $_SESSION['firstname']  = $user['firstname'];
        $_SESSION['lastname']   = $user['lastname'];
        $_SESSION['department'] = $user['department'];
        $_SESSION['role']       = $user['role'];

        header('Location: modules/dashboard.php');
        exit;

    } catch (PDOException $e) {

        error_log($e->getMessage());

        $_SESSION['error'] = "System error occurred.";
        header('Location: login.php');
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="icon" type="image/png" href="img/CWDIcon.png">

    <script src="https://cdn.tailwindcss.com"></script>

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/db_bg.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@100..900&display=swap" rel="stylesheet">

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body class="min-h-screen">

    <div class="flex min-h-screen">

        <!-- LEFT SIDE -->
        <div class="w-full lg:w-[35%] bg-white flex items-center justify-center px-8 py-20">

            <div class="w-full max-w-[480px] flex flex-col items-center">

                <div class="mb-8">
                    <img src="img/lgnav.svg" alt="logo" class="h-12 mx-auto">
                </div>

                <h1 class="text-3xl font-bold text-gray-800 mb-2 text-center">
                    CWD Upload Portal Logins
                </h1>

                <p class="text-gray-500 mb-8 text-center">
                    Use your DistrictOne credentials
                </p>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="w-full mb-4 p-3 rounded-lg bg-red-100 text-red-700 text-sm">
                        <?= htmlspecialchars($_SESSION['error']) ?>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <form method="POST" class="w-full space-y-6">

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Username or Email
                        </label>

                        <input
                            type="text"
                            name="login"
                            placeholder="Username or Email"
                            required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a589e] focus:border-[#1a589e]">
                    </div>

                    <div>
                        <label class="block mb-2 text-sm font-semibold text-gray-700">
                            Password
                        </label>

                        <input
                            type="password"
                            name="password"
                            placeholder="••••••••"
                            required
                            class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#1a589e] focus:border-[#1a589e]">
                    </div>

                    <button
                        type="submit"
                        class="w-full bg-[#1a589e] hover:bg-[#134a86] text-white font-semibold py-3 rounded-lg shadow-md transition">
                        Sign In
                    </button>

                </form>

            </div>
        </div>

        <!-- RIGHT SIDE -->
        <div class="hidden lg:block lg:flex-1 relative">
            <div
                class="absolute inset-0 bg-cover bg-center"
                style="background-image: url('img/bld.jpg');">
            </div>

            <div class="absolute inset-0 bg-black/20"></div>
        </div>

    </div>

</body>

</html>