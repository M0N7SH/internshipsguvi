<?php
// Include database connection file
include_once 'db_connect.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get input data from login form
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Prepare a SQL statement to select user with the provided email and password
    $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
    
    // Prepare the SQL statement
    $stmt = $conn->prepare($sql);

    // Bind parameters to the SQL statement
    $stmt->bind_param("ss", $email, $password);

    // Execute the SQL statement
    $stmt->execute();

    // Get result set
    $result = $stmt->get_result();

    // Check if there is a matching user
    if ($result->num_rows == 1) {
        // User found, redirect to profile page
        header("Location: fetch_profile.php");
        exit();
    } else {
        // No user found with provided credentials, redirect back to login page with error message
        header("Location: login.php?error=invalid_credentials");
        exit();
    }
}
?>
