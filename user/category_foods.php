<?php
include('../partials/user_menu.php');
include('../settings/connection.php');
?>
<link rel="stylesheet" type="text/css" href="../css/style.css">
<?php

// Check if the category_id is set
if (isset($_GET['catid'])) {
    $catid = $_GET['catid'];
    
    // Query to get the category title
    $sql = "SELECT title FROM category WHERE catid = $catid";
    $result = mysqli_query($con, $sql);

    // Check if the query was successful
    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $category_title = $row['title'];

        // Display the category title
        echo '<section class="food-search text-center">';
        echo '<div class="container">';
        echo '<h2 class="search-results">Foods in ' . $category_title . '</h2>';
        echo '</div>';
        echo '</section>';

        // Query to get the foods available in the selected category
        $sql_foods = "SELECT fname, description,fid, price, food_image FROM food WHERE active='yes' AND category_id = $catid";
        $result_foods = mysqli_query($con, $sql_foods);

        // Check if any results are found
        if ($result_foods && mysqli_num_rows($result_foods) > 0) {
            echo '<section class="food-menu">';
            echo '<div class="container">';
            echo '<div class="row">';
            while ($row_food = mysqli_fetch_assoc($result_foods)) {
                echo '<div class="col-md-4">';
                echo '<div class="food-menu-box">';
                echo '<div class="food-menu-img">';
                echo '<img src="../images/' . $row_food['food_image'] . '" alt="' . $row_food['fname'] . '" class="img-responsive img-curve">';
                echo '</div>';
                echo '<div class="food-menu-desc">';
                echo '<h4>' . $row_food['fname'] . '</h4>';
                echo '<p class="food-price">$' . $row_food['price'] . '</p>';
                echo '<p class="food-detail">' . $row_food['description'] . '</p>';
                echo '<br>';
                echo '<a href="order.php?fid=' . $row_food['fid'] . '" class="btn btn-primary">Order Now</a>';

                echo '</div>';
                echo '</div>';
                echo '</div>';
            }
            echo '</div>';
            echo '</div>';
            echo '</section>';
        } else {
            echo '<p class="text-center">No foods available in this category.</p>';
        }
    } else {
        // Category not found
        echo '<p class="text-center">Category not found.</p>';
    }
} else {
    // Redirect if category_id is not set
    header('Location: http://localhost/food-ordering/index.php');
    exit();
}

include('../partials/footer.php'); 

