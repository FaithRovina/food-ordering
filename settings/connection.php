<?php
//constants
$SERVER= 'farmtofork.mysql.database.azure.com';
$USERNAME= 'FaithRovina';
$PASSWORD= '@SkinnyQuee76';
$DATABASE='food-ordering';

$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die("The database was not created");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}
define('SITEURL','https://farmtofork.azurewebsites.net/');