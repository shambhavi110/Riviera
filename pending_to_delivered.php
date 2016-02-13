 <?php
	
	session_start();
	if((isset($_SESSION["password"]))&&(isset($_REQUEST["id"])))
	{
		require 'sql_con.php';
		$id = $_REQUEST['id'];
		$sql = "UPDATE `receipt_book_ids` SET return_status = 1 WHERE id = $id";
		mysqli_query($mysqli,$sql);
		echo"<table  border = 2  style='position:absolute;top:210px;left:100px;border-collapse:collapse;'><tr><td>Name</td><td>Book ID</td><td>Date of issue</td><td>Date of return</td><td>Contact no</td><td>Delivered</td></tr>";
		$sql = "SELECT * FROM `receipt_book_ids` WHERE return_status = 0";
		$res = mysqli_query($mysqli,$sql);
		while($arr=mysqli_fetch_array($res))
		{
			$regno = $arr['regno'];
			$sql1 = "SELECT * FROM `receipt` WHERE regno = '$regno'";
			$res1 = mysqli_query($mysqli,$sql1);
			while($arr1=mysqli_fetch_array($res1))
			{
			$name=$arr1['person_name'];
			$ph=$arr1['contact_no'];
			$issue_date=$arr1['date_of_issue'];
			$ret_date=$arr1['date_of_return'];
			}
			$bookid = $arr['id'];
				echo "<tr><td style='width:100px;'>$regno<br>$name</td>";
				echo "<td style='width:100px;'>$bookid</td>";
				echo "<td style='width:100px;'>$issue_date</td>";
				echo "<td style='width:100px;'>$ret_date</td>";
				echo "<td style='width:100px;'>$ph</td>";
				echo "<td><input type = 'radio' name ='pending' value = '".$bookid."'  id='".$bookid."' onClick ='pending_to_delivered(this.id)'></td></tr>";
		}
		mysqli_close($mysqli);
	}
	else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["id"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["id"]))))
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