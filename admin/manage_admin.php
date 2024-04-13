<?php
// Start session
session_start();

// Include database connection
include_once '../settings/connection.php';

// Check if the current user is logged in and get the username
$current_admin_username = isset($_SESSION['username']) ? $_SESSION['username'] : null;

if (!$current_admin_username) {
    // If the username is not set in session, redirect to login page or display a message
    echo "<script>alert('You are not logged in.'); window.location.href = 'admin_index.php';</script>";
    
} else {
    // SQL query to retrieve the admin ID based on the username
    $sql = "SELECT adminid FROM admin WHERE username = '$current_admin_username'";
    $result = $con->query($sql);

    if ($result->num_rows != 1) {
        // If the username is not found or multiple matches found, display a message or redirect
        echo "<script>alert('You are not authorized to access this page.'); window.location.href = 'index.php';</script>";
        
    } else {
        // If a single match for the username is found, get the admin ID
        $row = $result->fetch_assoc();
        $current_admin_id = $row['adminid'];
        
        // Check if the current admin is admin ID 16
        if ($current_admin_id != 16) {
            // If the current admin is not ID 16, display a message or redirect
            echo "<script>alert('You are not authorized to access this page.'); window.location.href = 'index.php';</script>";
            
        } else {
            // If the current admin is ID 16, display the page content
            ?>

            <?php include('partials/menu.php'); ?>

            <div class="main-content">
                <div class="wrapper">
                    <h1>Manage Admins</h1>

                    <br/> <br/>

                    <!-- Button for Adding Admin -->
                    <a href="add_admin.php" class="btn-primary">Add Admin</a>
                    <br/> <br/> <br/>

                    <table class="full-table">
                        <tr>
                            <th>Admin ID</th>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Actions</th>
                        </tr>

                        <?php
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
                                    <a href='update_admin.php?adminid= " . $row["adminid"] . "' class='btn-secondary'>Update Admin</a>
                                    <a href='actions/delete_admin_action.php?adminid=" . $row["adminid"] . "' class='btn-danger'>Delete Admin</a>
                                    <a href='change_admin_password.php?adminid=" . $row["adminid"] . " ' class='btn-primary'>Change Password</a>
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

            <?php
        }
    }
}
?>
