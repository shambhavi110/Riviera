<?php
//regex need to be added
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["key"])))
		{
			require 'sql_con.php';
			$id=array();
			$name=array();
			$i=0;
			$sql = "SELECT club_id, club_name from `club_names`";
			$res = mysqli_query($mysqli,$sql);
			while($t=mysqli_fetch_array($res))
			{
				$id[$i]=$t[0];
				$name[$i]=$t[1];
				$i++;
			}
			echo "<h2 style='text-align:center'>All the available clubs are</h2>";
			for($j=0;$j<$i;$j++)
			{
					echo "
						<tr>
							<td>
								<input type = 'radio' name ='event[]' style='width:20px;height:20px;position:relative;left:300px;top:1px;' id ='$id[$j]' value ='$name[$j]' onclick='club_exists(this.id);'>
							</td>
							<td style='font-size:50px;'>
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
								 $name[$j]
							</td></br>
						</tr>";
			}
			echo "</br></br><p style='position:absolute;left:300px;'>( OR ) </p></br>";
			echo "<h3 style='position:absolute;left:300px;'>Register your club in here</h3>";
			echo"<paper-button name = 'new_club' id = 'new_club' onclick = 'make_new_club()' class='new' value ='New Club'>New Club</paper-button>"; 
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
			echo "<div>Ah4*!bb dhS8!) Nh5@n</div>";
			exit();
		}
?>
<script src='components/platform/platform.js'></script>
<link rel='import' href='components/polymer/polymer.html'>
<link rel='import' href='components/paper-button/paper-button.html'>
<style type="text/css">
.new{background-color:rgb(14,122,195);color:white;width:150px;height:40px;position:relative;top:50px;left:300px;}
</style>