<?php
include_once('../../settings/connection.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fname = $_POST['fname'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
    $category_id = $_POST['category_id'];

    // File upload handling
    if(isset($_FILES['image'])) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_error = $_FILES['image']['error'];
        
        // Set the upload directory path
        $upload_dir = '../images';

        // If file already exists, rename it with a unique name
        $i = 0;
        $original_name = $file_name;
        while (file_exists($upload_dir . $file_name)) {
            $i++;
            $file_name = pathinfo($original_name, PATHINFO_FILENAME) . $i . '.' . pathinfo($original_name, PATHINFO_EXTENSION);
        }

        // Move uploaded file to desired location
        $destination = $upload_dir . $file_name;
        if(move_uploaded_file($file_tmp, $destination)) {
            // Insert food details into the food table
            $sql = "INSERT INTO food (fname, description, price, featured, active, category_id, food_image) 
                    VALUES ('$fname', '$description', '$price', '$featured', '$active', '$category_id', '$file_name')";

            // Execute the query
            if (mysqli_query($con, $sql)) {
                // Food added successfully
                header("Location:http://localhost/food-ordering/admin/manage_foods.php");
                exit();
            } else {
                // Error handling if insertion fails
                echo "Error: " . $sql . "<br>" . mysqli_error($con);
            }
        } else {
            echo "Error moving uploaded file.";
            exit();
        }
    } else {
        echo "Image file not found.";
        exit();
    }
} else {
    echo "Invalid request method.";
    exit();
}
?>
