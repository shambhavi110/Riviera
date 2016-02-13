//ADMIN

function events() //(admin.php , events.php) //done
{
	document.getElementById("display").className = "eventdisp";
	document.getElementById("esearch").className = "esearch";
	var numb = "10101";
	
	var xmlhttp=new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		document.getElementById("display").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("A_GDG_PRODUCT")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  xmlhttp.open("GET","events.php?key="+numb,true);
  xmlhttp.send();
}

function home()//(admin.php , home.php)  //done
{	
	document.getElementById("display").classList.remove('eventdisp');
	document.getElementById("esearch").className = "esearch1";
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

function receipts_home() //(admin.php , receiptbooks_detail.php)  	//done
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

function filled_events()//(events.php ,filled_events.php) //done
{
	document.getElementById("display").className = "eventdisp";
	document.getElementById("esearch").className = "esearch";
	
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

function add_book()//(receiptbooks_detail.php , add_receipt_book.php)
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
// FROM here new string is used
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


function selected_club()//(NewEvent.php , choosen_club.php) 		//done
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


function make_new_club()//(choosen_club.php , making_newclub_1.php)			//done
{
	//alert("take the details for the new club");
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

function delete_event(id)//(events_intermediate.php , delete_event.php)	//once check adain
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

function edit_confirm(id1,t)//(event_edit.php , edit_confirm.php)
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


function pending_to_delivered(id)//(receipt_book_details.php , pending_to_delivered.php)	//done
{
	var book_id = id;
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

function search_receipt_book(s) //(receipt_book_details.php , search_receiptbook.php)	//done
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

function date_receiptbook_search(s) //(receipt_book_details.php , search_receiptbook_date.php)	//done
{
var from = document.getElementById("from").value;
var to = document.getElementById("to").value;
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
 xmlhttp.open("POST","search_receiptbook_date.php",true);
 xmlhttp.setRequestHeader("Content-type","application/x-www-form-urlencoded");
 xmlhttp.send("s="+s+"&from="+from+"&to="+to);
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
			xmlhttp.open("GET","account_indiv.php?name="+n+"&price="+price+"&seats="+seats+"&min_number="+min_numb+"&max_number="+max_numb+"&per_participant="+per_participant,true);
		  	xmlhttp.send();
		}
	}
}

function acc_indiv_details(id)//(account_indiv.php , make_account_indiv.php)
{
	var name = document.getElementById("username").value; 
	var password = document.getElementById("password").value;
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
	xmlhttp.send("name="+name+"&password="+password+"&id="+id);
}
//lskdjc
function enter_club_event()//(making_new_club_1.php , adding_club.php)//done
{
	var n = document.getElementById("name").value; 

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
	xmlhttp.open("GET","adding_club.php?name="+n,true);
  	xmlhttp.send();
}

function club_user_err(t)//(adding_club.php , ind_user_err.php)
{	

	var n =t.value;
	var xmlhttp = new XMLHttpRequest();
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState==4 && xmlhttp.status==200)
		{
		    document.getElementById("club_user_err").innerHTML=xmlhttp.responseText;
			var res=document.getElementById("club_user_err").innerHTML;
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
	//alert(id);
	var n = document.getElementById("name_c").value; 
	var price = document.getElementById("price_c").value;
	var seats = document.getElementById("seats_c").value;
	var min_numb = document.getElementById("min_numb_c").value;
	var max_numb = document.getElementById("max_numb_c").value;
	var event = document.getElementsByName("type_event_c[]");
	var isChecked = false;
	for (var i = 0; i < event.length; i++) 
	{
		if (event[i].checked)
		{
			isChecked = true; 
			var per_participant = event[i].value;
			alert("The satus of the per_participant is "+per_participant);
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
}

function make_club_accounts(id)//(adding_club.php , making_club_accounts.php)
{
	var user_1 = document.getElementById("username_1").value;
	var pass_1 = document.getElementById("password_1").value;
	
	var user_2 = document.getElementById("username_2").value;
	var pass_2 = document.getElementById("password_2").value;
	
	var user_3 = document.getElementById("username_3").value;
	var pass_3 = document.getElementById("password_3").value;

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

function excel_indevent_deleted(id)//(events_intermediate.php , excel_event_regdetails.php)
{
//alert("sdf");
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

function excel_all_events()//(events.php , excel_allevents.php)			//add this
{
	var xmlhttp = new XMLHttpRequest();
  	xmlhttp.onreadystatechange=function()
  	{
    	if (xmlhttp.readyState==4 && xmlhttp.status==200)
    	{
      		window.location = 'excel_allevents.php';
			var res=document.getElementById("display").innerHTML;
			if(res.indexOf("dhS8!)")>0)
			{
				window.location = 'login.php';
			}
    	}
  	}
  xmlhttp.open("GET","excel_allevents.php",true);
  xmlhttp.send();
}

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


function download_all()//(receipt_book_details.php , excel_receipt_book.php) //add this
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

//END OF ADMIN

//-*******************************************************************************************************************************-//
//-*******************************************************************************************************************************-//
//-*******************************************************************************************************************************-//
//-*******************************************************************************************************************************-//
//CORD_LOGIN

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


function download_receipts_cash()//()
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

function excel_approve_cash_receipts()//(reciepts_display.php , excel_approve_cash_receipts.php)	//done
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


function excel_query_cash_receipts()//(confirm_query_receipt.php , excel_query_cash_receipts.php)		//done
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

function excel_all_mess_receipts()//(all_mess_receipts.php , excel_all_receipts_mess.php)	//done
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

function excel_approve_mess_receipts()//(approve_mess_receipts.php , excel_approve_mess_receipts.php)	//done
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

//ksjd

function add_query_reciept()//(receipts_cash_button.php , confirm_query_receipt.php)
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

function home_mess()//(c_home.php , coordinator_mess.php)	//done
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

function Select_events(id_receipt)//(reciepts_display.php , confirm_receipt.php)
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

function Query_events(id_receipt)//(reciepts_display.php , query_receipt.php)
{
	//alert(id_receipt);
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

function approve_events(id_receipt)//(confirm_query_receipt.php , selected_for_approval.php)
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


function sub_pass()		//done
{
	var f=0;
	var np1 = document.getElementById("np").value; 
	var np2 = document.getElementById("rnp").value; 
	if(!(np1==np2))
	{
		f = 1;
		alert("Both Passwords should match");
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
	if(res.indexOf("not")>0)
	alert(res);
	else
	{
	var ename ="";
	var n = document.getElementById("name").value; 
	var rno = document.getElementById("rno").value;
	var regno = document.getElementById("regno").value; 
	
	var ph = document.getElementById("phno").value;
	var event = document.getElementsByName("event[]");
	var date = document.getElementById('date').value;
  if(rno==""||n==""||regno==""||ph==""||date==""||!rno||!n||!regno||!ph||!date)
      {
        alert("Please fill in all the details");
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
       alert("Please fill in the count");
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
	var ename=[];
	var team=[];
	isChecked = false;
	var mail = document.getElementById("email").value;
	//alert(mail);
	var events = document.getElementsByName("event[]");
	var regno = document.getElementById("regno").value; 
	var date = document.getElementById('date').value;
	var t = document.getElementsByName('min_and_max[]');
	var j =0;
	var res=document.getElementById("minmaxerror").innerHTML;
	if(res.indexOf("not")>0)
	{
    alert(res);
    return false; 
  }  
  else if(!regno||!mail||!date||regno==""||mail==""||date=="")
  {
    alert("Enter all the details");
    return false;
  }
	else
	{
	for (var i = 0; i < events.length; i++) 
	{
		if (events[i].checked)		
		{		
			ename[j] = events[i].value;
			team[j]=t[i].value;
      if(!team[j]||team[j]=="")
      {
        alert("Please fill in the count");
        return false;
      }
			isChecked = true;
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
		xmlhttp.send("regno="+regno+"&event="+ename+"&date="+date+"&team="+team+"&mail="+mail);
	}
	}
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

function approve_mess_receipts_1(id_receipt,s)//(approve_mess_receipts.php , selected_for_approval_mess.php)
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




function query_mess_receipts_1(id_receipt)//(approve_mess_receipts.php , selected_for_query_mess.php)
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



//END OF EVENT_REG

//-*******************************************************************************************************************************-//
//-*******************************************************************************************************************************-//
//-*******************************************************************************************************************************-//
//-*******************************************************************************************************************************-//

//EVENT_CORD

function change_pass()
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

function home_ec()
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


function reg()
{
	var res=document.getElementById("minmaxerror").innerHTML;
	if(res.indexOf("not")>0)
	alert(res);
	else
	{
	//alert(res);
	var ename ="";
	var n = document.getElementById("name").value; 
	var rno = document.getElementById("rno").value;
	var regno = document.getElementById("regno").value; 
	var ph = document.getElementById("phno").value;
	var event = document.getElementsByName("event[]");
	var date = document.getElementById("date").value;
	var isChecked = false;
	if(n==""||rno==""||regno==""||date==""||ph==""||n==""||!rno||!regno||!date||!ph)
	{
		alert("Enter all the details");
		return;
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
			alert("Write the number of participants");
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
	if(res.indexOf("not")>0)
	alert(res);
	else
	{
	//alert(res);
	var ename=[];
	var team=[];
	isChecked = false;
	var mail = document.getElementById("email").value;
	//alert(mail);
	var events = document.getElementsByName("event[]");
	var regno = document.getElementById("regno").value; 
	var date = document.getElementById('date').value;
	var t = document.getElementsByName('min_and_max[]');
	var j =0;
	if(mail==""||regno==""||date==""||!mail||!regno||!date)
	{
		alert("Enter all the details");
		return;
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
				alert("Write the number of participants");
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
		xmlhttp.send("regno="+regno+"&event="+ename+"&date="+date+"&team="+team+"&mail="+mail);
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






