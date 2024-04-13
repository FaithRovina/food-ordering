<?php
include('../partials/user_menu.php');
include('../settings/connection.php');
?>
<link rel="stylesheet" type="text/css" href="../css/style.css">

<style>
/* Style for the container holding the categories */
.categories .container {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
    gap: 20px; 
}

/* Style for each category item */
.categories .box-3 {
    width: 100%; 
}

/* Clearfix to prevent layout issues */
.clearfix::after {
    content: "";
    display: table;
    clear: both;
}

</style>
<h2 class="text-center">Explore Foods</h2>

<section class="categories">
    <div class="container">       
        <?php
        // Query to fetch categories from the category table
        $sql = "SELECT catid, title, catimage FROM category WHERE active='yes' AND featured ='yes'";
        $result = mysqli_query($con, $sql);

        // Check if the query was successful
        if ($result) {
            // Loop through the fetched categories and display them
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="category_foods.php?catid=' . $row['catid'] . '">';
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
<!-- Categories Section Ends Here -->

        <div class="clearfix"></div>
    
        </div>
        <p class="text-center">
        <a href="foods.php">See All Foods</a>
        </p>
        </section>
    <section>
    <?php
    include('../partials/footer.php');
    ?>
</section>
