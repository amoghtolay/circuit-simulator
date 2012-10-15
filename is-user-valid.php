<?php
	require_once('auth.php');
?>

<?
//Include the file for connection to DB
require_once('connectdb.php');
?>

<?
/*
This file is a require_once file that is used by the Simulate-exec file that ensures that the user has a time-slot at that time
Write this file down NOW!!
*/

check_valid_user();

function check_valid_user()
{

	//Assigning all appropriate values
	$login=$_SESSION['SESS_USERNAME'];
	$cur_time=time();

//SELECT that row which in which the user is present such that the cur_time lies between time_in and time_out
$getUserRow = " SELECT * FROM queue
				WHERE login='$login' AND time_out > '$cur_time' AND time_in < '$cur_time'";

$resultgetUserRow=mysql_query($getUserRow);

	if(!$resultgetUserRow)
		die("Could not get your ID");
		
$UserRowResult = mysql_fetch_assoc($resultgetUserRow);

		if(!$UserRowResult)
		{
			header("location: sim-exit.php");
			exit();
		}
/*
//Times of the user
$time_in=$UserRowResult['time_in'];
$time_out=$UserRowResult['time_out'];


$time_left = $time_in - time();

	if($time_left<=0){
		header("location: sim-exit.php");
		exit();
	}
	*/
}

?>
