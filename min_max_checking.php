<?php 
	
	session_start();
	if(((isset($_SESSION["name"]))||((isset($_SESSION["name_ec"]))))&&(isset($_REQUEST["value"])))
	{
		require 'sql_con.php';
		$value=$_REQUEST["value"];
		$event_name = $_REQUEST["name"];
		
		$sql_1 = "SELECT filled,totalseats,min_number,max_number FROM `events` WHERE event_name='$event_name'";
		$res_1 = mysqli_query($mysqli,$sql_1);
		if($res_1== true)
		{
			$arr=mysqli_fetch_array($res_1);
			$min=$arr["min_number"];
			$vacant = $arr["totalseats"]-$arr["filled"];
			$max=$arr["max_number"];
			if(($value<=$max)&&($value>=$min)&&($value!=0)&&($value<=$vacant))
			{
				echo "Number of Participants valid ";
			}
			else
			{
				echo "Number of Participants NOT valid";
			}
		}
	mysqli_close($mysqli);
	}
	else if((((!isset($_SESSION["name_ec"]))||((!isset($_SESSION["name_ec"]))))&&(!isset($_REQUEST["r"])))||(((isset($_SESSION["name_ec"]))||((isset($_SESSION["name_ec"]))))&&(!isset($_REQUEST["r"]))))
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