<?php include('partials/menu.php');
include('../settings/connection.php');?>
<div class="main-content">
    <div class="wrapper">
    <h1> Change Admin Password </h1>

    <br> <br>   
    <?php
    // Fetch the old password based on the selected admin id
    $old_password = ""; // Initializing old password variable
    if(isset($adminid)) {
        $sql = "SELECT password FROM admin WHERE adminid = $adminid";
        $res = mysqli_query($con, $sql);
        if($res && mysqli_num_rows($res) == 1) {
            $row = mysqli_fetch_assoc($res);
            $old_password = $row['password'];
        }
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

   
</script>


<?php include('partials/footer.php'); 

