<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

session_start();

require_once __DIR__ . '/db.php';

/**
 * Renders a short-lived success screen: SweetAlert popup,
 * then a branded loading state, then redirects to $redirectUrl.
 */
function render_login_success(string $firstName, string $redirectUrl): void
{
    $safeName = htmlspecialchars($firstName !== '' ? $firstName : 'back', ENT_QUOTES);
    $safeUrl  = htmlspecialchars($redirectUrl, ENT_QUOTES);

    echo <<<HTML
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signing you in…</title>
    <meta http-equiv="refresh" content="4;url={$safeUrl}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        html, body {
            margin: 0;
            height: 100%;
            font-family: 'Inter', system-ui, sans-serif;
            background: #EAF4F6;
        }

        .loading-overlay {
            position: fixed;
            inset: 0;
            display: none;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 1.1rem;
            background: #0E3A53;
            opacity: 0;
            transition: opacity 0.25s ease;
            z-index: 10;
        }

        .loading-overlay.show {
            display: flex;
            opacity: 1;
        }

        .loading-overlay .spinner {
            width: 42px;
            height: 42px;
            border: 3.5px solid rgba(255,255,255,0.25);
            border-top-color: #FFFFFF;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
        }

        .loading-overlay p {
            color: #FFFFFF;
            font-size: 0.95rem;
            font-weight: 500;
            letter-spacing: 0.01em;
        }

        @keyframes spin { to { transform: rotate(360deg); } }
    </style>
</head>
<body>

    <div id="loadingOverlay" class="loading-overlay">
        <div class="spinner"></div>
        <p>Loading your dashboard…</p>
    </div>

    <script>
        Swal.fire({
            icon: 'success',
            title: 'Welcome back, {$safeName}!',
            text: 'You have signed in successfully.',
            timer: 1400,
            timerProgressBar: true,
            showConfirmButton: false,
            confirmButtonColor: '#0E3A53',
            allowOutsideClick: false,
            allowEscapeKey: false
        }).then(function () {
            var overlay = document.getElementById('loadingOverlay');
            overlay.classList.add('show');
            setTimeout(function () {
                window.location.href = '{$safeUrl}';
            }, 900);
        });
    </script>

