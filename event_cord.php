<?php 
session_start();
if(isset($_SESSION["name_ec"]))
{
		
require 'sql_con.php';
	echo "<!DOCTYPE html>
		<html lang='en'>
				<head>
					<meta charset='utf-8' />
					<title>Event- Coordinator Login</title>
					<style type='text/css'>
					.riviera_logo{
				opacity:0.2;width:1300px;height:600px;
				}
					</style>
				</head>
				<body>
				<div class='head'><h1 class='headtext'>Event Coordinator Account</h1></div>
					<paper-button onclick='home_ec()' class='home'>Home</paper-button>
					<paper-button onclick='Cordinators()' class='recei'>Receipts</paper-button>
					<paper-button onclick='change_pass()' class='changepass'>Change Password</paper-button>
					<a href='logout.php' style='color:black;'><paper-button onclick='Cordinators()' class='logout'>Logout</paper-button></a>
				<div class='footer'><h3 style='text-align:center;color:white;'>Copyrights RIVIERA'15</h3></div>
				<div class='mdisp'>
				<div class='display'>
					<div id ='event_form'>";
					require("ec_home.php");
							echo"</div>
								</div>
								</div>";
								mysqli_close($mysqli);


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
<script type="text/javascript">
// Regular expressions
function isNumber(evt)  
{
		var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 46 && charCode > 31 && (charCode < 48 || charCode > 57))
             return false;
        return true;
}
function isAlpha(evt)     
{     
		var charCode = (evt.which) ? evt.which : evt.keyCode;
        if (charCode != 32 && charCode != 46 && charCode > 31 && (charCode < 97 || charCode > 122)&& (charCode < 65 || charCode > 90))
             return false;
        return true;
}
function isRegno()
{
	var regno = document.getElementById("regno").value;
	var pattern = /^[0-1]{1}[0-9]{1}[a-zA-Z]{3}[0-9]{4}$/;
	if(!regno.match(pattern))
	{
		document.getElementById("regnoer").innerHTML = "Enter a valid Regno";
	}
	else
	{
		document.getElementById("regnoer").innerHTML = "";
	}
}
function change_pass()	//done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("event_form").innerHTML=xmlhttp.responseText;
				var res=document.getElementById("event_form").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","change_pass_cord.php?key="+numb,true);
    xmlhttp.send();
}

function sub_pass()
{
var f=0;
var np1 = document.getElementById("np").value; 
var np2 = document.getElementById("rnp").value; 
if(!(np1==np2))
{
	f = 1;
	alert("Both Passwords should match");
}
if((np1=="")&&(np2==""))
{
	f=1;
	alert("Password cannot be null");
}
if(f==0)
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("event_form").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("event_form").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("POST","sub_pass_cord.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("np="+np1);
}
}

function home_ec()	//done
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("event_form").innerHTML=xmlhttp.responseText;
    	}
  	}
  	xmlhttp.open("GET","ec_home.php",true);
    xmlhttp.send();
}
//prints individual events excel
function excel_indevent(id)
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


