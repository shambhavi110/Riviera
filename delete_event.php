<?php

		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["id"])))
		{	
			require 'sql_con.php';
			$event = "";
			$id = $_REQUEST["id"];
			$sql= "SELECT * from events WHERE id =$id";
			$rs = mysqli_query($mysqli,$sql);
			while($arr = mysqli_fetch_array($rs))
			{
				$sql1 = "INSERT INTO deleted_events values ('$arr[0]','$arr[1]','$arr[2]','$arr[3]','$arr[4]','$arr[5]','$arr[6]','$arr[7]')";
				mysqli_query($mysqli,$sql1);
				$event = $arr[1];
			}
			$sql2 = "DELETE FROM events WHERE id=$id";
			if(mysqli_query($mysqli , $sql2))
			echo "deleted";
					
			//Deleting from registration and inserting into deleted_registration 
			$sql3= "SELECT * FROM `registration` WHERE events='$event'";
			$rs1 = mysqli_query($mysqli,$sql3);
			while($arr1 = mysqli_fetch_array($rs1))
			{
				$sql4 = "INSERT INTO `deleted_registration` values ('$arr1[0]','$arr1[1]','$arr1[2]','$arr1[3]','$arr1[4]','$arr1[5]','$arr1[6]','$arr1[7]',null,'$arr1[8]' )";
				mysqli_query($mysqli,$sql4);
			}
			$sql5 = "DELETE FROM registration WHERE events='$event'";
			if(mysqli_query($mysqli , $sql5))
			echo "deleted 1";
			
			//Deleting from registration_mess and inserting into deleted_registration 
			$sql6= "SELECT * from `registration_mess` WHERE events='$event'";
			$rs2 = mysqli_query($mysqli,$sql6);
			while($arr2 = mysqli_fetch_array($rs2))
			{
				$sql7 = "INSERT INTO deleted_registration values ('$arr2[0]','$arr2[1]','$arr2[2]','$arr2[3]','$arr2[4]','$arr2[5]','$arr2[6]','$arr2[7]','$arr2[8]','$arr2[9]' )";
				mysqli_query($mysqli,$sql7);
			}
			$sql8 = "DELETE FROM registration_mess WHERE events='$event'";
			mysqli_query($mysqli , $sql8);
			
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
			echo "<div>Please login again</div>";
			exit();
		}
?>