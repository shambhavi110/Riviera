<?php
	
	session_start();
	if(isset($_SESSION["name_ec"])&&(isset($_REQUEST["key"])))
	{
		require 'sql_con.php';
		$coordinator = $_SESSION["name_ec"];
		echo "<!DOCTYPE html>
							
						<input type = 'text' name ='regno' id ='regno' class='reg' style='position:absolute;top:50px;left:180px;width:280px;height:43px;border:none;' placeholder ='Enter Register Number Eg.12MSE1010' onkeyup='isRegno()' autocomplete ='off' maxlength ='9'><div id ='regnoer' style='position:absolute;left:470px;top:60px;color:red;font-size:18px;'></div><br><br>
						

						<input type ='email' name ='email' id='email' style='position:absolute;top:120px;left:180px;width:280px;height:43px;border:none;' autocomplete='off' placeholder='Enter Email ID '>
						
						<input type ='text' name ='phno' id='phno'  autocomplete='off' style='position:absolute;top:180px;left:180px;width:280px;height:43px;border:none;' placeholder='Eg. 9090909090' onkeypress='return isNumber(event)' maxlength='10'>
						
						<input type='date' name='date' value='".date('Y-m-d')."' id='date' style='position:absolute;top:250px;left:180px;width:280px;height:43px;border:none;' class='date'/>
						<div id='minmaxerror' style='position:absolute;top:330px;left:470px;color:red;font-size:18px;'></div>";
						$sql_viewing = "SELECT individual_id,club_id FROM `event_cord_login` WHERE username='$coordinator'";
						$res_viewing = mysqli_query($mysqli,$sql_viewing);
						if($res_viewing==true)
						{
							$arr=mysqli_fetch_array($res_viewing);
							if($arr["individual_id"]==0)//club event
							{
								//more than one event
								$club_id = $arr["club_id"];
								$sql_club_events="SELECT event_id FROM `clubs_maps_event_ids` WHERE club_id=$club_id";
								$res_club_events=mysqli_query($mysqli,$sql_club_events);
								if($res_club_events==true)
								{
									$num = mysqli_num_rows($res_club_events);
									if($num>0)//only if the records exsists
									{	
									echo"
										<table border ='2' style='position:absolute;top:390px;left:30px;'>
											<tr>
												<th>Select Event</th>
												<th>Name</th>
												<th>Cost</th>
												<th>Vacant Seats</th>
												<th>Number of participants</th>
												<th>Min and Max participants</th>
												<th>Registered students</th>
											</tr>";
										$i=0;
										$storeArray = Array();
										while ($arr_1 = mysqli_fetch_array($res_club_events)) 
										{
										    $storeArray[] =  $arr_1['event_id'];  //to store all the details in the coloumn
										}
										foreach ($storeArray as $value) 
										{
											//$value here contains all the id's of the events
											$q = "SELECT event_name, price,filled,totalseats,per_participant FROM `events` WHERE id=$value";
											//this is to be changed for geeting the type of event
											$r = mysqli_query($mysqli,$q);
											$per_participant=0;
											$type="";
											$rn[$i]=0;
											$rs[$i]=0;
											$rc[$i]=0;
											while($t=mysqli_fetch_array($r))
											{
												$rn[$i]=$t[0];
												$rs[$i]=$t[1];
												$rc[$i] = $t[3]-$t[2];
												$per_participant=$t["per_participant"];
											}
											
											
											if($per_participant==0)//team event
											{
												$type="(T)";
											}
											else
											{
												$type="(P)";
											}

											$sql_1="SELECT min_number,max_number FROM `events` WHERE id=$value";
											$res_1=mysqli_query($mysqli,$sql_1);
											$arr_2=mysqli_fetch_array($res_1);
											$min = $arr_2["min_number"];
											$max = $arr_2["max_number"];
											$j=$i;
											if(isset($rc[$j]))
											if($rc[$j]>0)
											{
												echo "
												<tr>
												<td><input type = 'checkbox' name ='event[]' id ='event' value='$rn[$j]'></br>$type</td>
												<td>".str_replace("_"," ",$rn[$j])."</td>
												<td>$rs[$j]</td>
												<td>$rc[$j]</td>
												<td><input type='text' id='$rn[$j]' name='min_and_max[]' placeholder='min: $min - max: $max' onkeyup='checkminmax(this.id)' maxlength='3' autocomplete='off' size='12' /></td>
												
												<td>Min: $min Max: $max</td>
												<td><button class='' onClick='excel_indevent($value)'>Download</button></td>
												</tr>";
											}		
										}
										echo 
										"</table><br><input type ='button' class='submit' onclick ='reg_mess()' Value ='Submit' id ='sub_reg' name ='sub_reg' style='position:absolute;left:200px;top:320px;'>
										</div>";
									}
									else// if the respective club has no events in it
									{
									echo "<h3 style='position:relative;top:240px;'><center>No Events to display</center></h3>";
									}
								}
							}
							else//individual's event
							{
								//more than one event
								$ind_id = $arr["individual_id"];
								$q = "SELECT event_name, price,filled,totalseats,per_participant FROM events WHERE id=$ind_id";
								$r = mysqli_query($mysqli,$q);
								$num = mysqli_num_rows($r);
								if($num>0)//only if the records exsists
								{	
									echo"
										<table border ='2' style='position:absolute;top:370px;left:20px'>
											<tr>
												<th>Select Event</th>
												<th>Name</th>
												<th>Cost</th>
												<th>Vacant Seats</th>
												<th>Number of participants</th>
												<th>Min and Max participants</th>
												<th>Download</th>
											</tr>";
										$i=0;
										$type="";
										$rn[$i]=0;
										$rs[$i]=0;
										$rc[$i]=0;
										$per_participant=0;

										while($t=mysqli_fetch_array($r))
										{
												$rn[$i]=$t[0];
												$rs[$i]=$t[1];
												$rc[$i] = $t[3]-$t[2];
												$per_participant=$t["per_participant"];
										}
										if($per_participant==0)//team event
										{
											$type="(T)";
										}
										else
										{
											$type="(P)";
										}

											$sql_1="SELECT min_number,max_number FROM `events` WHERE id=$ind_id";
											$res_1=mysqli_query($mysqli,$sql_1);
											$arr_2=mysqli_fetch_array($res_1);
											$min = $arr_2["min_number"];
											$max = $arr_2["max_number"];
											$j=$i;
											if(isset($rc[$j]))
											if($rc[$j]>0)
											{
												echo "
												<tr>
												<td><input type = 'checkbox' name ='event[]' id ='event' value =$rn[$j]><br/>$type</td>
												<td>".str_replace("_"," ",$rn[$j])."</td>
												<td>$rs[$j]</td>
												<td>$rc[$j]</td>
												<td><input type='text' id='$rn[$j]' name='min_and_max[]' placeholder='min: $min - max: $max' onkeyup='checkminmax(this.id)' maxlength='3' autocomplete='off' size='12' /></td>
												<div id='minmaxerror' style='position:absolute;top:400px;left:200px;color:red;font-size:18px;'></div>
												<td>Min: $min Max: $max</td>
												<td><button class='' onClick='excel_indevent($ind_id)'>Download</button></td>
												</tr>";
											}
											echo 
										"</table><br><input type ='button' class='submit' onclick ='reg_mess()' Value ='Submit' id ='sub_reg' name ='sub_reg' style='position:absolute;left:200px;top:320px;'>
										</div>";		
								}
								else// if the respective club has no events in it
								{
									echo "<h3 style='position:relative;top:240px;'><center>No Events to display</center></h3>";
								}
							}

						}
						mysqli_close($mysqli);
	}
	else if(((!isset($_SESSION["name_ec"]))&&(!isset($_REQUEST["key"])))||((isset($_SESSION["name_ec"]))&&(!isset($_REQUEST["key"]))))
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