<?php
	require_once('auth.php');
?>
<?//Connection and sanitize Section. 
	
//Include the file for connection to DB
require_once('connectdb.php');
?>
<html>
<head>
<title>Member Index</title>
<link rel="stylesheet" type="text/css" media="screen" href="css/screen.css" />
<!--[if IE 6]><link rel="stylesheet" type="text/css" href="css/ie6.css" media="screen" /><![endif]-->
<script>

function validateFile() {
var x=document.forms["uploadFile"]["uploaded"].value;
if (x==null || x=="")
  {
  alert("Please choose a file");
  return false;
  }
}
</script>

</head>

<body>

<!-- wrap -->
<div id="wrap">

	<!-- header -->
	<div id="header">			
	
		<a name="top"></a>
		
		<h1 id="logo-text"><a href="#" title="">Bits 'n Bytes</a></h1>		
								
		
		<div  id="nav">
			<ul>
				<h3 id="slogan">Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h3>
			</ul>		
		</div>			
		
	  <p id="rss-feed"><a href="logout.php" class="feed">Logout</a></p>	
	  <?
//check for input validations return from upload.php
	if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
		echo '<ul class="err">';
		foreach($_SESSION['ERRMSG_ARR'] as $msg) {
			echo '<li>',$msg,'</li>'; 
		}
		echo '</ul>';
		unset($_SESSION['ERRMSG_ARR']);
	}
?>

		
		<form name="uploadFile" id="quick-search" enctype="multipart/form-data" onsubmit="return validateFile()" action="upload.php" method="POST" >
		<input name="uploaded" type="file" value="Please choose a file:" uploaded="empty"/>
		<input class="btn" alt="Search" type="image" name="searchsubmit" title="upload
        " src="images/search.png" />
		</form>	
						
	<!-- /header -->					
	</div>
	
	<!-- featured -->		
	<div id="featured">			
	
		<div id="featured-block" class="clear"><a name="TemplateInfo"></a>
			
			<div class="image-block">
              <a href="index.html" title=""><img src="images/member.png" alt="featured" width="350px" height="250px"/></a>
         </div>			
			
			<div class="text-block">
			
				<h2>Read me first</h2>
			
				<p>
					Please ensure that the circuit is free from following errors:

					
                <p>
1)	The inputs should be named as 0, 1,2... . The names of inputs should be consecutive integers starting from 0.
										You can  name the inputs in any order.							
	<p>2)The circuit should not contain a circular reference. i.e., the input of any gate should be independant of its output.							
	<p>3)The outputs should be named. Any names can be given to the outputs.
	<p>4)The circuit should be complete.
<p>After you upload your file please wait for your slot.
If you have already uploaded a file which is yet to be evaluated and you are waiting for evaluation then you cannot upload another file.
If you arrived here because your circuit had some errors then you will have to wait until your slot is finished before you can upload the corrected circuit.
				</p>
				
								
			</div>
		
		</div>		
	
	<!-- /featured -->
	</div>

	<!-- content -->
  <div id="content-wrap" class="clear">

		
		<p>
<h5>To change your password, please click <a href="changepasswd.php">here</a>
  </p>
</h5>
  </div>
<!-- /content-wrap -->	
	</div>
<!-- /wrap -->
</div>

<!-- footer -->
</body>
</html>
