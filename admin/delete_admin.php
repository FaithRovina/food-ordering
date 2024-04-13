<?php

// Include database connection
include_once '../settings/connection.php';

// Check if admin ID is provided via GET parameter
if (isset($_GET['adminid'])) {
    // Sanitize input to prevent SQL injection
    $adminid = mysqli_real_escape_string($con, $_GET['adminid']);

    // Prepare and bind the SQL statement
    $stmt = $con->prepare("DELETE FROM admin WHERE adminid = ?");
    $stmt->bind_param("i", $adminid);

    // Execute the statement
    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            // Admin deleted successfully
            header("Location: ". SITEURL. "manage_admin.php");
        } else {
            // Admin with given ID not found
            echo "Admin with given ID not found";
        }
    } else {
        // Error deleting admin
        echo "Error deleting admin: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    // Admin ID not provided
    echo "Admin ID not provided";
}


