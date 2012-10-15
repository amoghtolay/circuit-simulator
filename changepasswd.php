<?php
	require_once('auth.php');
	require_once('config.php');
?>
<html>
<head><title>Change Password</title>
<center>

</center>
<link href="style-passwdchange.css" type="text/css" media="screen" rel="stylesheet">
<SCRIPT LANGUAGE="JavaScript">

function validatePwd() {

var x=document.forms["changepasswd"]["curpasswd"].value;
if (x==null || x=="")
  {
  alert("current password must be filled out");
  return false;
  }

var invalid = " "; // Invalid character is a space
var minLength = 6; // Minimum length
var pw1 = document.changepasswd.newpasswd.value;
var pw2 = document.changepasswd.cnewpasswd.value;
// check for a value in both fields.
if (pw1 == '' || pw2 == '') {
alert('Please enter your new password twice.');
return false;
}
// check for minimum length
if (document.changepasswd.newpasswd.value.length < minLength) {
alert('Your password must be at least ' + minLength + ' characters long. Try again.');
return false;
}
// check for spaces
if (document.changepasswd.newpasswd.value.indexOf(invalid) > -1) {
alert("Sorry, spaces are not allowed.");
return false;
}
else {
if (pw1 != pw2) {
alert ("You did not enter the same new password twice. Please re-enter your password.");
return false;
}
else {
return true;
      }
   }
}
//  End -->
</script>

</head>
<body id="jolicloud" class="welcome" bgcolor="#161613">
<font color="#DEDEDE" size="4"> 
<h3>You have been logged in using the username: <?echo $_SESSION['SESS_USERNAME'];?> </h3>
 
<a href="logout.php"><font color="green">Logout</font></a>		
</font>
<div id="welcome">
  <div class="box">
			<p align="center" class="submit"><strong><font>Password change</font></strong></p>
        	
<div class="content">
            
        <div id="signup" style="display: block; ">
		
<?php
	//Returns error if returned from changepaswd-exec.php with errflag=true!!
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?>

				<form id="changepasswd" name="changepasswd" method="post" action="changepasswd-exec.php" onSubmit="return validatePwd()">
				<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; display: none; ">
				  <div align="center">
				    <strong>
				    <input name="authenticity_token" type="hidden" value="Q5qUk/wM/Yqc4eg9qOfBnAgLenDaGHEt7VD8xLKZ3N8=">
		          </strong></div>
				</div>
					
					<p align="center" class="field">
					  <strong>
					  <!--<br>Last Name<br>-->
					  <label>Current Password</label>
					<input name="curpasswd" type="password" class="textfield" id="curpasswd" size ="30"/>
				    </strong></p>
					    
					<p align="center" class="field">
					  <strong>
					<label>New Password</label>
					<input name="newpasswd" type="password" class="textfield" id="newpasswd" size="30"/>

				    </strong></p>  
					
					<p align="center" class="field">
					  <strong>
					<label>Confirm New Password</label>
					<input name="cnewpasswd" type="password" class="textfield" id="cpassword" size="30"/>
				    </strong></p>
					
					<p align="center" class="submit">    
					  <strong>
					  <input id="signup" type="submit" name="Submit" value="Change Password" />
			      </strong></p>
			  </form>
        </div>
</div>
  </div>
</div>
<br>
<br>
<br><font color="#DEDEDE" size="4">
To return to the member-index page, please </font><a href="member-index.php"><font color="green" size="4"> Click here</font> </a> <br>
</font>
</body>
</html>
