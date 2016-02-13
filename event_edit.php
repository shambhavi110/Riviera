<?php 
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["value"])))
		{
			require 'sql_con.php';
			$id = $_REQUEST["value"];
			$sql = "SELECT * FROM `events` WHERE id='$id'";
			$res = mysqli_query($mysqli,$sql);
			$arr = mysqli_fetch_array($res);
			$events = $arr["event_name"];
			$str=$arr["id"];

			
			$t = $arr["filled"];
			echo "<div id='data' style='font-size:18px;'>";
			echo "<paper-button class='delete'".$arr["id"]."' onClick='delete_event($str)'>Delete the event</paper-button>";//delete
			
			echo "<p class='name1'><strong>Name:  </strong>".str_replace("_"," ",$arr["event_name"])."</p>";
			
			echo "<p class='price'><strong>Price:	</strong>".$arr["price"]."</p>";
			
			echo "<p class='seat'><strong>Total Seats:</strong>".$arr["totalseats"]."</p>";
			
			echo "<input type='text' class='seats' id='modify_totalseats".$arr["id"]."'  min ='$t' placeholder=\"Greater than $t \"><br/>";
			
			echo "<paper-button id='but_var' class='modify' onClick='edit_confirm($str,$t)'>Modify</paper-button>";//edit
			
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

<!DOCTYPE html><html>
<head>
<style type="text/css">
.name1{
position:absolute;top:70px;left:120px;border:none;width:250px;height:45px;
}
.price{
position:absolute;top:140px;left:120px;border:none;width:250px;height:45px;
}
.seat{
position:absolute;top:230px;left:120px;border:none;width:250px;height:45px;
}
.seats{
position:absolute;top:230px;left:460px;border:none;width:250px;height:45px;
}
.modify{
position:absolute;top:380px;left:460px;border:none;width:250px;height:45px;background-color:#177bbb;color:white;
}
.delete{
position:absolute;top:380px;left:80px;border:none;width:250px;height:45px;background-color:#177bbb;color:white;
}
</style>
</head>
<body></body>
</html>