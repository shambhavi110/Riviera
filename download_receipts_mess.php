<?php
	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["key"])))
	{
		require 'sql_con.php';
		$m="";
		$sql_1 = "SELECT * from `registration_mess`";
		$res_1 = mysqli_query($mysqli,$sql_1);
		while($arr = mysqli_fetch_row($res_1))
		{
		$m = $arr[0];
		}
		echo "<input type ='text' id = 'min'  maxlength=6 placeholder ='Min: 100001' autocomplete='off'onkeypress='return isNumber(event)'>";
		echo "<input type ='text' id = 'max'  maxlength=6 placeholder ='Max: $m' autocomplete='off' onkeypress='return isNumber(event)'>";
		echo "<paper-button class='download' value ='download' id = 'search_receipt' onclick='excel_mess_receipts()'>Download</paper-button>";
		echo "<div id ='download_cash'></div>";
		mysqli_close($mysqli);
	}
	else if(((!isset($_SESSION["name"]))&&(!isset($_REQUEST["key"])))||((isset($_SESSION["name"]))&&(!isset($_REQUEST["key"]))))
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
<style type="text/css">
.download{position:absolute;top:30px;left:530px;background-color:rgb(14,122,195);color:white;width:200px;}
#min{position:absolute;top:30px;left:40px;width:200px;height:40px;border:none;}
#max{position:absolute;top:30px;left:300px;width:200px;height:40px;border:none;}
</style>
<script src='components/platform/platform.js'></script>
<link rel='import' href='components/polymer/polymer.html'>
<link rel='import' href='components/paper-button/paper-button.html'>