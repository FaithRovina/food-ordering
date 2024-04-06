<?php 
include ('partials/menu.php');

include('../settings/connection.php');
?>
<div class="main-content">
    <div class="wrapper">
    <h1> Update Category </h1>
    <br> <br>
    <?php
        //collecting the id of the selected category:
        $catid = $_GET['catid'];
        
        $sql = "SELECT * FROM category WHERE catid = $catid";

        //query execution:
        $res = mysqli_query($con, $sql);

        if($res == true){
            $count = mysqli_num_rows($res);
            if($count == 1){
                $row = mysqli_fetch_assoc($res);
                $title = $row['title'];
                $featured = $row['featured'];
                $active = $row['active'];
            } else {               
                header('location: http://localhost/food-ordering/admin/manage_categories.php');
            }
        }
    ?>

    <form action="actions/update_category_action.php" method="post">    
        <table class="table-add">
            <tr>
                <td><label for="title">Title:</label></td>
                <td><input type="text" id="title" name="title" value="<?php echo $title;?>"></td>
            </tr>
            <tr>
                <td><label for="featured">Featured:</label></td>
                <td>
                    <select id="featured" name="featured">
                        <option value="yes" <?php if($featured == 'yes') echo 'selected'; ?>>Yes</option>
                        <option value="no" <?php if($featured == 'no') echo 'selected'; ?>>No</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td><label for="active">Active:</label></td>
                <td>
                    <select id="active" name="active">
                        <option value="yes" <?php if($active == 'yes') echo 'selected'; ?>>Yes</option>
                        <option value="no" <?php if($active == 'no') echo 'selected'; ?>>No</option>
                    </select>
                </td>
            </tr>
            
            <br />
            <tr>
                <td colspan="2">
                    <input type="hidden" name="catid" value ="<?php echo $catid;?>">
                    <input type="submit" id="submit" name="submit" value="Update Category" class="btn-primary">
                </td>
            </tr>
        </table>       
    </form>

    </div>
</div>
