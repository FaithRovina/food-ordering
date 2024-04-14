<?php 

include ('partials/menu.php');
include('../../settings/connection.php'); 
include('../../settings/constants.php'); 

include('functions/get_total_categories_fxn.php');
include('functions/get_total_foods_fxn.php');
include('functions/get_total_orders_fxn.php');
include('functions/get_cancelled_orders_fxn.php');
include('functions/get_delivered_orders_fxn.php');
include('functions/get_processing_orders_fxn.php');
include('functions/get_total_revenue_fxn.php');


// Call the function to get the total number of categories
$total_categories = getTotalCategories();

// Call the function to get the total number of food items
$total_foods = getTotalFoods();

// Call the function to get the processing number of orders
$processing_orders = getProcessingOrders();

// Call the function to get the delivered number of orders
$delivered_orders = getDeliveredOrders();

// Call the function to get the cancelled number of orders
$cancelled_orders = getCancelledOrders();

// Call the function to get the total number of orders
$total_orders = getTotalOrders();


// Call the function to get the total revenue
$total_revenue = getTotalRevenue();

?>

<!DOCTYPE html>
<html lang="en">
<head>
</head>
<body>
    <div class="main-content">
        <div class="wrapper">
            <h1> DASHBOARD </h1> 

            <div class="col-4 text-center">
                <h1><?php echo $total_categories; ?></h1>
                <br/>
                Categories
            </div>

            <div class="col-4 text-center">
                <h1><?php echo $total_foods; ?></h1>
                <br/>
                Foods
            </div>

            <div class="col-4 text-center">
                <h1><?php echo $total_orders; ?></h1>
                <br/>
                Total Orders
            </div>

            <!-- <div class="col-4 text-center">
                <h1><?php echo $processing_orders; ?></h1>
                <br/>
                Processing Orders
            </div> -->

            <!-- <div class="col-4 text-center">
                <h1><?php echo $delivered_orders; ?></h1>
                <br/>
                Delivered Orders
            </div> -->

            <!-- <div class="col-4 text-center">
                <h1><?php echo $cancelled_orders; ?></h1>
                <br/>
                Cancelled Orders
            </div> -->

            <div class="col-4 text-center">
                <h1>$<?php echo $total_revenue; ?></h1>
                <br/>
                Total Revenue
            </div>

            <div class="clearfix"> </div>
        </div>
    </div>
</body>
</html>
