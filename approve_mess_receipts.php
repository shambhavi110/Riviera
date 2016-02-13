<?php
	session_start();
	if((isset($_SESSION["name"])))
	{
		require 'sql_con.php';
		$status=1;
		$d = date('Y-m-d') ;
		$d = date('Y-m-d', strtotime($d. ' - 7 days'));
		echo "<h2 style='position:absolute;top:40px;left:300px;'>Pending Receipts</h2>";
		echo "<div style='position:absolute;top:120px;left:140px;'>";
		echo "<input type ='text' style='height:40px;border:none;' placeholder ='Search Receipt...' onkeyup='search_mess_receipts($status)' id ='search' onkeypress='return isNumber(event)' autocomple='off' maxlength='6'>";
		echo "From: <input type = 'date' value ='".$d."' id = 'from' class='from'>";
		echo "To: <input type = 'date' value ='".date('Y-m-d') ."'  id ='to' class='to'>";
		echo "<paper-button value ='Go' class='go' onclick='search_mess_date($status)' >Go</paper-button>";
		echo "<paper-button onclick ='excel_approve_mess_receipts()' class='download' value ='Download'>Download</paper-button>";
		$sql = "SELECT * FROM `temp_registration_mess` WHERE query=0 AND approval=0";
		$res = mysqli_query($mysqli,$sql);
		$i=0;
		echo "<div class = 'recdisp' id ='receipts'>
		 <table border='2' style='width=200px;position:absolute;top:120px;left:0px;'>
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
			if($arr["query"]==0)
			{
				echo
				"<tr>
				<td>
				<input type = 'radio' name ='event".$arr["receipt"]."' id =".$arr["receipt"]." onclick='query_mess_receipts_1(this.id);' value = 1>Query</input>
				</td>
					<td>".$arr["receipt"]."</td>
					<td>".$arr["amount"]."</td>
					<td>".$arr["name"]."</td>
					<td>".$arr["regno"]."</td>
					<td>".$arr["phno"]."</td>
					<td>".str_replace("_"," ",$arr["events"])."<br>(".$arr["count"].")</td>
					<td>
						<input type = 'radio' name ='event".$arr["receipt"]."' id =".$arr["receipt"]." onclick='approve_mess_receipts_1(this.id,0);' value = 1>Approve</input>
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
.from{width:170px;height:40px;border:none;}
.to{width:170px;height:40px;border:none;}
</style>
<script src='components/platform/platform.js'></script>
<link rel='import' href='components/polymer/polymer.html'>
<link rel='import' href='components/paper-button/paper-button.html'>
