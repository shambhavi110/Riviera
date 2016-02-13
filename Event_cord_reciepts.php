<!DOCTYPE html>
<?php 
	session_start();
	if((isset($_SESSION["name_ec"]))&&(isset($_REQUEST["key"])))
	{
		require 'sql_con.php';
		$coordinator=$_SESSION["name_ec"];
		echo "\n<h3>Cash Receipts</h3>";
		$sql_1 = "SELECT * FROM `temp_registration` WHERE coordinator_name='$coordinator'";
		$res_1 =mysqli_query($mysqli,$sql_1);
		$num=mysqli_num_rows($res_1);
		if($num>0)
		{
			echo
			"<table border='1'>
				<th>Reciept Number</th>
				<th>Name</th>
				<th>Phone number</th>
				<th>Count of participants</th>
				<th>Price</th>
				<th>Approval status</th>";
				while($arr=mysqli_fetch_array($res_1))
				{
					if($arr["approval"]==1)
						$app = "Approved";
					else
						$app = "Not Approved";
					echo
					"<tr>
						<td>".$arr["receipt_no"]."</td>
						<td>".$arr["name"]."</td>
						<td>".$arr["phno"]."</td>
						<td>".$arr["count"]."</td>
						<td>".$arr["amount"]."</td>
						<td>$app</td>
					<tr/>";		
				}

			echo"</table>";
		}
		echo "\n<h3>Mess Refund Receipts</h3>";
		$sql_1 = "SELECT * FROM `temp_registration_mess` WHERE coordinator_name='$coordinator'";
		$res_1 =mysqli_query($mysqli,$sql_1);
		$num=mysqli_num_rows($res_1);
		if($num>0)
		{
			echo
			"<table border='1'>
				<th>Receipt Number</th>
				<th>Name</th>
				<th>Phone number</th>
				<th>Count of participants</th>
				<th>Price</th>
				<th>Approval status</th>";
				while($arr=mysqli_fetch_array($res_1))
				{
					if($arr["approval"]==1)
						$app = "Approved";
					else
						$app = "Not Approved";
					echo
					"<tr>
						<td>".$arr["receipt"]."</td>
						<td>".$arr["name"]."</td>
						<td>".$arr["phno"]."</td>
						<td>".$arr["count"]."</td>
						<td>".$arr["amount"]."</td>
						<td>$app</td>
					<tr/>";		
				}

			echo"</table>";
		}
		else
		{
			echo "<h3>No records to display</h3>";
		}
		mysqli_close($mysqli);
	}
	else if(((!isset($_SESSION["name_ec"]))&&(!isset($_REQUEST["key"])))||((isset($_SESSION["name_ec"]))&&(!isset($_REQUEST["key"]))))
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