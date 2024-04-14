<?php
include('../../settings/connection.php');

// Check if adminid, old_password, new_password, and confirm_password are provided
if(isset($_POST['adminid'], $_POST['old_password'], $_POST['new_password'], $_POST['confirm_password'])) {
    $adminid = mysqli_real_escape_string($con, $_POST['adminid']); // Sanitize adminid
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Fetch hashed password from the database
    $sql = "SELECT password FROM admin WHERE adminid = $adminid";
    $res = mysqli_query($con, $sql);

    if($res) {
        $count = mysqli_num_rows($res);
        if($count == 1) {
            $row = mysqli_fetch_assoc($res);
            $hashed_password = $row['password'];

            // Check if the old password matches the stored hash
            if(password_verify($old_password, $hashed_password)) {
                // Check if the new password and confirm password match
                if($new_password === $confirm_password) {
                    // Hash the new password securely
                    $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                    // Update the password in the database
                    $update_sql = "UPDATE admin SET password = '$hashed_new_password' WHERE adminid = $adminid";
                    $update_res = mysqli_query($con, $update_sql);

                    if($update_res) {
                        // Password updated successfully, redirect to manage_admin.php
                        header('Location:../manage_admin.php');
                        exit();
                    } else {
                        // Failed to update password, redirect to change password page
                        header('Location:change_admin_password.php?adminid=' . $adminid);
                        exit();
                    }
                } else {
                    // New password and confirm password do not match, redirect to change password page
                    header('Location:change_admin_password.php?adminid=' . $adminid);
                    exit();
                }
            } else {
                // Old password doesn't match, redirect to change password page
                header('Location: change_admin_password.php?adminid=' . $adminid);
                exit();
            }
        } else {
            // Admin not found, redirect to manage_admin.php
            header('Location:../manage_admin.php');
            exit();
        }
    } else {
        // Error fetching admin details, redirect to manage_admin.php
        header('Location:../manage_admin.php');
        exit();
    }
} else {
    // Required fields not provided, redirect to change password page
    header('Location:change_admin_password.php');
    exit();
}
