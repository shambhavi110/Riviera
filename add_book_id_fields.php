<?php
		
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["no"])))
		{
			require 'sql_con.php';
			$s = $_REQUEST['no'];
			for($i =0 ;$i<$s;$i++)
			{
				echo"<input style='width:250px;height:20px;' type='text' name='books_id".$i."'  id='books_id".$i."'  placeholder='Enter Book ID's Eg.55' autocomplete='off' onkeypress='return isNumber(event)'><hr style='visibility:hidden;'>";
			}
			mysqli_close($mysqli);
		}
		else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["no"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["no"]))))
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