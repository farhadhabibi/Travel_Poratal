<?php
session_start();

if(filter_input(INPUT_POST, 'login') !== NULL){
include_once("db_connect.php");
$username = filter_input(INPUT_POST, 'userName');
$password = sha1(filter_input (INPUT_POST, 'passWord')); 
//die($password);
$sql = "SELECT * FROM $tbl_user WHERE username = '$username' AND password = '$password'";
//echo sha1($password);
$result = mysqli_query($con,$sql);
$count = mysqli_num_rows($result);

if ($count == 0){
$message = "Wrong Username or Password";
header("location:index.php? message=".$message);
}
else if ($count == 1){
$fetch_row = mysqli_fetch_assoc($result);
$_SESSION["name"] = $fetch_row["name"];
$_SESSION["un"] = $fetch_row["username"];
$_SESSION["type"] = $fetch_row["type"];
$_SESSION["email"] = $fetch_row["email"];
$_SESSION["user_id"] = $fetch_row["id"];
$_SESSION["is loggedin"] = 1;
}
if(!isset($_SESSION['un'])){
				header ('location:index.php');
			}else if($_SESSION['type']=="Employee"){
				header('location:user_submit.php');
			}else if($_SESSION['type']=="Manager"){
				header ('location:manager.php');
			}else if($_SESSION['type']=="Finance Manager"){
				header('location:f_manager.php');
			}
}
else {
$message = "Sorry";
header("location:index.php? message=".$message);

// admin check the code
}

?>
 


