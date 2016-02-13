<?php 
	
	$name="";
	session_start();
	if(isset($_SESSION["password"]))
	{
		require 'sql_con.php';
		$reg=$_SESSION["password"];
		$seats_filled = array();
		$price = 0;
		$price_mess = 0;
		$price_cash = 0;
		$price_deleted = 0;
		$number_of_events = 0;
		$sql = "SELECT * from events";
		$res = mysqli_query($mysqli,$sql);
		if($res == true)
		{
			while($arr = mysqli_fetch_array($res))
			{
				$number_of_events+=1;
			}
		}
		else
		{
			echo "Events are not selected";
		}
		$sql1 = "select sum(amount) from registration";
		$res1 = mysqli_query($mysqli,$sql1);
		$arr1 = mysqli_fetch_row($res1);
			$price_cash = $arr1[0];
		
		$sql2 = "select sum(amount) from registration_mess";
		$res2 = mysqli_query($mysqli,$sql2);
		$arr2 = mysqli_fetch_row($res2);
			$price_mess = $arr2[0];
		
		$sql4 = "select sum(amount) from `deleted_registration`";
		$res4 = mysqli_query($mysqli,$sql4);
		$arr4 = mysqli_fetch_row($res4);
			$price_deleted=$arr4[0];
		
		$price = $price_mess + $price_cash;
	echo "
		<!doctype html>
		<html lang='en'>
		<head>
		    <meta charset='utf-8' />
		    <title>Riviera | Admin Login</title>
		    <script src='components/platform/platform.js'></script>
			<link rel='import' href='components/polymer/polymer.html'>
			<link rel='import' href='components/paper-button/paper-button.html'>
			<style type='text/css'>
			body{background-image:url('bg.jpg');background-repeat:no-repeat;background-attachment: fixed;}
			.head{
			position:fixed;top:0px;left:0px;
			width:100%;height:100px;
			background-color:rgba(0,0,0,0.7);box-shadow: 7px 7px 7px #61622F;z-index:10;
			}
			.headtext{
			position:fixed;left:80px;top:15px;color:rgba(240,240,240,0.8);
			}
			.home{
			position:fixed;color:white;top:50px;left:728px;border:none;width:150px;height:50px;background-color:rgba(255,255,255,0);font-size:18px;z-index:10;
			}
			.home:hover{background-color:rgba(255,255,255,0.8);color:black;}
			.event{
			position:fixed;top:50px;color:white;left:878px;border:none;width:150px;height:50px;background-color:rgba(255,255,255,0);font-size:18px;z-index:10;
			}
			.event:hover{background-color:rgba(255,255,255,0.8);color:black;}
			.coord{
			position:fixed;top:50px;color:white;left:1028px;border:none;width:170px;height:50px;background-color:rgba(255,255,255,0);font-size:18px;z-index:10;
			}
			.coord:hover{background-color:rgba(255,255,255,0.8);color:black;}
			.logout{
			position:fixed;top:50px;color:white;left:1198px;border:none;width:150px;height:50px;background-color:rgba(255,255,255,0);font-size:18px;z-index:10;
			}
			.logout:hover{background-color:rgba(255,255,255,0.8);color:black;}
			.mdisp{
			-webkit-animation: fadein 3s;-moz-animation: fadein 3s;-ms-animation: fadein 3s;
			}
			.display{
			position:absolute;left:200px;top:150px;background-color:rgba(241,238,99,0.8);width:792px;height:570px;color:#61622F;box-shadow: 3px 7px 7px #61622F;
			}
			.display1{
			position:absolute;left:140px;top:150px;background-color:rgba(241,238,99,0.8);width:425px;height:570px;box-shadow: 3px 7px 7px #61622F;
			border-left-style:solid;
			border-left-color:grey;
			border-left-width:1px;
			}
			.display2{
			position:absolute;left:600px;top:150px;background-color:rgba(241,238,99,0.8);width:425px;height:570px;box-shadow: 3px 7px 7px #61622F;
			}
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
			.events{
			position:fixed;top:150px;background-color:#fbfbfb;left:1100px;width:250px;height:130px;box-shadow: -3px 3px 7px #61622F;opacity:0.9;color:#42403E;
			-webkit-animation: fadein 6s;-moz-animation: fadein 6s;-ms-animation: fadein 6s;
			}
			.money{
			position:fixed;top:300px;background-color:#fbfbfb;left:1100px;width:250px;height:250px;box-shadow: -3px 3px 7px #61622F;opacity:0.9;color:#42403E;
			-webkit-animation: fadein 6s;-moz-animation: fadein 6s;-ms-animation: fadein 6s;
			}
			.name{
			position:relative;left:5px;height:30px;width:330px;font-size:18px;
			}
			.percent{
			position:relative;left:210px;height:30px;top:-30px;width:100px;font-size:18px;
			}
			.eventdisp{
			position:absolute;left:200px;top:150px;background-color:rgba(254,243,167,0.8);width:792px;height:500px;color:#61622F;box-shadow: 3px 7px 7px #9C9C9C;
			overflow:auto;}
			.riviera_logo{
			opacity:0.2;width:1300px;height:600px;
			}
			.footer{
				position:absolute;top:750px;left:0px;height:50px;background-color:rgba(0,0,0,0.8);width:100%;
			}
			.footer1{
				position:relative;top:50px;left:0px;height:50px;background-color:rgba(0,0,0,0.8);width:100%;
			}
			
			</style>	
		</head>";
		
		//Navigation Bar
		
		echo "
		<body onload='home();'  unresolved>
		<div class='head'><h1 class='headtext'>Admin Account</h1></div>
		<paper-button onclick='home()' class='home'>Home</paper-button>
		<paper-button onclick='events()' class='event'>Events</paper-button>
		<paper-button onclick='receipts_home()' class='coord'>Receipt Books</paper-button>
		<a href='logout.php' style='color:black;'><paper-button onclick='Cordinators()' class='logout'>Logout</paper-button></a>	
		<div class='events'><h3 style='position:absolute;top:10px;left:20px;'>Total  Number of Events: ".$number_of_events."</h3>
		<h3 style='position:absolute;top:30px;left:20px;'>Total Money Collected: ".$price."</h3></div>
		<div class='money'>
		<h3 style='position:absolute;top:1px;left:30px;'>Total Money Collected - Cash registration: ".$price_cash."</h3>
		<h3 style='position:absolute;top:70px;left:30px;'>Total Money Collected - Mess registration: ".$price_mess."</h3>
		<h3 style='position:absolute;top:140px;left:30px;'>Total Money Collected -Deleted registrations: ".$price_deleted."</h3>
		</div>
		<div class='footer'><h3 style='text-align:center;color:white;'>Copyrights RIVIERA'15</h3></div>";  	
		  echo
		  "<div class='mdisp'><div id='display'>";  	
		      	echo" </div></div></div></td></body></html>";
		mysqli_close($mysqli);
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
		$er="Enter a valid Regno";
		document.getElementById("regnoer").innerHTML = $er;
	}
	else
	{
		document.getElementById("regnoer").innerHTML = "";
	}
}
//Main admin page

