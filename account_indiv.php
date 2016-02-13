<?php
//regex need to be added
		
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["name"])))
		{
			require 'sql_con.php';
			$name = $_REQUEST["name"];
			$name= preg_replace('/\s+/', '_', $name);
			//echo "$name";
			$seats = $_REQUEST["seats"];
			$price = $_REQUEST["price"];
			$min_number = $_REQUEST["min_number"];
			$max_number = $_REQUEST["max_number"];
			$per_participant = $_REQUEST["per_participant"];

			//echo "$price";
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
					$sql_3 = "INSERT into `individual_event_ids` values($id)";
					$res_3 = mysqli_query($mysqli,$sql_3);

					if($res_3 ==  true)
					{
						//echo "I'm in res_3";
						//**we should also create a new table for the respective event********
						$sql_4="CREATE table `$name`(`number_participants` INT(11) NOT NULL ,`date_registered` date NOT NULL ,`person_name` VARCHAR(20) NOT NULL ,`reg_no` VARCHAR(10) NOT NULL ,`phno` VARCHAR(10) NOT NULL ,`receipt_no` INT(11) UNIQUE NOT NULL);";
						$res_4=mysqli_query($mysqli,$sql_4) or die(mysql_error());
						if($res_4==true)
						{

							echo "
							<h3 style='text-align:center;'>Enter User ID and Password For Event cordinator account</h3></br>
							<input type='text' name='username' id='username' autocomplete='off' placeholder='username' onkeyup ='ind_user_err()' style='position:absolute;top:90px;left:300px;width:240px;height:40px;border:none;'>
							<div id ='ind_user_err' style='position:absolute;top:140px;left:300px;color:red;'></div></br>
							<input type='password' name='password' id='password' placeholder='password' style='position:absolute;top:160px;left:300px;width:240px;height:40px;border:none;'>
							<input type='email' name='mail' id='mail' placeholder='Email ID of the club' style='position:absolute;top:220px;left:300px;height:40px;width:240px;border:none;' autocomplete = 'off'>
							</br></br>";
							//<input type='pass' name='username' id='username' placeholder='username'>
							//confirmation of password needs to be done using js
							echo "<paper-button value='submit' id=".$id." onclick='acc_indiv_details(this.id)' style='position:absolute;top:270px;background-color:#0e7ac3;left:300px;width:240px;height:40px;color:white;'>Submit</paper-button>";
						}	

					}
					else
					{
						//here the values are instered in the events table but are not able to be insterted in the 
						//individual_events table so we need to delete the all ready inserted values in events table
					}
				} 
				else
				{

					echo "No event id is found";
				}
			}
			else
				echo"Event isn't registered";

			mysqli_close($mysqli);
		}
		else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["name"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["name"]))))
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