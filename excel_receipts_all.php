<?php
	
	session_start();
	if(isset($_SESSION["name"]))
	{
		require 'sql_con.php';
		$s = $_REQUEST['s'];
		$d=date('d/m/Y');
		$file_name = "All_Receipts_$d.xls";
		header( "Content-Type: application/vnd.ms-excel" );
		header( "Content-disposition: attachment; filename=$file_name" );
		if($s==2)
		{
		$sql_1 = "SELECT * from `registration`";
		$res_1 = mysqli_query($mysqli,$sql_1);
		if($res_1==true)
		{
		echo"Receipt number\tRegistration number\tContact number\tEvents registered\tCo-ordinator name\tPrice\tCount";
		while($arr=mysqli_fetch_array($res_1))
			{
					$reciept_no = $arr["receipt_no"];
					$id = $arr["regno"];
					$phno = $arr["phno"];
					$cord_name = $arr["coordinator_name"];
					$price = $arr["amount"];
					$events = $arr["events"];
					$count = $arr["count"];
					echo "\n".$reciept_no."\t".$id."\t".$phno."\t".str_replace("_"," ",$events)."\t".$cord_name."\t".$price."\t".$count;
				}	
			}
		}
		//Approval
		else if ($s == 1)
		{
		$sql_1 = "SELECT * FROM `temp_registration` WHERE approval = 0 AND query = 0";
		$res_1 = mysqli_query($mysqli,$sql_1);
		if($res_1==true)
		{
		echo"\nReciept number\tRegistration number\tContact number\tEvents registered\tCo-ordinator name\tPrice\tCount";
		while($arr=mysqli_fetch_array($res_1))
			{
					$reciept_no = $arr["receipt_no"];
					$id = $arr["regno"];
					$phno = $arr["phno"];
					$cord_name = $arr["coordinator_name"];
					$price = $arr["amount"];
					$events = $arr["events"];
					$count = $arr["count"];
					echo "\n".$reciept_no."\t".$id."\t".$phno."\t".str_replace("_"," ",$events)."\t".$cord_name."\t".$price."\t".$count;
				}	
			}
		}
		//Query
		else if ($s == 0)
		{
		$sql_1 = "SELECT * FROM `registration` WHERE query = 1 AND approval = 0";
		$res_1 = mysqli_query($mysqli,$sql_1);
		if($res_1==true)
		{
		echo"\nReciept number\tRegistration number\tContact number\tEvents registered\tCo-ordinator name\tPrice\tCount";
		while($arr=mysqli_fetch_array($res_1))
			{
					$reciept_no = $arr["receipt_no"];
					$id = $arr["regno"];
					$phno = $arr["phno"];
					$cord_name = $arr["coordinator_name"];
					$price = $arr["amount"];
					$events = $arr["events"];
					$count = $arr["count"];
					echo "\n".$reciept_no."\t".$id."\t".$phno."\t".str_replace("_"," ",$events)."\t".$cord_name."\t".$price."\t".$count;
				}	
			}
		}
		mysqli_close($mysqli);
	}
	else
	{
		session_unset();
		header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
		header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
		session_destroy();
		header("Location:login.php");
	}
?>