<?php
// Include your database connection file
include('../../settings/connection.php');

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if all required fields are filled
    if (isset($_POST['fullname']) && isset($_POST['username']) && isset($_POST['adminid'])) {
        // Sanitize input data
        $fullname = $_POST['fullname'];
        $username = $_POST['username'];
        $adminid = $_POST['adminid'];

        // Update admin query
        $sql = "UPDATE admin SET fullname = '$fullname', username = '$username' WHERE adminid = $adminid";

        // Execute the query
        $res = mysqli_query($con, $sql);

        // Check if update was successful
        if ($res) {
            // Redirect to manage_admin.php with success message
            header('location: http://localhost/food-ordering/admin/manage_admin.php?message=Admin updated successfully');
        } else {
            // Redirect to update_admin.php with error message
            header('location: admin/update_admin.php?adminid=' . $adminid . '&error=Failed to update admin');
        }
    } else {
        // Redirect to update_admin.php with error message
        header('location: admin/update_admin.php?adminid=' . $adminid . '&error=All fields are required');
    }
}
