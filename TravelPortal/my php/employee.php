<?php
session_start();
if (isset($_SESSION['un'])){

}
else {
header ("location:index.php");
}
?>

<?php

if(filter_input(INPUT_POST, 'submit_manager') !== NULL){
$purpose = filter_input(INPUT_POST, 'purpose');
$start_date = filter_input(INPUT_POST, 'start_date');
$end_date = filter_input(INPUT_POST, 'end_date');
$mode = filter_input(INPUT_POST, 'mode');
$ticket = filter_input(INPUT_POST, 'ticket');
$home = filter_input(INPUT_POST, 'home');
$city = filter_input(INPUT_POST, 'city');
$hotel = filter_input(INPUT_POST, 'hotel');
$conveyance = filter_input(INPUT_POST, 'conveyance');
$manager = filter_input(INPUT_POST, 'manager');
$select = filter_input(INPUT_POST, 'sel');
$status = "Submitted to Manager";
$date = date("Y-m-d H:i:s");


include('db_connect.php');
$id = $_SESSION["user_id"];
$sql = "INSERT INTO $tbl_tour (`id`, `purpose`, `start_date`, `end_date`, `mode`, `ticket_cost`, `home_cab_cost`, `dest_cab_cost`, `hotel_cost`, `conveyance`, `status`, `employee_id`, `manager_id`, `finance_manager_id`, `date_created`) VALUES (null, '$purpose', '$start_date', '$end_date', '$mode', '$ticket', '$home', '$city', '$hotel', '$conveyance', '$status', '$id', '$select', NULL, '$date')"; 
$result = mysqli_query($con,$sql);
header("location: user_submit.php?msg=Data Saved!!!");

} 
else if (filter_input(INPUT_POST, 'draft') !== NULL){
$purpose = filter_input(INPUT_POST, 'purpose');
$start_date = filter_input(INPUT_POST, 'start_date');
$end_date = filter_input(INPUT_POST, 'end_date');
$mode = filter_input(INPUT_POST, 'mode');
$ticket = filter_input(INPUT_POST, 'ticket');
$home = filter_input(INPUT_POST, 'home');
$city = filter_input(INPUT_POST, 'city');
$hotel = filter_input(INPUT_POST, 'hotel');
$conveyance = filter_input(INPUT_POST, 'conveyance');
$manager = filter_input(INPUT_POST, 'manager');
$select = filter_input(INPUT_POST, 'sel');
$status = "Draft";
$date = date("Y-m-d H:i:s");


include('db_connect.php');
$id = $_SESSION["user_id"];
$sql = "INSERT INTO $tbl_tour (`id`, `purpose`, `start_date`, `end_date`, `mode`, `ticket_cost`, `home_cab_cost`, `dest_cab_cost`, `hotel_cost`, `conveyance`, `status`, `employee_id`, `manager_id`, `finance_manager_id`, `date_created`) VALUES (null, '$purpose', '$start_date', '$end_date', '$mode', '$ticket', '$home', '$city', '$hotel', '$conveyance', '$status', '$id', '$select', NULL, '$date')";
$result = mysqli_query($con,$sql);
header("location: user_draft.php?msg=Data Saved!!!");

} else {header("Location:index.php");}

?>


