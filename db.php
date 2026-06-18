<!-- USE THIS FOR LOCAL SERVER -->
<?php
$host = "localhost";
$db   = "cwd-web-test"; //db test only change if needed.
$user = "root";
$pass = "";
$charset = "utf8mb4";

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";

try {
    $conn = new PDO($dsn, $user, $pass, [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
    ]);
} catch (PDOException $e) {
    die("Database connection failed");
}
?>



<!-- USE THIS FOR WEB SERVER -->
<?php

// $host = "110.34.166.196";
// $db   = "cwdcomph_cwd_web";
// $user = "cwdcomph";
// $pass = "C@l4mB@cc3ss2026!!";
// $charset = "utf8mb4";

// $dsn = "mysql:host=$host;dbname=$db;charset=$charset";

// try {
//     $conn = new PDO($dsn, $user, $pass, [
//         PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
//         PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
//     ]);
// } catch (PDOException $e) {
//     // DO NOT output errors in production
//     error_log($e->getMessage());
//     die("Database connection failed");
// }

?>
