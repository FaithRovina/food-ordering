<?php
 include ('partials\user_menu.php');
include ('settings/connection.php');

  
  // Check if the food ID is set
if(isset($_GET['fid'])) {
    // Sanitize and retrieve the food ID
    $fid = mysqli_real_escape_string($con, $_GET['fid']);

    // Query to fetch food details from the database based on the food ID
    $query = "SELECT fname, price, food_image FROM food WHERE fid = $fid";
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

            <form action="#" class="order">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                    <img src="images/<?php echo $food_image; ?>" alt="<?php echo $fname; ?>" class="img-responsive img-curve">
                </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $fname; ?></h3>
                        <p class="food-price"><?php echo $price; ?></p>

                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="E.g. Faith Rovina" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 2334xxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. faith@gmail.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-primary">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

  </body>
</html>
<?php
  include ('partials\footer.php');
  ?> 