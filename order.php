<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Order Form</title>    
</head>
<body>
<?php include ('partials\user_menu.php');
include ('settings/connection.php');

// Check if the food ID is set
if(isset($_GET['fid'])) {
    // Sanitize and retrieve the food ID
    $fid = mysqli_real_escape_string($con, $_GET['fid']);
    // Query to fetch food details from the database based on the food ID
    $query = "SELECT fname, price,fid, food_image FROM food WHERE fid = $fid";
    $result = mysqli_query($con, $query);
    // Check if the query was successful and if the food exists
    if($result && mysqli_num_rows($result) > 0) {
        $foodDetails = mysqli_fetch_assoc($result);
        $fname = $foodDetails['fname'];
        $food_image = $foodDetails['food_image'];
        $price = $foodDetails['price'];
    } else {
        // Food not found, redirect or display error message
        echo "Food not found.";
        exit; // Stop further execution
    }
} else {
    // Food ID not set, redirect or display error message
    echo "Food ID not provided.";
    exit; // Stop further execution
}
?>  
<section class="food-search">
    <div class="container">
        <h2 class="text-center text-white">Fill this form to confirm your order.</h2>
        <form name="orderForm" action="order_action.php" method= "post" class="order" onsubmit="return validateForm()">
            <fieldset>
                <legend>Selected Food</legend>
                <div class="food-menu-img">
                    <img src="images/<?php echo $food_image; ?>" alt="<?php echo $fname; ?>" class="img-responsive img-curve">
                </div>
                <div class="food-menu-desc">
                    <h3><?php echo $fname; ?></h3>
                    <p class="food-price"><?php echo $price; ?></p>
                    <div class="order-label">Quantity</div>
                    <input type="number" id="qty" name="qty" class="input-responsive" value="1" required>
                </div>
            </fieldset>
            <fieldset>
                <legend>Delivery Details</legend>
                <div class="order-label">Full Name</div>
                <input type="text" id="customerName" name="customerName" placeholder="E.g. Faith Rovina" class="input-responsive" required>
                <div class="order-label">Phone Number</div>
                <input type="tel" id="phoneno" name="phoneno" placeholder="E.g. +1234567890" class="input-responsive" required>
                <div class="order-label">Email</div>
                <input type="email" id="email" name="email" placeholder="E.g. faith@gmail.com" class="input-responsive" required>
                <div class="order-label">Table Number</div>
                <input type="text" id="tableNumber" name="tableNumber" placeholder="E.g. Table 5" class="input-responsive" required>

                <input type="hidden" name="fid" value="<?php echo $fid; ?>">
                <input type="hidden" id="orderDateTime" name="orderDateTime">
                <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
            </fieldset>
        </form>
    </div>
</section>

<script>
    function validateForm() {
        var qty = document.getElementById("qty").value;
        var customerName = document.getElementById("customerName").value;
        var phoneno = document.getElementById("phoneno").value;
        var email = document.getElementById("email").value;
        var tableNumber = document.getElementById("tableNumber").value;

        // Set order date and time
        var currentTime = new Date();
        var orderDateTime = currentTime.toISOString(); // Getting date and time in ISO format
        document.getElementById("orderDateTime").value = orderDateTime;

        // Validate Quantity
        if (qty < 1) {
            alert("Please enter a valid quantity.");
            return false;
        }

        // Validate Full Name
        if (customerName.trim() === "") {
            alert("Please enter your full name.");
            return false;
        }

        // Validate Phone Number
        var phonenoRegex = /^[+0-9() -]{10,20}$/;
        if (!phonenoRegex.test(phoneno)) {
            alert("Phone number should be between 10 and 20 characters and can only contain digits, spaces, and the plus symbol (+), and dashes (-).");
            return false;
        }

        // Validate Email Address
        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(email)) {
            alert("Invalid email address.");
            return false;
        }

        // Validate Table Number
        if (tableNumber.trim() === "") {
            alert("Please enter the table number.");
            return false;
        }

        return confirm("Confirm Order Details:\n" + 
                       "Food Name: <?php echo $fname; ?>\n" +
                       "Quantity: " + qty + "\n" +
                       "Customer Name: " + customerName + "\n" +
                       "Phone Number: " + phoneno + "\n" +
                       "Email: " + email + "\n" +
                       "Table Number: " + tableNumber + "\n" +
                       "Proceed with order?");
    }
</script>

<?php include ('partials\footer.php'); ?>
</body>
</html>
