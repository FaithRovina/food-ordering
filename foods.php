<?php
include('partials\user_menu.php');
include('settings\connection.php');
?>
   <!-- fOOD sEARCH Section Starts Here -->
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
        $sql = "SELECT fname, description, price, fid,  food_image FROM food WHERE active='yes' LIMIT 6";
        $result2 = mysqli_query($con, $sql);

        // Check if the query was successful
        if ($result2) {
            // Loop through the fetched food items and display them
            while ($row = mysqli_fetch_assoc($result2)) {
                echo '<div class="food-menu-box">';
                echo '<div class="food-menu-img">';
                echo '<img src="images/' . $row['food_image'] . '" alt="' . $row['fname'] . '" class="img-responsive img-curve">';
                echo '</div>';
                echo '<div class="food-menu-desc">';
                echo '<h4>' . $row['fname'] . '</h4>';
                echo '<p class="food-price">$' . $row['price'] . '</p>';
                echo '<p class="food-detail">' . $row['description'] . '</p>';
                echo '<br>';
                echo '<a href="order.php?fid=' . $row['fid'] . '" class="btn btn-primary">Order Now</a>';
                echo '</div>';
                echo '</div>';
            }
        } else {
            echo "Error fetching food items: " . mysqli_error($con);
        }
        ?>

        <div class="clearfix"></div>

    </div>
    
    <p class="text-center">
        <a href="#">See All Foods</a>
    </p>
</section>
   
</body>
</html>
<?php
include('partials\footer.php');
?>