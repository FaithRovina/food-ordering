<?php include('partials/menu.php');?>
<div class="main-content">
    <div class="wrapper"> 
        <h1> Add Food </h1>
        <br /> <br />

        <form action="http://localhost/food-ordering/admin/actions/add_food_action.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">
            <table class="table-add">            
                <tr>
                    <td><label for="fname">Food Name:</label></td>
                    <td><input type="text" id="fname" name="fname" placeholder="Enter food name" required></td>
                </tr>
                <tr>
                    <td><label for="description">Description:</label></td>
                    <td><textarea id="description" name="description" placeholder="Enter description" required></textarea></td>
                </tr>
                <tr>
                    <td><label for="price">Price:</label></td>
                    <td><input type="number" id="price" name="price" min="0" step="0.01" placeholder="Enter price" required></td>
                </tr>
                <tr>
                    <td><label>Featured:</label></td>
                    <td>
                        <label><input type="radio" name="featured" value="yes" required> Yes</label>
                        <label><input type="radio" name="featured" value="no"> No</label>
                    </td>
                </tr>
                <tr>
                    <td><label>Active:</label></td>
                    <td>
                        <label><input type="radio" name="active" value="yes" required> Yes</label>
                        <label><input type="radio" name="active" value="no"> No</label>
                    </td>
                </tr>
                <tr>
                    <td><label for="category_id">Category ID:</label></td>
                    <td><input type="number" id="category_id" name="category_id" min="1" placeholder="Enter category ID" required></td>
                </tr>
                <tr>
                    <td><label for="image">Food Image:</label></td>
                    <td><input type="file" id="image" name="image" accept="image/*" required></td>
                </tr>
                <tr>
                    <td colspan="2">
                        <input type="submit" id="submit" name="submit" value="Add Food" class="btn-primary">
                    </td>
                </tr>
            </table>       
        </form>
    </div>
</div>

<script>
    function validateForm() {
        // Get the input field values
        var fname = document.getElementById("fname").value;
        var description = document.getElementById("description").value;
        var price = document.getElementById("price").value;
        var category_id = document.getElementById("category_id").value;

        // Check if all fields are entered
        if (fname === "" || description === "" || price === "" || category_id === "") {
            alert("Please fill in all fields.");
            return false; // Prevent form submission
        }
        return true; // Allow form submission
    }
</script>
