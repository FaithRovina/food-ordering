<?php
session_start();

// Check if the 'username' session variable is set
if (!isset($_SESSION['username'])) {
    
   // User is not logged in
    echo "<script>alert('You are not logged in. Please login in to access Admin Panel!');</script>";
    // Redirect to the login page
    header("Location: " . SITEURL . "login_admin_view.php");
    exit();
}

