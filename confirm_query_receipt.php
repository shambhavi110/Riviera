<?php
	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["key"])))
	{
		require 'sql_con.php';
		$status = 0;
		$d = date('Y-m-d') ;
		$d = date('Y-m-d', strtotime($d. ' - 7 days'));
		echo "<h2 style='position:absolute;top:40px;left:300px;'>Query Receipts</h2>";
		
		echo "<div style='position:absolute;top:120px;left:140px;'>";
		
		echo "<paper-button id ='download' class='download' onclick='excel_query_cash_receipts()' value ='Download'>Download</paper-button>";
		
		echo "<br><input type='text' placeholder='Search receipt...' onkeyup='search_cash_receipts($status)' autocomplete='off' id ='search' onkeypress='return isNumber(event)' maxlength='5'>";
		
		echo "<p style='position:absolute;top:-20px;left:180px;font-size:20px;'>From: </p><input type = 'date' value ='".$d."' id = 'from'>";
		
		echo "<p style='position:absolute;top:-20px;left:400px;font-size:20px;'>To: </p><input type = 'date' value ='".date('Y-m-d') ."'  id ='to'>";
		
		echo "<paper-button value ='Go' class='go' onclick='search_cash_date($status)' >Go</paper-button>";
		
		$sql = "SELECT * from `temp_registration` where query = 1  and approval = 0";
		$res = mysqli_query($mysqli,$sql);
		$i=0;
		echo "<div class = 'anurag' id ='receipts'>
		 <table border='2'style='width=200px;position:absolute;top:150px;left:8px;'>
		<tr>
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
			echo
				"
				<tr>
				
					<td>".$arr["receipt_no"]."</td>
					<td>".$arr["amount"]."</td>
					<td>".$arr["name"]."</td>
					<td>".$arr["regno"]."</td>
					<td>".$arr["phno"]."</td>
					<td>".str_replace("_"," ",$arr["events"])."<br>(".$arr["count"].")</td>
					<td>
						<input type = 'radio' name ='event".$arr["receipt_no"]."' id =".$arr["receipt_no"]." onclick='approve_events(this.id);' value = 1>Approve</input>
						
					</td>
				</tr>";
			
					
		}
		echo "</table>";
		echo "</div>";
		require 'sql_con.php';
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
.download{position:absolute;top:100px;left:80px;background-color:rgb(14,122,195);color:white;width:200px;}
.go{position:absolute;top:100px;left:320px;background-color:rgb(14,122,195);color:white;width:200px;}
#from{width:200px;height:40px;border:none;position:absolute;top:40px;left:170px;}
#to{width:200px;height:40px;border:none;position:absolute;top:40px;left:400px;}
#search{width:200px;height:40px;border:none;position:absolute;top:40px;left:-50px;}
</style>
<script src='components/platform/platform.js'></script>
<link rel='import' href='components/polymer/polymer.html'>
<link rel='import' href='components/paper-button/paper-button.html'>



