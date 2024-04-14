<?php

// Function to get the total number of orders
function getProcessingOrders() {
    global $con; // Assuming $con is your database connection variable
    
    // SQL query to count the number of rows in the order table
   
    $sql = "SELECT COUNT(*) AS processing_orders FROM `orders` WHERE status_id = 2 "; 
    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        
        // Extract the total number of orders
        $processing_orders = $row['processing_orders'];
        
        // Free the result set
        mysqli_free_result($result);        
        
        return $processing_orders;
    } else {
        // Handle the case where the query fails
        echo "Error: " . mysqli_error($con);
        return 0; 
    }
}

