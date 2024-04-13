<?php
include('../partials/user_menu.php');
include('../settings/connection.php');
?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<!-- Food Search -->
   <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.php" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
<!-- Food Menu-->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        // Query to fetch food name, description, price, and image from the food table
        $sql = "SELECT fname, description, price, fid,  food_image FROM food WHERE active='yes'";
        $result2 = mysqli_query($con, $sql);

        // Check if the query was successful
        if ($result2) {
            // Store fetched food items in an array
            $food_items = mysqli_fetch_all($result2, MYSQLI_ASSOC);

            // Loop through the array and display the items
            $counter = 0;
            foreach ($food_items as $item) {
                if ($counter % 2 == 0) {
                    // Start a new row
                    echo '<div class="food-menu-row">';
                }
                
                echo '<div class="food-menu-box">';
                echo '<div class="food-menu-img">';
                echo '<img src="../images/' . $item['food_image'] . '" alt="' . $item['fname'] . '" class="img-responsive img-curve">';
                echo '</div>';
                echo '<div class="food-menu-desc">';
                echo '<h4>' . $item['fname'] . '</h4>';
                echo '<p class="food-price">$' . $item['price'] . '</p>';
                echo '<p class="food-detail">' . $item['description'] . '</p>';
                echo '<br>';
                echo '<a href="order.php?fid=' . $item['fid'] . '" class="btn btn-primary">Order Now</a>';
                echo '</div>';
                echo '</div>';

                if ($counter % 2 != 0 || $counter == count($food_items) - 1) {
                    // End the row
                    echo '</div>';
                }
                
                // Increment counter
                $counter++;
            }
        } else {
            echo "Error fetching food items: " . mysqli_error($con);
        }
        ?>

        <div class="clearfix"></div>

    </div>
    
</section>
   
</body>
</html>
<?php
include('../partials/footer.php');
?>
