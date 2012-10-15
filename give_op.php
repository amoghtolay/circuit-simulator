<?php
	require_once('auth.php');
?>
<?//Connection and sanitize Section. 
	
//Include the file for connection to DB
require_once('connectdb.php');
require_once "is-user-valid.php";
?>
<html>
<head>
<title>Output of Simulation</title>
<link rel="stylesheet" href="readme_files/screensmall.css" type="text/css" media="screen">
</head>
<body>
<br><br><br>
 <p>
<font size="5">
<a href="sim-exit.php"><b>Click here</b></a> to end simulation.</font><br><br></p>
	<div align="center">
<font size="6"><br><br><br><br>
<?php
require_once "parser.php";
//parsing

$filename=$_SESSION['SESS_UPLOADED_FILE'];

$fp=simplexml_load_file($filename);						//name of the file to be processed= $_SESSION['SESS_UPLOADED_FILE']

$arr=array();
$arr=simplexmltoarray($fp);
require_once "is_input_named.php";
	
	
	if(!is_input_properly_named($arr))
	{
		die('FATAL ERROR!!:THE INPUTS ARE NOT PROPERLY NAMED:<BR>INPUTS SHOULD BE NAMED AS A CONTINUOUS SEQUENCE OF INTEGERS STARTING FROM 0<BR>');
	}
//traversing raw array of gates till end
$gateno=0;
$i=0;
$input_count=1;
while(isset($arr["Circuit"]["Gates"]["Gate"][$gateno]["Type"]))
{

	switch($arr["Circuit"]["Gates"]["Gate"][$gateno]["Type"])
	{
	case "UserInput":
	$gate[$i][1]=0;
	$gate[$i][2]=0;
	$input_name[$i]=$arr["Circuit"]["Gates"]["Gate"][$gateno]["Name"];
	
	$gate[$i][0]=0;
	if($gate[$i][1]==0)
		$name=$arr["Circuit"]["Gates"]["Gate"][$gateno]["Name"];
		if(isset($_POST[$name]))
			$gate[$i][0]=1;
		else
			$gate[$i][0]=0;
	$gate[$i][3]=0;
	$input_count++;
	break;
	
	case "And":
	$gate[$i][1]=1;
	$gate[$i][2]=$arr["Circuit"]["Gates"]["Gate"][$gateno]["NumInputs"];
	$gate[$i][0]=-1;
	$gate[$i][3]=0;
	break;	
	
	case "Or":
	$gate[$i][1]=2;
	$gate[$i][2]=$arr["Circuit"]["Gates"]["Gate"][$gateno]["NumInputs"];
	$gate[$i][0]=-1;
	$gate[$i][3]=0;
	break;
	
	case "Not":
	$gate[$i][1]=3;
	$gate[$i][2]=1;
	$gate[$i][0]=-1;
	$gate[$i][3]=0;
	break;
	
	case "Nand":
	$gate[$i][1]=4;
	$gate[$i][2]=$arr["Circuit"]["Gates"]["Gate"][$gateno]["NumInputs"];
	$gate[$i][0]=-1;
	$gate[$i][3]=0;
	break;
	
	case "Nor":
	$gate[$i][1]=5;
	$gate[$i][2]=$arr["Circuit"]["Gates"]["Gate"][$gateno]["NumInputs"];
	$gate[$i][0]=-1;
	$gate[$i][3]=0;
	break;
	
	case "Xor":
	$gate[$i][1]=6;
	$gate[$i][2]=2;
	
	$gate[$i][0]=-1;
	$gate[$i][3]=0;
	break;
	
	case "Xnor":
	$gate[$i][1]=7;
	$gate[$i][2]=2;

	$gate[$i][0]=-1;
	$gate[$i][3]=0;
	break;
	
	case "UserOutput":
	$gate[$i][1]=8;
	$gate[$i][2]=1;
	$gate[$i][0]=-1;
	$gate[$i][3]=0;
	break;
	
	default:
	die("FATAL ERROR:GATE TYPE NOT SUPPORTED!!<br>");
	$i--;
	break;
	}
	$gateno++;
	$i++;

}
$k=isset($gate[0][0]);

$k=0;
//echo "val................type.............no of i/p.........no of o/p<br>";
for($k=0;isset($gate[$k][0]);$k++)
{
	$j=0;
	for($j=0;isset($gate[$k][$j]);$j++)
	{
		//echo $gate[$k][$j]."...................";//=10*$i+$j;
	}
	//echo "<br>";
}

