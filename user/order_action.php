<?php
include ('../settings/connection.php');

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data and sanitize inputs
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $customerName = mysqli_real_escape_string($con, $_POST['customerName']);
    $phoneno = mysqli_real_escape_string($con, $_POST['phoneno']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $fid = mysqli_real_escape_string($con, $_POST['fid']);

    // Insert into customer table
    $customerInsertQuery = "INSERT INTO customer (customerName, phoneno, email) 
                            VALUES ('$customerName', '$phoneno', '$email')";
    if(mysqli_query($con, $customerInsertQuery)) {
        // Get the last automatically generated ID
        $customerId = mysqli_insert_id($con);

        // Query to fetch the price of the selected food
        $priceQuery = "SELECT price FROM food WHERE fid = $fid";
        $priceResult = mysqli_query($con, $priceQuery);
        $priceData = mysqli_fetch_assoc($priceResult);
        $price = $priceData['price'];

        // Calculate total price
        $totalPrice = $qty * $price;

        // Get the current date
        $orderDate = date("Y-m-d");

        // Insert into orders table
        $orderInsertQuery = "INSERT INTO orders (food_id, customer_id, quantity, total, orderDate, delivery_address) 
                             VALUES ($fid, $customerId, $qty, $totalPrice, '$orderDate','$address')";
        if(mysqli_query($con, $orderInsertQuery)) { 
            ?>
            <script>
                alert("Order has been placed successfully. Our team will contact you soon!");
                window.location.href = "../index.php"; 
            </script>
            <?php
        } else {
            echo "Error inserting order: " . mysqli_error($con);
        }
    } else {
        echo "Error inserting customer: " . mysqli_error($con);
    }
} else {
    // If the confirmation parameter is not set, display an error message
    echo "Order confirmation not received.";
}
?>
