<?php
require_once("db_config.php"); // Include the database configuration file

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Retrieve data from the form
    $username = $_POST["username"];
    $password = $_POST["password"];
    $email = $_POST["email"]; // Retrieve the 'email' field

    // Check if the connection was successful (ensure $conn is a valid MySQLi connection)
    if ($conn) {
        // Prepare an SQL INSERT statement
        $sql = "INSERT INTO shop (username, password, email) VALUES (?, ?, ?)";
        // Include "email" in the list of columns and add more field placeholders as needed

        // Prepare the SQL statement
        $stmt = $conn->prepare($sql);

        if ($stmt) {
            // Bind parameters and execute the statement
            $stmt->bind_param("sss", $username, $password, $email);
            // Update "sss" based on the data types of your fields (s for string, i for integer, etc.)

            if ($stmt->execute()) {
                echo "Data inserted successfully!";
            } else {
                echo "Error: " . $stmt->error;
            }

            // Close the statement
            $stmt->close();
        } else {
            echo "Error: " . $conn->error;
        }
    } else {
        echo "Error: Database connection failed!";
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <button type="submit"><a href="login.html">Login</a></button>
</body>
</html>