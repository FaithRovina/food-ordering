<?php

// Function to get the total number of orders
function getTotalOrders() {
    global $con; // Assuming $con is your database connection variable
    
    // SQL query to count the number of rows in the order table
   
    $sql = "SELECT COUNT(*) AS total_orders FROM `orders` WHERE status_id = 3 "; 
    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        
        // Extract the total number of orders
        $total_orders = $row['total_orders'];
        
        // Free the result set
        mysqli_free_result($result);        
        
        return $total_orders;
    } else {
        // Handle the case where the query fails
        echo "Error: " . mysqli_error($con);
        return 0; 
    }
}