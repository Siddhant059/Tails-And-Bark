<?php
// Include your database connection and necessary functions here

// Example database connection using PDO
$hostname = "localhost";
$username = "root";
$password = "siddhant123";
$database = "pet"; // Use "pet" as your database name

try {
    $pdo = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
    // Set PDO attributes as needed
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Database connection failed: " . $e->getMessage());
}

// Function to check reset token in the "shop" table and return user information
function check_reset_token($token) {
    global $pdo;
    $sql = "SELECT email FROM shop WHERE token = :token";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(":token", $token);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

// Placeholder for the actual token value (should come from your URL parameter)
$token = ""; // Set the actual token value

// Placeholder for the actual user email (should come from your database query)
$userEmail = ""; // Set the actual user email

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Placeholder for the actual password reset logic
    // ...

    // Example: Redirect to a success page
    header("Location: reset_password_success.php");
    exit();
}

// Placeholder for the actual reset password link with the token
$reset_password_link = "http://example.com/reset_password.php?token=" . urlencode($token);

// Placeholder for the actual email content
$subject = "Password Reset";
$message = "To reset your password, click the following link:\n\n";
$message .= $reset_password_link;

// Placeholder for the actual email sending logic
$mailSent = mail($userEmail, $subject, $message);

if ($mailSent) {
    // Email sent successfully
    echo "Password reset instructions sent to your email.";
} else {
    // Error sending email
    echo "Error sending password reset instructions.";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
</head>
<body>
    <h1>Reset Password</h1>
    <?php if (isset($_GET["token"]) && !empty($_GET["token"])): ?>
        <p>Enter your new password below:</p>
        <!-- Add the form for resetting the password here -->
    <?php else: ?>
        <p>Invalid token.</p>
    <?php endif; ?>
</body>
</html>
