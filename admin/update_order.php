<?php 
include ('partials/menu.php');
include('../settings/connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Order</title>
</head>
<body>
<div class="main-content">
    <div class="wrapper">
        <h1> Update Order </h1>
        <br> <br>
        <?php
            // Collecting the id of the selected order:
            $order_id = $_GET['order_id'];
            
            $sql = "SELECT o.order_id, f.fname, o.quantity, o.total, o.orderDate, s.sname, c.customerName, c.phoneno, c.email, o.tableNumber, o.status_id
                    FROM orders o
                    INNER JOIN customer c ON o.customer_id = c.customerId
                    INNER JOIN status s ON o.status_id = s.sid
                    INNER JOIN food f ON o.food_id = f.fid
                    WHERE o.order_id = $order_id";

            // Query execution:
            $res = mysqli_query($con, $sql);

            if($res == true){
                $count = mysqli_num_rows($res);
                if($count == 1){
                    $row = mysqli_fetch_assoc($res);
                    $fname = $row['fname'];
                    $quantity = $row['quantity'];
                    $total = $row['total'];
                    $orderDate = $row['orderDate'];
                    $status_id = $row['status_id'];
                    $customerName = $row['customerName'];
                    $phoneno = $row['phoneno'];
                    $email = $row['email'];
                    $tableNumber = $row['tableNumber'];
                } else {               
                    header('location:http://localhost/food-ordering/admin/manage_orders.php');
                }
            }
        ?>

        <form action="actions/update_order_action.php" method="post" enctype="multipart/form-data">    
            <table class="table-add">
                <tr>
                    <td><label for="fname">Food:</label></td>
                    <td>
                        <select id="food_id" name="food_id">
                            <?php
                            // Retrieve food options from the database
                            $sql_foods = "SELECT * FROM food";
                            $result_foods = mysqli_query($con, $sql_foods);
                            if ($result_foods) {
                                while ($row_food = mysqli_fetch_assoc($result_foods)) {
                                    $selected = ($row_food['fname'] == $fname) ? 'selected' : '';
                                    echo "<option value='{$row_food['fid']}' $selected>{$row_food['fname']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                <tr>
                    <td><label for="quantity">Quantity:</label></td>
                    <td><input type="number" id="quantity" name="quantity" value="<?php echo $quantity;?>"></td>
                </tr>
                <tr>
                    <td><label for="email">Email:</label></td>
                    <td><input type="email" id="email" name="email" value="<?php echo $email;?>"></td>
                </tr>
                <tr>
                    <td><label for="tableNumber">Table Number:</label></td>
                    <td><textarea id="tableNumber" name="tableNumber"><?php echo $tableNumber;?></textarea></td>
                </tr>
                <tr>
                    <td><label for="status">Status:</label></td>
                    <td>
                        <select id="status" name="status">
                            <?php
                            // Retrieve status options from the database
                            $sql_statuses = "SELECT * FROM status";
                            $result_statuses = mysqli_query($con, $sql_statuses);
                            if ($result_statuses) {
                                while ($row_status = mysqli_fetch_assoc($result_statuses)) {
                                    $selected = ($row_status['sid'] == $status_id) ? 'selected' : '';
                                    echo "<option value='{$row_status['sid']}' $selected>{$row_status['sname']}</option>";
                                }
                            }
                            ?>
                        </select>
                    </td>
                </tr>
                
                <tr>
                    <td colspan="2">
                        <input type="hidden" name="order_id" value ="<?php echo $order_id;?>">
                        <input type="submit" id="submit" name="submit" value="Update Order" class="btn-primary">
                    </td>
                </tr>
            </table>       
        </form>
    </div>
</div>
</body>
</html>
