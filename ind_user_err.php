 <?php
//regex need to be added
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["n"])))
		{
			require 'sql_con.php';
			$name = $_REQUEST['n'];
			$sql="SELECT * from `event_cord_login` where username='$name'";
			$res=mysqli_query($mysqli,$sql);
			//$row = mysqli_fetch_array($res);	
			$s = mysqli_num_rows($res);
			if($s>0)
			echo "ID already taken";
			else
			echo "Valid ID";
			mysqli_close($mysqli);
		}
		else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["n"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["n"]))))
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