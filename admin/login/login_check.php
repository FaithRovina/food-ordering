<?php
session_start();
include('../../settings/connection.php');
include('../../settings/constants.php');


// Check if the 'username' session variable is set
if (!isset($_SESSION['username'])) {
    
   echo "<script>alert('You are not logged in. Please login to access Admin Panel!');</script>";
   echo "<script>window.location.href='" . SITEURL . "admin/login/login_admin_view.php';</script>";
    exit();
}


