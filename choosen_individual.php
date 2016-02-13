<?php
//regex need to be added
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["key"])))
		{
			require 'sql_con.php';
			//if the page is just loaded
			//take the values and send it the next php file for storing in te events table
		
	        echo
	        " 
	        <br/> 
			<input type = 'text' autocomplete = 'off' name='name' id='name' placeholder='Name of the event' style='position:absolute;top:50px;left:300px;width:200px;height:40px;border:none;'><br/><br/>
			<input type = 'text' name='totalseats' id='seats' placeholder='Totalseats of event' style='position:absolute;top:120px;left:300px;width:200px;height:40px;border:none;' onkeypress='return isNumber(event)' autocomplete ='off'><br/><br/>
			<input type = 'text' name='price' id='price' placeholder='Price of the event' style='position:absolute;top:180px;left:300px;width:200px;height:40px;border:none;' onkeypress='return isNumber(event)' autocomplete ='off'><br/><br/>
			<input type = 'text' name='min_munber' id='min_numb' placeholder='Minimum number of participants' style='position:absolute;top:240px;left:300px;width:200px;height:40px;border:none;' onkeypress='return isNumber(event)' autocomplete ='off'><br/><br/>
			<input type = 'text' name='max_munber' id='max_numb' placeholder='Maximum number of participants' style='position:absolute;top:300px;left:300px;width:200px;height:40px;border:none;' onkeypress='return isNumber(event)' autocomplete ='off'><br/><br/>
			<input type = 'radio' name='type_event[]' id='cost_team' value='0' onkeypress='return isNumber(event)' style='position:absolute;top:350px;left:300px;width:20px;height:20px;' autocomplete ='off'><p style='position:absolute;top:330px;left:350px;font-size:20px;'>Cost as per Team</p><br/><br/>
			<input type = 'radio' name='type_event[]' id='cost_participant' value='1' onkeypress='return isNumber(event)' autocomplete ='off' style='position:absolute;top:380px;left:300px;width:20px;height:20px;'><p style='position:absolute;top:360px;left:350px;font-size:20px;'>Cost as per Participant</p>
			</br></br>
			<paper-button value='submit' onclick='enter_indiv_acc()' class='submit'>Submit</paper-button>";
			mysqli_close($mysqli);
		}
		else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["key"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["key"]))))
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
<script src='components/platform/platform.js'></script>
<link rel='import' href='components/polymer/polymer.html'>
<link rel='import' href='components/paper-button/paper-button.html'>
<style type="text/css">
.submit{position:absolute;top:430px;left:300px;width:200px;height:40px;background-color:rgb(14,122,195);color:white;}
</style>