<?php
include('partials\user_menu.php');
include('settings\connection.php');
?>

<!-- fOOD sEARCH Section Starts Here -->
<section class="food-search text-center">
    <div class="container">
        <h2 class="search-results">
            Search Results for "<?php echo isset($_POST['search']) ? $_POST['search'] : ''; ?>"
        </h2>
    </div>
</section>

<?php

// Check if the form is submitted
if(isset($_POST['submit'])) {
    // Sanitize and store the search keyword
    $search = mysqli_real_escape_string($con, $_POST['search']);

    // Query to search for the keyword in the food table
    $sql = "SELECT fname, description, price,fid, food_image FROM food WHERE active='yes' AND (fname LIKE '%$search%' OR description LIKE '%$search%')";
    $result = mysqli_query($con, $sql);

    // Check if any results are found
    if(mysqli_num_rows($result) > 0) {
        // Output the search results
        echo '<section class="food-menu">';
        echo '<div class="container">';
        echo '<h2 class="text-center">Food Menu</h2>';
        while($row = mysqli_fetch_assoc($result)) {
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
        echo '</div>';
        echo '</section>';
    } else {
        // No results found
        echo 'No results found.';
    }
}
?>

    <div class="clearfix"></div>

    </div>
    
    </section>

</body>
</html>
<?php
include('partials\footer.php');
?>
