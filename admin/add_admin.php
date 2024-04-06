<?php include('partials/menu.php');?>
<div class ="main-content">
    <div class="wrapper"> 
    <h1> Add Admin </h1>
    <br /> <br />

    <form action="actions/add_admin_action.php" method="post">
        <table class="table-add">
            <tr>
                <td><label for="fullname">Full Name:</label></td>
                <td><input type="text" id="fullname" name="fullname" placeholder="Enter full name" required></td>
            </tr>
            <tr>
                <td><label for="username">Username:</label></th>
                <td><input type="text" id="username" name="username" placeholder="Enter username" required></td>
            </tr>
            <tr>
                <td><label for="password">Password:</label></th>
                <td><input type="password" id="password" name="password" placeholder="Enter password" required></td>
            </tr>
            <br />
            <tr>
                <td colspan="2" >
                    <input type="submit" id="submit" name="submit" value= "Add Admin" class="btn-primary">
                </td>
            </tr>

        </table>       
       
    </form>
    </div>
</div>


