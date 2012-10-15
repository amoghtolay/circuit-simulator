<?php
	require_once('auth.php');
?>
<?//Connection and sanitize Section. 
	
//Include the file for connection to DB
require_once('connectdb.php');
?>

<?

	//Assigning all appropriate values
	$login=$_SESSION['SESS_USERNAME'];
	$filename=$_SESSION['SESS_UPLOADED_FILE'];

$cur_time=time();

$getUserRow = "SELECT * FROM queue
				WHERE login='$login' AND time_out>'$cur_time'";

$resultgetUserRow=mysql_query($getUserRow);

	if(!$resultgetUserRow)
		die("Could not get your ID");
		
$UserRowResult = mysql_fetch_assoc($resultgetUserRow);

if(!$UserRowResult)
	die("You are not in queue for simulation or your slot has already passed");

//Times of the user
$time_in=$UserRowResult['time_in'];
$time_out=$UserRowResult['time_out'];

$time_left = $time_in - time();

//if($time_left>0)
	//Output to JSP
	
if(($time_left<=0)&&($time_left>-60)){
	header("location: simulate.php");
	exit();
}

if($time_left<=-60)
	die("I dont know how you managed to reach this loop, you should have been thrown out earlier. Slot already passed");
	
//Echoing values for testing
echo 'waiting... counter is ticking! :P<br>Time left is';
echo $time_left;
?>
