<?php
session_start();

?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="../css/style.css" rel="stylesheet" type="text/css">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<title>Log in</title>
</head>

<body style="background:white;">


<div id="log" style="background-color: #CCCCFF;">
<img src="../image/pic.png" style=" position: absolute; width: 130px; height: 130px; margin-left: 140px; margin-top: -70px;">

<form  action="check_login.php" name="login" method="post">
<p> Member Login </p>
<input type="text" name="userName" placeholder="username" required><br><br>
<input type="password" name="passWord" placeholder="*****" required><br><br>
<input type="submit" name="login" placeholder="login" value="Login"><br><br>
<input type="checkbox" checked="checked"> Remember me 
<a href="#"><p> Forgot Password? </p></a>
<?php
if (isset($_GET["message"])){
$msg = $_GET["message"];
echo '<div style="color: red; margin-top: 60px; margin-left: 40px; font-size: 20px;">'.$msg.'</div>';
}

?>
</form>
</div>

</body>
</html>
