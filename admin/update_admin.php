<?php include ('partials/menu.php'); ?>
<div class="main-content">
    <div class="wrapper">
    <h1> Update Admin </h1>

    <form action="actions/update_admin_action.php" method="post">
    <input type="hidden" name="adminid" value="<?php echo $adminid; ?>">
        <table class="table-add">
            <tr>
                <td><label for="fullname">Full Name:</label></td>
                <td><input type="text" id="fullname" name="fullname" placeholder="Enter full name" required></td>
            </tr>
            <tr>
                <td><label for="username">Username:</label></th>
                <td><input type="text" id="username" name="username" placeholder="Enter username" required></td>
            </tr>
            
            <br />
            <tr>
                <td colspan="2">
                <input type="submit" id="submit" name="submit" value="Update Admin" class="btn-primary">
            </td>
            </tr>

        </table>       
       
    </form>

    </div>
</div>




<?php include ('partials/footer.php'); ?>