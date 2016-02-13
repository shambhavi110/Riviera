<?php
//regex need to be added
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["key"])))
		{
			echo
				" <h1 style='text-align:center;'>Club details</h1> 
				<input type='text' name='name' id='name' placeholder='Name of the club' style='position:absolute;top:80px;left:300px;height:40px;width:200px;border:none;' autocomplete = 'off'>
				</br></br>
				<input type='email' name='mail' id='mail' placeholder='Email ID of the club' style='position:absolute;top:150px;left:300px;height:40px;width:200px;border:none;' autocomplete = 'off'>
				</br></br>
				<paper-button value='submit' onclick='enter_club_event()' style='position:absolute;top:220px;left:300px;height:40px;width:200px;border:none;color:white;background-color:#0e7ac3;'>Submit</paper-button>";
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
		