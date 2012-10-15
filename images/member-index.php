
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
		
		<h1 id="logo-text"><a href="index.html" title="">Simulator</a></h1>		
		<p id="slogan">Just Another Styleshout CSS Template... </p>					
		
		<div  id="nav">
			<ul>
				<h3 id="slogan">Welcome <?php echo $_SESSION['SESS_FIRST_NAME'];?></h3>
			</ul>		
		</div>			
		
	  <p id="rss-feed"><a href="logout.php" class="feed">Logout</a></p>	
		
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
              <a href="index.html" title=""><img src="images/img-featured.jpg" alt="featured" width="350px" height="250px"/></a>
         </div>			
			
			<div class="text-block">
			
				<h2><a href="index.html">Read me first</a></h2>
			
				<p class="post-info">Posted by <a href="index.html">erwin</a> | Filed under <a href="index.html">templates</a>, <a href="index.html">internet</a></p>
				
				<p><strong>JungleLand 1.0</strong> is a free, W3C-compliant, CSS-based website template
				by <a href="http://www.styleshout.com/">styleshout.com</a>. This work is 
				distributed under the <a rel="license" href="http://creativecommons.org/licenses/by/2.5/">
				Creative Commons Attribution 2.5  License</a>, which means that you are free to 
				use and modify it for any purpose. All I ask is that you give me credit for the design by including a <strong>link back</strong> to
				<a href="http://www.styleshout.com/">my website</a>.
                </p>

                <p>
                You can find more of my free template designs at <a href="http://www.styleshout.com/">my website</a>.
				For premium commercial designs, you can check out
                <a href="http://themeforest.net?ref=ealigam" title="Site Templates">Themeforest.net</a>.
				</p>
				
				<p><a href="index.html" class="more-link">Read More</a></p>
								
			</div>
		
		</div>		
	
	<!-- /featured -->
	</div>

	<!-- content -->
  <div id="content-wrap" class="clear">

		<div id="content">

			<!-- main --><!-- sidebar --><!-- /content -->	
		</div>
		<br><p>
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
