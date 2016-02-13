<?php 
		session_start();
	if(isset($_SESSION["name"]))
	{
		echo "<!DOCTYPE html>
		<html lang='en'>
			<head>
				<meta charset='utf-8' />
				<title>Coordinator-Login</title>
			</head>
			<body>
			<div class='head'><h1 class='headtext'>Co-ordinator Account</h1></div>
			<div id ='main' class ='display'>";
				require("c_home.php");
				echo"</div><br><br>
					<div id ='nav_bar'>
						<paper-button onclick ='home()' id ='home' name ='home' class ='home'>Home</paper-button><br/>
						<paper-button onclick='receipt_details()' class='rece' >Receipts</paper-button>
						<paper-button onclick = 'change_pass()' class ='changepass' >Change Password</paper-button><br/>
						<a href='logout.php'><paper-button class = 'logout'>Logout</paper-button></a>
			</div>
      <div class='footer'><h3 style='text-align:center;color:white;'>Copyrights RIVIERA'15</h3></div>
			</body>
		</html>";
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
<script src='components/platform/platform.js'></script>
<link rel='import' href='components/polymer/polymer.html'>
<link rel='import' href='components/paper-button/paper-button.html'>
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

function receipt_details()//(event_reg.php , c_receipts_home.php)	//done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","c_receipts_home.php?key="+numb,true);
    xmlhttp.send();
}

function mess_receipts()//(c_receipts_home.php , receipts_mess_button.php)	//done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","receipts_mess_button.php?key="+numb,true);
    xmlhttp.send();
}

function cash_receipts()//(c_receipts_home.php , receipts_cash_button.php)	//done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","receipts_cash_button.php?key="+numb,true);
    xmlhttp.send();
}
//download
function download_receipts_cash()//()		//done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  xmlhttp.open("GET","download_receipts_cash.php?key="+numb,true);
  xmlhttp.send();
}

function search_receipts_cash()
{
var s = document.getElementById("search_receipt").value;
if(s.length == 3)
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("download_cash").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("download_cash").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","search_receipts_cash.php?s="+s,true);
    xmlhttp.send();
}
else
document.getElementById("download_cash").innerHTML="Enter a 3 digit Receipt book no";
}

function excel_receipts_cash(s,e)			//done
{
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_receipts_cash.php?s='+s+"&e="+e;
    	}
  	}
  xmlhttp.open("GET","excel_receipts_cash.php",true);
  xmlhttp.send();
}
//approve
function Reciepts()//(receipts_cash_button.php , reciepts_display.php)	//done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  xmlhttp.open("GET","reciepts_display.php?key="+numb,true);
  xmlhttp.send();
}
function excel_approve_cash_receipts()//(reciepts_display.php , excel_approve_cash_receipts.php)
{
var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_approve_cash_receipts.php';
    	}
  	}
  	xmlhttp.open("GET","excel_approve_cash_receipts.php",true);
    xmlhttp.send();
}
function Select_events(id_receipt)//(reciepts_display.php , confirm_receipt.php)
{
	var c = confirm("Do you want to approve receipt no: "+id_receipt+" ?");
	if(c==true)
	{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("receipts").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("receipts").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
	xmlhttp.open("GET","confirm_receipt.php?value="+id_receipt,true);
	xmlhttp.send();
	}
}

function Query_events(id_receipt)//(reciepts_display.php , query_receipt.php)
{
var c = confirm("Do you want to query receipt no: "+id_receipt+" ?");
	if(c==true)
	{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("receipts").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("receipts").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  xmlhttp.open("GET","query_receipt.php?value="+id_receipt,true);
  xmlhttp.send();
}
}

//query receipts
function add_query_reciept()//(receipts_cash_button.php , confirm_query_receipt.php)	//done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  xmlhttp.open("GET","confirm_query_receipt.php?key="+numb,true);
  xmlhttp.send();
}

function excel_query_cash_receipts()//(confirm_query_receipt.php , excel_query_cash_receipts.php)
{
var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_query_cash_receipts.php';
    	}
  	}
  	xmlhttp.open("GET","excel_query_cash_receipts.php",true);
    xmlhttp.send();
}

