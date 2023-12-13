<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve and sanitize form data
    $name = filter_var($_POST["name"], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST["email"], FILTER_SANITIZE_EMAIL);
    $message = filter_var($_POST["message"], FILTER_SANITIZE_STRING);

    // Validate email address
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        header("Location: contact.php?status=error");
        exit();
    }

    $to = "your-email@example.com";

    $subject = "New Contact Form Submission";

    $headers = "From: $email";

    $mailBody = "Name: $name\n";
    $mailBody .= "Email: $email\n";
    $mailBody .= "Message:\n$message";

    if (mail($to, $subject, $mailBody, $headers)) {
        header("Location: contact.php?status=success");
        exit();
    } else {
        header("Location: contact.php?status=error");
        exit();
    }
} else {
    header("Location: contact.php");
    exit();
}
?>
