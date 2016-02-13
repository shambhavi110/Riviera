 <?php
	session_start();
	if((isset($_SESSION["name"]))&&(isset($_REQUEST["s"])))
	{
		require 'sql_con.php';
		$search = $_REQUEST['search'];
		$s = $_REQUEST['s'];

		if($s == 2)
		{
			echo "<div id ='receipts'>";
			echo "<table border='2' style='width=200px;position:absolute;top:200px;left:60px;'>";
				echo
				"<tr>
					<td>Receipt number</td>
					<td>Registration number</td>
					<td>Contact number</td>
					<td>Events registered</td>
					<td>Co-ordinator name</td>
					<td>Price</td>
				</tr>";
			$sql_1 = "SELECT * from `registration`";
			$res_1 = mysqli_query($mysqli,$sql_1);
			if ($search!== "")
			{	
				while($arr=mysqli_fetch_array($res_1))
				{
					$reciept_no = $arr["receipt_no"];
					$id = $arr["regno"];
					$phno = $arr["phno"];
					$cord_name = $arr["coordinator_name"];
					$price = $arr["amount"];
					$events = $arr["events"];
					$k=0;
					$s=strtolower($search); 
					$len=strlen($search);
						if (stristr($s, substr($reciept_no,0,$len)))
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
			}	
			else
			{
				while($arr=mysqli_fetch_array($res_1))
				{
					$reciept_no = $arr["receipt_no"];
					$id = $arr["regno"];
					$phno = $arr["phno"];
					$cord_name = $arr["coordinator_name"];
					$price = $arr["amount"];
					$events = $arr["events"];
					echo "<tr>
								<td>".$reciept_no."</td>
								<td>".$id."</td>
								<td>".$phno."</td>
								<td>".str_replace("_"," ",$events)."<br>(".$arr["count"].")</td>
								<td>".$cord_name."</td>
								<td>".$price."</td>
						</tr>";
				}	
				echo "</table></div>";
			}
		}
		else if ($s == 1)//approval
		{
			echo " <table border='2' style='width=200px;position:absolute;top:150px;left:8px;'>
			<tr>
			<td>Wrong Receipt</td>
			<td>Receipt Number</td>
			<td>Amount</td>
			<td>Name</td>
			<td>Register Number</td>
			<td>Phone Number</td>
			<td>Event Name</td>
			<td>Approve receipt</td>
			
			</tr>";
		$sql_1 = "SELECT * from `temp_registration` where approval = 0 and  query = 0";
			$res_1 = mysqli_query($mysqli,$sql_1);
			if ($search!== "")
			{	
				while($arr=mysqli_fetch_array($res_1))
				{
					$reciept_no = $arr["receipt_no"];
					$id = $arr["regno"];
					$phno = $arr["phno"];
					$cord_name = $arr["coordinator_name"];
					$price = $arr["amount"];
					$events = $arr["events"];
					$k=0;
					$s=strtolower($search); 
					$len=strlen($search);
						if (stristr($s, substr($reciept_no,0,$len)))
						{
							echo
					"
					<tr>
					<td>
						<input type = 'radio' name ='event".$arr["receipt_no"]."' id =".$arr["receipt_no"]." onclick='Query_events(this.id);' value = 1>Query</input>
					</td>
						<td>".$arr["receipt_no"]."</td>
						<td>".$arr["amount"]."</td>
						<td>".$arr["name"]."</td>
						<td>".$arr["regno"]."</td>
						<td>".$arr["phno"]."</td>
						<td>".str_replace("_"," ",$arr["events"])."<br>(".$arr["count"].")</td>
						<td>
							<input type = 'radio' name ='event".$arr["receipt_no"]."' id =".$arr["receipt_no"]." onclick='Select_events(this.id);' value = 1>Approve</input>
							
						</td>
					</tr>";
						}
						$k++;
				}
			}	
			else
			{
				while($arr=mysqli_fetch_array($res_1))
				{
						echo
					"
					<tr>
					<td>
						<input type = 'radio' name ='event".$arr["receipt_no"]."' id =".$arr["receipt_no"]." onclick='Query_events(this.id);' value = 1>Query</input>
					</td>
						<td>".$arr["receipt_no"]."</td>
						<td>".$arr["amount"]."</td>
						<td>".$arr["name"]."</td>
						<td>".$arr["regno"]."</td>
						<td>".$arr["phno"]."</td>
						<td>".str_replace("_"," ",$arr["events"])."<br>(".$arr["count"].")</td>
						<td>
							<input type = 'radio' name ='event".$arr["receipt_no"]."' id =".$arr["receipt_no"]." onclick='Select_events(this.id);' value = 1>Approve</input>
							
						</td>
					</tr>";
				}	
				echo "</table></div>";
			}
		}
		else if ($s == 0)//query
		{
		$sql_1 = "SELECT * from `temp_registration` where query = 1  and approval = 0";
		echo "<div class = 'anurag' id ='receipts'>
			 <table border='2' style='width=200px;position:absolute;top:150px;left:8px;'>
			<tr>
			<td>Receipt Number</td>
			<td>Amount</td>
			<td>Name</td>
			<td>Register Number</td>
			<td>Phone Number</td>
			<td>Event Name</td>
			<td>Approve receipt</td>
			</tr>";
			$res_1 = mysqli_query($mysqli,$sql_1);
			if ($search!== "")
			{	
				while($arr=mysqli_fetch_array($res_1))
				{
					$reciept_no = $arr["receipt_no"];
					$id = $arr["regno"];
					$phno = $arr["phno"];
					$cord_name = $arr["coordinator_name"];
					$price = $arr["amount"];
					$events = $arr["events"];
					$k=0;
					$s=strtolower($search); 
					$len=strlen($search);
						if (stristr($s, substr($reciept_no,0,$len)))
						{
							echo
					"
					<tr>
					
						<td>".$arr["receipt_no"]."</td>
						<td>".$arr["amount"]."</td>
						<td>".$arr["name"]."</td>
						<td>".$arr["regno"]."</td>
						<td>".$arr["phno"]."</td>
						<td>".str_replace("_"," ",$arr["events"])."<br>(".$arr["count"].")</td>
						<td>
							<input type = 'radio' name ='event".$arr["receipt_no"]."' id =".$arr["receipt_no"]." onclick='approve_events(this.id);' value = 1>Approve</input>
							
						</td>
					</tr>";
				
						}
						$k++;
				}
			}	
			else
			{
				while($arr=mysqli_fetch_array($res_1))
				{
					echo
					"<tr>
						<td>".$arr["receipt_no"]."</td>
						<td>".$arr["amount"]."</td>
						<td>".$arr["name"]."</td>
						<td>".$arr["regno"]."</td>
						<td>".$arr["phno"]."</td>
						<td>".str_replace("_"," ",$arr["events"])."<br>(".$arr["count"].")</td>
						<td>
							<input type = 'radio' name ='event".$arr["receipt_no"]."' id =".$arr["receipt_no"]." onclick='approve_events(this.id);' value = 1>Approve</input>
							
						</td>
					</tr>";
				
				}	
				echo "</table></div>";
			}
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