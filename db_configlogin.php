<?php
$host = "localhost";
$dbname = "pet";
$username = "root";
$password = "siddhant123";

try {
    $pdo = new PDO("mysql:host=localhost; dbname=pet", $username, $password);
    // Set PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
    die();
}
?>
