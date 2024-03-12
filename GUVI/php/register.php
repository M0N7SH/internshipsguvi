<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Validate form data
    if (empty($name) || empty($email) || empty($password)) {
        echo "Please fill in all fields.";
        exit;
    }

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Your MySQL connection code here
    // For demonstration, assuming you have a MySQL connection
// Database configuration
    $dbHost = 'localhost'; // Hostname
    $dbUsername = 'monish'; // MySQL username
    $dbPassword = 'OECpsWYv'; // MySQL password
    $dbName = 'internshipmonish'; // Database name
    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare SQL statement to insert user data into database using prepared statement
    $sql = "INSERT INTO users (name, email, password) VALUES (?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("sss", $name, $email, $hashedPassword);

    // Execute prepared statement
    if ($stmt->execute()) {
        echo "Registration successful! You can now login.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Close prepared statement and database connection
    $stmt->close();
    $conn->close();
} else {
    // Handle invalid request method
    echo "Invalid request method.";
}
?>