function home()//(admin.php , home.php)  //done
{	
	document.getElementById("display").classList.remove('eventdisp');
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("again")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","home.php?key="+numb,true);
    xmlhttp.send();
}

function getdetails_iso(name)//(deleted_events.php , events_intermediate_iso.php)	//done
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

function events() //(admin.php , events.php) //done
{
	document.getElementById("display").className = "eventdisp";
	
	var numb = "10101";
	
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("again")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  xmlhttp.open("GET","events.php?key="+numb,true);
  xmlhttp.send();
}

function receipts_home() //(admin.php , receiptbooks_detail.php)
{
	document.getElementById("display").className = "eventdisp";
	
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("again")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","receiptbooks_detail.php?key="+numb,true);
    xmlhttp.send();
}

//Events page

function excel_all_events()//(events.php , excel_allevents.php)
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

function getdetails(name)// ((events.php)||(filled_events.php) , events_intermediate.php)	//done
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
  xmlhttp.open("GET","events_intermediate.php?value="+name,true);
  xmlhttp.send();
}

function delete_event(id)//(events_intermediate.php , delete_event.php)	//check it again
{
	var txt = document.getElementById("data").innerHTML;
	var r = confirm("Are you sure to delete it?");
	if (r == true)
	{
		var xmlhttp=new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() 
	  	{
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
		    {
		      events();
		    }
	  	}
	  	xmlhttp.open("POST","delete_event.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+id);
	}
	else
		return;
}

//prints individual events excel

function excel_indevent(id)//(events_intermediate.php , excel_event_regdetails.php)
{
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_event_regdetails.php?id='+id;
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  xmlhttp.open("GET","excel_event_regdetails.php",true);
  xmlhttp.send();
}

function edit_event(name)//(events_intermediate.php , event_edit.php)	//done
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
  xmlhttp.open("GET","event_edit.php?value="+name,true);
  xmlhttp.send();
}

