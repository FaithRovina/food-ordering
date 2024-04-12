<?php include('partials/menu.php'); ?>
<style>
    .full-table {
        width: 100%;
        border-collapse: collapse;
        table-layout: fixed; 
    }

    .full-table th,
    .full-table td {
        padding: 10px; 
        text-align: left;
        word-wrap: break-word; 
        border: none; 
    }

    .btn-container {
        white-space: nowrap; 
    }

    .btn-container a {
        display: inline;
        margin-right: 8px; 
    }
</style>
<div class="main-content">
    <div class="wrapper">
        <h1> Manage Orders </h1> 
        
        <table class="full-table">
            <tr>
                <th> Order ID </th>
                <th> Food </th>
                <th> Quantity </th>
                <th> Total </th>
                <th> Order Date </th>
                <th> Status </th>
                <th> Customer Name </th>
                <th> Contact </th>
                <th> Email </th>
                <th> Table Number </th>
                <th> Actions </th>
            </tr>

            <?php
            // Include database connection
            include_once '../settings/connection.php';

            // SQL query to fetch orders data with customer details and status name
            $sql = "SELECT o.order_id, f.fname, o.quantity, o.total, o.orderDate, s.sname, c.customerName, c.phoneno, c.email, o.tableNumber 
                    FROM orders o
                    INNER JOIN customer c ON o.customer_id = c.customerId
                    INNER JOIN status s ON o.status_id = s.sid
                    INNER JOIN food f ON o.food_id = f.fid";
            $result = $con->query($sql);

            // Check if there are any records in the database
            if ($result->num_rows > 0) {
                // Output data of each row
                while ($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["order_id"] . "</td>";
                    echo "<td>" . $row["fname"] . "</td>"; // Displaying food name instead of ID
                    echo "<td>" . $row["quantity"] . "</td>";
                    echo "<td>" . $row["total"] . "</td>";
                    echo "<td>" . $row["orderDate"] . "</td>";
                    echo "<td>" . $row["sname"] . "</td>"; // Displaying status name instead of ID
                    echo "<td>" . $row["customerName"] . "</td>";
                    echo "<td>" . $row["phoneno"] . "</td>";
                    echo "<td>" . $row["email"] . "</td>";
                    echo "<td>" . $row["tableNumber"] . "</td>";
                    echo "<td class='btn-container'>"; // Button container for same line buttons
                    echo "<a href='update_order.php?order_id=" . $row["order_id"] . "' class='btn-secondary'> Update Order </a>";
                    echo "<a href='actions/delete_order_action.php?order_id=" . $row["order_id"] . "' class='btn-danger'> Delete Order </a>";             
                    echo "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No orders found</td></tr>";
            }
            ?>

        </table>
    </div>
</div>
