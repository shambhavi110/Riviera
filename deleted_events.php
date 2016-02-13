<?php
	session_start();

	if((isset($_SESSION["password"]))&&(isset($_REQUEST["key"])))
	{
		require 'sql_con.php';
		$h=1;
		echo "<button  class = 'excelevent' onclick='excel_delevents()' style='font-weight:bold;'>Download deleted Events</button>";
		echo "<button  class = 'excelevents' onclick='excel_delreceipts()'>Download deleted receipts</button>";
		echo "<div id = disp_1>";
		$sql = "SELECT * FROM `deleted_events`";
		$res = mysqli_query($mysqli,$sql);
		$i=0;
		while($arr=mysqli_fetch_array($res))
		{
			if($i%3==0)
			echo "<br/><br/>";
			$event_name = $arr["event_name"];
			$remaining = $arr["totalseats"]-$arr["filled"];
			$id= $arr["id"];
			echo "<button class='but'><p class='eventbut' onclick='getdetails_deleted($id)' style='font-weight:bold;' >".str_replace("_"," ",$event_name)."<br/>filled seats:".$arr["filled"]."<br/>total seats:".$arr["totalseats"]."<br/>vacant seats:".$remaining."</p></button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
			$i+=1;
		}	
		echo "</div>";
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
<!DOCTYPE html><html>
<head>
<style type="text/css">
@-webkit-keyframes fadein {
			from { opacity: 0; }
			to   { opacity: 0.9; }
			}

.excelevent{
position:absolute;top:10px;left:100px;width:200px;height:120px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.excelevents{
position:absolute;top:10px;left:350px;width:200px;height:120px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.deleteevent{
position:absolute;top:10px;left:560px;width:200px;height:120px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.addevent{
position:absolute;top:10px;left:305px;width:200px;height:120px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.but{
position:relative;top:120px;left:80px;width:200px;height:120px;box-shadow: 4px 4px 4px #9C9C9C;border:none;background-color:rgba(255,0,0,0.4);
border-radius:10px;-webkit-animation: fadein 2s;}
.eventbut{
position:relative;top:-5px;left:-8px;width:200px;height:100px;border:none;color:white;font-size:18px;-webkit-animation: fadein 2s;
}
.excelevent:hover{
background-color:rgba(46,150,254,1);
}
.excelevents:hover{
background-color:rgba(46,150,254,1);
}

</head>
<body>
</body>
</html>

?>