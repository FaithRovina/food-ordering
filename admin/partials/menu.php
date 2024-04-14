<?php
include('../settings/connection.php');
include('../settings/constants.php');
include('login/login_check.php');

  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../../css/admin_index.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title> FarmtoFork Kenya </title>
</head>
<body>
   <div class="menu" text-center>
        <div class="wrapper">
            <ul>

                <li><a href="admin_dashboard.php">Home</a></li>
                <li><a href="manage_admin.php">Admin</a></li>
                <li><a href="manage_categories.php">Category</a></li>
                <li><a href="manage_foods.php">Foods</a></li>
                <li><a href="manage_orders.php">Order</a></li>
                <li><a href="login/logout_admin_view.php"> <i class="fa fa-sign-out" aria-hidden="true"></i> </a></li>
            </ul>
        </div>
    </div>