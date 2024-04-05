<?php
// Destroy the session
session_destroy();

// Redirect to the landing page
header("Location:login_admin_view.php");
exit();
