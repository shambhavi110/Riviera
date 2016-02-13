<?php
	session_start();
	if(((isset($_SESSION["name_ec"]))||((isset($_SESSION["name"]))))&&(isset($_REQUEST["r"])))
	{
		require 'sql_con.php';
		$rno = $_REQUEST["r"];
		$sql = "SELECT * FROM `registration` WHERE receipt_no='$rno'";
		$res = mysqli_query($mysqli,$sql);
		$receipt_array = mysqli_fetch_array($res);
		if(count($receipt_array)>0)
			echo "Receipt exists";
		else
			echo "";
		mysqli_close($mysqli);
	}
	
	else  if((((!isset($_SESSION["name_ec"]))||((!isset($_SESSION["name"]))))&&(!isset($_REQUEST["r"])))||(((isset($_SESSION["name_ec"]))||((isset($_SESSION["name"]))))&&(!isset($_REQUEST["r"]))))
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