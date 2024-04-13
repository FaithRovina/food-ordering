<?php
// Start the session
session_start();


unset($_SESSION['username']);


// Destroy the session
session_destroy();

// Expire the session cookie
setcookie(session_name(), '', time() - 3600, '/');

// Prevent caching
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");

// Redirect to the login page
header("Location:login_admin_view.php");
exit();

