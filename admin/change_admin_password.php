<?php include('partials/menu.php');
include('../settings/connection.php');?>
<div class="main-content">
    <div class="wrapper">
    <h1> Change Admin Password </h1>

    <br> <br>   
    <?php
    // Collecting the ID of the selected admin
    $adminid = $_GET['adminid'];

    // SQL query to retrieve the hashed password of the selected admin
    $sql = "SELECT password FROM admin WHERE adminid = $adminid";

    // Query execution
    $res = mysqli_query($con, $sql);

    if ($res) {
        $count = mysqli_num_rows($res);
        if ($count == 1) {
            $row = mysqli_fetch_assoc($res);
            // Get the hashed password of the admin
            $hashed_password = $row['password'];
        } else {
            // Redirect if admin not found
            header('location: http://localhost/food-ordering/admin/manage_admin.php');
            exit(); // Terminate script execution after redirection
        }
    } else {
        // Redirect in case of SQL query error
        header('location: http://localhost/food-ordering/admin/manage_admin.php');
        exit(); // Terminate script execution after redirection
    }
    ?>


    
    <form action="actions/change_admin_password_action.php" id='passwordChangeForm' method="POST">
        <table class="add">
            <tr>
             <td>Current Password</td>
                <td>
                    <input type="password" name="old_password" placeholder="Old Password">
                </td>
            </tr>

            <tr>
             <td>New Password</td>
                <td>
                    <input type="password" name="new_password" placeholder="New Password">
                </td>
            </tr>

            <tr>
             <td>Confirm Password</td>
                <td>
                    <input type="password" name="confirm_password" placeholder="Confirm Password">
                </td>
            </tr>

            <tr>
                <td colspan="2">
                <input type="hidden" name="adminid" value ="<?php echo $adminid;?>">
                <input type="submit" id="submit" name="submit" value="Change Password" class="btn-primary">
            </td>
            </tr>

    </form>
    </table>
        </div>
    </div>
   