//traversing wires
$j=0;
while(isset($arr["Circuit"]["Wires"]["Wire"][$j]["From"]['ID']))
{
	$from=$arr["Circuit"]["Wires"]["Wire"][$j]["From"]['ID']-1;
	$to=$arr["Circuit"]["Wires"]["Wire"][$j]["To"]['ID']-1;
	
	$gate[$from][3]++;
	$gate[$from][(3+$gate[$from][3]+$gate[$from][2])]=$to;
	$i=4;
	while(isset($gate[$to][$i]))
	{
		$i++;
		if($i>3+$gate[$to][2])
		{
			die('ERROR!!THE GATE ID NO. '.$to.'CANNOT HAVE MORE THAN '.$GATE[$to][2].'INPUTS!!!');
		}
	}
	$gate[$to][$i]=$from;
	$j++;
}
$i=0;
while(isset($gate[$i][0]))
{
	$last_addr_of_op=$gate[$i][2]+3+$gate[$i][3];
	$first_addr_of_op=$gate[$i][2]+4;
	$ignore_flag[$i]=0;
	for($j=4;$j<$first_addr_of_op;$j++)
	{
		if(!isset($gate[$i][$j]))
			$ignore_flag[$i]=1;
	}	
	$i++;
}
//evaluating
$did_update=0;
$is_incomplete=1;
$flag1=1;
$flag2=0;
while($flag1)
{
	$did_update=0;
	$flag1=0;
	for($i=0;isset($gate[$i][0]);$i++)
	{
		if($ignore_flag[$i]!=0)
			continue;
		$flag2=1;
		if(($gate[$i][0])!=-1)
		{
			//echo 'I am '.$i.' and my value is '.$gate[$i][0].'<br>';
			//$flag2=0;
		}
		else
		{
			$flag1=1;
			$j=4;
			$flag2=0;
			for($j=4;$j<4+$gate[$i][2];$j++)
			{
				$k=$gate[$i][$j];
				if($gate[$k][0]==-1)
				{
					$flag2=1;
				}
			}
			if($flag2==0)
			{
			//	echo 'evaluating '.$i.' by method = '.$gate[$i][1].' ..<br>';
			$did_update=1;	
				switch($gate[$i][1])
				{
					Case '1':
					
						$gate[$i][0]=1;
						for($j=4;$j<4+$gate[$i][2];$j++)
						{
							//echo 'ANDing..<br>';
							$k=$gate[$i][$j];
							$gate[$i][0]=$gate[$i][0]*$gate[$k][0];
						}
					
					break;
					case 2:
					$gate[$i][0]=0;
					for($k=4;$k<=3+$gate[$i][2];$k++)
					{
						$gate[$i][0]=$gate[$i][0]|$gate[$gate[$i][$k]][0];
					}
					break;
					
					case 3:
					$k=$gate[$i][4];
					$gate[$i][0]=1-$gate[$k][0];
					//echo 'inverting..<br>';
					break;
				
					case 4:
						$gate[$i][0]=1;
						for($j=4;$j<4+$gate[$i][2];$j++)
						{
							//echo 'NANDing..<br>';
							$k=$gate[$i][$j];
							$gate[$i][0]=$gate[$i][0]*$gate[$k][0];
						}
						$gate[$i][0]=1-$gate[$i][00];
					break;
					
					case 5:
					$gate[$i][0]=0;
					for($k=4;$k<=3+$gate[$i][2];$k++)
					{
						$gate[$i][0]=$gate[$i][0]|$gate[$gate[$i][$k]][0];
					}
						$gate[$i][0]=1-$gate[$i][0];
					break;
					
					case 6:
					//code for 2 input xor
					$k=$gate[$i][4];
					$kk=$gate[$i][5];
					$gate[$i][0]=($gate[$k][0]+$gate[$kk][0])%2;					//xor=(input1+input2) %2
					
					break;
				
					case 7:
					//code for xnor
					$k=$gate[$i][4];
					$kk=$gate[$i][5];
					$gate[$i][0]=($gate[$k][0]+$gate[$kk][0])%2;					//xor=(input1+input2) %2
					$gate[$i][0]=1-$gate[$i][0];								//inverting..
					break;
				
					case 8:
					$gate[$i][0]=($gate[$gate[$i][4]][0]);
				//	echo "<br>output is ".$gate[$i][0]."<br>";
					
				default:
				break;
				}
			}
		}
	}
	$is_incomplete=$flag1;
	if($is_incomplete&&(!$did_update))
	{
		die('<BR>FATAL ERROR: CIRCULAR REFERENCE OR INCOMPLETE CIRCUIT!!!<BR>');
		$flag1=0;
	}
	//echo $is_incomplete."<-is incomp, ".$did_update.'<-did_update';
}
		
		


$undef_op=0;
for($i=0;isset($gate[$i][0]);$i++)
{
	if($gate[$i][1]==8)
	{
		$name=$arr["Circuit"]["Gates"]["Gate"][$i]["Name"];
		if($name=='UserOutput')
		{
			$undef_op++;
			IF($undef_op==1)
				echo'WARNING: DEFINE NAME OF OUTPUT:<br>';
			
			echo 'output of Undefined Output no. ';
			echo $undef_op;
		}
		else
			//ECHOING OUTPUTS TO SHOW THE OUTPUT IMAGES
			echo 'Output of '.$name;
		
			/*Picture display starts here*/
			
			if($gate[$i][0]!=-1)
			{	
				if($gate[$i][0]==1){
					echo ' is 1: <img src="Ledon.png" height="50" width="50"><br><br><br>';
				}
				if($gate[$i][0]==0){
				echo ' is 0: <img src="Ledoff.png"><br><br><br>';
				//	echo ' is 0: <img src="chk_off_out.png"><br><br>';
				}
				
			}	
			/*Picture display ends here*/
			
			else
				echo ' not connected<br>';
	}
}
?>

</div>
 <p>
<font size="5"><br><br>
<a href="simulate.php"><b>Click here</b></a> to go to try different values of input again.</font><br><br></p>
<br>
</html>