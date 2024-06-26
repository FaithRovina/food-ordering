<?php
// Include your database connection file
include('../../settings/connection.php');
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Sanitize input data
    $title = isset($_POST['title']) ? $_POST['title'] : '';
    $featured = isset($_POST['featured']) ? $_POST['featured'] : '';
    $active = isset($_POST['active']) ? $_POST['active'] : '';
    // Retrieve the category ID
    $catid = isset($_POST['catid']) ? $_POST['catid'] : '';

    // File upload handling
    if(isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $file_name = $_FILES['image']['name'];
        $file_tmp = $_FILES['image']['tmp_name'];
        $file_type = $_FILES['image']['type'];
        $file_error = $_FILES['image']['error'];
        
        // Set the upload directory path
        $upload_dir = '../../uploads/';

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
            // Update category query including the image
            $sql = "UPDATE category SET title = '$title', catimage = '$file_name', featured = '$featured', active = '$active' WHERE catid = $catid";

            // Execute the query
            $res = mysqli_query($con, $sql);

            // Check if update was successful
            if ($res) {
                // Redirect to manage_categories.php with success message
                header('location: ../manage_categories.php?message=Category updated successfully');
                exit();
            } else {
                // Redirect to update_category.php with error message
                header('location: admin/update_category.php?catid=' . $catid . '&error=Failed to update category');
                exit();
            }
        } else {
            echo "Error moving uploaded file.";
            exit();
        }
    } else {
        // Update category query excluding the image
        $sql = "UPDATE category SET title = '$title', featured = '$featured', active = '$active' WHERE catid = $catid";

        // Execute the query
        $res = mysqli_query($con, $sql);

        // Check if update was successful
        if ($res) {
            // Redirect to manage_categories.php with success message
            header('location: ../manage_categories.php?message=Category updated successfully');
            exit();
        } else {
            // Redirect to update_category.php with error message
            header('location: admin/update_category.php?catid=' . $catid . '&error=Failed to update category');
            exit();
        }
    }
}
?>
