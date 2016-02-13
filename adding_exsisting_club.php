<?php
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["club_id"])))
		{
			require 'sql_con.php';
			//if the page is just loaded
			//take the values and send it the next php file for storing in te events table
			$club_id = $_REQUEST["club_id"];
			//echo "$club_id";	
	        echo
	        "  <br/> 
			<input type = 'text' autocomplete ='off' name='name' id='name_c' placeholder='Name of the event' style='position:absolute;top:50px;left:300px;border:none;height:40px;width:200px;'><br/><br/>
			<input type = 'text' name='totalseats' id='seats_c' style='position:absolute;top:110px;left:300px;border:none;height:40px;width:200px;' placeholder='Totalseats of event' onkeypress='return isNumber(event)' autocomplete ='off'><br/><br/>
			<input type = 'text' name='price' id='price_c' placeholder='Price of the event' style='position:absolute;top:160px;left:300px;border:none;height:40px;width:200px;' onkeypress='return isNumber(event)' autocomplete ='off' ><br/><br/>
			<input type = 'text' name='min_munber' id='min_numb_c' style='position:absolute;top:220px;left:300px;border:none;height:40px;width:200px;' placeholder='Minimum number of participants' onkeypress='return isNumber(event)' autocomplete ='off'><br/><br/>
			<input type = 'text' name='max_munber' id='max_numb_c' style='position:absolute;top:280px;left:300px;border:none;height:40px;width:200px;' placeholder='Maximum number of participants' onkeypress='return isNumber(event)' autocomplete ='off'><br/><br/>
			<input type = 'radio' name='type_event_c[]' id='cost_team_c' value='0' onkeypress='return isNumber(event)' autocomplete ='off' style='position:absolute;top:355px;left:300px;width:20px;height:20px;'><p style='position:absolute;top:340px;left:330px;font-size:18px;'>Cost as per Team</p><br/><br/>
			<input type = 'radio' name='type_event_c[]' id='cost_participant_c' value='1' onkeypress='return isNumber(event)' autocomplete ='off' style='position:absolute;top:405px;left:300px;width:20px;height:20px;'><p style='position:absolute;top:390px;left:330px;font-size:18px;'>Cost as per Participant</p>
			</br></br>
			<paper-button value='submit' id='$club_id' style='position:absolute;top:460px;left:300px;height:45px;width:240px;background-color:#0e7ac3;color:white;' onclick='oldclub_newevent_details_1(this.id)'>Submit</paper-button>";
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