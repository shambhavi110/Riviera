<?php 
	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["key"])))
	{
		require 'sql_con.php';
		$status = 2;
		echo "<h1 style='text-align:center'>Approved Receipts</h1><br>
		<paper-button onclick ='excel_cash_receipts($status)' value ='Download' class='download'>Download</paper-button><br>
		<input type ='text' autocomplete='off' maxlength='5' placeholder='Search receipts..' onkeypress='return isNumber(event)' id ='search' onkeyup='search_cash_receipts($status)'>";
		$d = date('Y-m-d') ;
		$d = date('Y-m-d', strtotime($d. ' - 7 days'));
		echo "<p style='position:absolute;top:40px;left:240px;font-size:20px;'>From: </p><input type = 'date' value ='".$d."' id = 'from'>";
		echo "<p style='position:absolute;top:40px;left:470px;font-size:20px;'>To: </p><input type = 'date' value ='".date('Y-m-d') ."'  id ='to'>";
		echo "<paper-button value ='Go'  onclick='search_cash_date($status)' class='go'>Go</paper-button>";
		$sql_1 = "SELECT * from `registration`";
		$res_1 = mysqli_query($mysqli,$sql_1);
		echo "<div id ='receipts'>";
		if($res_1==true)
		{
			echo "<table border='2' style='width=200px;position:absolute;top:200px;left:60px;'>";
			
			echo
			"<tr>
				<td>Receipt number</td>
				<td>Registration number</td>
				<td>Contact number</td>
				<td>Events registered</td>
				<td>Co-ordinator name</td>
				<td>Price</td>

			</tr>";
			while($arr=mysqli_fetch_array($res_1))
			{
				$reciept_no = $arr["receipt_no"];
				$id = $arr["regno"];
				$phno = $arr["phno"];
				$cord_name = $arr["coordinator_name"];
				$price = $arr["amount"];
				$events = $arr["events"];
				echo "<tr>
							<td>".$reciept_no."</td>
							<td>".$id."</td>
							<td>".$phno."</td>
							<td>".str_replace("_"," ",$events)."<br>(".$arr["count"].")</td>
							<td>".$cord_name."</td>
							<td>".$price."</td>
					</tr>";
			}	
			echo "</table></div>";
		}
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
.download{position:absolute;top:150px;left:80px;background-color:rgb(14,122,195);color:white;width:200px;}
.go{position:absolute;top:150px;left:320px;background-color:rgb(14,122,195);color:white;width:200px;}
#from{width:200px;height:40px;border:none;position:absolute;top:90px;left:240px;}
#to{width:200px;height:40px;border:none;position:absolute;top:90px;left:460px;}
#search{width:200px;height:40px;border:none;position:absolute;top:90px;left:30px;}
</style>
<script src='components/platform/platform.js'></script>
<link rel='import' href='components/polymer/polymer.html'>
<link rel='import' href='components/paper-button/paper-button.html'>