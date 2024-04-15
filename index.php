<?php
include('partials/user_menu.php');
include('settings/connection.php');

?>

<!-- food  search section starts Here -->
<section class="food-search text-center">
    <div class="container">            
        <form action="user/food-search.php" method="POST">
            <input type="search" name="search" placeholder="Search for Food.." required>
            <input type="submit" name="submit" value="Search" class="btn btn-primary">
        </form>
    </div>
</section>

<!-- Categories Section Starts Here -->
<section class="categories">
    <div class="container">
        <h2 class="text-center">Explore Foods</h2>

        <?php
        // Query to fetch categories from the category table
        $sql = "SELECT catid, title, catimage FROM category WHERE featured ='yes' LIMIT 3";
        $result = mysqli_query($con, $sql);

        // Check if the query was successful
        if ($result) {
            // Loop through the fetched categories and display them
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="user/category_foods.php?catid=' . $row['catid'] . '">';
                echo '<div class="box-3 float-container">';
                echo '<img src="../images/' . $row['catimage'] . '" alt="' . $row['title'] . '" class="img-responsive img-curve">';
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
<div>

<!-- Footer -->
<?php include('partials\footer.php') ?>
