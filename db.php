<!-- DATABASE CONNECTION FOR POSTING -->
<?php
$host = "localhost";
$db   = "cwd-web-test"; //db test only change if needed.
$user = "root";
$pass = "Cwdh2o@2025";
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
