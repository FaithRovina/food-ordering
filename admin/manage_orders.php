<?php include('partials/menu.php'); ?>

<div class="main-content">
    <div class="wrapper">
        <h1> Manage Orders </h1> 

        <!-- Button for Adding Order -->
        <a href="#" class="btn-primary"> Add Order </a>
        <br/> <br/> <br/>

        <table class="full-table">
            <tr>
                <th> Order ID </th>
                <th> Food ID </th>
                <th> Quantity </th>
                <th> Total </th>
                <th> Order Date </th>
                <th> Status </th>
                <th> Customer Name </th>
                <th> Contact </th>
                <th> Email </th>
                <th> Address </th>
                <th> Actions </th>
            </tr>

            <?php
            // Include database connection
            include_once '../settings/connection.php';

            // SQL query to fetch orders data with customer details
            $sql = "SELECT o.order_id, o.food_id, o.quantity, o.total, o.orderDate, o.status_id, c.customerName, c.phoneno, c.email, c.delivery_address 
                    FROM orders o
                    INNER JOIN customer c ON o.customer_id = c.customerId";
            $result = $con->query($sql);

            // Check if there are any records in the database
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["order_id"] . "</td>";
                    echo "<td>" . $row["food_id"] . "</td>";
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td>" . $row["total"] . "</td>";
                    echo "<td>" . $row["orderDate"] . "</td>";
                    echo "<td>" . $row["status_id"] . "</td>";
                    echo "<td>" . $row["customerName"] . "</td>";
                    echo "<td>" . $row["phoneno"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["delivery_address"] . "</td>";
                    echo "<td>                    
                            <a href='update_order.php?order_id=" . $row["order_id"] . "' class='btn-secondary'> Update Order </a>
                            <a href='delete_order.php?order_id=" . $row["order_id"] . "' class='btn-danger'> Delete Order </a>                    
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No orders found</td></tr>";
            }
            ?>

        </table>
    </div>
</div>
