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
		echo "   	
						<h3 style='position:absolute;top:40px;left:200px;'>Register Number:<h3> 
						
						<input type = 'text' class='reg' name ='regno' id ='regno' placeholder ='Eg. 12MSE1010' onkeyup='isRegno()' maxlength='9' autocomplete='off'>

						<div id ='regnoer' style='position:absolute;top:10px;left:400px;color:red;font-size:16px;'></div><br><br>
						
						<h3 style='position:absolute;top:95px;left:200px;'>Date:<h3><input type ='date' name ='date' value ='".date('Y-m-d') ."' id ='date' class ='name' style='position:absolute;left:400px;top:98px;width:250px;height:45px;border:none;'>
						
						<h3 style='position:absolute;top:150px;left:200px;'>Email-ID:<h3><input type ='email' name ='email' id='email'  autocomplete='off' placeholder='Enter email ID' style='position:absolute;left:400px;top:150px;width:250px;height:45px;border:none;'>
						
						<h3 style='position:absolute;top:205px;left:200px;'>Phone Number:<h3><input type ='text' name ='phno' id='phno'  autocomplete='off' placeholder='Eg. 9090909090' onkeypress='return isNumber(event)' maxlength='10' style='position:absolute;left:400px;top:205px;width:250px;height:45px;border:none;'>
						
					<input type ='text' placeholder='Search event..' onkeyup='event_search_mess()' autocomplete='off' name='search' id ='search' class ='search'>
						
						<br><br><div id ='events'>
						
						<table border ='2' style='position:absolute;left:90px;top:400px;width:200px;'>
						<tr>
							<th>Select Event</th>
							<th>Name</th>
							<th>Cost</th>
							<th>Vacant Seats</th>
							<th>Number of participants</th>
							<th>Min no of participants</th>
							<th>Max no of participants</th>
						</tr>";
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
								<td><input type='text' id='$rn[$j]' name='min_and_max[]' placeholder='min: $min[$j] - max: $max[$j]' onkeyup='checkminmax(this.id)' maxlength='3' autocomplete='off' size='12' ></td>
								<div id='minmaxerror' style='position:absolute;top:300px;left:500px;color:red;font-size:18px;'></div>
								<td>$min[$j]</td>
								<td>$max[$j]</td>
							</tr>";
						}
					}
					echo "</table></div><br><input type ='button' onclick ='sub_reg_mess()' Value ='Submit' id ='sub_reg' name ='sub_reg' class ='submit'>";
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