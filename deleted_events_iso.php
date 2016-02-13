<?php
	session_start();
	if((isset($_SESSION["name_iso"]))&&(isset($_REQUEST["key"])))
	{
		require 'sql_con.php';
		$h=1;
		echo "<button  onclick='excel_delevents_iso()' class='excelevents' style='font-weight:bold;'>Download Deleted Events</button>";
		echo "<div id = display>";
		$sql = "SELECT * FROM `deleted_events`";
		$res = mysqli_query($mysqli,$sql);
		$i=0;
		while($arr=mysqli_fetch_array($res))
		{
			if($i%3==0)
			echo "<br/><br/>";
			$event_name = $arr["event_name"];
			$remaining = $arr["totalseats"]-$arr["filled"];
			$event_id = $arr["id"];
			echo "<button class='but'><p class='eventbut' style='font-weight:bold;' >".str_replace("_"," ",$event_name)."<br/>filled seats:".$arr["filled"]."<br/>total seats:".$arr["totalseats"]."<br/>vacant seats:".$remaining."</p></button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
			$i+=1;
		}	
		echo "</div>";
		mysqli_close($mysqli);
	}
	
	else if(((!isset($_SESSION["name_iso"]))&&(!isset($_REQUEST["key"])))||((isset($_SESSION["name_iso"]))&&(!isset($_REQUEST["key"]))))
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
		echo "<div>Ah4*!bb dhS8!) Nh5@n</div>";
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
.excelevents{
position:absolute;top:10px;left:330px;width:180px;height:80px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.excelevent{
position:absolute;top:100px;left:50px;width:180px;height:80px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.deleteevent{
position:absolute;top:100px;left:430px;width:180px;height:80px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.addevent{
position:absolute;top:100px;left:240px;width:180px;height:80px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.filledevent{
position:absolute;top:100px;left:620px;width:180px;height:80px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.but{
position:relative;top:180px;left:80px;width:200px;height:120px;box-shadow: 4px 4px 4px #9C9C9C;border:none;background-color:rgba(255,0,0,0.4);
border-radius:10px;-webkit-animation: fadein 2s;}
.eventbut{
position:relative;top:-5px;left:-8px;width:200px;height:100px;border:none;color:white;font-size:18px;-webkit-animation: fadein 2s;
}
.excelevent:hover{
background-color:rgba(46,150,254,1);
}

</head>
<body>
</body>
</html>

?>