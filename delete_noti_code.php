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
		
		$sql = "DELETE FROM events WHERE id=$id";
		$res = mysqli_query($mysqli , $sql);
		
		/*if($res==true)
		{
			//echo $id."deleted";
		}
		else
		{
			echo $id."not deleted";
		}
		*/		
}
?>