</body>
</html>
HTML;
}

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

        render_login_success($user['firstname'] ?? '', 'modules/dashboard.php');
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
    <title>CWD Upload Portal — Sign In</title>

    <link rel="icon" type="image/png" href="img/CWDIcon.png">

    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/db_bg.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:opsz,wght@9..144,400;9..144,500;9..144,600&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --ink: #16242B;
            --ink-soft: #4B5D66;
            --navy: #0E3A53;
            --navy-deep: #0A2C40;
            --teal: #2B93A8;
            --aqua-wash: #EAF4F6;
            --line: #D7E3E7;
            --error-bg: #FBEAE9;
            --error-text: #93261E;
        }

        * { box-sizing: border-box; }

        html, body {
            margin: 0;
            min-height: 100vh;
            font-family: 'Inter', sans-serif;
            color: var(--ink);
            background: var(--aqua-wash);
        }

        .layout {
            display: flex;
            min-height: 100vh;
        }

        /* LEFT PANEL */
        .panel-form {
            width: 100%;
            background: #FFFFFF;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 2rem;
            position: relative;
        }

        @media (min-width: 1024px) {
            .panel-form { width: 33%; min-width: 420px; padding: 4rem 3.25rem; }
        }

        .form-inner {
            width: 100%;
            max-width: 400px;
            animation: rise 0.55s ease-out;
        }

        @keyframes rise {
            from { opacity: 0; transform: translateY(10px); }
            to   { opacity: 1; transform: translateY(0); }
        }

        @media (prefers-reduced-motion: reduce) {
            .form-inner { animation: none; }
        }

        .brand-row {
            display: flex;
            align-items: center;
            gap: 0.75rem;
            margin-bottom: 2.5rem;
        }

        .brand-row img { height: 42px; }

        .brand-row .brand-text {
            font-family: 'Inter', sans-serif;
            font-weight: 700;
            font-size: 0.95rem;
            color: var(--navy);
            line-height: 1.2;
        }

        .brand-row .brand-text span {
            display: block;
            font-weight: 500;
            font-size: 0.75rem;
            color: var(--ink-soft);
        }

        h1.headline {
            font-family: 'Fraunces', serif;
            font-weight: 500;
            font-size: 2rem;
            line-height: 1.2;
            color: var(--navy-deep);
            margin: 0 0 0.6rem 0;
        }

        .headline-underline {
            width: 46px;
            height: 3px;
            background: var(--teal);
            border-radius: 2px;
            margin-bottom: 1.1rem;
        }

        p.subtext {
            color: var(--ink-soft);
            font-size: 0.95rem;
            margin: 0 0 2rem 0;
        }

        .alert {
            display: flex;
            align-items: flex-start;
            gap: 0.6rem;
            width: 100%;
            margin-bottom: 1.5rem;
            padding: 0.85rem 1rem;
            border-radius: 8px;
            background: var(--error-bg);
            color: var(--error-text);
            font-size: 0.875rem;
            border: 1px solid #F3CFCC;
        }

        .alert i { margin-top: 2px; }

        form { width: 100%; }

        .field { margin-bottom: 1.4rem; }

        .field label {
            display: block;
            margin-bottom: 0.45rem;
            font-size: 0.83rem;
            font-weight: 600;
            color: var(--ink);
        }

        .field input {
            width: 100%;
            padding: 0.8rem 0.95rem;
            border: 1.5px solid var(--line);
            border-radius: 8px;
            font-size: 0.95rem;
            font-family: 'Inter', sans-serif;
            color: var(--ink);
            background: #FFFFFF;
            transition: border-color 0.15s ease, box-shadow 0.15s ease;
        }

        .field input::placeholder { color: #9AAAB1; }

        .field input:focus {
            outline: none;
            border-color: var(--teal);
            box-shadow: 0 0 0 3px rgba(43, 147, 168, 0.18);
        }

        .password-wrap { position: relative; }

        .password-wrap input { padding-right: 2.7rem; }

        .toggle-pw {
            position: absolute;
            right: 0.85rem;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: #8CA0A8;
            cursor: pointer;
            font-size: 0.95rem;
            padding: 0.2rem;
        }

        .toggle-pw:hover { color: var(--teal); }

        button.submit-btn {
            width: 100%;
            background: var(--navy);
            color: #FFFFFF;
            font-weight: 600;
            font-size: 0.98rem;
            padding: 0.85rem;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: background 0.15s ease;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            margin-top: 0.4rem;
        }

        button.submit-btn:hover { background: var(--navy-deep); }
        button.submit-btn:disabled { opacity: 0.75; cursor: default; }

        .spinner {
            width: 15px;
            height: 15px;
            border: 2px solid rgba(255,255,255,0.4);
            border-top-color: #FFFFFF;
            border-radius: 50%;
            animation: spin 0.7s linear infinite;
            display: none;
        }

        @keyframes spin { to { transform: rotate(360deg); } }

        .footnote {
            margin-top: 2rem;
            font-size: 0.78rem;
            color: #9AAAB1;
            text-align: left;
        }

        /* RIGHT PANEL */
        .panel-image {
            display: none;
            position: relative;
            flex: 1;
            overflow: hidden;
            background: var(--navy-deep);
        }

        @media (min-width: 1024px) {
            .panel-image { display: block; }
        }

        .panel-image .photo {
            position: absolute;
            inset: 0;
            background-image: url('img/bld.jpg');
            background-size: cover;
            background-position: center;
        }

        .panel-image .tint {
            position: absolute;
            inset: 0;
            background: linear-gradient(180deg, rgba(10,44,64,0.35) 0%, rgba(10,44,64,0.72) 100%);
        }

        .wave-seam {
            position: absolute;
            left: -1px;
            top: 0;
            height: 100%;
            width: 64px;
            z-index: 2;
        }

        .panel-caption {
            position: absolute;
            left: 3rem;
            bottom: 3rem;
            right: 3rem;
            z-index: 2;
            color: #FFFFFF;
        }

        .panel-caption .quote {
            font-family: 'Fraunces', serif;
            font-weight: 500;
            font-size: 1.5rem;
            line-height: 1.35;
            margin: 0 0 0.75rem 0;
            max-width: 420px;
        }

        .panel-caption .meta {
            font-size: 0.85rem;
            color: rgba(255,255,255,0.75);
        }
    </style>
</head>

<body>

    <div class="layout">

        <!-- LEFT: FORM -->
        <div class="panel-form">
            <div class="form-inner">

                <div class="brand-row">
                    <img src="img/lgnav.svg" alt="Calamba Water District logo">
                    <div class="brand-text">
                        Calamba Water District
                        <span>Upload Portal</span>
                    </div>
                </div>

                <h1 class="headline">Sign in to continue</h1>
                <div class="headline-underline"></div>
                <p class="subtext">Use your DistrictOne credentials to access the upload portal.</p>

                <?php if (isset($_SESSION['error'])): ?>
                    <div class="alert">
                        <i class="fa-solid fa-circle-exclamation"></i>
                        <span><?= htmlspecialchars($_SESSION['error']) ?></span>
                    </div>
                    <?php unset($_SESSION['error']); ?>
                <?php endif; ?>

                <form method="POST" id="loginForm">

                    <div class="field">
                        <label for="login">Username or email</label>
                        <input
                            type="text"
                            id="login"
                            name="login"
                            placeholder="e.g. juan.delacruz"
                            autocomplete="username"
                            required>
                    </div>

                    <div class="field">
                        <label for="password">Password</label>
                        <div class="password-wrap">
                            <input
                                type="password"
                                id="password"
                                name="password"
                                placeholder="••••••••"
                                autocomplete="current-password"
                                required>
                            <button type="button" class="toggle-pw" id="togglePw" aria-label="Show password">
                                <i class="fa-solid fa-eye" id="togglePwIcon"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="submit-btn" id="submitBtn">
                        <span class="spinner" id="submitSpinner"></span>
                        <span id="submitLabel">Sign in</span>
                    </button>

                </form>

                <p class="footnote">Having trouble signing in? Contact the IT/MIS office.</p>

            </div>
        </div>

        <!-- RIGHT: IMAGE -->
        <div class="panel-image">
            <div class="photo"></div>
            <div class="tint"></div>

            <svg class="wave-seam" viewBox="0 0 64 800" preserveAspectRatio="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M64,0 C24,80 84,160 40,240 C0,320 68,400 32,480 C4,550 72,620 36,700 C16,750 60,780 64,800 L0,800 L0,0 Z" fill="#FFFFFF"/>
            </svg>

            <!-- <div class="panel-caption">
                <p class="quote">Serving Calamba with reliable water, every day.</p>
                <p class="meta">Calamba Water District &middot; District Office Systems</p>
            </div> -->
        </div>

    </div>

    <script>
        const togglePw = document.getElementById('togglePw');
        const pwInput = document.getElementById('password');
        const togglePwIcon = document.getElementById('togglePwIcon');

        togglePw.addEventListener('click', () => {
            const isHidden = pwInput.type === 'password';
            pwInput.type = isHidden ? 'text' : 'password';
            togglePwIcon.classList.toggle('fa-eye');
            togglePwIcon.classList.toggle('fa-eye-slash');
            togglePw.setAttribute('aria-label', isHidden ? 'Hide password' : 'Show password');
        });

        const loginForm = document.getElementById('loginForm');
        const submitBtn = document.getElementById('submitBtn');
        const submitSpinner = document.getElementById('submitSpinner');
        const submitLabel = document.getElementById('submitLabel');

        loginForm.addEventListener('submit', () => {
            submitBtn.disabled = true;
            submitSpinner.style.display = 'inline-block';
            submitLabel.textContent = 'Signing in…';
        });

        if (new URLSearchParams(window.location.search).get('loggedout') === '1') {
            Swal.fire({
                icon: 'success',
                title: 'You have been signed out',
                toast: true,
                position: 'top-end',
                timer: 2500,
                timerProgressBar: true,
                showConfirmButton: false
            });

            const cleanUrl = window.location.pathname;
            window.history.replaceState({}, document.title, cleanUrl);
        }
    </script>

</body>

</html>