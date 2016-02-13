<?php
	require 'sql_con.php';
	session_start();
	if((isset($_SESSION["name_ec"]))&&(isset($_REQUEST["np"])))
	{
		require 'sql_con.php';
		$name = $_SESSION["name_ec"];
		$p = $_POST['np'];

	
		$q = "UPDATE `event_cord_login` SET password ='$p' WHERE username = '$name'";
		$c = mysqli_query($mysqli,$q);
		if($c)
		{
			echo "Successfully Changed!<br>";
		}
		else
		{
			echo "Password change Failure!<br>";
		}
		mysqli_close($mysqli);
	}
	else if(((!isset($_SESSION["name_ec"]))&&(!isset($_REQUEST["np"])))||((isset($_SESSION["name_ec"]))&&(!isset($_REQUEST["np"]))))
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