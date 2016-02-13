<?php
		session_start();
		if((isset($_SESSION["name"]))&&(isset($_REQUEST["key"])))
		{
			echo "<h2 style='position:absolute;top:150px;left:250px;'>Payment Mode</h2>
			<input type = 'radio' value ='mess' name ='mode' class='mess' onclick='mess_receipts()'><p class='regmess'>Mess Refund</p>
			<input type = 'radio' value ='cash' name ='mode' class='cash' onclick='cash_receipts()'><p class='regcash'>Cash</p>";
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
.regmess{position:absolute;top:200px;left:250px;font-size:20px;font-weight:bold;}
.regcash{position:absolute;top:250px;left:250px;font-size:20px;font-weight:bold;}
.mess{position:absolute;top:220px;left:200px;width:20px;height:20px;}
.cash{position:absolute;top:270px;left:200px;width:20px;height:20px;}
</style>