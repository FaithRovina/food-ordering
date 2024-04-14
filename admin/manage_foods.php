<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Manage Foods </h1> 

        <!-- Button for Adding Food -->
        <a href="add_food.php" class="btn-primary"> Add Food </a>
        <br/> <br/> <br/>

        <table class="full-table">
            <tr>
                
            <th style="width: 5%;"> Food ID </th>
                <th style="width: 15%;"> Name </th>
                <th style="width: 25%;"> Description </th>
                <th style="width: 10%;"> Price </th>
                <th style="width: 5%;"> Featured </th>
                <th style="width: 5%;"> Active </th>
                <th style="width: 5%;"> Cat. ID </th>
                <th style="width: 15%;"> Image </th>
                <th style="width: 15%;"> Actions </th>
            </tr>

            <?php
            // Include database connection
            include_once '../settings/connection.php';

            // SQL query to fetch food data
            $sql = "SELECT * FROM food";
            $result = $con->query($sql);

            // Check if there are any records in the database
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["fid"] . "</td>";
                    echo "<td>" . $row["fname"] . "</td>";
                    echo "<td>" . $row["description"] . "</td>";
                    echo "<td>" . $row["price"] . "</td>";
                    echo "<td>" . $row["featured"] . "</td>";
                    echo "<td>" . $row["active"] . "</td>";
                    echo "<td>" . $row["category_id"] . "</td>";
                    // Check if there is an image attached
                    if (!empty($row["food_image"])) {
                        // Display the image using an <img> tag
                        echo "<td><img src='../images/" . $row["food_image"] . "' alt='" . $row["fname"] . "' style='width:100px;height:auto;'></td>";
                    } else {
                        // Display "Image not added" if no image is attached
                        echo "<td style='color: red;'>Image not added</td>";
                    }
                    echo "<td>                    
                    <a href='update_food.php.?fid= ". $row["fid"]. " ' class='btn-secondary'> Update Food </a>
                    <a  href='actions/delete_food_action.php.?fid= ". $row["fid"]. " 'class='btn-danger'> Delete Food </a>                    
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='9'>No foods found</td></tr>";
            }
            ?>

        </table>
    </div>
</div>
