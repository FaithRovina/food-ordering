<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper"> 
        <h1> Add Category </h1>
        <br /> <br />

        <form action="http://localhost/food-ordering/admin/actions/add_category_action.php" method="post" enctype="multipart/form-data">
            <table class="table-add">            
                <tr>
                    <td><label for="title">Category Title:</label></td>
                    <td><input type="text" id="title" name="title" placeholder="Enter category title" required></td>
                </tr>
                <tr>
                    <td><label for="image">Category Image:</label></td>
                    <td><input type="file" id="image" name="image" accept="image/*" required></td>
                </tr>
                <tr>
                    <td><label for="featured">Featured:</label></td>
                    <td>
                        <select id="featured" name="featured" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="active">Active:</label></td>
                    <td>
                        <select id="active" name="active" required>
                            <option value="yes">Yes</option>
                            <option value="no">No</option>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" id="submit" name="submit" value="Add Category" class="btn-primary">
                    </td>
                </tr>
            </table>       
        </form>
    </div>
</div>
