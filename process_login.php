<?php
require_once("db_configlogin.php");

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve user input
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    // Prepare an SQL query to retrieve the username and password from the "shop" table
    $sql = "SELECT username, password FROM shop WHERE username = :username AND password = :password";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":password", $password);
    $stmt->execute();
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Check if a user was found
    if ($user) {
        // Password is correct, authentication successful
        header("Location: index.php");
        exit();
    } else {
        // Password is incorrect, redirect back to the login page with an error message
        header("Location: login.html?error=1");
        exit();
    }
} else {
    // If the form was not submitted via POST, redirect back to the login page
    header("Location: login.html");
    exit();
}
?>
