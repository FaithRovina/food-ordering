<?php include ('partials/menu.php'); 
include('../settings/connection.php');

?>
<div class="main-content">
    <div class="wrapper">
    <h1> Update Admin </h1>
    <br> <br>
    <?php
        //collecting the if of the selected admin:
        $adminid = $_GET['adminid'];
        
        $sql = "SELECT * FROM admin WHERE adminid = $adminid";

        //query execution:
        $res = mysqli_query($con,$sql);

        if($res == true){
            $count = mysqli_num_rows($res);
            if($count == 1){
                $row = mysqli_fetch_assoc($res);
                $fullname = $row['fullname'];
                $username = $row['username'];
            }else{               
                header('location:http://localhost/food-ordering/admin/manage_admin.php');
            }
        }


    ?>

    <form action="actions/update_admin_action.php" method="post">    
        <table class="table-add">
            <tr>
                <td><label for="fullname">Full Name:</label></td>
                <td><input type="text" id="fullname" name="fullname" value="<?php echo $fullname;?>"></td>
            </tr>
            <tr>
                <td><label for="username">Username:</label></th>
                <td><input type="text" id="username" name="username" value="<?php echo $username;?>"></td>
            </tr>
            
            <br />
            <tr>
                <td colspan="2">
                <input type="hidden" name="adminid" value ="<?php echo $adminid;?>">
                <input type="submit" id="submit" name="submit" value="Update Admin" class="btn-primary">
            </td>
            </tr>

        </table>       
       
    </form>

    </div>
</div>




<?php include ('partials/footer.php'); ?>