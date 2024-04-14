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
    
    // File upload handling
    if(isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_error = $_FILES['image']['error'];
        
        // Set the upload directory path
        $upload_dir = '../../food-ordering/uploads/';

        // Check if the file already exists
        $i = 0;
        $original_name = $file_name;
        while (file_exists($upload_dir . $file_name)) {
            $i++;
            $file_name = pathinfo($original_name, PATHINFO_FILENAME) . $i . '.' . pathinfo($original_name, PATHINFO_EXTENSION);
        }

        // Move uploaded file to desired location
        $destination = $upload_dir . $file_name;
        if(move_uploaded_file($file_tmp, $destination)) {
            // File uploaded successfully, proceed to insert data into the database
            $sql = "INSERT INTO category (title, catimage, featured, active) VALUES ('$title', '$file_name', '$featured', '$active')";
            
            // Execute the query
            if (mysqli_query($con, $sql)) {
                // Category added successfully
                header("Location:../manage_categories.php");
                exit();
            } else {
                // Error handling if insertion fails
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        } else {
            echo "Error moving uploaded file.";
        }
    } else {
        echo "Image file not found.";
    }
    
    // Close the database connection
    mysqli_close($con);
}

