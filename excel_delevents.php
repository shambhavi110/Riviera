<?php
	//Downloading all events list 
	require 'sql_con.php';
	$name=array();
	$price=array();
	$filled=array();
	$total=array();
	$i=0;
	$j=0;
	$price_deleted = 0;
	$query = "SELECT event_name, price, filled, totalseats FROM `deleted_events`";
	$result = mysqli_query($mysqli,$query);
	while($temp=mysqli_fetch_array($result))
	{
		$name[$i]	=	$temp[0];
		$price[$i]	=	$temp[1];
		$filled[$i]	=	$temp[2];
		$total[$i]	=	$temp[3];
		$i++;
	} 
	$sql3 = "SELECT `event_name` FROM `deleted_events`";
	$res3 = mysqli_query($mysqli,$sql3);
	while($arr3=mysqli_fetch_row($res3))
	{
		$n = $arr3[0];
		$sql4 = "SELECT sum(amount) FROM `deleted_registration` WHERE events = '$n'";
		$res4 = mysqli_query($mysqli,$sql4);
		$arr4 = mysqli_fetch_row($res4);
			$price_deleted+=$arr4[0];
	}
	$d=date('d/m/Y');
	$file_name = "Deleted_events_List_$d.xls";
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=$file_name" );
	echo  'Event Name' . "\t". 'Price' . "\t" . 'Filled Seats' ."\t" . 'Total Seats' ."\n";
	for($j=0;$j<$i;$j++)
	{
		echo str_replace("_"," ",$name[$j]). "\t" . $price[$j] ."\t" . $filled[$j] ."\t" . $total[$j] ."\n";
	}
	mysqli_close($mysqli);
	echo "\nTotal amount collected:\t$price_deleted";
?>