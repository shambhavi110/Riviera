<?php
//regex need to be added  and the checking of min_number<max_number should also be done by js
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["club_id"])))
		{
			require 'sql_con.php';
			$club_id = $_REQUEST["club_id"];
			$name = $_REQUEST["name"];
			$name= preg_replace('/\s+/', '_', $name);
			$seats = $_REQUEST["seats"];
			$price = $_REQUEST["price"];
			$min_number = $_REQUEST["min_number"];
			$max_number = $_REQUEST["max_number"];
			$per_participant = $_REQUEST["per_participant"];
					//insertion of all the event details
			$sql_1="INSERT into `events`(event_name,price,filled,totalseats,min_number,max_number,per_participant) values('$name',$price,0,$seats,$min_number,$max_number,$per_participant)";
			$res_1=mysqli_query($mysqli,$sql_1);

			if($res_1 == true)
			{
					//echo "Event registered";
				$sql_2 = "SELECT id from `events` where event_name='$name'";
				$res_2 = mysqli_query($mysqli,$sql_2);

				if($res_2 == true)
				{
					//echo "Im in res_2";
					$arr1 = mysqli_fetch_array($res_2);
					$id = $arr1["id"];
					$sql_3 = "INSERT into `clubs_maps_event_ids` values($club_id,$id)";
					$res_3 = mysqli_query($mysqli,$sql_3);

					if($res_3 ==  true)
					{
						//echo "I'm in res_3";
						//**we should also create a new table for the respective event********
						$sql_4="CREATE table `$name`(`number_participants` INT(11) NOT NULL ,`date_registered` date NOT NULL ,`person_name` VARCHAR(20) NOT NULL ,`reg_no` VARCHAR(10) NOT NULL ,`phno` VARCHAR(10) NOT NULL ,`receipt_no` INT(11) UNIQUE NOT NULL);";
						$res_4=mysqli_query($mysqli,$sql_4) or die(mysql_error());
						if($res_4==true)
						{
							//udation of the number of events in the club_names table
							$sql_5 = "UPDATE `club_names` SET `club_total_events` = `club_total_events`+1 WHERE club_id = $club_id";
							$res_5 = mysqli_query($mysqli,$sql_5);
							if($res_5==true)
							{	
								echo 
								"<CENTER><h3>VOILA!! The logins are distributed for this club and  event registration is completed!!</h3></CENTER>";
							}
							else
							{
								$sql_11="DELETE FROM `events` WHERE event_name='$name'";
								$res_11=mysqli_query($mysqli,$sql_11);
								$sql_12 = "DELETE FROM `clubs_maps_event_ids` WHERE club_id =$club_id";
								$res_12 = mysqli_query($mysqli,$sql_12);
								$sql_10="DROP table `$name`";
								$res_10=mysqli_query($mysqli,$sql_10);
								//revert back the changes 
								echo "The update of number isn't done";
							}
						}	
						else
						{
							$sql_8="DELETE FROM `events` WHERE event_name='$name'";
							$res_8=mysqli_query($mysqli,$sql_8);
							$sql_9 = "DELETE FROM `clubs_maps_event_ids` WHERE club_id =$club_id";
							$res_9 = mysqli_query($mysqli,$sql_9);
						}

					}
					else
					{
						$sql_7="DELETE FROM `events` WHERE event_name='$name'";
						$res_7=mysqli_query($mysqli,$sql_7);
						//delete the all ready inserted values in events table
					}
				} 
				else
				{
					$sql_6="DELETE FROM `events` WHERE event_name='$name'";
					$res_6=mysqli_query($mysqli,$sql_6);
					echo "No event id is found";
				}
			}
			else
				echo"Event isn't registered";
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