function approve_events(id_receipt)//(confirm_query_receipt.php , selected_for_approval.php)
{
var c = confirm("Do you want to approve receipt no: "+id_receipt+" ?");
	if(c==true)
	{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("receipts").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("receipts").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  xmlhttp.open("GET","selected_for_approval.php?value="+id_receipt,true);
  xmlhttp.send();
	}
}
function show_all_receipts_admin(s)
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
	xmlhttp.open("GET","display_reciepts_admin.php?key="+numb,true);
    xmlhttp.send();
}
// Excel for all cash receipts
function excel_cash_receipts(s)
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_receipts_all.php?s='+s;
    	}
  	}
  	xmlhttp.open("GET","excel_receipts_all.php",true);
    xmlhttp.send();
}
//Number search for all cash receipts
function search_cash_receipts(s)//(reciepts_display.php , search_all_cash_receipts.php)
{
	var search = document.getElementById("search").value;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("receipts").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("receipts").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","search_all_cash_receipts.php?search="+search+"&s="+s,true);
    xmlhttp.send();
}
//Date search for all cash receipts
function search_cash_date(s)//(reciepts_display.php , search_cash_receipts_date.php)
{
var f = document.getElementById("from").value;
var t = document.getElementById("to").value;
var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("receipts").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("receipts").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","search_cash_receipts_date.php?to="+t+"&from="+f+"&s="+s,true);
    xmlhttp.send();
}
function change_pass()		//done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","change_pass.php?key="+numb,true);
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
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("POST","sub_pass.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("np="+np1);
}
}

function home()//(event_reg.php , c_home.php)
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
		}
  	}
  	xmlhttp.open("GET","c_home.php",true);
    xmlhttp.send();
}

function home_cash()//(c_home.php , coordinator_cash.php)
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","coordinator_cash.php?key="+numb,true);
    xmlhttp.send();
}
function home_mess()//(c_home.php , coordinator_mess.php)
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","coordinator_mess.php?key="+numb,true);
    xmlhttp.send();
}

function event_search_cash()//(coordinator_cash.php , search_event_cash.php)
{
	var s = document.getElementById("search").value;
	if(s.length==0)
	{
		s="";
	}
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("events").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("events").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("POST","search_event_cash.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("s="+s);
}

function event_search_mess()//(coordinator_mess.php , search_event_mess.php)
{
var s = document.getElementById("search").value;
if(s.length==0)
{
s="";
}
var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("events").innerHTML=xmlhttp.responseText;
    	}
  	}
  	xmlhttp.open("POST","search_event_mess.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    xmlhttp.send("s="+s);
}

function checkminmax(name)//(coordinator_cash.php||coordinator_mess.php , min_max_checking.php)
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

function rec_no_check()//(coordinator_cash.php , rno_check.php)
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

function sub_reg()//(coordinator_cash.php , sub_reg_cash.php)
{
	var res=document.getElementById("minmaxerror").innerHTML;
	var regno = document.getElementById("regno").value; 
	var ph = document.getElementById("phno").value;
	var pattern = /^[0-1]{1}[0-9]{1}[a-zA-Z]{3}[0-9]{4}$/;
	var res1=document.getElementById("rno_check").innerHTML;
	if(res1.indexOf("exists")>0)
	{
		alert("Receipt already exists!");
		return false;
	}
	if(res.indexOf("NOT")>0)
	{
		alert("Enter valid no of participants!");
	}
	else
	{
	var ename ="";
	var n = document.getElementById("name").value; 
	var rno = document.getElementById("rno").value;
	var event = document.getElementsByName("event[]");
	var date = document.getElementById('date').value;
	if(rno==""||n==""||regno==""||ph==""||date==""||!rno||!n||!regno||!ph||!date)
      {
        alert("Please fill in all the details");
        return false;
      }
	if(ph.length!=10||!regno.match(pattern))
	{
		alert("Invalid Phone no or Register no!");
		return false;
	}
	var isChecked = false;
	for (var i = 0; i < event.length; i++) 
	{
		if (event[i].checked)
		{
		isChecked = true; 
		ename = event[i].value;
		var team = document.getElementById(ename).value;
		if(!team)
		{
			alert("Enter valid no of participants!");
			return false;
		}

		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function()
		{
			if (xmlhttp.readyState==4 && xmlhttp.status==200)
			{
				document.getElementById("main").innerHTML=xmlhttp.responseText;
				var res=document.getElementById("main").innerHTML;
				if(res.indexOf("dhS8!)")>0)
				{
					window.location = 'login.php';
				}
			}
		}
		xmlhttp.open("POST","sub_reg_cash.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("name="+n+"&rno="+rno+"&regno="+regno+"&ph="+ph+"&event="+ename+"&date="+date+"&team="+team);
		break;
		}
	}
	if(isChecked==false)
	{
		alert("Select a event!");
	}
	}
}
function sub_reg_mess()//(coordinator_mess.php , sub_reg_mess.php)
{
	
	var ename="";
	var team="";
	isChecked = false;
	var mail = document.getElementById("email").value;
	var events = document.getElementsByName("event[]");
	var regno = document.getElementById("regno").value; 
	var date = document.getElementById('date').value;
	var t = document.getElementsByName('min_and_max[]');
	var ph = document.getElementById('phno').value;
	var j =0;
	var pattern = /^[0-1]{1}[0-9]{1}[a-zA-Z]{3}[0-9]{4}$/;
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	var res=document.getElementById("minmaxerror").innerHTML;
	if(res.indexOf("NOT")>0)
	{
		alert("Enter valid no of participants!");
		return false; 
	}  
	if(!regno||!mail||!date||regno==""||mail==""||date=="")
	{
		alert("Enter all the details");
		return false;
	}
	else
	{
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
				ename = events[i].value;
				team = document.getElementById(ename).value;
				if(!team||team=="")
				{
					alert("Enter valid no of participants!");
					return false;
				}
				isChecked = true;
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
				document.getElementById("main").innerHTML=xmlhttp.responseText;
				var res=document.getElementById("main").innerHTML;
				if(res.indexOf("dhS8!)")>0)
				{
					window.location = 'login.php';
				}
			}
		}
		xmlhttp.open("POST","sub_reg_mess.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("regno="+regno+"&event="+ename+"&date="+date+"&team="+team+"&mail="+mail+"&ph="+ph);
		}
	}
}
//Mess receipts
//Download
function download_mess_receipts()//(receipts_mess_button.php , download_receipts_mess.php)
{
		var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","download_receipts_mess.php?key="+numb,true);
    xmlhttp.send();
}
function excel_mess_receipts()//(receipts_mess_button.php , excel_receipts_mess.php)
{
	var s = document.getElementById("min").value;
	var e = document.getElementById("max").value;
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_receipts_mess.php?s='+s+"&e="+e;
    	}
  	}
  	xmlhttp.open("GET","excel_receipts_mess.php",true);
    xmlhttp.send();
}
//all receipts mess
function all_mess_receipts()//(receipts_mess_button.php , all_mess_receipts.php)	//done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","all_mess_receipts.php?key="+numb,true);
    xmlhttp.send();
}
function excel_all_mess_receipts()//(all_mess_receipts.php , excel_all_receipts_mess.php)
{
var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_all_receipts_mess.php';
    	}
  	}
  xmlhttp.open("GET","excel_all_receipts_mess.php",true);
  xmlhttp.send();
}
//approve receipts
function approve_mess_receipts()//(receipts_mess_button.php , approve_mess_receipts.php)
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","approve_mess_receipts.php?key="+numb,true);
    xmlhttp.send();
}

