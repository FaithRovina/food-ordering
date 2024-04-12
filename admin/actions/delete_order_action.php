<?php
include('../../settings/connection.php');

if(isset($_GET['order_id'])) {
    // Get the order ID from the URL parameter
    $order_id = $_GET['order_id'];

    // SQL to delete the order
    $sql = "DELETE FROM orders WHERE order_id = $order_id";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if($result) {
        // If successful, redirect to the manage orders page
        header("Location: ../manage_orders.php");
        exit(); 
    } else {
        // If the query failed, display an error message
        echo "Error: " . mysqli_error($con);
    }
} else {
    // If no order ID is provided, redirect to the manage orders page
    header("Location: ../manage_orders.php");
    exit(); 
}

