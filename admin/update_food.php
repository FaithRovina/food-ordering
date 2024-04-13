<?php 
include ('partials/menu.php');
include('../settings/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Food</title>
</head>
<body>
<div class="main-content">
    <div class="wrapper">
        <h1> Update Food </h1>
        <br> <br>
        <?php
            // Collecting the id of the selected food item:
            $fid = $_GET['fid'];
            
            $sql = "SELECT * FROM food WHERE fid = $fid";

            // Query execution:
            $res = mysqli_query($con, $sql);

            if($res == true){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $row = mysqli_fetch_assoc($res);
                    $fname = $row['fname'];
                    $description = $row['description'];
                    $price = $row['price'];
                    $featured = $row['featured'];
                    $active = $row['active'];
                    $category_id = $row['category_id'];
                    $food_image = $row['food_image'];
                } else {               
                    header("Location: ". SITEURL. "manage_foods.php");
                }
            }
        ?>

        <form action="actions/update_food_action.php" method="post" enctype="multipart/form-data" onsubmit="return validateForm()">    
            <table class="table-add">
                <tr>
                    <td><label for="fname">Food Name:</label></td>
                    <td><input type="text" id="fname" name="fname" value="<?php echo $fname;?>"></td>
                </tr>
                <tr>
                    <td><label for="description">Description:</label></td>
                    <td><textarea id="description" name="description"><?php echo $description;?></textarea></td>
                </tr>
                <tr>
                    <td><label for="price">Price:</label></td>
                    <td><input type="number" id="price" name="price" value="<?php echo $price;?>"></td>
                </tr>
                <tr>
                    <td><label for="image">Food Image:</label></td>
                    <td>
                        <input type="file" id="image" name="image" accept="image/*">
                        <?php if (!empty($food_image)) { ?>
                            <img src="../images/<?php echo $food_image;?>" alt="Food Image" width="100">
                        <?php } ?>
                    </td>
                </tr>
                <tr>
                    <td><label for="category_id">Category:</label></td>
                    <td>
                        <select id="category_id" name="category_id">
                            <?php
                            // Retrieve categories from the database
                            $sql_categories = "SELECT * FROM category";
                            $result_categories = mysqli_query($con, $sql_categories);
                            if ($result_categories) {
                                while ($row_category = mysqli_fetch_assoc($result_categories)) {
                                    $selected = ($row_category['catid'] == $category_id) ? 'selected' : '';
                                    echo "<option value='{$row_category['catid']}' $selected>{$row_category['title']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
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
                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="fid" value ="<?php echo $fid;?>">
                        <input type="submit" id="submit" name="submit" value="Update Food" class="btn-primary">
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

        // Check if the image field is empty
        var image = document.getElementById("image");
        if (image.value === "" && !confirm("Are you sure you don't want to update the image?")) {
            return false; 
        }

        return true; 
    }
</script>