function reg()
{
	var res1=document.getElementById("rno_check").innerHTML;
	if(res1.indexOf("exists")>0)
	{
		alert("Receipt already exists!");
		return false;
	}
	var res=document.getElementById("minmaxerror").innerHTML;
	if(res.indexOf("NOT")>0)
		alert("Enter valid number of participants");
	else
	{
	var ename ="";
	var n = document.getElementById("name").value; 
	var rno = document.getElementById("rno").value;
	var regno = document.getElementById("regno").value; 
	var ph = document.getElementById("phno").value;
	var event = document.getElementsByName("event[]");
	var pattern = /^[0-1]{1}[0-9]{1}[a-zA-Z]{3}[0-9]{4}$/;
	var date = document.getElementById("date").value;
	var isChecked = false;
	if(n==""||rno==""||regno==""||date==""||ph==""||n==""||!rno||!regno||!date||!ph)
	{
		alert("Enter all the details!");
		return;
	}
	if(ph.length!=10||!regno.match(pattern))
	{
		alert("Invalid Phone no or Register no!");
		return false;
	}
	for (var i = 0; i < event.length; i++) 
	{
		if (event[i].checked)
		{
		isChecked = true; 
		ename = event[i].value;
		var participants = document.getElementById(ename).value;
		if(participants==0)
		{
			alert("Enter valid number of participants");
			return;
		}
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("event_form").innerHTML=xmlhttp.responseText;
				var res=document.getElementById("event_form").innerHTML;
				if(res.indexOf("dhS8!)")>0)
				{
					window.location = 'login.php';
				}
			}
		}
		xmlhttp.open("POST","sub_reg_1.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("name="+n+"&rno="+rno+"&date="+date+"&regno="+regno+"&number_participants="+participants+"&ph="+ph+"&event="+ename);
		break;
		}
	}
	if(isChecked==false)
	{
	alert("Select a event!");
	}
	}
}
function reg_mess()
{
	var res=document.getElementById("minmaxerror").innerHTML;
	if(res.indexOf("NOT")>0)
		alert("Enter valid number of participants");
	else
	{
	var ename=[];
	var team=[];
	isChecked = false;
	var mail = document.getElementById("email").value;
	var ph = document.getElementById("phno").value;
	var events = document.getElementsByName("event[]");
	var pattern = /^[0-1]{1}[0-9]{1}[a-zA-Z]{3}[0-9]{4}$/;
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var regno = document.getElementById("regno").value; 
	var date = document.getElementById('date').value;
	var t = document.getElementsByName('min_and_max[]');
	var j =0;
	if(mail==""||regno==""||date==""||!mail||!regno||!date)
	{
		alert("Enter all the details");
		return false;
	}
	if(ph.length!=10||!regno.match(pattern))
	{
		alert("Invalid Phone no or Register no!");
		return false;
	}
	if(!mail.match(mailformat))
	{
		alert("Invalid Email ID!");
		return false;
	}
	for (var i = 0; i < events.length; i++) 
	{
		if (events[i].checked)		
		{		
			ename[j] = events[i].value;
			team[j]=t[i].value;
			isChecked = true;
			if(team[j]==0||!team[j]||team[j]=="")
			{
				alert("Enter valid number of participants");
				isChecked = false;
				return;
			}
			j++;
		}
	}
	if(isChecked == false)
	{
		alert("Select a event!");
	}
	else
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("event_form").innerHTML=xmlhttp.responseText;
				var res=document.getElementById("event_form").innerHTML;
				if(res.indexOf("dhS8!)")>0)
				{
					window.location = 'login.php';
				}
			}
		}
		xmlhttp.open("POST","sub_reg_mess_1.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("regno="+regno+"&event="+ename+"&date="+date+"&team="+team+"&mail="+mail+"&ph="+ph);
	}
	}
}

function rec_no_check()
{
	var rno = document.getElementById("rno").value;
	if(rno.length==5)
	{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("rno_check").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("rno_check").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("POST","rno_check.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("r="+rno);
}
}
function checkminmax(name)
{
	var numb = document.getElementById(name).value;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("minmaxerror").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("minmaxerror").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("POST","min_max_checking.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("name="+name+"&value="+numb);
}	
function cash_home()	//done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("event_form").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("event_form").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","ec_cash.php?key="+numb,true);
    xmlhttp.send();
}

function mess_home()		
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("event_form").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("event_form").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","ec_mess.php?key="+numb,true);
    xmlhttp.send();
}
function Cordinators()
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("event_form").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("event_form").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","Event_cord_reciepts.php?key="+numb,true);
	xmlhttp.send();
}

</script>
<script src='components/platform/platform.js'></script>
<link rel='import' href='components/polymer/polymer.html'>
<link rel='import' href='components/paper-button/paper-button.html'>
<link rel="stylesheet" type="text/css" href="event_cord.css">