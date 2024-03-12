<?php
// Include database connection file
include_once 'db_connect.php';

// Start session to get user ID from session storage
session_start();

// Check if user ID is set in session
if(isset($_SESSION['user_id'])) {
    // Get user ID from session
    $userId = $_SESSION['user_id'];

    // Prepare SQL statement to fetch user profile data
    $sql = "SELECT name, email FROM users WHERE id = ?";

    // Prepare a statement and bind parameters
    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $userId);

    // Execute the prepared statement
    $stmt->execute();

    // Bind result variables
    $stmt->bind_result($name, $email);

    // Fetch user profile data
    $stmt->fetch();

    // Close statement
    $stmt->close();

    // Create an array to store profile data
    $profileData = array(
        'name' => $name,
        'email' => $email
        // Add additional profile data here if needed
    );

    // Return profile data as JSON response
    echo json_encode($profileData);
} else {
    // Return error message if user ID is not set in session
    echo json_encode(array('error' => 'User ID not found in session'));
}
?>
