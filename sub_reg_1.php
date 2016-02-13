<?php
	session_start();
	$coordinator = $_SESSION["name_ec"];
	$c="";
	$i=0;
	$name = $_REQUEST['name'];
	$reg = $_REQUEST['regno'];
	$receipt = $_REQUEST['rno'];
	$ph = $_REQUEST['ph'];
	$event = $_REQUEST['event'];
	$participants = $_REQUEST['number_participants'];
	$date = $_REQUEST["date"];
	//echo "$name</br>$reg</br>$ph</br>$receipt</br>$event";
	require 'sql_con.php';
	$t = $event;
	
		$price=0;
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
		$q = "INSERT INTO `temp_registration` values($receipt,'$name','$reg','$ph','$event','$coordinator',$price,'$date',$participants,0,0)";
		$c = mysqli_query($mysqli,$q);
	
	if($c)	
		echo "<h2 style='text-align:center'>Voila! You have registered successfully. Your registration details<h2><br><div style='font-size:18px;position:absolute;top:80px;left:200px;'>Name: $name<br>Registration no: $reg<br> Receipt no: $receipt <br>Registered events: <br>".str_replace("_"," ",$event)."<br><br><b style='font-size:22px;'>Amount: $price</b></div>";
	else
		echo "<h2 style='text-align:center'>Oops! Something went wrong. The registration was not made. Please try again<h2>";
	mysqli_close($mysqli);
?>