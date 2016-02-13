<?php
	
	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["rno"])))
	{
		require 'sql_con.php';
		$coordinator= $_SESSION["name"];
		$c="";
		$i=0;
		$name = $_REQUEST['name'];
		$reg = $_REQUEST['regno'];
		$receipt = $_REQUEST['rno'];
		$ph = $_REQUEST['ph'];
		$event = $_REQUEST['event'];
		$participants=$_REQUEST['team'];
		$date=$_REQUEST['date']; 
		$price=0;
		$t = $event;
		$min=0;
		$max=0;
		$filled=0;
		$total=0;
		$count=0;
		$flag=0;
	//all the testing on the event number entered and all the checking of the vacant and filled seats and also the receipts are checked here
		$basic = "SELECT * FROM `events` WHERE event_name='$event'";
		$basic_res = mysqli_query($mysqli,$basic);
		while ($arr_1=mysqli_fetch_array($basic_res))
		{
			$min = $arr_1["min_number"];
			$max = $arr_1["max_number"];
			$filled = $arr_1["filled"];
			$total = $arr_1["totalseats"];
		}
		if(($participants+$filled<=$total)||(($min<=$participants)||($max>=$participants)))
		{
		}
		else
		{
			$flag+=1;
		}
		
		$check_for_receipt="SELECT * FROM `registration` WHERE receipt_no=$receipt";//checking for the receipt
		$result_receipt_check=mysqli_query($mysqli,$check_for_receipt);
		if(mysqli_num_rows($result_receipt_check)>0)
		{
			$flag+=1;
		}
		
		if($flag==0)
		{
			$q3 = "SELECT price FROM `events` WHERE event_name='$event'";
			$r3 = mysqli_query($mysqli,$q3);
			while ($arr=mysqli_fetch_array($r3)) 
			{
				$price = $arr["price"];
			}
			$sql_team = "SELECT per_participant FROM `events` WHERE event_name='$event'";
			$res_team = mysqli_query($mysqli,$sql_team);
			while ($arr_1 = mysqli_fetch_array($res_team))
			{
				$per_participant = $arr_1["per_participant"];
			}
			
			if($per_participant==0)//money as a team.
				$price=$price;
			else
			$price=$participants*$price;
			
			$q1 = "INSERT INTO `$t` values('$participants','$date','$name','$reg','$ph','$receipt')";
			$q2 = "UPDATE `events` SET filled=filled+$participants WHERE event_name='$t'";
			$q3 = "INSERT INTO `registration` values('$receipt','$name','$reg',$ph,'$event','$coordinator','$price','$date','$participants')";
			
			$qr1 = "DELETE FROM `$t` WHERE receipt_no=$receipt";
			$qr2 = "UPDATE `events` SET filled=filled-$participants WHERE event_name='$t'";
			if($res_1=mysqli_query($mysqli,$q1))
			{
				if($res_2=mysqli_query($mysqli,$q2))
				{
					if($res_3 = mysqli_query($mysqli,$q3))
					{
						echo "<h2 style='text-align:center'>Voila! You have registered successfully. Your registration details<h2><br><div style='font-size:18px;position:absolute;top:80px;left:200px;'>Name: $name<br>Registration no: $reg<br> Receipt no: $receipt <br>Registered events: <br>".str_replace("_"," ",$event)."<br><br><b style='font-size:22px;'>Amount: $price</b></div>";
					}
					else
					{
						mysqli_query($mysqli,$qr1);
						mysqli_query($mysqli,$qr2);
						echo "Registration error 3";
					}
				}	
				else
				{
					mysqli_query($mysqli,$qr1);
					echo "Registration error 2";
				}
			}
			else
			{
				echo "Registration error 1";
			}
			
		}
		else
		{
			echo "<h3>Check the entered event vacant seats, the number of participants and the receipt number entered</h3>";
		}
		mysqli_close($mysqli);
	}
	else if(((!isset($_SESSION["name"]))&&(!isset($_REQUEST["rno"])))||((isset($_SESSION["name"]))&&(!isset($_REQUEST["rno"]))))
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:login.php");
	}
	
	else
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		echo "<div>Ah4*!bb dhS8!) Nh5@n</div>";
		exit();
	}
?>