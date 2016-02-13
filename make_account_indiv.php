<?php
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["id"])))
		{
			require 'sql_con.php';
			$name = $_REQUEST['name'];
			$password = $_REQUEST['password'];
			$event_id = $_REQUEST['id'];
			$mail = $_REQUEST['mail'];
			
			
			
			$sql_1 = "INSERT into `event_cord_login` values('$name','$password','$event_id',0)";
			$res_1 = mysqli_query($mysqli,$sql_1);
			if($res_1==true)
			{
				$sql_6 = "INSERT INTO `event_mail` values('$mail',$event_id,0)";
				$res_6 = mysqli_query($mysqli,$sql_6);
				if($res_6==true)
					echo "<h3>Congratulations! Your Credentials have been stored.</h3>";
				else
				{
					echo "<h3>OOPS! We were not able to store your credentials.</h3>";
					
					$sql_7 = "DELETE FROM `event_mail` where individual_id=$event_id";
					$res_7 = mysqli_query($mysqli,$sql_7);
					
					$sql_2 = "SELECT event_name from `events` where id='$event_id'";
					$res_2 = mysqli_query($mysqli,$sql_2);
					$arr1 = mysqli_fetch_array($res_2);
					$name = $arr1["event_name"];
					
					$sql_3 = "DELETE FROM `individual_event_ids` where individual_ids =$event_id";
					$res_3 = mysqli_query($mysqli,$sql_3);
				
					//**we should also delete the table created for the respective event********
					$sql_4="DROP table `$name`";
					$res_4=mysqli_query($mysqli,$sql_4) or die(mysql_error());
					$sql_5 = "DELETE FROM `events` where event_name ='$name'";
					$res_5 = mysqli_query($mysqli,$sql_5);
				}
			}
			else
			{
				//the values are inserted in the events table and also in the individual ids table and also the new table are made
				//so if it isnt possible then we need to revert bak all the steps and say that event isn't added

				echo "<h3>OOPS! We were not able to store your credentials.</h3>";
				$sql_2 = "SELECT event_name from `events` where id='$event_id'";
				$res_2 = mysqli_query($mysqli,$sql_2);
				$arr1 = mysqli_fetch_array($res_2);
				$name = $arr1["event_name"];
				$sql_3 = "DELETE FROM `individual_event_ids` where individual_ids =$event_id";
				$res_3 = mysqli_query($mysqli,$sql_3);
			
				//**we should also delete the table created for the respective event********
				$sql_4="DROP table `$name`";
				$res_4=mysqli_query($mysqli,$sql_4) or die(mysql_error());
				$sql_5 = "DELETE FROM `events` where event_name ='$name'";
				$res_5 = mysqli_query($mysqli,$sql_5);
				mysqli_close($mysqli);
				
			}
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