function edit_confirm(id1,t)//(event_edit.php , edit_confirm.php)	//done
{
	var value_totalseats = document.getElementById("modify_totalseats"+id1).value;	
	if(t<value_totalseats)
	{
		var xmlhttp = new XMLHttpRequest();
		xmlhttp.onreadystatechange=function() 
	  	{
		    if (xmlhttp.readyState==4 && xmlhttp.status==200) 
		    {
		    	//Apply the same for every part and run the query for all at once
		      document.getElementById("data").innerHTML=xmlhttp.responseText;
			  var res=document.getElementById("display").innerHTML;
				if(res.indexOf("dhS8!)")>0)
				{
					window.location = 'login.php';
				}
			  
		    }
	  	}
	  	xmlhttp.open("POST","edit_confirm.php",true);
		xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		xmlhttp.send("id="+id1+"&value_totalseats="+value_totalseats);
	}
	else 
	alert("Enter a value greater than "+t+"\nRegistered Students: "+t);
}

function search_events(st)//(all the event's files with a search box , event_search.php )	//done
{
var s = document.getElementById("search").value;
var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("disp_1").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("disp_1").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  	xmlhttp.open("GET","event_search.php?s="+s+"&s1="+st,true);
    xmlhttp.send();
}

function filled_events()//(events.php ,filled_events.php)  //done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("again")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  xmlhttp.open("GET","filled_events.php?key="+numb,true);
  xmlhttp.send();
}

function excelevent_filled()//( filled_events.php , excel_allevents_filled.php)		//add this
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

function deleted_events()//(events.php , deleted_events.php)	//done
{
	var xmlhttp=new XMLHttpRequest();
  	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("again")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","deleted_events.php?key="+numb,true);
    xmlhttp.send();
}


function excel_delevents()//(deleted_events.php , excel_delevents.php)	//add this 
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


//Receipt books page

function add_book()//(receiptbooks_detail.php , add_receipt_book.php)	//done with post
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("again")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  xmlhttp.open("POST","add_receipt_book.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("key="+numb);
}

function book_id_fields()// ( add_receipt_book.php ,add_book_id_fields.php)  //done
{
var s = document.getElementById("totalbooks").value;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("books_id").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("books_id").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
 xmlhttp.open("POST","add_book_id_fields.php",true);
 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 xmlhttp.send("no="+s);
}

function all_book()//(receiptbooks_detail.php , receipt_book_details.php)	//done
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
  xmlhttp.open("POST","receipt_book_details.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("s=2");
}

function pending_book()//(receiptbooks_detail.php , receipt_book_details.php)	//done
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
  xmlhttp.open("POST","receipt_book_details.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("s=0");
}

function returned_book()//(receiptbooks_detail.php , receipt_book_details.php)
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
   xmlhttp.open("POST","receipt_book_details.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("s=1");
}

function pending_to_delivered(id)//(receipt_book_details.php , pending_to_delivered.php)
{
	var book_id = id;
	var c = confirm("Do you want to change the status of receipt book "+id+" to delivered?");
	if(c==true)
	{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
		document.getElementById("receipt_table").innerHTML=xmlhttp.responseText;	
		document.getElementById("search").value ="";
		var res=document.getElementById("receipt_table").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
    }
  xmlhttp.open("POST","pending_to_delivered.php",true);
  xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
  xmlhttp.send("id="+book_id);
}
else
	document.getElementById(book_id).checked = false;
}


function download_all()//(receipt_book_details.php , excel_receipt_book.php)	//add this
{
var n = 2;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = "excel_receipt_book.php?no="+n;
    	}
  	}
 xmlhttp.open("POST","excel_receipt_book.php",true);
 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 xmlhttp.send();
}

