<?php
// Include your database connection file
include('../../settings/connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['title']) && isset($_POST['active']) && isset($_POST['featured']) && isset($_POST['catid'])) {
        // Sanitize input data
        $title = $_POST['title'];
        $featured = $_POST['featured'];
        $active = $_POST['active'];
        // Retrieve the category ID
        $catid = $_POST['catid'];

        // Update category query
        $sql = "UPDATE category SET title = '$title', featured = '$featured', active = '$active' WHERE catid = $catid";

        // Execute the query
        $res = mysqli_query($con, $sql);

        // Check if update was successful
        if ($res) {
            // Redirect to manage_categories.php with success message
            header('location: http://localhost/food-ordering/admin/manage_categories.php?message=Category updated successfully');
        } else {
            // Redirect to update_category.php with error message
            header('location: admin/update_category.php?catid=' . $catid . '&error=Failed to update category');
        }
    } else {
        // Redirect to update_category.php with error message
        header('location: admin/update_category.php?catid=' . $catid . '&error=All fields are required');
    }
}
?>
