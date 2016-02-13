<?php
$mysqli=new mysqli("localhost","root","","culture");
	if(mysqli_connect_errno())
	{
		printf("Connection failed %s",mysqli_connect_error());
		exit();
	}

	else
	{	
		$id = $_REQUEST["id"];
		$value_name = $_REQUEST["value_name"];
		$value_outlook = $_REQUEST["value_outlook"];
		$value_price = $_REQUEST["value_price"];
		$value_totalseats = $_REQUEST["value_totalseats"];

		echo "<div class='name' style='position:absolute;top:80px;text-align:center;font-size:18px;'>".str_replace("_"," ",$value_name)."</div><br> ;
		<div style='position:absolute;top:110px;text-align:center;font-size:18px;'>$value_outlook</div><br>;
		<div style='position:absolute;top:140px;text-align:center;font-size:18px;'>$value_price</div><br>;
		<div style='position:absolute;top:170px;text-align:center;font-size:18px;'>$value_totalseats</div><br>";
		
		$sql_name = "UPDATE events SET event_name='$value_name' where id=$id";
		$res_name = mysqli_query($mysqli , $sql_name);
		
		$sql_price = "UPDATE events SET price=$value_price where id=$id";
		$res_price = mysqli_query($mysqli , $sql_price);
		
		$sql_outlook = "UPDATE events SET outlook_event='$value_outlook' where id=$id";
		$res_outlook = mysqli_query($mysqli , $sql_outlook);
		
		$sql_totalseats = "UPDATE events SET totalseats=$value_totalseats where id=$id";
		$res_totalseats = mysqli_query($mysqli , $sql_totalseats);
		

		if($res_name == true && $res_price == true &&$res_totalseats == true &&$res_outlook == true)
		{
			echo "<h2 style='text-align:center'>Cheers! The requested change have been made..</h2><br/>";
		}
		else
		{
			echo "<h2 style='text-align:center'>Something went wrong! We were not able to make the requested change. Please try again!</h2>";
		}		
	}
?>