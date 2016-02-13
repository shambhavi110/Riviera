<?php

	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["value"])))
	{
		require 'sql_con.php';
		$id = $_REQUEST["value"];
		$s = $_REQUEST['s'];
		$sql_1 = "SELECT * from `temp_registration_mess` where receipt=$id";
		$res_1 = mysqli_query($mysqli,$sql_1);
		if($res_1==true)
		{
			//executes when the temp_registration is having the given id in it
			while($arr=mysqli_fetch_array($res_1))
			{
				$n = $arr["name"];
				$r = $arr["regno"];
				$p = $arr["phno"];
				$e = $arr["events"];
				$c = $arr["coordinator_name"];
				$a = $arr["amount"];
				$d = $arr["date_registered"];
				$co = $arr["count"];
				$em = $arr["email"];
				//Check the basic conditions of filled and vacant seats conditions.
				
				$min=0;
				$max=0;
				$filled=0;
				$total=0;
				$count=0;
				$flag=0;
				
				$basic = "SELECT * FROM `events` WHERE event_name='$e'";
				$basic_res = mysqli_query($mysqli,$basic);
				while ($arr_1=mysqli_fetch_array($basic_res))
				{
					$min = $arr_1["min_number"];
					$max = $arr_1["max_number"];
					$filled = $arr_1["filled"];
					$total = $arr_1["totalseats"];
				}
				if(($co+$filled<=$total)||(($min<=$co)&&($max>=$co)))
				{
					$flag=$flag;
				}
				else
				{
					$flag+=1;
				}
				
				
				if($flag==0)
				{
					//Insert into registration_mess table
					$sql_2 = "INSERT INTO `registration_mess`(`receipt_no`, `name`, `regno`, `phno`, `events`, `coordinator_name`, `amount`, `date_registered`, `email`, `count`) VALUES(NULL,'$n','$r','$p','$e','$c','$a','$d','$em','$co')";
					$res_2 = mysqli_query($mysqli,$sql_2);
					if($res_2 == true)
					{
							//Selects the actual mess receipt no from the database
							$sql = "SELECT receipt_no from `registration_mess` where count=$co AND regno='$r' AND date_registered='$d' AND events='$e'";
							$res_r = mysqli_query($mysqli,$sql);
							$rs = mysqli_fetch_array($res_r);
							//Receipt no
							$rec = $rs["receipt_no"];
							//The values are inserted in the individual event table
							$event = $arr["events"];
							$sql_3 = "INSERT into `$event` values($co,'$d','$n','$r','$p',$rec)";
							$res_3 = mysqli_query($mysqli,$sql_3);
							if($res_3==true)
							{
								//The count is updated in Events table
								$sql_4 = "UPDATE events set filled=filled+$co where event_name='$event'";
								$res_4 = mysqli_query($mysqli,$sql_4);
								if ($res_4==true) 
								{
									//updation in the temp_registration is done
									$sql = "UPDATE  `temp_registration_mess` set approval='1' where receipt=$id";
									$res = mysqli_query($mysqli,$sql);
									if(($res == true))
									{					
										$to= $em; 
										$subject= "Riviera Registration" ;
										$message="Hello $n,\r\n\nVoila!! You have sucessfully registered for the following events!\r\nRegistration no: $r\r\nReceipt no: $rec\r\nRegistered events: \r\n".str_replace("_"," ",$e)."\r\nAmount: $a\r\nNo of Participants: $co " ;
										//MAIL function 
										$headers = 'From:noreply@gdgvitvellore.com' . "\r\n"; // Set from headers
					                    if(mail($to, $subject, $message, $headers))
					                    {
					                    	$to="noreply@vitriviera.com";
					                    	mail($to, $subject, $message, $headers);
					                        echo "Message Sent";
					                    }
					                    else
					                        echo "Message not Sent"; // Send the email
									}
									else
									{
										$sql_5 = "DELETE from `registration_mess` where receipt_no ='$rec' ";
										mysqli_query($mysqli,$sql_5);
										$sql_6 = "DELETE from '$event' where receipt_no='$rec'";
										mysqli_query($mysqli,$sql_6);
										$sql_7 = "UPDATE events set filled=filled-$co where event_name='$event'";
										mysqli_query($mysqli,$sql_7);
										echo "Update error in temp_registration_mess table";
									}
								}
								else 
								{	
									$sql_5 = "DELETE from `registration_mess` where receipt_no ='$rec' ";
									mysqli_query($mysqli,$sql_5);
									$sql_6 = "DELETE from '$event' where receipt_no='$rec'";
									mysqli_query($mysqli,$sql_6);
									echo "Update error in events table for filled";
								}
							}
							else 
							{
							$sql_5 = "DELETE from `registration_mess` where receipt_no ='$rec' ";
							mysqli_query($mysqli,$sql_5);
							echo " Insert error in $event table";
							}
					}
					else 
					{
						echo "Insertion error in registration table";
					}
				}
				else
				{
					echo "<h3>Check the entered event vacant seats, the number of participants and the receipt number entered</h3>";
				}	
			}
		}
		//For approval part		
			if($s==0)
			{	
				$sql = "SELECT * FROM `temp_registration_mess` where query = 0 AND approval=0";
				$res = mysqli_query($mysqli,$sql);
				echo "<table border='2'  style='position:absolute;top:130px;left:8px;'>
				<tr>
				<td>Wrong receipt</td>
				<td>Receipt Number</td>
				<td>Amount</td>
				<td>Name</td>
				<td>Register Number</td>
				<td>Phone Number</td>
				<td>Event Name</td>
				<td>Approve receipt</td>
				</tr>";
				while($arr=mysqli_fetch_array($res))
				{
					echo"<tr>
					<td>
					<input type = 'radio' name ='event".$arr["receipt"]."' id =".$arr["receipt"]." onclick='query_mess_receipts_1(this.id,0);' value = 1>Query</input></td>
					<td>".$arr["receipt"]."</td>
					<td>".$arr["amount"]."</td>
					<td>".$arr["name"]."</td>
					<td>".$arr["regno"]."</td>
					<td>".$arr["phno"]."</td>
					<td>".str_replace("_"," ",$arr["events"])."</td>
					<td><input type = 'radio' name ='event".$arr["receipt"]."' id =".$arr["receipt"]." onclick='approve_mess_receipts_1(this.id,0);' value = 1>Approve</input>
					</td>
					</tr>";
				}
			}
			//or query part
			else
			{
				$sql = "SELECT * FROM `temp_registration_mess` where query = 1 AND approval=0";
				$res = mysqli_query($mysqli,$sql);
				echo "<table border='2'   style='position:absolute;top:130px;left:8px;'><tr>
				<td>Receipt Number</td>
				<td>Amount</td>
				<td>Name</td>
				<td>Register Number</td>
				<td>Phone Number</td>
				<td>Event Name</td>
				<td>Approve receipt</td>
				</tr>";
				while($arr=mysqli_fetch_array($res))
				{
					echo"<tr>
					<td>".$arr["receipt"]."</td>
					<td>".$arr["amount"]."</td>
					<td>".$arr["name"]."</td>
					<td>".$arr["regno"]."</td>
					<td>".$arr["phno"]."</td>
					<td>".str_replace("_"," ",$arr["events"])."</td>
					<td><input type = 'radio' name ='event".$arr["receipt"]."' id =".$arr["receipt"]." onclick='approve_mess_receipts_1(this.id,1);' value = 1>Approve</input>
					</td>
					</tr>";
				}
			}
			echo "</table>";
			mysqli_close($mysqli);
	}
	else if(((!isset($_SESSION["name"]))&&(!isset($_REQUEST["value"])))||((isset($_SESSION["name"]))&&(!isset($_REQUEST["value"]))))
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