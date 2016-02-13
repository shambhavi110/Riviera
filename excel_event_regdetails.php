<?php
	//Downloading individual events Registered students list 
	
	session_start();
	if((isset($_SESSION["name_ec"])||isset($_SESSION["password"])||(isset($_SESSION["name_iso"]))))
	{
		require 'sql_con.php';
		$id = $_REQUEST['id'];
		$name=array();
		$regno=array();
		$phno=array();
		$receipt_no=array();
		$p_no = array();
		$i=0;
		$j=0;
		$event_name='';
		
		$query = "SELECT event_name FROM `events` WHERE id = $id";
		$result = mysqli_query($mysqli,$query);
		while($temp=mysqli_fetch_array($result))
		{
			$event_name = $temp[0];
		} 
		
		$query1 = "SELECT * FROM `$event_name`";
		$result1 = mysqli_query($mysqli,$query1);
		while($temp=mysqli_fetch_array($result1))
		{
			$name[$i]	=	$temp[2];
			$regno[$i]	=	$temp[3];
			$phno[$i]	=	$temp[4];
			$receipt_no[$i]	=	$temp[5];
			$p_no[$i] = $temp[0];
			$i++;
		} 
		$t_price=0;
		$t_price1=0;
		$query1 = "SELECT sum(amount) FROM `registration` WHERE events = '$event_name'";
		$result1 = mysqli_query($mysqli,$query1);
		$arr= mysqli_fetch_array($result1);
		$t_price = $arr[0];
		$query1 = "SELECT sum(amount) FROM `registration_mess` WHERE events = '$event_name'";
		$result1 = mysqli_query($mysqli,$query1);
		$arr= mysqli_fetch_array($result1);
		$t_price1 = $arr[0];
		$d=date('d/m/Y');
		$file_name = $event_name."_List_$d.xls";
		header( "Content-Type: application/vnd.ms-excel" );
		header( "Content-disposition: attachment; filename=$file_name" );
		echo  'Name' . "\t". 'Reg No' . "\t" . 'Ph No' ."\t" . 'Receipt No' ."\t".'No of Participants'."\n";
		for($j=0;$j<$i;$j++)
		{
			echo $name[$j]. "\t" . $regno[$j] ."\t" . $phno[$j] ."\t" . $receipt_no[$j] ."\t".$p_no[$j]."\n";
		}
		echo "\nTotal no of registrations:\t$i\nTotal amount collected - Cash registration:\t$t_price\nTotal amount collected - Mess registration:\t$t_price1";
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