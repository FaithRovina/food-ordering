<?php
// Include necessary files
include('../../settings/connection.php');


// Check if form is submitted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Retrieve form data
    $adminid = $_POST['adminid']; 
    $fullname = $_POST['fullname'];
    $username = $_POST['username'];

    // Update admin details in the database
    $sql = "UPDATE admin SET fullname = '$fullname', username = '$username' WHERE id = $adminid";

    if (mysqli_query($con, $sql)) {
        // Redirect to a success page or back to the update_admin.php page
        header("Location: ../update_admin.php?adminid=$adminid&success=true");
        exit();
    } else {
        // Handle error if the update query fails
        echo "Error updating record: " . mysqli_error($con);
    }
} else {
    // Redirect if the form is not submitted
    header("Location: ../update_admin.php?adminid=$adminid&error=not_submitted");
    exit();
}
?>
