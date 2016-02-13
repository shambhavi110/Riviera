<?php
	session_start();
	//$coordinator = $_SESSION["name"];
	$c="";
	$i=0;
	$name = $_POST['name'];
	$reg = $_POST['regno'];
	$receipt = $_POST['rno'];
	$ph = $_POST['ph'];
	$event = $_POST['event'];
	require 'sql_con.php';
	$t = $event;
	$q1 = "INSERT INTO `$t` values('$name','$reg','$ph',$receipt)";
	
	if($res_1 = mysqli_query($con,$q1))
	{
		$q2 = "UPDATE `events` SET filled=filled +1 WHERE event_name='$t'";
		
		if($res_2=mysqli_query($con,$q2))
			{
			$q3 = "SELECT price FROM `events` WHERE event_name='$t'";
			$res_3 = mysqli_query($con,$q3);
			while ($arr=mysqli_fetch_array($res_3)) 
			{
				$price = $arr["price"];
			}
			$q = "INSERT INTO `registration` values('$receipt','$name','$reg',$ph,'$event','$coordinator',$price)";
			
			if($res_4 = mysqli_query($con,$q))
				{
				echo "<h2 style='text-align:center'>Voila! You have registered successfully. Your registration details<h2><br><div style='font-size:18px;position:absolute;top:80px;left:200px;'>Name: $name<br>Registration no: $reg<br> Receipt no: $receipt <br>Registered events: <br>".str_replace("_"," ",$event)."</div>";
				}
			else
				{
				$q2 = "UPDATE `events` SET filled=filled -1 WHERE event_name='$t'";
				$res_2=mysqli_query($con,$q2);
				$q1 = "DELETE FROM `$t` WHERE name = '$name')";
				$res_1=mysqli_query($con,$q1);
				echo "<h2 style='text-align:center;'>OOPS! Something went wrong. We could not register you for the event. Please try again.</h2>";
				}
			}
		else
			{
				$q1 = "DELETE FROM `$t` WHERE reg_no = '$reg')";
				$res_1=mysqli_query($con,$q1);
				echo "<h2 style='text-align:center;'>OOPS! Something went wrong. We could not register you for the event. Please try again.</h2>";
			}
	}
	else
	{
	echo "<h2 style='text-align:center;'>Student Already Registered For $t</h2>";
	}
	mysqli_close($con);
?>