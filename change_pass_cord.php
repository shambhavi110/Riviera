<?php
	session_start();
	if((isset($_SESSION["name_ec"]))&&(isset($_REQUEST["key"])))
	{
		echo " 
		<p style='position:absolute;top:90px;left:120px;font-weight:bold;font-size:20px;'>New Password: </p><input  class='newpass2' required type ='password' name ='np' id ='np' placeholder='New Password'><br>
		<p style='position:absolute;top:150px;left:120px;font-weight:bold;font-size:20px;'>Retype Password: </p><input class='confirm' required type ='password' name ='rnp' id ='rnp' placeholder = 'Confirm Password'><br>
		<paper-button value ='Submit' name='subpass' id ='subpass' onClick ='sub_pass()' class='check'>Submit</paper-button>";
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
<script src='components/platform/platform.js'></script>
			<link rel='import' href='components/polymer/polymer.html'>
			<link rel='import' href='components/paper-button/paper-button.html'>
		<style type="text/css">
		.newpass2{position:absolute;top:100px;left:280px;width:240px;height:45px;border:none;}
		.confirm{position:absolute;top:160px;left:280px;width:240px;height:45px;border:none;}
		.check{position:absolute;top:250px;left:220px;height:45px;width:240px;border:none;color:white;background-color:rgb(23,123,187);}
		</style>