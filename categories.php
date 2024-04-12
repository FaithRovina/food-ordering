<?php
include('partials/user_menu.php');
include('settings/connection.php');
?>
    <!-- Categories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

                <?php
            // Query to fetch categories from the category table
            $sql = "SELECT title, catimage FROM category WHERE active='yes' AND featured ='yes' LIMIT 3";
            $result = mysqli_query($con, $sql);

            // Check if the query was successful
            if ($result) {
            // Loop through the fetched categories and display them
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="category-foods.php">';
                echo '<div class="box-3 float-container">';
                echo '<img src="images/' . $row['catimage'] . '" alt="' . $row['title'] . '" class="img-responsive img-curve">';
                echo '<h3 class="float-text text-white">' . $row['title'] . '</h3>';
                echo '</div>';
                echo '</a>';
            }
        } else {
            echo "Error fetching categories: " . mysqli_error($con);
        }
        ?>
        
        <div class="clearfix"></div>

        </div>
    </section>
    <!-- Categories Section Ends Here -->

<!-- Food Menu-->
<section class="food-menu">
    <div class="container">
        <h2 class="text-center">Food Menu</h2>

        <?php
        // Query to fetch food name, description, price, and image from the food table
        $sql = "SELECT fname, description, price,fid, food_image FROM food WHERE active='yes' LIMIT 6";
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


<?php
include('partials\footer.php');
?>
