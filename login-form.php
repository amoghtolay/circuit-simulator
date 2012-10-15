<?php
	//Start session
	session_start();
	
	//Check whether the session variable SESS_MEMBER_ID is present or not
	if(isset($_SESSION['SESS_MEMBER_ID'])) {
		header("location: member-index.php");
		exit();
	}
?>
<html>
<head><title>Login Form</title>
<center>
<h1><font color="black">BITS 'N BYTES</font> </h1>

</center>
<link href="style-login.css" media="screen" rel="stylesheet" type="text/css">

<script type="text/javascript">
function validateForm()
{
var x=document.forms["loginForm"]["login"].value;
var y=document.forms["loginForm"]["password"].value;
if (x==null || x=="")
  {
  alert("First name must be filled out");
  return false;
  }
  
	else if (y==null || y=="")
  {
  alert("please enter your password");
  return false;
  }
}
</script>


</head>
<body id="jolicloud" class="welcome">

 <div class="center" id="wrapper">
        <strong>
       
            

		</strong>
        <div id="welcome">
    <div class="beta">
	 <img src="home_page_img2.jpg" height="330" width="600" />
	  <div align="center">
	      <p><br>
	      </p>
	  </div>
		  <div class="down">
		  <b><center>Please click here to <a href="Logic-Gate-Simulator-1.4.zip"> Download</a> a software that lets you draw your circuits</center></b>
			</div>
    </div>
<div class="box">
	
        	<p align="center" class="submit"><strong><font>SIGN IN</font></strong></p>
		<div class="content">
            
            <div id="signup" style="display: block; ">
		
				<form name="loginForm" action="login-exec.php" method="post" onSubmit="return validateForm()">
				<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; display: none; "></div>
                    <input id="next" name="next" type="hidden">
                    <p class="field">
                    <label for="user_username">Username</label><input id="user_username" name="login" size=30 tabindex="1" type="text" value=""></p>
                    <p class="field"><label for="user_password">Password</label><input id="user_password" name="password" size="30" tabindex="2" type="password" value=""></p>
                    Not a member? <a href="register-form.php">Register Now</a>
                    <p class="submit">
                        <input id="sign-in" name="commit" tabindex="3" type="submit" value="Login">
                    </p>
                </form>
              <div align="center">
                <strong>
                <?php
if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
echo '<ul class="err">';
foreach($_SESSION['ERRMSG_ARR'] as $msg) {
echo '<li>',$msg,'</li>'; 
}
echo '</ul>';
unset($_SESSION['ERRMSG_ARR']);
}
?>
              </strong></div>
                <div class="clear" style="display: none; "></div>			
            </div>
        </div>
        
    </div>
    </div>
</div>

        

	

</body>
</html>