function excel_approve_mess_receipts()//(approve_mess_receipts.php , excel_approve_mess_receipts.php)
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_approve_mess_receipts.php';
    	}
  	}
  	xmlhttp.open("GET","excel_approve_mess_receipts.php",true);
    xmlhttp.send();
}
function approve_mess_receipts_1(id_receipt,s)//(approve_mess_receipts.php , selected_for_approval_mess.php)
{
	var c = confirm("Do you want to approve receipt no: "+id_receipt+" ?");
	if(c==true)
	{
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("receipts").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("receipts").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  xmlhttp.open("GET","selected_for_approval_mess.php?value="+id_receipt+"&s="+s,true);
  xmlhttp.send();
	}
}
function query_mess_receipts_1(id_receipt)//(approve_mess_receipts.php , selected_for_query_mess.php)
{
var c = confirm("Do you want to query receipt no: "+id_receipt+" ?");
	if(c==true)
	{
var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  xmlhttp.open("GET","selected_for_query_mess.php?value="+id_receipt,true);
  xmlhttp.send();
}
}
//query receipts
function query_mess_receipts()//(receipts_mess_button , query_mess_receipts.php)
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("main").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","query_mess_receipts.php?key="+numb,true);
    xmlhttp.send();
}

function excel_query_mess_receipts()//(query_mess_receipts.php , excel_query_mess_receipts.php)
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_query_mess_receipts.php';
    	}
  	}
  	xmlhttp.open("GET","excel_query_mess_receipts.php",true);
    xmlhttp.send();
}
//Number search for all mess receipts
function search_mess_receipts(s)//(approve_mess_receipts.php , search_all_mess_receipts.php)
{
var search = document.getElementById("search").value;
var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("receipts").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("receipts").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","search_all_mess_receipts.php?search="+search+"&s="+s,true);
    xmlhttp.send();
}
//Date search for all mess receipts
function search_mess_date(s)//(approve_mess_receipt.php , search_mess_receipts_date.php)
{
var f = document.getElementById("from").value;
var t = document.getElementById("to").value;
var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("receipts").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("main").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","search_mess_receipts_date.php?to="+t+"&from="+f+"&s="+s,true);
    xmlhttp.send();
}
</script>	
<style type="text/css">
.dname{position:absolute;left:30px;top:80px;width:250px;height:45px;border:none;}
.reg{position:absolute;left:400px;top:40px;width:250px;height:45px;border:none;}
.phone{position:absolute;left:30px;top:100px;width:250px;height:45px;border:none;}
.rec{position:absolute;left:400px;top:100px;width:250px;height:45px;border:none;}
.team{position:absolute;left:30px;top:160px;width:250px;height:45px;border:none;}
.date{position:absolute;left:400px;top:160px;width:250px;height:45px;border:none;}
.search{position:absolute;left:230px;top:340px;width:250px;height:40px;border:none;}
.submit{position:absolute;left:230px;top:280px;width:250px;height:45px;border:none;background-color:#177bbb;color:white;font-size:18px;}

.dname1{position:absolute;left:30px;top:50px;width:250px;height:45px;border:none;}
.reg1{position:absolute;left:400px;top:50px;width:250px;height:45px;border:none;}
.phone1{position:absolute;left:30px;top:140px;width:250px;height:45px;border:none;}
.rec1{position:absolute;left:400px;top:140px;width:250px;height:45px;border:none;}
.team1{position:absolute;left:30px;top:220px;width:250px;height:45px;border:none;}
.date1{position:absolute;left:400px;top:220px;width:250px;height:45px;border:none;}
.search1{position:absolute;left:400px;top:30px;width:250px;height:40px;border:none;}
.submit1{position:absolute;left:230px;top:290px;width:250px;height:45px;border:none;background-color:#177bbb;color:white;font-size:18px;}
@-webkit-keyframes bounceright {
  0% {
	-webkit-transform:translateX(10%);
  }
  
  15% {
  	-webkit-transform:translateX(0);
   
  }
  30% {
  	-webkit-transform:translateX(8%);
  }
  40% {
  	-webkit-transform:translateX(0%);
   
  }
  50% {
  	-webkit-transform:translateX(5%);
  }
  70% {
  	-webkit-transform:translateX(0%);
    
  }
  80% {
  	-webkit-transform:translateX(2%);
  }
}


			body{background-image:url('bg.jpg');background-repeat:no-repeat;}
			.head{
			position:fixed;top:0px;left:0px;
			width:100%;height:100px;
			background-color:rgba(0,0,0,0.7);box-shadow: 7px 7px 7px #61622F;z-index:10;
			}
			.headtext{
			position:absolute;left:80px;top:15px;color:rgba(240,240,240,0.8);z-index:10;
			}
			.home{
			position:fixed;top:50px;color:white;left:710px;border:none;width:160px;height:50px;background-color:rgba(255,255,255,0);font-size:18px;z-index:10;
			}
			.home:hover{background-color:rgba(255,255,255,0.8);color:black;}
			.rece{
			position:fixed;top:50px;color:white;left:870px;border:none;width:160px;height:50px;background-color:rgba(255,255,255,0);font-size:18px;z-index:10;
			}
			.rece:hover{background-color:rgba(255,255,255,0.8);color:black;}
			.changepass{
			position:fixed;top:50px;color:white;left:1020px;border:none;width:200px;height:50px;background-color:rgba(255,255,255,0);font-size:18px;z-index:10;
			}
			.changepass:hover{background-color:rgba(255,255,255,0.8);color:black;}
			.logout{
			position:fixed;top:50px;color:white;left:1200px;border:none;width:160px;height:50px;background-color:rgba(255,255,255,0);font-size:18px;z-index:10;
			}
			.logout:hover{background-color:rgba(255,255,255,0.8);color:black;}
			.mdisp{
			-webkit-animation: fadein 1s;-ms-animation: fadein 1s;-moz-animation: fadein 1s;
			}
			.display{
			position:absolute;left:300px;top:150px;background-color:rgba(254,243,167,0.7);width:792px;height:500px;color:#61622F;box-shadow: 3px 7px 7px #9C9C9C;z-index:0;
			overflow:auto;}
			
			@-webkit-keyframes fadein {
			from { opacity: 0; }
			to   { opacity: 0.9; }
			}
			
      @-moz-keyframes fadein {
      from { opacity: 0; }
      to   { opacity: 0.9; }
      }

      @-ms-keyframes fadein {
      from { opacity: 0; }
      to   { opacity: 0.9; }
      }

      @-o-keyframes fadein {
      from { opacity: 0; }
      to   { opacity: 0.9; }
      }
			.footer{
				position:absolute;top:780px;left:0px;height:50px;background-color:rgba(0,0,0,0.8);width:100%;
			}
			.newpass{position:absolute;top:50px;left:75px;
			width:250px;height:45px;border:none;}
			
			.confirm{
			position:absolute;top:130px;left:75px;
			width:250px;height:45px;border:none;
			}
			.footer{
        position:absolute;top:680px;left:0px;height:50px;background-color:rgba(0,0,0,0.8);width:100%;
      }
</style>
			
			