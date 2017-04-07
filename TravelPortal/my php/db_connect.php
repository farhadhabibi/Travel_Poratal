<?php
$tbl_user = "user";
$tbl_tour = "tour";
$db_name = "travelportal";
$db_host = "localhost";
$db_username = "root";
$db_password = "";

$con = mysqli_connect($db_host, $db_username, $db_password) or die ("can not connect to database");
mysqli_select_db($con, $db_name) or die ("can not select from database");
?>