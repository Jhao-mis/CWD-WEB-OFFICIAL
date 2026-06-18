<?php
session_start();

/* =====================
   CLEAR SESSION DATA
===================== */
$_SESSION = [];

/* =====================
   DELETE SESSION COOKIE
===================== */
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();

    setcookie(
        session_name(),
        '',
        time() - 42000,
        $params['path'],
        $params['domain'],
        $params['secure'],
        $params['httponly']
    );
}

/* =====================
   DESTROY SESSION
===================== */
session_destroy();

/* =====================
   NO-CACHE HEADERS
===================== */
header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Pragma: no-cache");

/* =====================
   REDIRECT (FIXED)
===================== */
header("Location: login.php");
exit;