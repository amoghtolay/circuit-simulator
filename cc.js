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
document.hr1.src = 'dg'+tot.substring(1,2)+'.gif';
document.hr2.src = 'dg'+tot.substring(2,3)+'.gif';
document.mn1.src = 'dg'+tot.substring(3,4)+'.gif';
document.mn2.src = 'dg'+tot.substring(4,5)+'.gif';
document.se1.src = 'dg'+tot.substring(5,6)+'.gif';
document.se2.src = 'dg'+tot.substring(6,7)+'.gif';

}

var hr,mins,secs,TimerRunning,TimerID;
 TimerRunning=false;
 
 function Init(a,b,c) //call the Init function when u need to start the timer
 {
	hr=a;
    mins=b;
    secs=c;
    
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
       window.location="http://jatinga.iitg.ernet.in/~cseintranet/";
    }
 }
 
 function Pad(number) //pads the mins/secs with a 0 if its less than 10
 {
    if(number<10)
       number=0+""+number;
    return number;
 }
