<?php
	require_once('auth.php');
?>
<?//Connection and sanitize Section. 
	
//Include the file for connection to DB
require_once('connectdb.php');
?>

<html>
<head>
<title>waiting</title>
<link rel="stylesheet" href="readme_files/screensmall.css" type="text/css" media="screen">
<script type='text/javascript'>

//window.onload=Init;

dg0 = new Image();dg0.src = "dg0.gif";
dg1 = new Image();dg1.src = "dg1.gif";
dg2 = new Image();dg2.src = "dg2.gif";
dg3 = new Image();dg3.src = "dg3.gif";
dg4 = new Image();dg4.src = "dg4.gif";
dg5 = new Image();dg5.src = "dg5.gif";
dg6 = new Image();dg6.src = "dg6.gif";
dg7 = new Image();dg7.src = "dg7.gif";
dg8 = new Image();dg8.src = "dg8.gif";
dg9 = new Image();dg9.src = "dg9.gif";
dgam= new Image();dgam.src= "dgam.gif";
dgpm= new Image();dgpm.src= "dgpm.gif";
dgc = new Image();dgc.src = "dgc.gif";

function dotime(hr,mn,se){ 
var tot=' '+hr+mn+se;
//alert(tot.substring(5,6));
document.hr1.src = 'dg'+tot.substring(1,2)+'.gif';
document.hr2.src = 'dg'+tot.substring(2,3)+'.gif';
document.mn1.src = 'dg'+tot.substring(3,4)+'.gif';
document.mn2.src = 'dg'+tot.substring(4,5)+'.gif';
document.se1.src = 'dg'+tot.substring(5,6)+'.gif';
document.se2.src = 'dg'+tot.substring(6,7)+'.gif';
}

var hr,mins,secs,TimerRunning,TimerID;
 TimerRunning=false;
 
 function Init(time) //call the Init function when u need to start the timer
 {
	//alert("In Init");

	hr=Math.floor(time/3600);
    mins=(Math.floor(time/60)-(hr*60));
	secs=(time%60);
	
    
    StartTimer();
	//StopTimer();
 }
 
 function StopTimer()
 {
    if(TimerRunning)
       clearTimeout(TimerID);
    TimerRunning=false;
 }
 
 function StartTimer()
 {
 //alert("In startTimer");
    TimerRunning=true;
	
    dotime(Pad(hr),Pad(mins),Pad(secs));
    TimerID=self.setTimeout("StartTimer()",1000);
 
    Check();
    
	if((hr==0 && mins==0) && secs==0)
		stopTimer();
    if(mins==0 && hr>0)
       {
		hr--;
		mins=60;
	   }
    
    if(secs==0 && mins > 0)
    {
       mins--;
       secs=60;
    }
    secs--;
 
 }
 
 function Check()
 {
    //if(mins==5 && secs==0)
      // alert("You have only five minutes remaining");
    /*else */if((hr==0 && mins==0) && secs==0)
    {
       window.location="simulate.php";
    }
 }
 
 function Pad(number) //pads the mins/secs with a 0 if its less than 10
 {
    if(number<10)
       number=0+""+number;
    return number;
 }


</script>
</head>

<body>
<center>
<br><font size="6">
	<p><h1>Upload Success</h1></span> 
	</font>
	<font size="5">
	<p><br><br><br>You are in queue for the simulation.<br><br><br>The time left for your slot is:<br><br><br><br><br</p>
	</font>
	
<table>
<td bgcolor='black' height='45'>
<img src='dg0.gif' name='hr1'>
<img src='dg0.gif' name='hr2'>
<img src='dgc.gif' name='c'>
<img src='dg0.gif' name='mn1'>
<img src='dg0.gif' name='mn2'>
<img src='dgc.gif' name='c'>
<img src='dg0.gif' name='se1'>
<img src='dg0.gif' name='se2'> 

</td></table>
</center>

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

if(!$UserRowResult){
	header("location: sim-exit.php");
	exit();
}

//Times of the user
$time_in=$UserRowResult['time_in'];
$time_out=$UserRowResult['time_out'];

$time_left = $time_in - time();
if($time_left>0)
	{
		echo '<SCRIPT LANGUAGE="javascript">';
		//echo 'alert($time_left);';
		echo 'Init('.$time_left.');';
		echo '</script>';
	}
	
if(($time_left<=0)&&($time_left>-60)){
	header("location: simulate.php");
	exit();
}

if($time_left<=-60)
	die("I dont know how you managed to reach this loop, you should have been thrown out earlier. Slot already passed");
	
?>

<font size="4">
<p><br><br><br><br><a href="logout.php"><font color="red">Click here</font></a> to logout from your account.</p>
</font>

</body>
</html>