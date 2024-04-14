<?php
// Include database connection
include_once '../../settings/connection.php';

// Check if food ID is provided via GET parameter
if (isset($_GET['fid'])) {
    // Sanitize input to prevent SQL injection
    $fid = mysqli_real_escape_string($con, $_GET['fid']);

    // Prepare and bind the SQL statement
    $stmt = $con->prepare("DELETE FROM food WHERE fid = ?");
    $stmt->bind_param("i", $fid);

    // Execute the statement
    if ($stmt->execute()) {
        // Check if any rows were affected
        if ($stmt->affected_rows > 0) {
            // Food item deleted successfully
            header('Location:../manage_foods.php');
            exit(); // Exit to prevent further execution
        } else {
            // Food item with given ID not found
            echo "Food item with given ID not found";
        }
    } else {
        // Error deleting food item
        echo "Error deleting food item: " . $stmt->error;
    }

    // Close statement
    $stmt->close();
} else {
    // Food ID not provided
    echo "Food ID not provided";
}

