<?php
//constants
$SERVER= 'localhost:3308';
$USERNAME= 'root';
$PASSWORD= '@StrateGicPlan20178##';
$DATABASE='food-ordering';

$con = new mysqli($SERVER, $USERNAME, $PASSWORD, $DATABASE) or die("The database was not created");

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}