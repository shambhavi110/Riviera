<?php
$mysqli=new mysqli("localhost","gdgvitvellore","GreatGatsby123","culture");
date_default_timezone_set('Asia/kolkata');
if(mysqli_connect_errno())
	{
		printf("Connection failed %s",mysqli_connect_error());
		exit();
	}
?>