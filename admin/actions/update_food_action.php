<?php
// Include database connection
include_once '../../settings/connection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $fid = $_POST['fid'];
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $description = mysqli_real_escape_string($con, $_POST['description']);
    $price = $_POST['price'];
    $category_id = $_POST['category_id'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];

    // Set the path to the "uploads" directory
    $upload_dir = '../../uploads/';

    // Check if the "uploads" directory exists, if not, create it
    if (!file_exists($upload_dir)) {
        if (!mkdir($upload_dir, 0777, true)) {
            echo "Failed to create directory.";
            exit();
        }
    }

    // File upload handling
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_error = $_FILES['image']['error'];

        // Move uploaded file to desired location
        $destination = $upload_dir . $file_name;
        if (move_uploaded_file($file_tmp, $destination)) {
            // Update food details with new image
            $sql = "UPDATE food SET fname = '$fname', description = '$description', price = '$price', category_id = '$category_id', featured = '$featured', active = '$active', food_image = '$file_name' WHERE fid = '$fid'";
        } else {
            echo "Error moving uploaded file.";
            exit();
        }
    } else {
        // Update food details without changing the image
        $sql = "UPDATE food SET fname = '$fname', description = '$description', price = '$price', category_id = '$category_id', featured = '$featured', active = '$active' WHERE fid = '$fid'";
    }

    // Execute the query
    if (mysqli_query($con, $sql)) {
        // Food updated successfully
        header("Location:../manage_foods.php");
        exit();
    } else {
        // Error handling if update fails
        echo "Error updating food: " . mysqli_error($con);
    }
} else {
    echo "Invalid request method.";
    exit();
}
?>
