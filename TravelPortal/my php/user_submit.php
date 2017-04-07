
<?php

session_start();
if (isset($_SESSION['un'])){

}
else {
header ("location:index.php");
}
include_once('main.php');

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../Css folder/book.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>

<style>
#table{
margin: -400px 0 0 200px;
}
tr.white {
color:white;

}
</style>

</head>

<body >
<div id="table">
<strong style="margin: 0px 0 5px 400px;">List of Submitted Tours</strong>
<div style="height:360px; overflow:auto; width:61%; margin-left:300px; border:1px solid #66CC00; border-radius:6px 6px 0px 0px;">

<div style="background-color:#333366; height:40px; border-radius:5px 5px 0px 0px">

<table  cellspacing="10px" style="width: 520px;">

<tr class="white">
        	<th style="text-align:center; width:5%;">No.</th>
            <th style="width:45%;">Tour Purpose</th>
            <th style="width:45%;">Status</th>
            <th style="text-align:center; width:5%;">Details</th>
  </tr>


<?php
include("db_connect.php");
$sql = "SELECT * FROM $tbl_tour";
$result = mysqli_query($con,$sql);
$num = 1;
while ($row = mysqli_fetch_array($result)){

$sta = $row['status'];

if ($sta == 'Approved by Finance Manager' or $sta == 'Approved by Manager' or $sta == 'Rejected by Manager' or $sta == 'Submitted to Finance Manager' or $sta == 'Rejected by Finance Manager' or $sta == 'Request for Infromation by Finance Manager' or $sta == 'Submitted to Manager' or $sta == 'Request for Infromation by Manager') {

?>
<tr>
<td><?php echo $num;?></td>
<td><?php echo $row['purpose']?></td>
<td><?php echo $row['status']?></td>

<td>
<a href="display_submit.php?id=<?= $row['id']?>">Edit<input type="hidden" name="edit" value="Edit"/></a></td>
</tr> 
<?php $num++; }} ?>
</table>

</div>

</div>
</div>

</body>
</html>
