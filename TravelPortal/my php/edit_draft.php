<?php
session_start();
if (isset($_SESSION['un'])){

}
else {
header ("location:index.php");
}
?>
<?php

include_once("db_connect.php");

if (isset($_POST['delete'])){
$bb = mysqli_real_escape_string($con,$_POST["bb"]);
$sql = "DELETE FROM tour WHERE id='$bb' "; 
$result= $con->query($sql) or die ('not deleted');
if($result){
	 header ("location:user_draft.php?sm=Deleted");
	}
}
if (isset($_GET['id'])){
$aa = $_GET['id'];
$sql = "SELECT * FROM tour WHERE id='".$aa."'";
$result = mysqli_query($con,$sql);
$row1 = mysqli_fetch_assoc($result);
$bb = mysqli_real_escape_string($con,$aa);
}
else if (isset($_POST["draft1"])){
$purpose = filter_input(INPUT_POST, 'purpose');
$start_date = filter_input(INPUT_POST, 'start_date');
$end_date = filter_input(INPUT_POST, 'end_date');
$mode = filter_input(INPUT_POST, 'mode');
$ticket = filter_input(INPUT_POST, 'ticket');
$home = filter_input(INPUT_POST, 'home');
$city = filter_input(INPUT_POST, 'city');
$hotel = filter_input(INPUT_POST, 'hotel');
$conveyance = filter_input(INPUT_POST, 'conveyance');
$select = filter_input(INPUT_POST, 'sel');
$bb = mysqli_real_escape_string($con,$_POST["bb"]);
$status = "Draft";
$date = date("Y-m-d H:i:s");
$id2 = $_SESSION['user_id'];

$sql = "UPDATE tour SET `purpose` = '$purpose', `start_date` = '$start_date', `end_date` = '$end_date', `mode` = '$mode', `ticket_cost` = '$ticket', `home_cab_cost` = '$home', `dest_cab_cost` = '$city', `hotel_cost` = '$hotel', `conveyance` = '$conveyance',  `status` = '$status', `employee_id` = '$id2', `manager_id` = '$select', `date_created` = '$date' WHERE  `id` = '$bb';";
$result = mysqli_query($con,$sql) or die('invalid');
if($result){
	 echo '<script>leave(); function leave(){window.location="user_draft.php?msg=Data Updated";}</script>'; //header not works because it is faster than php and we get the include from script not from web page.
	}
}

	
if (isset($_GET['id'])){
$bb = $_GET['id'];
$sql = "SELECT * FROM tour WHERE id='".$bb."'";
$result = mysqli_query($con,$sql);
$row1 = mysqli_fetch_assoc($result);
$bb = mysqli_real_escape_string($con,$bb);
}

else if(filter_input(INPUT_POST, 'submit_manager') !== NULL){
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
$bb = mysqli_real_escape_string($con,$_POST["bb"]);
$status = "Submitted to Manager";
$date = date("Y-m-d H:i:s");


include('db_connect.php');
$id2 = $_SESSION["user_id"];
$sql = "UPDATE tour SET `purpose` = '$purpose', `start_date` = '$start_date', `end_date` = '$end_date', `mode` = '$mode', `ticket_cost` = '$ticket', `home_cab_cost` = '$home', `dest_cab_cost` = '$city', `hotel_cost` = '$hotel', `conveyance` = '$conveyance',  `status` = '$status', `employee_id` = '$id2', `manager_id` = '$select', `date_created` = '$date' WHERE  `id` = '$bb';";
$result = mysqli_query($con,$sql); 
header("location: user_submit.php?msg=Data Saved!!!");


}

$sql = "SELECT * FROM tour WHERE id='".$bb."'";
$result = mysqli_query($con,$sql);
$row1 = mysqli_fetch_assoc($result);
 
?> 

<?php
include_once("db_connect.php");
$sql = "select * from user where type = 'Manager'";
$result = mysqli_query($con,$sql);
$optionId = "";
while ($row2 = mysqli_fetch_array($result,MYSQLI_BOTH)){
$optionId = $optionId."<option value='$row2[0]'> $row2[1]</option>";

}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
<style>
#tour th{
text-align: left;
}
#tour tr td{
margin-left: 300px;
}
#tour{
margin-top: 15px;
}
#tour input[type="text"], input[type="date"]{
width: 500px;
}
#tour input[type="submit"], input[type="button"]{
color:white;
 background-color:#333366; 
 height: 40px;
 width: 110px;
 border-radius: 5px; 
line-height:5px;
margin:10px 0 0 80px
}
</style>

</head>

<body>
<?php
include_once("main.php")

?>
<div style="height:550px; width:65%; margin:-390px 0 0 400px; border:1px solid #333366; border-radius:6px 6px 0px 0px;">

<div style="background-color:#333366; height:40px; border-radius:5px 5px 0px 0px">
<label style="position:absolute; color:white; padding: 7px; font-weight: bold"> Tour Details </label> <br>
<div id="tour">
<table cellspacing="10px">
<form action="edit_draft.php" name="go" method="post" >
<tr>
 <th>Tour Purpose</th>
   <td colspan="3">
    <textarea cols="50" rows="2" name="purpose" style="width: 500px; border-radius: 4px; border: 1px solid #ccc;"><?php echo $row1['purpose']?></textarea>
   </td>
</tr>
<tr>

        <th>Start Date</th>
        <td><input type="date" name="start_date" value= "<?php echo $row1['start_date']?>" required/></td>
    </tr>

<tr>
   <tr>
        <th>End Date</th>
        <td><input type="date" name="end_date"  value="<?php echo $row1['end_date']?>" required></td>
    </tr>
    <tr>
        <th>Mode of Travel</th>
        <td>
			<select name="mode">
			<option><?php echo $row1['mode']?></option>
				 <option>Air Travel</option>
                <option>Travel by Car</option>
                <option>Travel by Sea</option>
                <option>Travel by Train</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>Ticket Cost</th>
        <td><input type="text" name="ticket" value="<?php echo $row1['ticket_cost']?>"</td>
    </tr>
    <tr>
        <th>Cost of Airport Cab at Home City</th>
        <td><input type="text" value="<?php echo $row1['home_cab_cost']?>" name="home"</td>
    </tr>
    <tr>
        <th>Cost of Airport Cab at Destination City</th>
        <td><input type="text" value="<?php echo $row1['dest_cab_cost']?>" name="city"</td>
    </tr>
    <tr>
        <th>Hotel Cost</th>
        <td><input type="text" value="<?php echo $row1['hotel_cost']?>" name="hotel"></td>
    </tr>
    <tr>
        <th>Local Conveyance at Tour Location</th>
        <td><input type="text" value="<?php echo $row1['conveyance']?>" name="conveyance"</td>
    </tr>
    <tr>
        <th>Manager</th>
        <td>
		<select name="sel">
      <?php
	  echo $optionId;
	  
	  ?>
	  </select>
        </td>
    </tr>
	  <tr>
        <td colspan="2">
        
        <input type="button" name="cancel-btn" value="Close" onclick="history.back()">
		<input type="submit" name="delete" value="Delete">
            <input type="submit" name="draft1" value="Save as Draft">
            <input type="submit" name="submit_manager" value="Submit">
      <input type="hidden" value="<?= $bb ?>" name="bb" />
        </td>
    </tr>

</table>
</form>

</body>
</html>
