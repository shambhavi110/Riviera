<?php

	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["value"])))
	{
		require 'sql_con.php';
		$id = $_REQUEST["value"];
		$sql_1 = "SELECT * from temp_registration where receipt_no=$id";
		$res_1 = mysqli_query($mysqli,$sql_1);
		if($res_1==true)
		{
			$arr=mysqli_fetch_array($res_1);
			//executes when the temp_registration is having the given id in it
			$n = $arr["name"];
			$r = $arr["regno"];
			$p = $arr["phno"];
			$e = $arr["events"];
			$c = $arr["coordinator_name"];
			$a = $arr["amount"];
			$d = $arr["date_applied"];
			$co = $arr["count"];
			$recptno = $arr["receipt_no"];
			$min=0;
			$max=0;
			$filled=0;
			$total=0;
			$count=0;
			$flag=0;
		//all the testing on the event number entered and all the checking of the vacant and filled seats and also the receipts are checked here
			$basic = "SELECT * FROM `events` WHERE event_name='$e'";
			$basic_res = mysqli_query($mysqli,$basic);
			while ($arr_1=mysqli_fetch_array($basic_res))
			{
				$min = $arr_1["min_number"];
				$max = $arr_1["max_number"];
				$filled = $arr_1["filled"];
				$total = $arr_1["totalseats"];
			}
			if(($co+$filled<=$total)||(($min<=$co)||($max>=$co)))
			{
			}
			else
			{
				$flag+=1;
			}
			
			$check_for_receipt="SELECT * FROM `registration` WHERE receipt_no=$recptno";//checking for the receipt
			$result_receipt_check=mysqli_query($mysqli,$check_for_receipt);
			
			if(mysqli_num_rows($result_receipt_check)>0)
			{
				$flag+=1;
			}
			
			if($flag==0)
			{
				$sql_2 = "INSERT into registration values($recptno,'$n','$r','$p','$e','$c','$a','$d','$co')";
				$res_2 = mysqli_query($mysqli,$sql_2);

				if($res_2 == true)
				{
						//the values are inserted in the registration table
						//so once the below code doesn't go good the inserted values must be taken back

						$event = $arr["events"];
					
						$sql_3 = "INSERT into `$event` values('$co','$d','$n','$r','$p',$recptno)";

						$res_3 = mysqli_query($mysqli,$sql_3);

						if($res_3==true)
						{
							//echo "Added to the respective table";
							//if anything goes wrong then we need to remove the values in the respective table and also 
							//the values in the registration table
							$sql_4 = "UPDATE events set filled=filled+$co where event_name='$e'";
							$res_4 = mysqli_query($mysqli,$sql_4);
							
							if ($res_4==true) 
							{
								//updation in the temp_registration is done
								$sql = "UPDATE temp_registration SET approval=1 where receipt_no=$id";
								$res = mysqli_query($mysqli,$sql);

								if(($res == true) )
								{
									
								}

								else
								{
									//when the registration's status cannot be made as 1
									//seats updation is done and should be reversed
									$sql_5 = "DELETE from registration where receipt_no=$id";
									$res_5 = mysqli_query($mysqli,$sql_5);
									if($res_5== true)
									{
										$sql_6="DELETE from `$event` where receipt_no=$id";
										$res_6=mysqli_query($mysqli,$sql_6);
										if($res_6==true)
										{
											//the updation of seats must be undone
											$sql_7 = "UPDATE events set filled=filled-$co where event_name='$e'";
											$res_7 = mysqli_query($mysqli,$sql_7);

											if($res_7==true)
											{
												echo "approval cannot be made as 1";
												echo "Check the receipt number once";
											}
										}

								}

								}
								
							}

							else
							{
								//if the updation of the seats filled doesn't happen 
								//remove the values in the registration code and the events table
								$sql_5 = "DELETE from registration where receipt_no=$id";
								$res_5 = mysqli_query($mysqli,$sql_5);
								if($res_5== true)
								{
									$sql_6="DELETE from `$event` where receipt_no=$id";
									$res_6=mysqli_query($mysqli,$sql_6);
									if($res_6==true)
									{
										//all the values are undone;
										echo "seats are not updated";
										echo "Check the receipt number once";

									}

								}

							}

							
						}

						else
						{
							
							//values are inserted in the reg table and the values are not inserted in the respective event table
							//to remove the values inserted in the registration table

							$sql_5 = "DELETE from registration where receipt_no=$id";
							$res_5 = mysqli_query($mysqli,$sql_5);
							if($res_5== true)
							{
								echo "values not inserted in the respective table";
								echo "Check the receipt number once";
							}


						}
				}
				else
				{
					//problem in the insertion of values

					echo "no insertion of values in the reg table";
					echo " Check the receipt number once";
				}

			
			}
			else
			{
				echo "<h3>Check the entered event vacant seats, the number of participants and the receipt number entered</h3>";
			}
		}
		else
		{
			//temp table doesn't have the given id in it
			echo "The receipt may have been approved or else is not in the availability";
		}

			//normal printing file for details
		$sql = "SELECT * FROM `temp_registration` where query = 1 AND approval = 0";
		$res = mysqli_query($mysqli,$sql);
		$i=0;
		echo 
		"<table border='2'  style='width=200px;position:absolute;top:150px;left:8px;'>
		<tr>
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
			echo
				"
				<tr>
					<td>".$arr["receipt_no"]."</td>
					<td>".$arr["amount"]."</td>
					<td>".str_replace("_"," ",$arr["name"])."</td>
					<td>".$arr["regno"]."</td>
					<td>".$arr["phno"]."</td>
					<td>".$arr["events"]."</td>
					<td>
						<input type = 'radio' name ='event".$arr["receipt_no"]."' id =".$arr["receipt_no"]." onclick='approve_events(this.id);' value = 1>Approve</input>
					</td>
				</tr>";
						
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
<style>
.anurag
{
	position: absolute;
	left:20px;
}
</style>
