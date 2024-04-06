<?php include('partials/menu.php');?>
<div class ="main-content">
    <div class="wrapper"> 
    <h1> Add Category </h1>
    <br /> <br />

    <form action="actions/add_category_action.php" method="post">
        <table class="table-add">            
            <tr>
                <td><label for="category_title">Category Title:</label></td>
                <td><input type="text" id="category_title" name="category_title" placeholder="Enter category title" required></td>
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
                <td colspan="2" >
                    <input type="submit" id="submit" name="submit" value="Add Category" class="btn-primary">
                </td>
            </tr>

        </table>       
       
    </form>
    </div>
</div>

<?php include('partials/footer.php');?>
