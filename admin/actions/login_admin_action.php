<?php
session_start();
include('../../settings/connection.php');
include('../../settings/constants.php');


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validate input fields (You can add more validation if needed)
    if (empty($username) || empty($password)) {
        echo "<script>alert('Please enter username and password.');</script>";
    } else {
        // Query the database to check if the provided username exists
        $query = "SELECT * FROM admin WHERE username = '$username'";
        $result = mysqli_query($con, $query);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);
            // Verify the password
            if (password_verify($password, $row['password'])) {
                // Authentication successful
                // Start session and store user information
                $_SESSION['username'] = $username;                
                echo "<script>alert('Welcome, $username!');</script>";
                echo "<script>window.location.href='" . SITEURL . "admin_dashboard.php';</script>";
                exit();
            } else {
                // Incorrect password
                echo "<script>alert('Invalid password!');</script>";
                echo "<script>window.location.href='" . SITEURL . "login/login_admin_view.php';</script>";
                exit();
            }
        } else {
            // No user found with provided username
            echo "<script>alert('No user found with provided username.');</script>";
            echo "<script>window.location.href='" . SITEURL . "login/login_admin_view.php';</script>";
            exit();
        }
    }
}

