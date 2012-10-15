<?php
	require_once('auth.php');
?>

<html>
<head>
<title>Wait for Simulation!</title>
<script src="timer2.js"></script>
<h1><?php echo $_SESSION['SESS_FIRST_NAME'];?>, you are in queue for the simulation</h1>
<h4><a href="logout.php">Logout</a></h4>

<?php
	//Connection Section. 
	//Include the file for connection to DB
	require_once('connectdb.php');
?>


<p><br><br>Your file has been successfully uploaded!! :) Congrats, below are the details of your queue details as well as time left for simulation! 

<?php
echo '<br>File name is '.$_SESSION['SESS_UPLOADED_FILE'];
?>

<br><br>
<br>

<!--PHP code to insert user and file into queue-->

<?php
//Assigning all appropriate values
	$login=$_SESSION['SESS_USERNAME'];
	$filename=$_SESSION['SESS_UPLOADED_FILE'];

//Computing Time in and Time Out

//GETTING TIME OF PREVIOUS ROW
$getLastUser = "SELECT *
				FROM queue
				ORDER BY id DESC
				LIMIT 1";
$resultLastUser=mysql_query($getLastUser);
	if(!$resultLastUser)
		die("Could not get Last User");
$LastUser = mysql_fetch_assoc($resultLastUser);

	if(!$LastUser)
		$LastUser['time_out']=time();

$time_out_lastUser = $LastUser['time_out'];
$cur_time=time();

	if($cur_time>=$time_out_lastUser)
		$time_in=$cur_time;
	if($cur_time<$time_out_lastUser)
		$time_in=$time_out_lastUser;
	
$time_out=$time_in+60;

//Insert Query
$insertQry = " INSERT INTO queue(login, filename, time_in, time_out) 
			   VALUES('$login','$filename','$time_in', '$time_out')";
			   
$resultInsert = mysql_query($insertQry);

	if(!$resultInsert)
		die("Could not insert the new user");

	header("location: wait.php");
	exit();	
?>
<body>
<br><br><br>
To change your password, please click <a href="changepasswd.php">here</a>
</p>
</body>
</html>