<?php
// Include the database connection file
include_once('../../settings/connection.php');

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and validate form data
    $fullname = trim($_POST['fullname']);
    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // Validate input
    if (empty($fullname) || empty($username) || empty($password)) {
        die("Please fill in all fields.");
    }

    // Encrypt password (using bcrypt)
    $encrypted_password = password_hash($password, PASSWORD_BCRYPT);

    // Prepare and bind parameters
    $stmt = $con->prepare("INSERT INTO admin (fullname, username, password) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $fullname, $username, $encrypted_password);

    // Execute the statement
    if ($stmt->execute()) {
        header("Location: ../login/login_view.php");
        exit;
    } else {
        echo "Error: " . $stmt->error;
        // Redirect back to add_admin.php after 3 seconds
        header("refresh:3;url=add_admin.php");
    }
    }

