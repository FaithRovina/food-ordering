<?php

// Include database connection
include_once '../../settings/connection.php';

// Check if admin ID is provided via GET parameter
if (isset($_GET['catid'])) {
    // Sanitize input to prevent SQL injection
    $catid = mysqli_real_escape_string($con, $_GET['catid']);

    // Prepare and bind the SQL statement
    $stmt = $con->prepare("DELETE FROM category WHERE catid = ?");
    $stmt->bind_param("i", $catid);

    // Execute the statement
    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            // Category deleted successfully
            header('Location:../manage_categories.php');
        } else {
            // Category with given ID not found
            echo "Category with given ID not found";
        }
    } else {
        // Error deleting category
        echo "Error deleting category: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    // Category ID not provided
    echo "Category ID not provided";
}


