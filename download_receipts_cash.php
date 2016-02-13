<?php
		session_start();
		if((isset($_SESSION["name"]))&&(isset($_REQUEST["key"])))
		{
			
			echo "<input type ='text' id = 'search_receipt' onkeyup='search_receipts_cash()' onkeypress='return isNumber(event)' maxlength=3 autocomplete='off' placeholder='Enter Receipt Book ID'>";
			echo "<div id ='download_cash'></div>";
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
<style type"text/css">
#search_receipt{position:absolute;top:20px;left:300px;width:200px;height:40px;border:none;}
#download_cash{position:absolute;top:100px;left:300px;}
</style>