<?php
session_start();

// Check if the user is logged in
if (isset($_SESSION['username'])) {
    // Unset the username key from the session, effectively logging the user out
    unset($_SESSION['username']);

    // Optionally, you can destroy the entire session if needed
    // session_destroy();

    // Redirect to the login page or any other desired page after logout
    header("Location: login.html");
    exit();
} else {
    // If the user is not logged in, you can redirect them to the login page or an error page
    header("Location: login.html");
    exit();
}
?>
