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
	<link rel="stylesheet" href="readme_files/screensmall.css" type="text/css" media="screen">
</head>

<body>
<center>
<p>&nbsp;</p>
<font color="red">
<h1>Thank You</h1><br />
</font>

</p>
<font color="green" size="4">
<h3 align="center">You have been successfully logged out.</h3>
<p align="center">Click here to <a href="login-form.php">Login</a> again</p></h3></center>
</font>

				


</body>
</html>