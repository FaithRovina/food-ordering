<?php   

// Include database connection file
include('../../settings/connection.php');

    // Function to check if the entered password matches the stored hash
    function verifyPassword($password, $hashed_password) {
        return password_verify($password, $hashed_password);
    }

    // Check if submit button is clicked
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
        // Check if adminid, old_password, new_password, and confirm_password are provided
        if(isset($_POST['adminid'], $_POST['old_password'], $_POST['new_password'], $_POST['confirm_password'])) {
            $adminid = $_POST['adminid'];
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

                    // Verify if the old password matches the stored hash
                    if(verifyPassword($old_password, $hashed_password)) {
                        // Check if the new password and confirm password match
                        if($new_password === $confirm_password) {
                            // Hash the new password securely
                            $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

                            // Update the password in the database
                            $update_sql = "UPDATE admin SET password = '$hashed_new_password' WHERE adminid = $adminid";
                            $update_res = mysqli_query($con, $update_sql);

                            if($update_res) {
                                // Password updated successfully
                                $_SESSION['success'] = "Password updated successfully!";
                                echo json_encode(array("success" => "Password updated successfully!"));
                                exit();
                            } else {
                                // Failed to update password
                                $_SESSION['error'] = "Failed to update password. Please try again.";
                                echo json_encode(array("error" => "Failed to update password. Please try again."));
                                exit();
                            }
                        } else {
                            // New password and confirm password do not match
                            $_SESSION['error'] = "New password and confirm password do not match.";
                            echo json_encode(array("error" => "New password and confirm password do not match."));
                            exit();
                        }
                    } else {
                        // Old password doesn't match
                        $_SESSION['error'] = "Incorrect old password.";
                        echo json_encode(array("error" => "Incorrect old password."));
                        exit();
                    }
                } else {
                    // Admin not found
                    $_SESSION['error'] = "Admin not found.";
                    echo json_encode(array("error" => "Admin not found."));
                    exit();
                }
            } else {
                // Error fetching admin details
                $_SESSION['error'] = "Error fetching admin details.";
                echo json_encode(array("error" => "Error fetching admin details."));
                exit();
            }
        } else {
            // Required fields not provided
            $_SESSION['error'] = "All fields are required.";
            echo json_encode(array("error" => "All fields are required."));
            exit();
        }
    } else {
        // Form not submitted
        $_SESSION['error'] = "Form not submitted.";
        echo json_encode(array("error" => "Form not submitted."));
        exit();
    }
