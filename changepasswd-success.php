<?php
	//Start session
	session_start();
	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
	
	unset($_SESSION['SESS_PENDREQ']);
	unset($_SESSION['SESS_STATUS']);
	unset($_SESSION['ACTIVATION_CODE']);
?>
<html>
<head>
	<title>logout</title>
	<link href="style-success_pwd_chg.css" media="screen" rel="stylesheet" type="text/css">
</head>

<body>

<center>
<p>&nbsp;</p>
	<!--<p><span style="font-family:Trebuchet MS, Verdana, Arial; font-size:95px; font-weight:bold;"><h1><font color="red" size="65">Welcome!</font></h1></span> <br />
	  </p>-->
	<font color="green" size="30">
	<p><h3 align="center" class="err">Your password have been successfully changed.</h3> </p>
    <p align="center">To return to the member-index page, please <a href="login-form.php">click here</a></p>
	</font>
    <br />
<center>

</body>
</html>