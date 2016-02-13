<?php 
	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["key"])))
	{
		require 'sql_con.php';
		$status = 2;
		$d = date('Y-m-d') ;
		$d = date('Y-m-d', strtotime($d. ' - 7 days'));
		echo "<p style='position:absolute;top:70px;left:250px;font-size:20px;'>From: </p><input type = 'date' value ='".$d."' id = 'from'>";
		echo "<p style='position:absolute;top:70px;left:500px;font-size:20px;'>To: </p><input type = 'date' value ='".date('Y-m-d') ."'  id ='to'>";
		echo "<paper-button value ='Go'  onclick='search_mess_date($status)' class='go' onkeypress='return isNumber(event)' autocomplete='off'>Go</paper-button>";
		echo "<h1 style='text-align:center;'>All Mess Receipts</h1><br>
		<paper-button onclick ='excel_all_mess_receipts()' class='download' value ='Download'>Download</paper-button><br>
		<input type ='text' autocomplete='off'  maxlength='6' id ='search' onkeyup='search_mess_receipts($status)' placeholder='Search Receipt' onkeypress='return isNumber(event)'>";
		$sql_1 = "SELECT * from `registration_mess`";
		$res_1 = mysqli_query($mysqli,$sql_1);
		echo "<div id ='receipts'>";
		if($res_1==true)
		{
			echo "<table border='1' style='position:absolute;top:250px;left:80px;'>";
			
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
#from{position:absolute;top:120px;left:240px;border:none;height:40px;width:180px;}
#to{position:absolute;top:120px;left:500px;border:none;height:40px;width:180px;}
#search{position:absolute;left:10px;top:120px;width:200px;height:40px;border:none;}
.download{position:absolute;top:200px;left:120px;background-color:rgb(14,122,195);color:white;width:200px;}
.go{position:absolute;top:200px;left:360px;background-color:rgb(14,122,195);color:white;width:200px;}
</style>
<script src='components/platform/platform.js'></script>
<link rel='import' href='components/polymer/polymer.html'>
<link rel='import' href='components/paper-button/paper-button.html'>