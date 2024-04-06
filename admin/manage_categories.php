<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
         <h1> Manage Categories </h1> 

         <br/> <br/>

         <!-- Button for Adding Admin -->
        <a href="add_categories.php" class="btn-primary"> Add Admin </a>
         <br/> <br/> <br/>

         <table class="full-table">
            <tr>
                <th> Category Include </th>
                <th> Title </th>
                <th> Image Name </th>
                <th> Featured</th>
                <th> Active</th>
            </tr>

            <?php
            // Include database connection
            include_once '../settings/connection.php';

            // SQL query to fetch admin data
            $sql = "SELECT catid ,title, active FROM category ";
            $result = $con->query($sql);
            

            // Check if there are any records in the database
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["catid"] . "</td>";
                    echo "<td>" . $row["title"] . "</td>";
                    echo "<td>" . $row["active"] . "</td>";
                    echo "<td>                    
                    <a href='update_category.php?adminid= ". $row["adminid"]. "' class='btn-secondary'>Update Admin</a>
                    <a href='actions/delete_category_action.php?adminid=" . $row["adminid"] . "' class='btn-danger'>Delete Admin</a>                    
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
<?php include('partials/footer.php');
       
  