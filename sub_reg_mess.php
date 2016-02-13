<?php
//revert back done

		session_start();
		if((isset($_SESSION["name"]))&&(isset($_REQUEST["regno"])))
		{
			require 'sql_con.php';
			$coordinator = $_SESSION['name'];
			$i=0;
			$name = "";
			$email = "";
			$phno =$_POST["ph"];
			$receipt_no="";
			$price ="";
			$event=$_POST['event'];
			$reg = $_POST['regno'];
			$reg = strtoupper($reg);
			$date = $_POST['date'];
			$participants = $_POST['team'];
			$mail = $_POST['mail'];
			
			//the query for count,filled goes here
			$min=0;
			$max=0;
			$filled=0;
			$total=0;
			$count=0;
			$flag=0;
		
			$basic = "SELECT * FROM `events` WHERE event_name='$event'";
			$basic_res = mysqli_query($mysqli,$basic);
			while ($arr_1=mysqli_fetch_array($basic_res))
			{
					$min = $arr_1["min_number"];
					$max = $arr_1["max_number"];
					$filled = $arr_1["filled"];
					$total = $arr_1["totalseats"];
			}
			if(($participants+$filled<=$total)&&(($min<=$participants)&&($max>=$participants)))
			{
			}
			else
			{
				$flag+=1;
			}
			if($flag==0)
			{
				$query = "UPDATE `hostel_details` SET email='$mail' WHERE regno='$reg'";
				$hosteller=mysqli_query($mysqli,$query);
				
				
				$sql = "SELECT * FROM `hostel_details` WHERE regno='$reg'";
				$rs = mysqli_query($mysqli,$sql);
				while($arr = mysqli_fetch_row($rs))
				{
					$name = $arr[1];
					$email = $arr[4];
				}
				if(mysqli_num_rows($rs)>0)
				{
						$q3 = "SELECT price FROM `events` WHERE event_name='$event'";
						$r3 = mysqli_query($mysqli,$q3);
						while ($arr=mysqli_fetch_array($r3)) 
						{
							$p = $arr["price"];
						}
						$sql_team = "SELECT per_participant FROM `events` WHERE event_name='$event'";
						$res_team = mysqli_query($mysqli,$sql_team);
						while ($arr_1 = mysqli_fetch_array($res_team))
						{
							$per_participant = $arr_1["per_participant"];
						}
						if($per_participant==0)//money as a team.
							$price=$p;
						else
							$price=$participants*$p;
							
						$q1 = "INSERT INTO `registration_mess` (`name`,`regno`,`phno`,`events`,`coordinator_name`,`amount`,`date_registered`,`email`,`count`) values('$name','$reg','$phno','$event','$coordinator','$price','$date','$email','$participants')";
						if($res = mysqli_query($mysqli,$q1))
						{
							$q2 = "SELECT receipt_no FROM `registration_mess` WHERE regno ='$reg' AND events ='$event'";
							$res1 = mysqli_query($mysqli,$q2);
							while($arr = mysqli_fetch_array($res1))
							{
								$receipt_no = $arr[0];
							}
							if($receipt_no!==0)
							{	
								$q3 = "INSERT INTO `$event` (`number_participants`, `date_registered`, `person_name`, `reg_no`, `phno`, `receipt_no`) VALUES('$participants','$date','$name','$reg','$phno','$receipt_no')";
								if($res2=mysqli_query($mysqli,$q3))
								{
									//echo "<h1>$participants</br>$event</h1>";
											
									$q4 = "UPDATE `events` SET filled=filled+$participants WHERE event_name='$event'";
									if($res3=mysqli_query($mysqli,$q4))
									{
										echo "<h2 style='text-align:center'>Voila! You have registered successfully. Your registration details<h2><br><div style='font-size:18px;position:absolute;top:80px;left:200px;'>Name: $name<br>Registration no: $reg<br> Receipt no: $receipt_no <br>Registered events: <br>".str_replace("_"," ",$event)."<br>Amount: $amount <br>No of Participants: $participants";
										
										//mail
										
										$to= $email; 
										$subject= "Riviera Registration" ;
										$message="Hello $name,\r\n\nVoila!! You have sucessfully registered for the following events!\r\nRegistration no: $reg\r\nReceipt no: $receipt_no\r\nRegistered events: \r\n".str_replace("_"," ",$event)."\r\nAmount: $price\r\n"."No of participants:$participants" ;
										$headers = 'From:noreply@gdgvitvellore.com' . "\r\n"; // Set from headers
					                                        if(mail($to, $subject, $message, $headers))
					                                        	{
					                                        	   $to="noreply@vitriviera.com";
					                                        	   mail($to, $subject, $message, $headers);
					                                        	   echo "Message Sent<br><br><b style='font-size:22px;'>Amount: $price</b></div>";
					                                        }
					                                        else
					                                           echo "Message not Sent<br><br><b style='font-size:22px;'>Amount: $price</b></div>"; // Send the email
					                                           
										
									}
									else
									{
										$qr1 = "DELETE FROM `registration_mess` WHERE receipt_no=$receipt_no";
										$r1=mysqli_query($mysqli,$qr1);
										if($r1==true)
										$qr2 = "DELETE FROM `$event` WHERE receipt_no=$receipt_no";
										$r2=mysqli_query($mysqli,$qr2);
										if($r2==true)
										echo "Registration error 3";
									}
								}
								else
								{
									$qr3 = "DELETE FROM `registration_mess` WHERE receipt_no=$receipt_no";
									mysqli_query($mysqli,$qr3);
									echo "registration error 2";
								}
						}
						else
						{
							$qr4 = "DELETE FROM `registration_mess` WHERE receipt_no=$receipt_no";
							mysqli_query($mysqli,$qr4);
							echo "Registration receipt generation error";
						}
					}
					else
						echo "Registration error 1";
					
				}
				else
				echo "<h3>Not a hosteller</h3>";
			}
			else
			{
				echo "<h3>Check the entered event vacant seats and the number of participants</h3>";
			}
		mysqli_close($mysqli);
		}
		else if(((!isset($_SESSION["name"]))&&(!isset($_REQUEST["regno"])))||((isset($_SESSION["name"]))&&(!isset($_REQUEST["regno"]))))
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