function download_pending()//(receipt_book_details.php , excel_receipt_book.php)	//add this
{
	var n = 0;
	var xmlhttp=new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = "excel_receipt_book.php?no="+n;
    	}
  	}
 xmlhttp.open("POST","excel_receipt_book.php",true);
 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 xmlhttp.send();
}

function download_returned()//(receipt_book_details.php , excel_receipt_book.php)	//add this
{
var n = 1;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = "excel_receipt_book.php?no="+n;
    	}
  	}
 xmlhttp.open("POST","excel_receipt_book.php",true);
 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 xmlhttp.send();
}

function search_receipt_book(s) //(receipt_book_details.php , search_receiptbook.php)
{
var search = document.getElementById("search").value;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("receipt_table").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("receipt_table").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
 xmlhttp.open("POST","search_receiptbook.php",true);
 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 xmlhttp.send("s="+s+"&search="+search);
}

function date_receiptbook_search(s) //(receipt_book_details.php , search_receiptbook_date.php)
{
var from = document.getElementById("from").value;
var to = document.getElementById("to").value;
var xmlhttp=new XMLHttpRequest();
xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("receipt_table").innerHTML=xmlhttp.responseText;
    	}
  	}
 xmlhttp.open("POST","search_receiptbook_date.php",true);
 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 xmlhttp.send("s="+s+"&from="+from+"&to="+to);
}

//Add event

function addevent()//(events.php , NewEvent.php) //done
{
	var numb = "10101";
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("again")>0)
			{
				window.location = 'login.php';
			}
		}
  	}
  	xmlhttp.open("GET","NewEvent.php?key="+numb,true);
    xmlhttp.send();
}


function selected_individual()//(NewEvent.php , choosen_individual.php)	//done
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
  xmlhttp.open("GET","choosen_individual.php?key="+numb,true);
  xmlhttp.send();
}

function selected_club()//(NewEvent.php , choosen_club.php)		//done
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
  xmlhttp.open("GET","choosen_club.php?key="+numb,true);
  xmlhttp.send();
}

function enter_indiv_acc()//(choosen_individual.php , account_indiv.php)
{
	var n = document.getElementById("name").value; 
	var price = document.getElementById("price").value;
	var seats = document.getElementById("seats").value;
	var min_numb = document.getElementById("min_numb").value;
	var max_numb = document.getElementById("max_numb").value;
	var event = document.getElementsByName("type_event[]");
	var isChecked = false;
	if(n!=""&& price!=""&&seats!=""&&min_numb!=""&&max_numb!="")
	{
	if(min_numb<=max_numb)
	{
	for (var i = 0; i < event.length; i++) 
	{
		if (event[i].checked)
		{
			isChecked = true; 
			var per_participant = event[i].value;
			//alert("The status of the per_participant is "+per_participant);
			var xmlhttp = new XMLHttpRequest();
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
			xmlhttp.open("GET","account_indiv.php?name="+n+"&price="+price+"&seats="+seats+"&min_number="+min_numb+"&max_number="+max_numb+"&per_participant="+per_participant,true);
		  	xmlhttp.send();
		}
	}
	if(isChecked == false)
		alert("Select the type of event");
	}
	else
	alert("Mininmum value greater than maximum value");
	}
	else
	alert("Enter all details");
}

function acc_indiv_details(id)//(account_indiv.php , make_account_indiv.php)
{
	var name = document.getElementById("username").value; 
	var password = document.getElementById("password").value;
	var mail = document.getElementById("mail").value;
	if(name==""||password=="")
	{
		alert("Enter ID and password!");
		return false;
	}
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(!mail.match(mailformat))
	{
		alert("Invalid Email ID!");
		return false;
	}
	var xmlhttp = new XMLHttpRequest();
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
	xmlhttp.open("POST","make_account_indiv.php",true);
	xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	xmlhttp.send("name="+name+"&password="+password+"&id="+id+"&mail="+mail);
}

function enter_club_event()//(making_new_club_1.php , adding_club.php)//done
{
	var n = document.getElementById("name").value; 
	var e = document.getElementById("mail").value; 
	var mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
	if(e==""||n=="")
	{
		alert("Enter all details!");
		return false;
	}
	if(!e.match(mailformat))
	{
		alert("Invalid Email ID!");
		return false;
	}
	var xmlhttp = new XMLHttpRequest();
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
	xmlhttp.open("GET","adding_club.php?name="+n+"&mail="+e,true);
  	xmlhttp.send();
}

