<?php
session_start();
$DB_HOST = "localhost";
$DB_USER = "root";
$DB_PASSWORD = "";
$DB_NAME = "db";

$connection = mysqli_connect($DB_HOST,$DB_USER,$DB_PASSWORD,$DB_NAME);
if (!$connection) {
    die("CONNECTION ERROR" . mysqli_connect_error());
}

?>