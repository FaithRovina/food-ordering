<?php
// Function to get the total number of categories
function getTotalCategories() {
    global $con; 
    
    // SQL query to count the number of rows in the category table
    $sql = "SELECT COUNT(*) AS total_categories FROM category";

    // Execute the query
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result) {
        // Fetch the result as an associative array
        $row = mysqli_fetch_assoc($result);
        
        // Extract the total number of categories
        $total_categories = $row['total_categories'];        
        mysqli_free_result($result);        
      
        return $total_categories;
    } else {
        // Handle the case where the query fails
        echo "Error: " . mysqli_error($con);
        return 0; 
    }
}