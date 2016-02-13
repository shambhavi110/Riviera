<?php
session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["s"])))
	{
require 'sql_con.php';
	echo "<table border ='2' style='position:absolute;left:90px;top:400px;width:200px;'>
			<tr>
			<th>Select Event</th>
			<th>Name</th>
			<th>Cost</th>
			<th>Vacant Seats</th>
			<th>Number of participants</th>
			<th>Min no of participants</th>
			<th>Max no of participants</th>
			</tr>";
	$s = $_POST['s'];
	$s = preg_replace('/\s+/', '_', $s);
	$rs=array();
	$rc=array();
	$rn=array();
	$min=array();
	$max=array();
	$type=array();
	$i=0;
	$q = "SELECT * FROM `events`";
	$r = mysqli_query($mysqli,$q);
	while($t=mysqli_fetch_array($r))
	{
		$rn[$i]=$t[1];
		$rs[$i]=$t[2];
		$rc[$i] = $t[4]-$t[3];
		$min[$i] = $t[5];
		$max[$i] = $t[6];
		$per_participant=$t["per_participant"];
		if($per_participant==0)//team event
		{
				$type[$i]="(T)";
		}
		else
		{
				$type[$i]="(P)";
		}
		$i++;
	} 
	if ($s!== "")
	{
			$s=strtolower($s); 
			$len=strlen($s);
			$j=0;
			foreach($rn as $name)
			{
				if (stristr($s, substr($name,0,$len)))
				{
					if($rc[$j]>0)
					{
						echo "
						<tr>
							<td><input type = 'radio' name ='event[]' id ='event' value =$rn[$j]><br/>$type[$j]</td>
							<td>".str_replace("_"," ",$rn[$j])."</td>
							<td>$rs[$j]</td>
							<td>$rc[$j]</td>
							<td><input type='text' id='$rn[$j]' name='min_and_max[]' placeholder='min: $min[$j] - max: $max[$j]' onkeyup='checkminmax(this.id)' maxlength='3' autocomplete='off' size='12' /></td>
							<div id='minmaxerror' style='position:absolute;top:350px;left:500px;color:red;'></div>
							<td>$min[$j]</td>
							<td>$max[$j]</td>
						</tr>";
					}
				}
				$j++;
		}
	}
		else
		{
			for($j=0;$j<$i;$j++)
				{
					if($rc[$j]>0)
					{
						echo "
						<tr>
							<td><input type = 'radio' name ='event[]' id ='event' value =$rn[$j]><br/>$type[$j]</td>
							<td>".str_replace("_"," ",$rn[$j])."</td>
							<td>$rs[$j]</td>
							<td>$rc[$j]</td>
							<td><input type='text' id='$rn[$j]' name='min_and_max[]' placeholder='min: $min[$j] - max: $max[$j]' onkeyup='checkminmax(this.id)' maxlength='3' autocomplete='off' size='12'/></td>
							<div id='minmaxerror' style='position:absolute;top:350px;left:300px;color:red;'></div>
							<td>$min[$j]</td>
							<td>$max[$j]</td>
						</tr>";
					}
				}
		}
	echo "</table>";
	mysqli_close($mysqli);
	}
	else if(((!isset($_SESSION["name"]))&&(!isset($_REQUEST["s"])))||((isset($_SESSION["name"]))&&(!isset($_REQUEST["s"]))))
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