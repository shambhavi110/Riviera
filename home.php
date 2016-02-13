<?php
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["key"])))
		{
			require 'sql_con.php';
			$sql = "SELECT * FROM `events`";
			$res = mysqli_query($mysqli,$sql);
			$seats_filled = array();
			if($res == true)
			{
				while($arr = mysqli_fetch_array($res))
				{
					$seats_filled[$arr["id"]] = $arr["filled"];
				}
					asort($seats_filled);
					echo '<div class="display3"><h3 style="position:relative;left:100px;top:5px;font-size:30px;color:rgb(105,105,105)">Least Successful Events<h3><br/><br/>';
					$count = 0;
					$i=0;
					foreach ($seats_filled as $value=>$key)
					{
						
						if($count<5)
						{	
							$sql_name = "SELECT * from events where id=$value";
							$res_name = mysqli_query($mysqli,$sql_name);
							if($res_name==true)
							{
								$arr = mysqli_fetch_array($res_name);
								$event = $arr["event_name"];
								$sql = "SELECT sum(amount) FROM `registration` where events = '$event'";
								$res = mysqli_query($mysqli,$sql);
								$arr1 = mysqli_fetch_row($res);
								$price = $arr1[0];
								$sql2 = "SELECT sum(amount) FROM `registration_mess` where events = '$event'";
								$res2 = mysqli_query($mysqli,$sql2);
								$arr2 = mysqli_fetch_row($res2);
								$price += $arr2[0]; 
								
								echo '<button class="home_but" style="font-size:17px" ><br>'.str_replace("_"," ",$arr["event_name"]).'<br/>Total seats: '.$arr["totalseats"].'<br/>Filled: '.$arr["filled"].'<br/>Price collected:'. $price.'</div>';
								if(true)
									echo "<br/>";
							}
							else
							{
								echo "incorrect event";
							}
						}
						$count+=1;
					}
					echo "</div>";
					arsort($seats_filled);
					echo '<div class="display4"><h3 style="position:relative;left:0px;top:5px;font-size:30px;color:rgb(105,105,105)">Most Successful Events</h3>'.'<br/>';
					$count = 0;
					foreach ($seats_filled as $value=>$key)
					{
						if($count<5)
						{	
							$sql_name = "SELECT * from events where id=$value";
							$res_name = mysqli_query($mysqli,$sql_name);
							if($res_name==true)
							{
								$arr = mysqli_fetch_array($res_name);
								$event = $arr["event_name"];
								$sql = "SELECT sum(amount) FROM `registration` where events = '$event'";
								$res = mysqli_query($mysqli,$sql);
								$arr1 = mysqli_fetch_row($res);
								$price = $arr1[0];
								$sql2 = "SELECT sum(amount) FROM `registration_mess` where events = '$event'";
								$res2 = mysqli_query($mysqli,$sql2);
								$arr2 = mysqli_fetch_row($res2);
								$price += $arr2[0]; 
								echo '<div class="events_but" style="font-size:17px"><br /> '.str_replace("_"," ",$arr["event_name"]).'<br/>Total seats: '.$arr["totalseats"].'<br/>Filled: '.$arr["filled"].'<br/>Price collected: '.$price.'</div>';		
							}
							else
							{
								echo "in correct event";
							}
						}
						$count+=1;
					}echo "</div>";
			}
			mysqli_close($mysqli);
		}
		
		else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["key"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["key"]))))
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

<!DOCTYPE html><head>
<style type="text/css">


.home_but{
position:relative;top:40px;width:180px;height:120px;border:none;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(255,0,0,0.5);color:white;border-radius:3px;
}
.events_but{
position:relative;top:40px;width:180px;height:120px;border:none;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(255,0,0,0.5);color:white;border-radius:3px;
}

.home_but:nth-child(3){
position:absolute;top:260px;left:110px;
}
.home_but:nth-child(5){
position:absolute;top:260px;left:340px;
}
.home_but:nth-child(7){
position:absolute;top:200px;left:200px;
}
.home_but:nth-child(6){
position:absolute;top:560px;left:110px;
}
.home_but:nth-child(4){
position:absolute;top:560px;left:340px;
}
.display3{
position:absolute;left:60px;top:150px;background-color:rgba(254,243,167,0.7);width:500px;height:570px;box-shadow: 3px 7px 7px #61622F;
}
.display4{
position:absolute;left:470px;top:-410px;background-color:rgba(254,243,167,0.7);width:500px;height:570px;box-shadow: 3px 7px 7px #61622F;
}
.events_but:nth-child(3){
position:absolute;top:110px;left:40px;
}
.events_but:nth-child(5){
position:absolute;top:110px;left:270px;
}

.events_but:nth-child(7){
position:absolute;top:260px;left:160px;
}
.events_but:nth-child(6){
position:absolute;top:410px;left:40px;
}
.events_but:nth-child(4){
position:absolute;top:410px;left:270px;
}

</style>

</head>
<body0></body>