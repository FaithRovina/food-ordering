<?php include('partials/menu.php'); ?>

    <div class="main-content">
        <div class="wrapper">
         <h1> Manage Admins </h1> 

         <br/> <br/>

         <!-- Button for Adding Admin -->
        <a href="add_admin.php" class="btn-primary"> Add Admin </a>
         <br/> <br/> <br/>

         <table class="full-table">
            <tr>
                <th> Admin ID </th>
                <th> Name </th>
                <th> Username </th>
                <th> Actions </th>
            </tr>

            <?php
            // Include database connection
            include_once '../settings/connection.php';

            // SQL query to fetch admin data
            $sql = "SELECT adminid, fullname, username FROM admin";
            $result = $con->query($sql);
            

            // Check if there are any records in the database
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["adminid"] . "</td>";
                    echo "<td>" . $row["fullname"] . "</td>";
                    echo "<td>" . $row["username"] . "</td>";
                    echo "<td>                    
                    <a href='update_admin.php?adminid= ". $row["adminid"]. "' class='btn-secondary'>Update Admin</a>
                    <a href='actions/delete_admin_action.php?adminid=" . $row["adminid"] . "' class='btn-danger'>Delete Admin</a>
                    <a href='change_admin_password.php?adminid=" . $row["adminid"] . " ' class='btn-primary'> Change Password</a>
                    </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>No admins found</td></tr>";
            }
            ?>


         </table>
        </div>
    </div>
<?php include('partials/footer.php');
       
  