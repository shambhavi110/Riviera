<?php

$hint ="";
	session_start();
	if((isset($_SESSION["password"]))&&(isset($_REQUEST["s"])))
	{
		require 'sql_con.php';
		$s = $_REQUEST["s"];
		$s = preg_replace('/\s+/', '_', $s);
		$st = $_REQUEST["s1"];
		$i=0;
		$sql = "SELECT * FROM `events`";
		$res = mysqli_query($mysqli,$sql);
		while($arr = mysqli_fetch_array($res))
		{
			$name_array[$i]=$arr["event_name"];
			$id_array[$i]=$arr["id"];
			$filled[$i]=$arr["filled"];
			$total[$i]=$arr["totalseats"];
			$i++;
		}
		//all events
		if($st==1)
		{
			if ($s!== "")
			{
			$s=strtolower($s); 
			$len=strlen($s);
			$j=0;
			$k=0;
			foreach($name_array as $name)
			{
				$event_id=$id_array[$k];
				if (stristr($s, substr($name,0,$len)))
				{
						echo "<button class='but1'><p class='eventbut' style='font-weight:bold;' id=".$id_array[$k]." onclick='getdetails($id_array[$k]);' >".str_replace("_"," ",$name)."<br/>filled seats:".$filled[$k]."<br/>total seats:".$total[$k]."<br/></p></button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
						$j++;
						if($j%3==0)
							echo "<br/><br/>";
				}
				$k++;
			}
			}
			else
			{
				$sql = "SELECT * FROM `events`";
				$res = mysqli_query($mysqli,$sql);
				$i=0;
				while($arr=mysqli_fetch_array($res))
				{
					$event_name = $arr["event_name"];
					$event_id = $arr["id"];
					$remaining = $arr["totalseats"]-$arr["filled"];
					echo "<button class='but1'><p class='eventbut' style='font-weight:bold;' id=".$event_id." onclick='getdetails($event_id);' >".str_replace("_"," ",$event_name)."<br/>filled seats:".$arr["filled"]."<br/>total seats:".$arr["totalseats"]."<br/>vacant seats:".$remaining."</p></button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
					$i+=1;
					if($i%3==0)
						echo "<br/><br/>";
				}	
			}
		}
		else
		{
		if ($s!== "")
			{
				$s=strtolower($s); 
				$len=strlen($s);
				$j=0;
				$k=0;
				foreach($name_array as $name)
				{
					
					$event_id=$id_array[$k];
					if (stristr($s, substr($name,0,$len)))
					{
						if($filled[$k]==$total[$k])
						{
							echo "<button class='but1'><p class='eventbut' style='font-weight:bold;' id=".$id_array[$k]." onclick='getdetails($id_array[$k]);' >".str_replace("_"," ",$name)."<br/>filled seats:".$filled[$k]."<br/>total seats:".$total[$k]."<br/></p></button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
							$j++;
							if($j%3==0)
								echo "<br/><br/>";
						}
					}
					$k++;
				}
			}
			else
			{
				$sql = "SELECT * FROM `events`";
				$res = mysqli_query($mysqli,$sql);
				$i=0;
				while($arr=mysqli_fetch_array($res))
				{
				
					$event_name = $arr["event_name"];
					$event_id = $arr["id"];
					if($arr["totalseats"]==$arr["filled"])
					{
					echo "<button class='but1'><p class='eventbut' style='font-weight:bold;' id=".$event_id." onclick='getdetails($event_id);' >".str_replace("_"," ",$event_name)."<br/>filled seats:".$arr["filled"]."<br/>total seats:".$arr["totalseats"]."<br/></p></button>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp";
					$i+=1;
					if($i%3==0)
						echo "<br/><br/>";
					}
				}	
			}
		}
		mysqli_close($mysqli);
	}
	else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["s"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["s"]))))
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

.excelevent{
position:absolute;top:10px;left:100px;width:200px;height:120px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.addevent{
position:absolute;top:10px;left:305px;width:200px;height:120px;box-shadow: 3px 3px 3px #9C9C9C;background-color:rgba(46,150,254,0.5);color:white;font-size:18px;
border-radius:10px;-webkit-animation: fadein 2s;}
.but1{
position:relative;top:190px;left:80px;width:200px;height:120px;box-shadow: 4px 4px 4px #9C9C9C;border:none;background-color:rgba(255,0,0,0.4);
border-radius:10px;-webkit-animation: fadein 2s;}
.eventbut{
position:relative;top:-5px;left:-8px;width:200px;height:100px;border:none;color:white;font-size:18px;-webkit-animation: fadein 2s;
}
.but1:hover{
background-color:rgba(255,0,0,1);
}
.addevent:hover{
background-color:rgba(46,150,254,1);
}
.excelevent:hover{
background-color:rgba(46,150,254,1);
}

</head>
<body>
</body>
</html>