function club_user_err(t,divid)//(adding_club.php , ind_user_err.php)
{	

	var n =t.value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
			divid.innerHTML=xmlhttp.responseText;
			var res=divid.innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
	}
	xmlhttp.open("GET","ind_user_err.php?n="+n,true);
	xmlhttp.send();
}

function club_exists(id)//(choosen_club.php , adding_exsisting_club.php)
{
	var name = document.getElementById(id).value;
	var xmlhttp = new XMLHttpRequest();
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
  	xmlhttp.open("GET","adding_exsisting_club.php?club_id="+id,true);
  	xmlhttp.send();
}

function make_new_club()//(choosen_club.php , making_newclub_1.php)	//done
{
	
	alert("First Enter the club details and then proceed for club registration");
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
	xmlhttp.open("GET","making_newclub_1.php?key="+numb,true);
	xmlhttp.send();
}

function ind_user_err()//(account_indiv.php , ind_user_err.php)
{
	var n = document.getElementById("username").value;
	
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		    document.getElementById("ind_user_err").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("ind_user_err").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
		}
	}
	xmlhttp.open("GET","ind_user_err.php?n="+n,true);
	xmlhttp.send();
}

function oldclub_newevent_details_1(id)//(adding_exsisting_club.php , oldclub_newevent_1.php)
{
	var n = document.getElementById("name_c").value; 
	var price = document.getElementById("price_c").value;
	var seats = document.getElementById("seats_c").value;
	var min_numb = document.getElementById("min_numb_c").value;
	var max_numb = document.getElementById("max_numb_c").value;
	var event = document.getElementsByName("type_event_c[]");
	var isChecked = false;
	if(n!=""&& price!=""&&seats!=""&&min_numb!=""&&max_numb!="")
	{
	if(min_numb<=max_numb)
	{
	for (var i = 0; i < event.length; i++) 
	{
		if (event[i].checked)
		{
			isChecked = true; 
			var per_participant = event[i].value;
			//alert("The satus of the per_participant is "+per_participant);
			var xmlhttp = new XMLHttpRequest();
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
			xmlhttp.open("GET","oldclub_newevent_1.php?name="+n+"&price="+price+"&seats="+seats+"&min_number="+min_numb+"&max_number="+max_numb+"&per_participant="+per_participant+"&club_id="+id,true);
		  	xmlhttp.send();
		}
	}
	if(isChecked == false)
		alert("Select the type of event");
	}
	else
	alert("Mininmum value greater than maximum value");
	}
	else
	alert("Enter all details!");
}


function make_club_accounts(id)//(adding_club.php , making_club_accounts.php)
{
	var user_1 = document.getElementById("username_1").value;
	var pass_1 = document.getElementById("password_1").value;
	
	var user_2 = document.getElementById("username_2").value;
	var pass_2 = document.getElementById("password_2").value;
	
	var user_3 = document.getElementById("username_3").value;
	var pass_3 = document.getElementById("password_3").value;
if(user_1!=""&&pass_1!=""&&user_2!=""&&pass_2!=""&&user_3!=""&&pass_3!="")
{
	var xmlhttp = new XMLHttpRequest();
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
	xmlhttp.open("GET","making_club_accounts.php?user_1="+user_1+"&pass_1="+pass_1+"&user_2="+user_2+"&pass_2="+pass_2+"&user_3="+user_3+"&pass_3="+pass_3+"&club_id="+id,true);
  	xmlhttp.send();
}
else
alert("Enter all ID and passwords!");
}

//no commented files are the files of the reciepts which ar now transferred to event_reg.php(co-ordinator login)
///from here
function Select_events(id_receipt)
{
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  xmlhttp.open("GET","confirm_receipt.php?value="+id_receipt,true);
  xmlhttp.send();
}


function approve_events(id_receipt)
{
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  xmlhttp.open("GET","selected_for_approval.php?value="+id_receipt,true);
  xmlhttp.send();

}

