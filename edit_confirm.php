<?php
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["id"])))
		{
			require 'sql_con.php';
			$id = $_REQUEST["id"];
			$sql = "SELECT * FROM `events` WHERE id='$id'";
			$res = mysqli_query($mysqli,$sql);
			$arr = mysqli_fetch_array($res);
			$events = $arr["event_name"];
			$str=$arr["id"];
			$value_totalseats = $_REQUEST["value_totalseats"];
			echo "<div class='name'>".str_replace("_"," ",$events)."</div>" ;
			echo "Total seats: $value_totalseats";
			$sql_totalseats = "UPDATE events SET totalseats=$value_totalseats where id=$id";
			$res_totalseats = mysqli_query($mysqli , $sql_totalseats);
			if($res_totalseats == true)
			{
				echo "<br>All the Modification done <br/>";
			}
			else
			{
				echo "<br>Modification not done";
			}		
			mysqli_close($mysqli);
		}
		else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["id"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["id"]))))
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