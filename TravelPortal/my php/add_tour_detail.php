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
$sql = "select * from user where type = 'Manager'";
$result = mysqli_query($con,$sql);
$optionId = "";
while ($row = mysqli_fetch_array($result,MYSQLI_BOTH)){
$optionId = $optionId."<option value='$row[0]'> $row[1]</option>";

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
<form action="employee.php" name="go" method="post" >
<tr>
 <th>Tour Purpose</th>
   <td colspan="3">
    <textarea cols="50" rows="2" name="purpose" style="width: 500px; border-radius: 4px; border: 1px solid #ccc;"></textarea>
   </td>
</tr>
<tr>

        <th>Start Date</th>
        <td><input type="date" name="start_date" required/></td>
    </tr>

<tr>
   <tr>
        <th>End Date</th>
        <td><input type="date" name="end_date" required></td>
    </tr>
    <tr>
        <th>Mode of Travel</th>
        <td>
			<select name="mode">
				<option>Select Travel Mode</option>
				 <option>Air Travel</option>
                <option>Travel by Car</option>
                <option>Travel by Sea</option>
                <option>Travel by Train</option>
            </select>
        </td>
    </tr>
    <tr>
        <th>Ticket Cost</th>
        <td><input type="text" name="ticket"</td>
    </tr>
    <tr>
        <th>Cost of Airport Cab at Home City</th>
        <td><input type="text" name="home"</td>
    </tr>
    <tr>
        <th>Cost of Airport Cab at Destination City</th>
        <td><input type="text" name="city"</td>
    </tr>
    <tr>
        <th>Hotel Cost</th>
        <td><input type="text" name="hotel"></td>
    </tr>
    <tr>
        <th>Local Conveyance at Tour Location</th>
        <td><input type="text" name="conveyance"</td>
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
    <tr>
        <td colspan="2">
        
        <input type="button" name="cancel-btn" value="Close" onclick="history.back()">
		<input type="submit" name="delete" value="Delete">
            <input type="submit" name="draft" value="Save as Draft">
            <input type="submit" name="submit_manager" value="Submit">
      
        </td>
    </tr>

</table>
</form>

</body>
</html>
