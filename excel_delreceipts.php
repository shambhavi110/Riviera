<?php
	//Downloading all deleted receipts 
	session_start();
	if((isset($_SESSION["password"])||(isset($_SESSION["name_iso"]))))
	{
		require 'sql_con.php';
		$receipt_no=array();
		$name = array();
		$regno=array();
		$phno=array();
		$events=array();
		$amt=array();
		$email = array();
		$count = array();
		$i=0;
		$j=0;
		$t_price=0;
		$query = "SELECT * FROM `deleted_registration`";
		$result = mysqli_query($mysqli,$query);
		while($temp=mysqli_fetch_array($result))
		{
			$receipt_no[$i]	=	$temp[0];
			$name[$i]	=	$temp[1];
			$regno[$i]	=	$temp[2];
			$phno[$i]	=	$temp[3];
			$events[$i] = $temp[4];
			$amt[$i] = $temp[6];
			$email[$i] = $temp[8];
			$count[$i] = $temp[9];
			$t_price+= $amt[$i];
			$i++;
		} 
		$d=date('d/m/Y');
		$file_name = "Deleted_Receipts_$d.xls";
		header( "Content-Type: application/vnd.ms-excel" );
		header( "Content-disposition: attachment; filename=$file_name" );
		echo   'Receipt No' . "\t". 'Name' . "\t". 'Regno' . "\t" . 'PH no' ."\t" . 'Events' . "\t".'Email '."\t". 'Amount' ."\t".'No of Participants'."\n";;
		for($j=0;$j<$i;$j++)
		{
			echo $receipt_no[$j]. "\t" . $name[$j] ."\t" . $regno[$j] ."\t" . $phno[$j] ."\t".str_replace("_"," ",$events[$j]) ."\t" .$email[$j]."\t" . $amt[$j] ."\t".$count[$j]."\n";
		}
		echo "\n\n Total number of Registrations :\t $i \nTotal amount collected:\t$t_price";
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