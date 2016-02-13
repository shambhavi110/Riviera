<?php 
		
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["value"])))
		{
			require 'sql_con.php';
			$id = $_REQUEST["value"];
		
			$sql = "SELECT * FROM `deleted_events` WHERE id='$id'";
			$res = mysqli_query($mysqli,$sql);
			$arr = mysqli_fetch_array($res);
			$events=$arr["event_name"];
			$str=$arr["id"];
			echo "<div id='data' style='font-size:18px;'>";
			echo "<paper-button class='download' onClick='excel_indevent_deleted($str)'>Download</paper-button>";//download
			echo "</br></br></br>";		
			echo "<table border='1' style='border-collapse:collapse;position:absolute;top:100px;left:240px;'><tr><td width=100px;><p><strong>Name:  </strong></td><td width=300px;>".str_replace("_"," ",$arr["event_name"])."</td></p></tr>";
			echo "<tr><td><p><strong>Price:	</strong></td><td width=300px;>".$arr["price"]."</td></p></tr>";
			echo "<tr><td><p><strong>Total Seats:</strong></td><td width=300px;>".$arr["totalseats"]."</td></p></tr>";
			echo "<tr><td><p><strong>Filled Seats:</strong></td><td width=300px;>".$arr["filled"]."</td></p></tr></table>";	
			echo "</div>";	
			echo "<p id='holder'>";
			mysqli_close($mysqli);
		}
		else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["value"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["value"]))))
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

<style type="text/css">
.name1{
position:absolute;top:70px;left:460px;border:none;width:250px;height:45px;
}
.desc{
position:absolute;top:140px;left:460px;border:none;width:250px;height:45px;
}
.cost{
position:absolute;top:230px;left:460px;border:none;width:250px;height:45px;
}
.seats{
position:absolute;top:310px;left:460px;border:none;width:250px;height:45px;
}
.modify{
position:absolute;top:400px;left:460px;border:none;width:250px;height:45px;background-color:#177bbb;color:white;
}
.delete{
position:absolute;top:400px;left:80px;border:none;width:250px;height:45px;background-color:#177bbb;color:white;
}
.download{
position:absolute;top:400px;left:250px;border:none;width:250px;height:45px;background-color:#177bbb;color:white;
}

</style>
<script src='components/platform/platform.js'></script>
			<link rel='import' href='components/polymer/polymer.html'>
			<link rel='import' href='components/paper-button/paper-button.html'>
