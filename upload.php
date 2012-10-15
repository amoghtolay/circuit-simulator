<?php
	require_once('auth.php');
	
	//Array to store validation errors
	$errmsg_arr = array();
	
	//Validation error flag
	$errflag = false;
	
?>

<?//Connection and sanitize Section. 
	
//Include the file for connection to DB
require_once('connectdb.php');
?>

<?php 
	$target = "uploaded-files/"; 
	$target = $target . basename($_FILES['uploaded']['name']) ; 
	$ok=1; 
 
	//This is the size condition 
	if ($_FILES['uploaded']['size'] > 800000) 
	{ 
		$errmsg_arr[] = 'File size larger than 800kb is not allowed';
		$errflag = true;
		$ok=0; 
	} 
 
	//This is the limit file type condition 
	
	if ($_FILES['uploaded']['type'] != 'application/octet-stream') 
	{ 
		$errmsg_arr[] = 'Only *.gcg files, ie. Logic Gate Simulator Circuit files are allowed to be uploaded';
		$errflag = true;
		$ok=0; 
	} 
 
	//Here we check that $ok was not set to 0 by an error 
	if (($ok==0)||($_FILES['uploaded']['error'])) 
	{ 
		$errmsg_arr[] = 'Sorry, your file was not uploaded and encountered error(s)';
		$errflag = true;
	} 
	
	//If there are validation errors, redirect back to the member-index page
	if($errflag) {
		$_SESSION['ERRMSG_ARR'] = $errmsg_arr;
		session_write_close();
		header("location: member-index.php");
		exit();
	}
 
?>

<?
	//If everything is ok we try to upload it 

	if($ok)
	{
	
		/*
		Code to check whether the user has already been enqued
		If the user has already a file waiting in the queue, then redirect him to a page informing him that he is still in queue for the specified file
		and show his appropriate counter.
		If the user is not in queue, then go for additions as shown below		
		*/
					//Assigning value to login
					$login=$_SESSION['SESS_USERNAME'];
					
					//Check if cur_time is less than the login time_out, if yes then person is already enqueued and has to wait for simulation
					
					$cur_time=time();
					$qry_check_present="SELECT * FROM queue WHERE login='$login' AND time_out>'$cur_time'";
					$result_check=mysql_query($qry_check_present);
			
					if(mysql_num_rows($result_check)>=1)
					{
						header("location: already-enqueued.php");
						exit();
					}
	
		if(move_uploaded_file($_FILES['uploaded']['tmp_name'], $target)) 
		{ 
				$_SESSION['SESS_UPLOADED_FILE'] = $_FILES['uploaded']['name'];
				//If everything valid, enqueue the user into the table/queue
				require_once('enqueue.php');
		}
		
		if(!$ok) 
		{ 
			echo "Sorry, there was a problem uploading your file."; 
		} 
	} 
 
 ?> 