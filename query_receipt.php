<?php
	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["value"])))
	{
		require 'sql_con.php';
		$id = $_REQUEST["value"];

		$query_1 = "UPDATE temp_registration set query=1 where receipt_no=$id";
		$result_1 = mysqli_query($mysqli,$query_1);

			//all event details are being printed
		$sql = "SELECT * FROM `temp_registration` where query=0 and approval=0";
		$res = mysqli_query($mysqli,$sql);
		$i=0;
		echo 
		"<div class ='anurag'>
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
					<td>".str_replace("_"," ",$arr["name"])."</td>
					<td>".$arr["regno"]."</td>
					<td>".$arr["phno"]."</td>
					<td>".$arr["events"]."</td>
					<td>
						<input type = 'radio' name ='event".$arr["receipt_no"]."' id =".$arr["receipt_no"]." onclick='Select_events(this.id);' value = 1>Approve</input>
					</td>
				</tr>";
			}			
		}

		echo "</table>";
		mysqli_close($mysqli);
	}
	else if(((!isset($_SESSION["name"]))&&(!isset($_REQUEST["value"])))||((isset($_SESSION["name"]))&&(!isset($_REQUEST["value"]))))
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
.anurag
{
	position: absolute;
	left:20px;
}
</style>