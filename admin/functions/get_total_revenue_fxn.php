<?php

// Function to get the total revenue
function getTotalRevenue() {
    global $con; 
    
    // SQL query to sum the total from the orders table
    $sql = "SELECT SUM(total) AS total_revenue FROM `orders`"; 

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        
        // Extract the total revenue
        $total_revenue = $row['total_revenue'];
        
        // Free the result set
        mysqli_free_result($result);
        
    

        return $total_revenue;
    } else {
        // Handle the case where the query fails
        echo "Error: " . mysqli_error($con);
        return 0; 
    }
}

