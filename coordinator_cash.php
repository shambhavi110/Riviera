 <?php
	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["key"])))
	{
		require 'sql_con.php';
		$coordinator = $_SESSION["name"];
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
		echo "   	<h4 style='position:absolute;top:10px;left:30px;'>Name:</h4> 
						<input type = 'text' class='dname1' name = 'name' id ='name' placeholder='Name' autocomplete='off' onkeypress='return isAlpha(event)'><br><br>
					<h4 style='position:absolute;top:10px;left:400px;'>Register Number:</h4>
						<input type = 'text' class='reg1' name ='regno' id ='regno' placeholder ='Eg. 12MSE1010' onkeyup='isRegno()' maxlength='9' autocomplete='off'>
						<div id ='regnoer' style='position:absolute;top:100px;left:400px;color:red;font-size:15px;'></div><br><br>
					<h4 style='position:absolute;top:100px;left:30px;'>Phone Number:</h4>
						<input class='phone1' type = 'text' name='phno' id ='phno' maxlength='10' placeholder='Eg. 9500090902' onkeypress='return isNumber(event)' autocomplete='off'><br><br>
						 <input class='rec1' type ='text' name ='rno' id ='rno' placeholder='Eg. 23456' maxlength='5'  autocomplete='off' onkeyup='rec_no_check()' onkeypress='return isNumber(event)'>
						 <div id ='rno_check' style='position:absolute;top:188px;left:400px;color:red;font-size:15px;'></div><br>
					<h4 style='position:absolute;top:100px;left:400px;'>Receipt Number:</h4>
					<h4 style='position:absolute;top:183px;left:400px;'>Date:</h4>
						<input type ='date' name ='date' value = '".date('Y-m-d') ."' id ='date' class ='date1'>
						<input type ='text' placeholder='Search event..' onkeyup='event_search_cash()' autocomplete='off' name='search' id ='search' class ='team1'>
						<div id ='events'>
						<div id='minmaxerror' style='position:absolute;top:300px;left:500px;color:red;font-size:18px;'></div>
						<table border ='2' style='position:relative;left:110px;width:200px;top:220px;'>
						<tr>
							<th>Select Event</th>
							<th>Name</th>
							<th>Cost</th>
							<th>Vacant Seats</th>
							<th>Number of participants</th>
							<th>Min no of  participants</th>
							<th>Max no of participants</th>
						</tr>";
					for($j=0;$j<$i;$j++)
					{
						if($rc[$j]>0)
						{
							echo "
							<tr>
								<td><input type = 'radio' name ='event[]' id ='event' value =$rn[$j]><br/>$type[$j]</td></td>
								<td>".str_replace("_"," ",$rn[$j])."</td>
								<td>$rs[$j]</td>
								<td>$rc[$j]</td>
								<td><input type='text' id='$rn[$j]' name='min_and_max' placeholder='min: $min[$j] - max: $max[$j]' onkeyup='checkminmax(this.id)' maxlength='3' autocomplete='off' size='12' /></td>
								<td>$min[$j]</td>
								<td>$max[$j]</td>
							</tr>";
						}
					}
					echo "</table></div><br><input type ='button' onclick ='sub_reg()' Value ='Submit' id ='sub_reg' name ='sub_reg' class ='submit1'>";
				mysqli_close($mysqli);
	}
	else if(((!isset($_SESSION["name"]))&&(!isset($_REQUEST["key"])))||((isset($_SESSION["name"]))&&(!isset($_REQUEST["key"]))))
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