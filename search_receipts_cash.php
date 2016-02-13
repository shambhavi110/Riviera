 <?php
	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["s"])))
	{
		require 'sql_con.php';
		$s = $_REQUEST['s'];
		$start = ($s-1)*100;
		$end =  $start+99;
		$sql = "SELECT * FROM `registration` WHERE receipt_no > $start AND receipt_no <= $end";
		$res = mysqli_query($mysqli,$sql);
		$c= mysqli_num_rows($res);
		if($c>0)
		echo "<input type ='button'  id = 'download_cash' onclick='excel_receipts_cash($start,$end)' value ='$s book download' style='position:absolute;top:1px;left:10px;font-size:18px;background-color:rgb(14,122,195);color:white;width:200px;height:60px;'> ";
		else
		echo "<div style='position:absolute;top:1px;left:10px;width:200px;'> No book Exists</div>";
		mysqli_close($mysqli);
	
	}
	else if(((!isset($_SESSION["name"]))&&(!isset($_REQUEST["s"])))||((isset($_SESSION["name"]))&&(!isset($_REQUEST["s"]))))
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