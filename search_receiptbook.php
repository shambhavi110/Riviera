 <?php

	session_start();
	if((isset($_SESSION["password"]))&&(isset($_REQUEST["s"])))
	{
		require 'sql_con.php';
		$status = $_REQUEST['s'];
		$s = $_REQUEST['search'];
		if($status == 0)
		{
		echo"<table border = 2 style='position:absolute;top:210px;left:100px;border-collapse:collapse;'><tr><td>Name</td><td>Book ID</td><td>Date of issue</td><td>Date of return</td><td>Contact no</td><td>Delivered</td></tr>";
		}
		else if($status == 1)
		{
		echo"<table border = 2 style='position:absolute;top:210px;left:100px;border-collapse:collapse;'><tr><td>Name</td><td>Book ID</td><td>Date of issue</td><td>Contact no</td></tr>";
		}
		else
		{
		echo"<table border = 2 style='position:absolute;top:210px;left:100px;border-collapse:collapse;'><tr><td>Name</td><td>Book ID</td><td>Date of issue</td><td>Contact no</td><td>Delivery Status</td></tr>";
		}
		$i=0;
		$regno = array();
		$name =array();
		$ph= array();
		$issue_date = array();
		$ret_date = array();
		$bookid = array();
		$ret_status = array();
		$ret = array();
		$sql = "SELECT * FROM `receipt`";
		$res = mysqli_query($mysqli,$sql);
		while($arr=mysqli_fetch_array($res))
		{
			$reg = $arr['regno'];
			$sql1 = "SELECT * FROM `receipt_book_ids` WHERE regno = '$reg'";
			$res1 = mysqli_query($mysqli,$sql1);
			while($arr1=mysqli_fetch_array($res1))
			{
				$regno[$i] = $arr1['regno'];
				$name[$i]=$arr['person_name'];
				$ph[$i]=$arr['contact_no'];
				$issue_date[$i]=$arr['date_of_issue'];
				$ret_date[$i]=$arr['date_of_return'];
					$bookid[$i] = $arr1['id'];
				$ret[$i] = $arr1['return_status'];
				if($ret[$i]==1)
					$ret_status[$i] = "Delivered";
				else
					$ret_status[$i] = "Pending";
				$i++;
			}
		}
		if($status== 2)
		{
			if ($s!== "")
			{	
				$k=0;
				$s=strtolower($s); 
				$len=strlen($s);
				foreach($bookid as $n)
				{
					if (stristr($s, substr($n,0,$len)))
					{
						echo "<tr><td style='width:100px;'>$regno[$k]<br>$name[$k]</td>";
						echo "<td style='width:100px;'>$bookid[$k]</td>";
						echo "<td style='width:100px;'>$issue_date[$k]</td>";
						echo "<td style='width:100px;'>$ph[$k]</td>";
						echo "<td>$ret_status[$k]</td></tr>";
					}
					$k++;
				}
			}
			else
			{
				for($j=0;$j<$i;$j++)
				{
				echo "<tr><td style='width:100px;'>$regno[$j]<br>$name[$j]</td>";
				echo "<td style='width:100px;'>$bookid[$j]</td>";
				echo "<td style='width:100px;'>$issue_date[$j]</td>";
				echo "<td style='width:100px;'>$ph[$j]</td>";
				echo "<td>$ret_status[$j]</td></tr>";
					}
			}
		
		}
		else if($status == 1)
		{
			if ($s!== "")
			{
				$k=0;
				$s=strtolower($s); 
				$len=strlen($s);
				foreach($bookid as $n)
				{
					if (stristr($s, substr($n,0,$len)))
					{
					if($ret[$k] == 1)
					{
					echo "<tr><td style='width:100px;'>$regno[$k]<br>$name[$k]</td>";
					echo "<td style='width:100px;'>$bookid[$k]</td>";
					echo "<td style='width:100px;'>$issue_date[$k]</td>";
					echo "<td style='width:100px;'>$ph[$k]</td>";
					}
					}
					$k++;
				}
			}
			else
			{
				for($j=0;$j<$i;$j++)
				{
				if($ret[$j] == 1)
				{
				echo "<tr><td style='width:100px;'>$regno[$j]<br>$name[$j]</td>";
				echo "<td style='width:100px;'>$bookid[$j]</td>";
				echo "<td style='width:100px;'>$issue_date[$j]</td>";
				echo "<td style='width:100px;'>$ph[$j]</td>";
				}
				}
			}
			}
			else if($status == 0)
			{
				if ($s!== "")
			{
				$k=0;
				$s=strtolower($s); 
				$len=strlen($s);
				foreach($bookid as $n)
				{
					if (stristr($s, substr($n,0,$len)))
					{
					if($ret[$k] == 0)
					{
					echo "<tr><td style='width:100px;'>$regno[$k]<br>$name[$k]</td>";
					echo "<td style='width:100px;'>$bookid[$k]</td>";
					echo "<td style='width:100px;'>$issue_date[$k]</td>";
					echo "<td style='width:100px;'>$ret_date[$k]</td>";
					echo "<td style='width:100px;'>$ph[$k]</td>";
					echo "<td><input type = 'radio' name ='pending' value = '".$bookid[$k]."' id='".$bookid[$k]."' onClick ='pending_to_delivered(this.id)'></td></tr>";
					}
					}
					$k++;
				}
			}
			else
			{
				for($j=0;$j<$i;$j++)
				{
				if($ret[$j] == 0)
				{
				echo "<tr><td style='width:100px;'>$regno[$j]<br>$name[$j]</td>";
				echo "<td style='width:100px;'>$bookid[$j]</td>";
				echo "<td style='width:100px;'>$issue_date[$j]</td>";
				echo "<td style='width:100px;'>$ret_date[$j]</td>";
				echo "<td style='width:100px;'>$ph[$j]</td>";
				echo "<td><input type = 'radio' name ='pending' value = '".$bookid[$j]."' id='".$bookid[$j]."'onClick ='pending_to_delivered(this.id)'></td></tr>";
				}
				}
			}
			}
		echo "</div></table>";
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
<link rel='import' href='components/polymer/polymer.html'>
<link rel='import' href='components/paper-button/paper-button.html'>
<link rel="stylesheet" type="text/css" href="receipt_book_details.css">