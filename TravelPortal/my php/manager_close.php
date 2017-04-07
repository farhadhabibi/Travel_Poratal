<?php
include_once("header.php");
if (isset($_SESSION['un'])){

}
else {
header ("location:index.php");
}
?>

<?php

include_once("db_connect.php");

if (isset($_GET['id'])){
$aa = $_GET['id'];
$sql = "SELECT * FROM tour WHERE id='".$aa."'";
$result = mysqli_query($con,$sql);
$row1 = mysqli_fetch_assoc($result);
$bb = mysqli_real_escape_string($con,$aa);
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
margin-top: 10px;
}
#tour input[type="text"], input[type="date"]{
width: 500px;
}
#tour input[type="submit"], input[type="button"]{
color:white;
 background-color:#333366; 
 height: 40px;
 width: 160px;
 border-radius: 5px; 
line-height:5px;
margin:10px 0 0 0px;
font-size: 12px;
}
</style>

</head>

<body>

<div style="height:550px; width:65%; margin:-250px 0 0 400px; border:1px solid #333366; border-radius:6px 6px 0px 0px;">  

<div style="background-color:#333366; height:40px; border-radius:5px 5px 0px 0px">
<label style="position:absolute; color:white; padding: 7px; font-weight: bold"> Tour Details </label> <br>
<div id="tour"> 
<table cellspacing="10px">
<form action="display_manager.php" name="go" method="post" > 
<tr>
 <th>Tour Purpose</th>
   <td colspan="3">
    <textarea cols="50" rows="2" name="purpose" style="width: 500px; border-radius: 4px; border: 1px solid #ccc;" disabled><?php echo $row1['purpose']?></textarea>
   </td>
</tr>
<tr>

        <th>Start Date</th>
        <td><input type="text" name="start_date" value= "<?php echo $row1['start_date']?>" disabled required/></td>
    </tr>

<tr>
   <tr>
        <th>End Date</th>
        <td><input type="text" name="end_date"  value="<?php echo $row1['end_date']?>" disabled required></td>
    </tr>
    <tr>
        <th>Mode of Travel</th>
        
		<td><input type="text" name="end_date"  value="<?php echo $row1['mode']?>" disabled required></td>
    </tr>
    <tr>
        <th>Ticket Cost</th>
        <td><input type="text" name="ticket" value=" <?php echo $row1['ticket_cost']?>" disabled/></td> 
    </tr>
    <tr>
        <th>Cost of Airport Cab at Home City</th>
        <td><input type="text" value=" <?php echo $row1['home_cab_cost']?>" name="home" disabled /></td>
    </tr>
    <tr>
        <th>Cost of Airport Cab at Destination City</th>
        <td><input type="text" value=" <?php echo $row1['dest_cab_cost']?>" name="city" disabled /></td>
    </tr>
    <tr>
        <th>Hotel Cost</th>
        <td><input type="text" value="<?php echo $row1['hotel_cost']?>" name="hotel" disabled/></td>
    </tr>
    <tr>
        <th>Local Conveyance at Tour Location</th>
        <td><input type="text" value="<?php echo $row1['conveyance']?>" name="conveyance" disabled/></td>
    </tr>
   
	  <tr>
        <td colspan="2">
        
        <input type="button" name="cancel" value="Close" onclick="history.back()">
      <input type="hidden" value="<?= $bb ?>" name="bb" />
        </td>
    </tr>

</table>
</form>

</body>
</html>
