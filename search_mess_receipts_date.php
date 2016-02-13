 <?php
	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["s"])))
	{
		require 'sql_con.php';
		$from = $_GET['from'];
		$to = $_GET['to'];
		$s = $_REQUEST['s'];
		echo "<div id ='receipts'>";
		
		if($s == 2)
		{
		echo "<table border='2'    style='position:absolute;top:270px;left:80px;'>";
				echo
				"<tr>
					<td>Receipt number</td>
					<td>Registration number</td>
					<td>Contact number</td>
					<td>Events registered</td>
					<td>Co-ordinator name</td>
					<td>Price</td>
				</tr>";
			$sql_1 = "SELECT * FROM `registration_mess` ";
			$res_1 = mysqli_query($mysqli,$sql_1);
				while($arr=mysqli_fetch_array($res_1))
				{
					$reciept_no = $arr["receipt_no"];
					$id = $arr["regno"];
					$phno = $arr["phno"];
					$cord_name = $arr["coordinator_name"];
					$price = $arr["amount"];
					$events = $arr["events"];
					$k=0;
					if($arr["date_registered"]<=$to && $arr["date_registered"]>=$from)
					{
								echo "<tr>
								<td>".$reciept_no."</td>
								<td>".$id."</td>
								<td>".$phno."</td>
								<td>".str_replace("_"," ",$events)."<br>(".$arr["count"].")</td>
								<td>".$cord_name."</td>
								<td>".$price."</td></tr>";
						}
						$k++;
				}
				echo "</table></div>";
		}
		else if ($s==1)//approval
		{
		echo "<table border='2'  style='position:absolute;top:130px;left:8px;'>
			<tr>
			<td>Wrong Receipt</td>
			<td>Receipt Number</td>
			<td>Amount</td>
			<td>Name</td>
			<td>Register Number</td>
			<td>Phone Number</td>
			<td>Events Registered</td>
			<td>Approve Receipt</td>
			
			</tr>";
			$sql_1 = "SELECT * from `temp_registration_mess` where approval=0 and query=0";
			$res_1 = mysqli_query($mysqli,$sql_1);
				while($arr=mysqli_fetch_array($res_1))
				{
						if($arr["date_registered"]<=$to && $arr["date_registered"]>=$from)
						{
							echo
					"<tr>
					<td>
						<input type = 'radio' name ='event".$arr["receipt"]."' id =".$arr["receipt"]." onclick='query_mess_receipts_1(this.id);' value = 1>Query</input>
					</td>
						<td>".$arr["receipt"]."</td>
						<td>".$arr["amount"]."</td>
						<td>".$arr["name"]."</td>
						<td>".$arr["regno"]."</td>
						<td>".$arr["phno"]."</td>
						<td>".str_replace("_"," ",$arr["events"])."<br>(".$arr["count"].")</td>
						<td>
							<input type = 'radio' name ='event".$arr["receipt"]."' id =".$arr["receipt"]." onclick='approve_mess_receipts_1(this.id,0);' value = 1>Approve</input>
						</td>
					</tr>";
						}
				}
				echo "</table></div>";
		}
		else if ($s == 0)//query
		{
		echo"	 <table border='2'  style='position:absolute;top:130px;left:8px;'>
			<tr>
			<td>Receipt Number</td>
			<td>Amount</td>
			<td>Name</td>
			<td>Register Number</td>
			<td>Phone Number</td>
			<td>Event Name</td>
			<td>Approve receipt</td>
			
			</tr>";
		$sql_1 = "SELECT * from `temp_registration_mess` where query=1 and approval=0";
			$res_1 = mysqli_query($mysqli,$sql_1);
				while($arr=mysqli_fetch_array($res_1))
				{
					if($arr["date_registered"]<=$to && $arr["date_registered"]>=$from)
					{
					echo"
					<tr>			
						<td>".$arr["receipt"]."</td>
						<td>".$arr["amount"]."</td>
						<td>".$arr["name"]."</td>
						<td>".$arr["regno"]."</td>
						<td>".$arr["phno"]."</td>
						<td>".str_replace("_"," ",$arr["events"])."<br>(".$arr["count"].")</td>
						<td>
							<input type = 'radio' name ='event".$arr["receipt"]."' id =".$arr["receipt"]." onclick='approve_mess_receipts_1(this.id,1);' value = 1>Approve</input>
						</td>
					</tr>";
						}
				}	
				echo "</table></div>";
		}
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