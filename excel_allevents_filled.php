<?php
	//Downloading all events list 
	require 'sql_con.php';
	$name=array();
	$price=array();
	$filled=array();
	$total=array();
	$i=0;
	$j=0;
	$t_price = 0;
	$t_price1 = 0;
	$query = "SELECT event_name, price, filled, totalseats FROM `events`";
	$result = mysqli_query($mysqli,$query);
	while($temp=mysqli_fetch_array($result))
	{
		$name[$i]	=	$temp[0];
		$price[$i]	=	$temp[1];
		$filled[$i]	=	$temp[2];
		$total[$i]	=	$temp[3];
		if($filled[$i] == $total[$i])
		{
		$query1 = "SELECT sum(amount) FROM registration WHERE events = '$name[$i]'";
		$result1 = mysqli_query($mysqli,$query1);
		$arr= mysqli_fetch_array($result1);
		$t_price+= $arr[0];
		}
		if($filled[$i] == $total[$i])
		{
		$query2 = "SELECT sum(amount) FROM registration_mess WHERE events = '$name[$i]'";
		$result2 = mysqli_query($mysqli,$query2);
		$arr1= mysqli_fetch_array($result2);
		$t_price1+= $arr1[0];
		}
		$i++;
	} 

	$d=date('d/m/Y');
	$file_name = "Filled events_List_$d.xls";
	header( "Content-Type: application/vnd.ms-excel" );
	header( "Content-disposition: attachment; filename=$file_name" );
	echo  'Event Name' . "\t". 'Price' . "\t" . 'Filled Seats' ."\t" . 'Total Seats' ."\n";
	for($j=0;$j<$i;$j++)
	{
		if($filled[$j] == $total[$j])
		echo str_replace("_"," ",$name[$j]). "\t" . $price[$j] ."\t" . $filled[$j] ."\t" . $total[$j] ."\n";
	}
	echo "\n\n Total number of events:\t $i \nTotal amount collected by cash registration:\t$t_price";
	echo "\nTotal amount collected by mess registration:\t$t_price1";
	mysqli_close($mysqli);
?>