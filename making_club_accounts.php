<?php
//regex need to be added
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["club_id"])))
		{
			require 'sql_con.php';
			$user_1 = $_REQUEST["user_1"];
			$pass_1 = $_REQUEST["pass_1"];
			
			$user_2 = $_REQUEST["user_2"];
			$pass_2 = $_REQUEST["pass_2"];
			
			$user_3 = $_REQUEST["user_3"];
			$pass_3 = $_REQUEST["pass_3"];

			$club_id = $_REQUEST["club_id"];

			$sql_1 = "INSERT INTO `event_cord_login` values('$user_1','$pass_1',0,$club_id),('$user_2','$pass_2',0,$club_id),('$user_3','$pass_3',0,$club_id)";
			$res_1 = mysqli_query($mysqli,$sql_1); 
			if($res_1==true)
			{
				//updating the no.of accounts in the club_names table
				$sql_2 = "UPDATE `club_names` SET club_total_logins = club_total_logins+3 WHERE club_id=$club_id";
				$res_2 = mysqli_query($mysqli,$sql_2);
				if($res_2 == true)
					echo "<h3>All the 3 records inserted</h3></br><h4>Visit home and select your club to register for events</h4>";
				else
				{
						$sql_3= "DELETE FROM `club_names` WHERE club_id = '$club_id'";
						$res_3 = mysqli_query($mysqli,$sql_3);		
						$sql_4 = "DELETE FROM `event_cord_login` WHERE club_id =$club_id";
						$res_4 = mysqli_query($mysqli,$sql_4); 
				}
			}
			else
			{
				echo "OOPS! Error in inserting the login details of event-cordinators";
				$sql_1 = "DELETE FROM `club_names` WHERE club_id = '$club_id'";
				$res_1 = mysqli_query($mysqli,$sql_1);
			}
			mysqli_close($mysqli);
		}
		else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["club_id"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["club_id"]))))
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
