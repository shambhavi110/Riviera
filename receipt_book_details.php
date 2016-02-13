<?php
	session_start();
	if((isset($_SESSION["password"]))&&(isset($_REQUEST["s"])))
	{
		require 'sql_con.php';
		$f = "from";
		$t = "to";
		$d = date('Y-m-d') ;
		$d = date('Y-m-d', strtotime($d. ' - 7 days'));
		$status = $_REQUEST['s'];
		if($status == 0)
		{
		echo "<h2 style='text-align:center;'>Pending Receipt books</h2>";
		
		echo "<paper-button value ='Download' onclick='download_pending()' class='download' style ='position:absolute;top:140px;left:140px;width:240px;height:43px;border:none;background-color:rgb(23,123,187);color:white;'>Download</paper-button>";
		
		echo "<input type ='text' class='search' placeholder ='Search Receipt Book...' onkeyup='search_receipt_book($status)' id ='search' onkeypress='return isNumber(event)' autocomplete ='off' style='position:absolute;top:80px;left:80px;width:200px;height:35px;border:none;'>";
		
		echo "<p style='position:absolute;top:40px;left:300px;font-size:19px;' class='f'>From:</p><input type = 'date' class='from' value ='".$d."' id = 'from' style='position:absolute;top:80px;left:300px;width:200px;height:35px;border:none;'>";
		
		echo "<p style='position:absolute;top:40px;left:540px;font-size:19px;' class='t'>To:</p><input type = 'date' class='to' value ='".date('Y-m-d') ."'  id ='to' style='position:absolute;top:80px;left:540px;width:200px;height:35px;border:none;'>";
		
		echo "<paper-button value ='Go'  onclick='date_receiptbook_search($status)' class='go'  style='position:absolute;top:140px;left:440px;width:240px;height:43px;border:none;background-color:rgb(23,123,187);color:white;'>Go</paper-button>";
		
		echo "<div id ='receipt_table'>";
		
		echo"<table border = 2 style='position:absolute;top:210px;left:100px;border-collapse:collapse;'><tr><td>Name</td><td>Book ID</td><td>Date of issue</td><td>Date of return</td><td>Contact no</td><td>Delivered</td></tr>";
		
		}
		else if($status == 1)
		{
		echo "<h2 style='text-align:center;'>Returned Receipt books</h2>";
		
		echo "<paper-button value ='Download' class='download' onclick='download_returned()'>Download</paper-button>";
		
		echo "<input type ='text' class='search' placeholder ='Search Receipt Book...' onkeyup='search_receipt_book($status)' id ='search' onkeypress='return isNumber(event)' autocomplete ='off'>";
		
		echo "<p style='position:absolute;top:40px;left:300px;font-size:19px;' class='f'>From:</p><input type = 'date' value ='".$d."' id = 'from' class='from'>";
		
		echo "<p style='position:absolute;top:40px;left:540px;font-size:19px;' class='t'>To:</p><input type = 'date' value ='".date('Y-m-d') ."'  id ='to' class='to'>";
		
		echo "<paper-button value ='Go'  onclick='date_receiptbook_search($status)' class='go' >Go</paper-button>";
		
		echo "<div id ='receipt_table'>";
		
		echo"<table border = 2 style='position:absolute;top:210px;left:100px;border-collapse:collapse;'><tr><td>Name</td><td>Book ID</td><td>Date of issue</td><td>Contact no</td></tr>";
		
		}
		else
		{
		echo "<h2 style='text-align:center;'>All Receipt books</h2>";
		
		echo "<paper-button value ='Download' onclick='download_all()' class='download'>Download</paper-button>";
		
		echo "<input type ='text' class='search' placeholder ='Search Receipt Book...' onkeyup='search_receipt_book($status)' id ='search' onkeypress='return isNumber(event)' autocomplete ='off'>";
		
		echo "<p style='position:absolute;top:40px;left:300px;font-size:19px;' class='f'>From:</p><input type = 'date' value ='".$d."' id = 'from' class='from'>";
		
		echo "<p style='position:absolute;top:40px;left:540px;font-size:19px;' class='t'>To:</p><input type = 'date' value ='".date('Y-m-d') ."'  id ='to' class='to'>";
		
		echo "<paper-button value ='Go'  onclick='date_receiptbook_search($status)' class='go' >Go</paper-button>";
		
		echo "<div id ='receipt_table'>";
		
		echo"<table border = 2 style='position:absolute;top:210px;left:100px;border-collapse:collapse;'><tr><td>Name</td><td>Book ID</td><td>Date of issue</td><td>Contact no</td><td>Delivery Status</td></tr>";
		
		}
		$sql = "SELECT * FROM `receipt_book_ids`";
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
			$ret = $arr['return_status'];
				if($ret==1)
					$ret_status = "Delivered";
				else
					$ret_status = "Pending";
			if($status == 2)
			{
				echo "<tr><td style='width:100px;'>$regno<br>$name</td>";
				echo "<td style='width:100px;'>$bookid</td>";
				echo "<td style='width:100px;'>$issue_date</td>";
				echo "<td style='width:100px;'>$ph</td>";
				echo "<td>$ret_status</td></tr>";
			}
			else if($status == 1)
			{
				if($ret == 1)
				{
				echo "<tr><td style='width:100px;'>$regno<br>$name</td>";
				echo "<td style='width:100px;'>$bookid</td>";
				echo "<td style='width:100px;'>$issue_date</td>";
				echo "<td style='width:100px;'>$ph</td>";
				}
			}
			else if($status == 0)
			{
				if($ret==0)
				{
				echo "<tr><td style='width:100px;'>$regno<br>$name</td>";
				echo "<td style='width:100px;'>$bookid</td>";
				echo "<td style='width:100px;'>$issue_date</td>";
				echo "<td style='width:100px;'>$ret_date</td>";
				echo "<td style='width:100px;'>$ph</td>";
				echo "<td><input type = 'radio' name ='pending' value = '".$bookid."' id='".$bookid."' onClick ='pending_to_delivered(this.id)'></td></tr>";
				}
			}
		}
		echo "</div></table>";
		mysqli_close($mysqli);
	}
	else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["s"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["s"]))))
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
<link rel='import' href='components/polymer/polymer.html'>
<link rel='import' href='components/paper-button/paper-button.html'>
<link rel="stylesheet" type="text/css" href="receipt_book_details.css">
<style type="text/css">
.f{position:absolute;top:40px;left:300px;font-size:19px;}
.t{position:absolute;top:40px;left:540px;font-size:19px;}
.search{position:absolute;top:80px;left:80px;width:200px;height:35px;border:none;}
.from{position:absolute;top:80px;left:300px;width:200px;height:35px;border:none;}
.to{position:absolute;top:80px;left:540px;width:200px;height:35px;border:none;}
.download{position:absolute;top:140px;left:140px;width:240px;height:43px;border:none;background-color:rgb(23,123,187);color:white;}
.go{position:absolute;top:140px;left:440px;width:240px;height:43px;border:none;background-color:rgb(23,123,187);color:white;}
</style>