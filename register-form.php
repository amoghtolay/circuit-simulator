
<html>
<head><title>Registration Form</title></head>
<center>
<h1><font size="6" color="red"> Registration Form for new users!</font> </h1>
</center>
<link href="style-register.css" media="screen" rel="stylesheet" type="text/css">

<SCRIPT LANGUAGE="JavaScript">

function validatePwd() {

var x=document.forms["loginForm"]["fname"].value;
var y=document.forms["loginForm"]["lname"].value;
var z=document.forms["loginForm"]["login"].value;
if (x==null || x=="")
  {
  alert("First name must be filled out");
  return false;
  }
  
  if (y==null || y=="")
  {
  alert("last name must be filled out");
  return false;
  }
  if (z==null || z=="")
  {
  alert("Please enter login id");
  return false;
  }

var invalid = " "; // Invalid character is a space
var minLength = 6; // Minimum length
var pw1 = document.loginForm.password.value;
var pw2 = document.loginForm.cpassword.value;
// check for a value in both fields.
if (pw1 == '' || pw2 == '') {
alert('Please enter your password twice.');
return false;
}
// check for minimum length
if (document.loginForm.password.value.length < minLength) {
alert('Your password must be at least ' + minLength + ' characters long. Try again.');
return false;
}
// check for spaces
if (document.loginForm.password.value.indexOf(invalid) > -1) {
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
<body id="jolicloud" class="welcome">

 <div class="center" id="wrapper">
        <strong>
        <section id="content">
            

		</strong>
        <div id="welcome">
    <div class="beta">
	 
	  <font color="white"><div align="center"><strong>If you already have an account <a href="login-form.php">click here</a></strong><br>
	   </font></br>
	    <img type="image" src="register.png" style = "margin-left:0px;"/></strong></div>
    </div>
<div class="box">
	
        	<p align="center" class="submit"><strong><font>SIGN UP</font></strong></p>
		<div class="content">
            
            <div id="signup" style="display: block; ">
		
				<form id="loginForm" name="loginForm" onsubmit="return validatePwd()" method="post" action="register-exec.php">
				<div style="margin-top: 0px; margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding-top: 0px; padding-right: 0px; padding-bottom: 0px; padding-left: 0px; display: none; ">
				  <div align="center">
				    </div>
				</div>
					<p align="center" class="field">
					  <strong>
					<label>First Name</label>
					<!--<br>First Name <br>-->
					<input name="fname" type="text" class="textfield" id="fname" size="30"/>
				    </strong></p>
				
					<p align="center" class="field">
					  <strong>
					  <!--<br>Last Name<br>-->
					  <label>Last Name</label>
					<input name="lname" type="text" class="textfield" id="lname" size ="30"/>
				    </strong></p>
					    
					<p align="center" class="field">
					  <strong>
					<label>Login ID</label>
					<input name="login" type="text" class="textfield" id="login" size="30"/>

				    </strong></p>  
					
					<p align="center" class="field">
					  <strong>
					<label>Password</label>
					<input name="password" type="password" class="textfield" id="password" size="30"/>
				    </strong></p>
					
					
					<p align="center" class="field">
					  <strong>
					<label>Confirm Password</label>
					<input name="cpassword" type="password" class="textfield" id="cpassword" size="30"/>
				    </strong></p>
					
					<p align="center" class="submit">    
					  <strong>
					  <input id="signup" type="submit" name="Submit" value="Register" />
			      </strong></p>
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

        </section>
    </div>
</div>

</body>
</html>
