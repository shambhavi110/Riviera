<?php
		session_start();
		error_reporting(0);
		if((isset($_SESSION["name_ec"])))
		echo "<h2 style='position:absolute;top:150px;left:250px;'>Register By</h2>
	<input type = 'radio' value ='mess' class='mess' name ='mode' onclick='mess_home()'><p class='regmess'>Mess Refund</p>
	<input type = 'radio' value ='cash' class='cash' name ='mode' onclick='cash_home()'><p class='regcash'>Cash</p>";
		
		else
		{
			session_unset();
			header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
			header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
			session_destroy();
			header("Location:login.php");
		}
?>
<style type="text/css">
.regmess{position:absolute;top:200px;left:250px;font-size:20px;font-weight:bold;}
.regcash{position:absolute;top:250px;left:250px;font-size:20px;font-weight:bold;}
.mess{position:absolute;top:220px;left:200px;width:20px;height:20px;}
.cash{position:absolute;top:270px;left:200px;width:20px;height:20px;}
</style>