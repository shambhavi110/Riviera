<?php
//revert back done
	session_start();
	if((isset($_SESSION["name_ec"]))&&(isset($_REQUEST["regno"])))
	{
		require 'sql_con.php';
		$coordinator = $_SESSION["name_ec"];
			$i=0;
			$name = "";
			$email = "";
			$phone =$_POST["ph"];
			$receipt_no="";
			$price ="";
			$e=$_POST['event'];
			$reg = $_POST['regno'];
			
			$reg = strtoupper($reg);
			$date = $_POST['date'];
			$t = $_POST['team'];
			$participants = explode(",",$t);
			$event = explode(",",$e);
			$no_events = count($event);
			
			$mail=$_POST['mail'];
			$query = "UPDATE `hostel_details` set email='$mail' where regno = '$reg'";
			$hosteller=mysqli_query($mysqli,$query);
			$sql = "select * from hostel_details where regno ='$reg'";
			$rs = mysqli_query($mysqli,$sql);
			while($arr = mysqli_fetch_row($rs))
			{
				$name = $arr[1];
				$email = $arr[4];
			}
			if(mysqli_num_rows($rs)>0)
			{
				for($i=0;$i<count($event);$i++)
				{
				$q3 = "SELECT price FROM `events` where event_name='$event[$i]'";
				$r3 = mysqli_query($mysqli,$q3);
				while ($arr=mysqli_fetch_array($r3)) 
				{
					$p = $arr["price"];
				}
				$sql_team = "SELECT per_participant FROM `events` WHERE event_name='$event[$i]'";
				$res_team = mysqli_query($mysqli,$sql_team);
				while ($arr_1 = mysqli_fetch_array($res_team))
				{
					$per_participant[$i] = $arr_1["per_participant"];
				}
				if($per_participant[$i]==0)//money as a team.
					$price[$i]=$p;
				else
					$price[$i]=$participants[$i]*$p;
					$z=0;	
					$q1 = "INSERT INTO `temp_registration_mess` values (null,'$name','$reg',$phone,'$event[$i]','$coordinator','$price[$i]','$date','$email','$participants[$i]',$z,$z)";
					if($res = mysqli_query($mysqli,$q1))
					{
					echo "<h2 style='text-align:center'>Voila! You have registered successfully. Your registration details<h2><br><div style='font-size:18px;text-align:center'>Name: $name<br>Registration no: $reg<br>Registered events: <br>".str_replace("_"," ",$event[$i])."<br>"."Amount:$price[$i]";
					
					echo "</h2>";
					}
					else
					echo "Registration error 1";
				}
			}
		else
		echo "<h3>OOPS! The student is not a hosteller, Registration failed!</h3>";
	mysqli_close($mysqli);
	}
	
	else if(((!isset($_SESSION["name_ec"]))&&(!isset($_REQUEST["regno"])))||((isset($_SESSION["name_ec"]))&&(!isset($_REQUEST["regno"]))))
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