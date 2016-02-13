<?php
session_start();
if(isset($_SESSION["name_iso"]))
{
?>
<!DOCTYPE html>
<html>
<head>
<title>ISO Login</title>
<style type="text/css">
@-webkit-keyframes fadein {
			from { opacity: 0; }
			to   { opacity: 0.9; }
			}

.excelevent{
position:absolute;top:70px;left:50px;width:180px;height:80px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.deleteevent{
position:absolute;top:70px;left:430px;width:180px;height:80px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.filledevent{
position:absolute;top:70px;left:620px;width:180px;height:80px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.addevent{
position:absolute;top:70px;left:240px;width:180px;height:80px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.but{
position:relative;top:140px;left:80px;width:200px;height:120px;box-shadow: 4px 4px 4px #9C9C9C;border:none;background-color:rgba(255,0,0,0.4);
border-radius:10px;-webkit-animation: fadein 2s;}
.eventbut{
position:relative;top:-5px;left:-8px;width:200px;height:100px;border:none;color:white;font-size:18px;-webkit-animation: fadein 2s;
}
.but:hover{
background-color:rgba(255,0,0,1);
}
.addevent:hover{
background-color:rgba(46,150,254,1);
}
.excelevent:hover{
background-color:rgba(46,150,254,1);
}
.deleteevent:hover{
background-color:rgba(46,150,254,1);
}
.filledevent:hover{
background-color:rgba(46,150,254,1);
}
#search{position:absolute;top:10px;left:320px;width:240px;height:40px;border:none;}
.idisp{position:absolute;top:140px;left:250px;width:900px;height:500px;overflow:auto;background-color:rgba(241,238,99,0.8);box-shadow:7px 7px 7px #61622F;}
body{background-image:url('bg.jpg');}
.head{position:absolute;top:0px;left:0px;width:100%;height:100px;background-color:rgba(0,0,0,0.7);box-shadow: 7px 7px 7px #61622F;z-index:10;}
.headtext{position:fixed;left:80px;top:15px;color:rgba(240,240,240,0.8);}
.logout{
      position:fixed;top:50px;color:white;left:1198px;border:none;width:150px;height:50px;background-color:rgba(255,255,255,0);font-size:18px;z-index:10;
      }
      .logout:hover{background-color:rgba(255,255,255,0.8);color:black;}
.home{
      position:fixed;color:white;top:50px;left:1048px;border:none;width:150px;height:50px;background-color:rgba(255,255,255,0);font-size:18px;z-index:10;
      }
      .home:hover{background-color:rgba(255,255,255,0.8);color:black;}
</style>
</head>
<script src='components/platform/platform.js'></script>
      <link rel='import' href='components/polymer/polymer.html'>
      <link rel='import' href='components/paper-button/paper-button.html'>

<body>
<div class="head"><h1 class="headtext">ISO Account</h1></div>
<a href='logout.php' style='color:black;'><paper-button onclick='Cordinators()' class='logout'>Logout</paper-button></a>  
<?php

	require 'sql_con.php';
	$h=1;
	echo "<div class='idisp'><button  class = 'excelevent' onclick='excel_all_events_iso()' style='font-weight:bold;'>Download all Events</button>";
	echo "<a href='iso_events.php'><button  class = 'addevent' style='font-weight:bold;'>All Events</button></a>";
	echo "<button  class = 'deleteevent' onclick='deleted_events_iso()' style='font-weight:bold;'>Deleted Events</button>";
	echo "<button  class = 'filledevent' onclick='filled_events_iso()' style='font-weight:bold;'>Filled Events</button>";
	echo "<div id = display>";
	echo "<input type ='text' id ='search' autocomplete ='off' onkeyup='search_events_iso($h)' placeholder='Search all events'>";//search
	echo "<div id ='display_1'>";
	$sql = "SELECT * FROM `events`";
	$res = mysqli_query($mysqli,$sql);
	$i=0;
	while($arr=mysqli_fetch_array($res))
	{
		if($i%3==0)
		echo "<br/><br/>";
		$event_name = $arr["event_name"];
		$event_id = $arr["id"];
		$remaining = $arr["totalseats"]-$arr["filled"];
		echo "<button class='but'><p class='eventbut' style='font-weight:bold;' id=".$event_id." onclick='getdetails_iso($event_id);' >".str_replace("_"," ",$event_name)."<br/>filled seats:".$arr["filled"]."<br/>total seats:".$arr["totalseats"]."<br/>vacant seats:".$remaining."</p></button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
		$i+=1;
	}	
	echo "</div></div></div>";
}
else
{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:login.php");
		exit();
}

?>
</body>
</html>
<script type="text/javascript">
function getdetails_iso(name)	//done
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  xmlhttp.open("GET","events_intermediate_iso.php?value="+name,true);
  xmlhttp.send();
}
function deleted_events_iso()		//done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","deleted_events_iso.php?key="+numb,true);
    xmlhttp.send();
}
function filled_events_iso() 		//done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("dhS8!")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  xmlhttp.open("GET","filled_events_iso.php?key="+numb,true);
  xmlhttp.send();
}

function search_events_iso(st)			//done
{
var s = document.getElementById("search").value;
var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display_1").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("display_1").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","event_search_iso.php?s="+s+"&s1="+st,true);
    xmlhttp.send();
}
//Excel
function excelevent_filled_iso()		//done
{
var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_allevents_filled.php';
    	}
  	}
  xmlhttp.open("GET","excel_allevents_filled.php",true);
  xmlhttp.send();
}


function excel_delevents_iso()		//done
{
var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_delevents.php';
    	}
  	}
  xmlhttp.open("GET","excel_delevents.php",true);
  xmlhttp.send();
}

function excel_indevent_iso(id)		//done
{
var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_event_regdetails.php?id='+id;
    	}
  	}
  xmlhttp.open("GET","excel_event_regdetails.php",true);
  xmlhttp.send();
}
function excel_all_events_iso()
{
var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_allevents.php';
    	}
  	}
  xmlhttp.open("GET","excel_allevents.php",true);
  xmlhttp.send();
}
</script>