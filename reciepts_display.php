<?php
	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["key"])))
	{
		require 'sql_con.php';
		$status =1;
		$d = date('Y-m-d') ;
		$d = date('Y-m-d', strtotime($d. ' - 7 days'));
		echo "<h2 style='position:absolute;top:40px;left:300px;'>Pending Receipts</h2>";
		echo "<div style='position:absolute;top:120px;left:140px;'>";
		$sql = "SELECT * FROM `temp_registration` where query=0 and approval=0";
		echo "<input type ='text' placeholder ='Search Receipt...' onkeyup='search_cash_receipts($status)' id ='search' onkeypress='return isNumber(event)' autocomplete='off' maxlength='5'>";
		echo "<p style='position:absolute;top:-20px;left:210px;font-size:20px;'>From: </p><input type = 'date' value ='".$d."' id = 'from'>";
		echo "<p style='position:absolute;top:-20px;left:440px;font-size:20px;'>To: </p><input type = 'date' value ='".date('Y-m-d') ."'  id ='to'>";
		echo "<paper-button value ='Go'  onclick='search_cash_date($status)' class='go'>GO</paper-button>";
		echo "<paper-button id ='download' onclick='excel_approve_cash_receipts()' value ='Download' class='download'>Download</paper-button>";
		$res = mysqli_query($mysqli,$sql);
		$i=0;
		echo "<div class = 'recdisp' id ='receipts'>
		 <table border='2' style='width=200px;position:absolute;top:150px;left:8px;'>
		<tr>
		<td>Wrong receipt</td>
		<td>Receipt Number</td>
		<td>Amount</td>
		<td>Name</td>
		<td>Register Number</td>
		<td>Phone Number</td>
		<td>Event Name</td>
		<td>Approve receipt</td>
		
		</tr>";
		while($arr=mysqli_fetch_array($res))
		{
			if(($arr["approval"]==0))
			{
				echo
				"
				<tr>
				<td>
					<input type = 'radio' name ='event".$arr["receipt_no"]."' id =".$arr["receipt_no"]." onclick='Query_events(this.id);' value = 1>Query</input>
				</td>
					<td>".$arr["receipt_no"]."</td>
					<td>".$arr["amount"]."</td>
					<td>".$arr["name"]."</td>
					<td>".$arr["regno"]."</td>
					<td>".$arr["phno"]."</td>
					<td>".str_replace("_"," ",$arr["events"])."<br>(".$arr["count"].")</td>
					<td>
						<input type = 'radio' name ='event".$arr["receipt_no"]."' id =".$arr["receipt_no"]." onclick='Select_events(this.id);' value = 1>Approve</input>
					</td>
				</tr>";
			}
		}
		echo "</table>";
		echo "</div>";
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
<style>
.recdisp
{
	position: absolute;
	left:20px;
}
.download{position:absolute;top:80px;left:80px;background-color:rgb(14,122,195);color:white;width:200px;}
.go{position:absolute;top:80px;left:320px;background-color:rgb(14,122,195);color:white;width:200px;}
#from{width:200px;height:40px;border:none;position:absolute;top:30px;left:210px;}
#to{width:200px;height:40px;border:none;position:absolute;top:30px;left:430px;}
#search{width:200px;height:40px;border:none;position:absolute;top:30px;left:0px;}
</style>
<script src='components/platform/platform.js'></script>
<link rel='import' href='components/polymer/polymer.html'>
<link rel='import' href='components/paper-button/paper-button.html'>
