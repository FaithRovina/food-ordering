<?php
// Function to get the total number of food items
function getTotalFoods() {
    global $con; 
    
    // SQL query to count the number of rows in the food table
    $sql = "SELECT COUNT(*) AS total_foods FROM food";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        
        // Extract the total number of food items
        $total_foods = $row['total_foods'];
        
        // Free the result set
        mysqli_free_result($result);        
       
        return $total_foods;
    } else {
        // Handle the case where the query fails
        echo "Error: " . mysqli_error($con);
        return 0; 
    }
}

