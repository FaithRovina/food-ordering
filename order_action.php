<?php
include ('settings/connection.php');



// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Retrieve form data and sanitize inputs
    $qty = mysqli_real_escape_string($con, $_POST['qty']);
    $fullName = mysqli_real_escape_string($con, $_POST['full-name']);
    $contact = mysqli_real_escape_string($con, $_POST['contact']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    
    // Validate form data
    $errors = [];

    // Validate full name
    if(empty($fullName)) {
        $errors[] = "Full name is required.";
    }

    // Validate phone number
    if(strlen($contact) < 10 || strlen($contact) > 20) {
        $errors[] = "Phone number should be between 10 and 20 characters.";
    }

    // Validate email address
    if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors[] = "Invalid email address.";
    }

    // Validate address
    if(empty($address)) {
        $errors[] = "Address is required.";
    }

    // Display errors if any
    if(!empty($errors)) {
        foreach($errors as $error) {
            echo "<p>$error</p>";
        }
    } else {
        // If no errors, process the order (e.g., insert into database)
        // For demonstration purposes, let's just display the order details
        echo "<h2>Order Summary</h2>";
        echo "<p>Food Name: $foodName</p>";
        echo "<p>Quantity: $qty</p>";
        echo "<p>Full Name: $fullName</p>";
        echo "<p>Contact: $contact</p>";
        echo "<p>Email: $email</p>";
        echo "<p>Address: $address</p>";
    }
}
?>