function Query_events(id_receipt)
{
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  xmlhttp.open("GET","query_receipt.php?value="+id_receipt,true);
  xmlhttp.send();
}

function add_query_reciept()
{
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  xmlhttp.open("GET","confirm_query_receipt.php",true);
  xmlhttp.send();
}

function download_receipts_cash()
{
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  xmlhttp.open("GET","download_receipts_cash.php",true);
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
    	}
  	}
  	xmlhttp.open("GET","search_receipts_cash.php?s="+s,true);
    xmlhttp.send();
}
else
document.getElementById("download_cash").innerHTML="Enter a 3 digit Receipt book no";
}

function receipt_cash()
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  xmlhttp.open("GET","receipts_cash_button.php",true);
  xmlhttp.send();
}

function receipt_mess()
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  	xmlhttp.open("GET","receipts_mess_button.php",true);
    xmlhttp.send();
}
function excel_query_cash_receipts()
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

function excel_approve_cash_receipts()
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



function approve_mess_receipts()
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  	xmlhttp.open("GET","approve_mess_receipts.php",true);
    xmlhttp.send();
}

function query_mess_receipts()
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  	xmlhttp.open("GET","query_mess_receipts.php",true);
    xmlhttp.send();
}

function all_mess_receipts()
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  	xmlhttp.open("GET","all_mess_receipts.php",true);
    xmlhttp.send();
}

function download_mess_receipts()
{
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  	xmlhttp.open("GET","download_receipts_mess.php",true);
    xmlhttp.send();
}

function query_mess_receipts_1(id_receipt)
{
	alert(id_receipt);
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  xmlhttp.open("GET","query_receipts_mess.php?value="+id_receipt,true);
  xmlhttp.send();
}

function approve_mess_receipts(id_receipt)
{
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
    	}
  	}
  xmlhttp.open("GET","approve_mess_receipts.php?value="+id_receipt,true);
  xmlhttp.send();
}

function excel_mess_receipts()
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
function excel_indevent_deleted(id)//(events_intermediate.php , excel_indevent_deleted.php.php)
{
var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_indevent_deleted.php?id='+id;
    	}
  	}
  xmlhttp.open("GET","excel_indevent_deleted.php",true);
  xmlhttp.send();
}

function getdetails_deleted(name)
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
  xmlhttp.open("GET","getdetails_deleted.php?value="+name,true);
  xmlhttp.send();
}


function excel_delreceipts()//(deleted_events.php , excel_delreceipts.php)
{
var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_delreceipts.php';
    	}
  	}
  xmlhttp.open("GET","excel_delreceipts.php",true);
  xmlhttp.send();
}
function sub_receipt_book()//(add_receipt_book.php, sub_receipt_book.php)	//done with post
{
	var name = document.getElementById("name").value;
	var regno = document.getElementById("regno").value;
	var ph = document.getElementById("ph").value;
	var from = document.getElementById("from").value;
	var to = document.getElementById("to").value;
	var total = document.getElementById("totalbooks").value;
	var books_id=[];
	for(var i=0;i<total;i++)
	{
		var id = "books_id".concat(i);
		books_id[i]=document.getElementById(id).value;
	}
	var pattern = /^[0-1]{1}[0-9]{1}[a-zA-Z]{3}[0-9]{4}$/;
	
	if(name!=""&&regno!=""&&ph!=""&&from!=""&&to!=""&&total!=""&&books_id!="")
	{
		if(ph.length==10&&regno.match(pattern))
		{
			var numb = "10101";
			var xmlhttp=new XMLHttpRequest();
			xmlhttp.onreadystatechange=function()
			{
				if (xmlhttp.readyState==4 && xmlhttp.status==200)
				{
					document.getElementById("display").innerHTML=xmlhttp.responseText;
					var res=document.getElementById("display").innerHTML;
					if(res.indexOf("again")>0)
					{
						window.location = 'login.php';
					}
				}
			}
			xmlhttp.open("POST","sub_receipt_book.php",true);
			xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
			xmlhttp.send("key="+numb+"&name="+name+"&regno="+regno+"&ph="+ph+"&from="+from+"&to="+to+"&total="+total+"&books_id="+books_id);
		}
		else
			alert("Invalid Phone no or Register no!");
	}
	else
		alert("Enter all details!");
	
}

</script>