<?php
	//Downloading Receipts 
        require 'sql_con.php';
	$status = $_REQUEST['no'];
	$d=date('d/m/Y');
	if($status == 0)
	{
	$file_name = "ReceiptBook_Pending_List_$d.xls";
	}
	else if($status == 1)
	{
	$file_name = "ReceiptBook_Returned_List_$d.xls";
	}
	else
	{
	$file_name = "ReceiptBook_All_List_$d.xls";
	}
	ob_start();
	header("Content-Type:application/vnd.ms-excel");
	header("Content-disposition:attachment; filename=$file_name");
        echo "";
	if($status == 0)
	{
	echo 'Reg no'."\t".'Name'."\t".'Book ID'."\t".'Date of issue'."\t".'Date of return'."\t".'Contact no';
	}
	else if($status == 1)
	{
	echo 'Reg no'."\t".'Name'."\t".'Book ID'."\t".'Date of issue'."\t".'Contact no';
	}
	else
	{
	echo 'Reg no'."\t".'Name'."\t".'Book ID'."\t".'Date of issue'."\t".'Contact no'."\t".'Delivery Status';
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
			echo "\n$regno\t$name";
			echo "\t$bookid";
			echo "\t$issue_date";
			echo "\t$ph";
			echo "\t$ret_status";
		}
		else if($status == 1)
		{
			if($ret == 1)
			{
			echo "\n$regno\t$name";
			echo "\t$bookid";
			echo "\t$issue_date";
			echo "\t$ph";
			}
		}
		else if($status == 0)
		{
			if($ret==0)
			{
			echo "\n$regno\t$name";
			echo "\t$bookid";
			echo "\t$issue_date";
			echo "\t$ret_date";
			echo "\t$ph";
			}
		}
	}
	mysqli_close($mysqli);
?>