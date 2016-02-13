<?php
		require 'sql_con.php';
		$id = $_REQUEST["value"];
		$sql = "UPDATE `temp_registration_mess` SET query=1 WHERE receipt=$id";
		$res = mysqli_query($mysqli,$sql);
		mysqli_close($mysqli);
		require("approve_mess_receipts.php");
		
?>