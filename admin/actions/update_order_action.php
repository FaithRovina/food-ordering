<?php
include_once '../../settings/connection.php';

if(isset($_POST['submit'])){
    // Collect form data
    $order_id = $_POST['order_id'];
    $food_id = $_POST['food_id'];
    $quantity = $_POST['quantity'];
    $tableNumber = $_POST['tableNumber'];
    $status_id = $_POST['status'];

    // Retrieve the price of the selected food from the database
    $sql_food_price = "SELECT price FROM food WHERE fid = '$food_id'";
    $result_food_price = mysqli_query($con, $sql_food_price);
    if($result_food_price && mysqli_num_rows($result_food_price) > 0) {
        $row_food_price = mysqli_fetch_assoc($result_food_price);
        $food_price = $row_food_price['price'];

        // Calculate the total price based on the quantity and price of the food
        $total = $quantity * $food_price;

        // Update order query with the calculated total price
        $sql = "UPDATE orders SET food_id = '$food_id', quantity = '$quantity', total = '$total', tableNumber = '$tableNumber', status_id = '$status_id' WHERE order_id = '$order_id'";

        // Execute query
        $result = mysqli_query($con, $sql);

        // Check if query executed successfully
        if($result){
            // If update successful, redirect to manage orders page
            header("Location:../manage_orders.php");
        } else {
            // If update failed, display error message
            echo "Failed to update order. Please try again.";
        }
    } else {
        // If unable to retrieve food price, display error message
        echo "Failed to retrieve food price. Please try again.";
    }
}

