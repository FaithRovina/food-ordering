<?php
include_once('../../settings/connection.php');
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $title = $_POST['title'];
    // Check if featured is set, if not set default to "no"
    $featured = isset($_POST['featured']) ? $_POST['featured'] : 'no';
    // Check if active is set, if not set default to "no"
    $active = isset($_POST['active']) ? $_POST['active'] : 'no';
    
    // SQL query to insert data into the category table
    $sql = "INSERT INTO category (title, featured, active) VALUES ('$title', '$featured', '$active')";
    
    // Execute the query
    if (mysqli_query($con, $sql)) {
        // Category added successfully
        header("Location:../manage_categories.php");
        exit();
    } else {
        // Error handling if insertion fails
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
    }
    
    // Close the database connection
    mysqli_close($con);
}
?>
