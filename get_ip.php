<?php
	require_once('auth.php');
?>
<?//Connection and sanitize Section. 
	
//Include the file for connection to DB
require_once('connectdb.php');
?>

<html>
<head>
	
	<title>Simulator Input</title>
	<link rel="stylesheet" href="readme_files/screensmall.css" type="text/css" media="screen">
</head>
<body>
<hr id="topborder">

<div id="sidebar">
	<h1>Bits 'n Bytes</h1>
	
</div>

<div id="content">

<hr id="overview">
<div class='section'>
	<h2>How to give Inputs</h2>
	<p class="lead">On this page, please give the inputs to the simulator. Shown below are some check-boxes which represent the inputs of the logical circuit.<br>
	The name of inputs that were given in the circuit diagram (0 to n-1 for n inputs) are shown below. A green tick indicates a <b>HIGH</b> value, whereas a red cross indicates a <b>LOW</b> value.<br>
	Pleae give the input set and the next simulation page will show the output values for that particular input set.</p>
	
</div>

<hr id="example">
<div class='section demo'>
<form id="I/O" name="I/O" method=post action="give_op.php">
		<div>
<?php
require_once "parser.php";

$filename=$_SESSION['SESS_UPLOADED_FILE'];
$fp = simplexml_load_file($filename);						//name of the file to be processed

$arr=array();
$arr=simplexmltoarray($fp);
$no_of_in=0;
$no_of_out=0;
$gateno=0;

while(isset($arr["Circuit"]["Gates"]["Gate"][$gateno]["Type"]))
{
	if($arr["Circuit"]["Gates"]["Gate"][$gateno]["Type"]=='UserInput')
	{
		$no_of_in++;
	}
	if($arr["Circuit"]["Gates"]["Gate"][$gateno]["Type"]=='UserOutput')
	{
		$no_of_out++;
	}
	$gateno++;
}
/*echo $no_of_in.'  '.$no_of_out;
$name[0]='a';
$name[1]='b';
$name[2]='c';
$name[3]='d';
$name[4]='e';
$name[5]='f';
*/
echo'<b>INPUTS:<BR></b>';
$no_of_in--;

		while($no_of_in>=0)
{
//	echo 'in is '.$no_of_in.'<br>';
?>
	<label><input type="checkbox" name=<?php echo $no_of_in; ?> value=1 /></label>
	
	<?php
		echo $no_of_in.'<br />';
		$no_of_in--;
		//
}
/*echo'<b>OUTPUTS:<BR></b>';
while($no_of_out!=0)
{?>
	<input type="checkbox" name=<?php '$out' ?> value=1 /> outpus<br />
<?php	$no_of_out--;
}*/
?>
		</div>
		
<input type="submit" value="Submit Inputs" style='margin:1em;height:2.5em;background:#222;float:right;color:#fff'>	

</form>
	
</div>

<script type="text/javascript" src="mootools.js"></script>
<script type="text/javascript" src="moocheck.js"></script>
</body>
</html>