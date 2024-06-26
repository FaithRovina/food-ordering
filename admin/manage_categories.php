<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Manage Categories </h1> 

        <br/> <br/>

        <!-- Button for Adding Admin -->
        <a href="add_categories.php" class="btn-primary"> Add Category </a>
        <br/> <br/> <br/>

        <table class="full-table">
            <tr>
                <th> Category Id </th>
                <th> Title </th> 
                <th> Category Image </th>               
                <th> Active</th>
                <th> Featured</th>
                <th> Actions</th>
            </tr>

            <?php
            // Include database connection
            include_once '../settings/connection.php';

            // SQL query to fetch category data
            $sql = "SELECT catid ,title, catimage, active, featured FROM category ";
            $result = $con->query($sql);

            // Check if there are any records in the database
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["catid"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    
                    // Check if there is an image attached
                    if (!empty($row["catimage"])) {
                        // Display the image using an <img> tag
                        echo "<td><img src='../images/" . $row["catimage"] . "' alt='" . $row["title"] . "' style='width:100px;height:auto;'></td>";
                    } else {
                        // Display "Image not added" if no image is attached
                        echo "<td style='color: red;'>Image not added</td>";
                    }
                    
                    echo "<td>" . $row["active"] . "</td>";
                    echo "<td>" . $row["featured"] . "</td>";
                    echo "<td>                    
                    <a href='update_category.php?catid= ". $row["catid"]. "' class='btn-secondary'>Update Category</a>
                    <a href='actions/delete_category_action.php?catid=" . $row["catid"] . "' class='btn-danger'>Delete Category</a>                    
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No categories found</td></tr>";
            }
            ?>

        </table>
    </div>
</div>
