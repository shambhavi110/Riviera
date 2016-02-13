<?php
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["key"])))
		{
			echo "<div class='dip'>";
			echo "<button class='issue' onclick='add_book()'>Issue a book</button><br /><br /><br /><br /><br />";
			echo "<button class='pending' onclick='pending_book()'>Pending books</button><br /><br /><br /><br /><br />";
			echo "<button class='return' onclick='returned_book()'>Returned books</button><br /><br /><br /><br /><br />";
			echo "<button class='all' onclick='all_book()'>All books</button><br /><br /><br /><br /><br />";
			echo '</div>';
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
			echo "<div>Please login again</div>";
			exit();
		}
?>

<!DOCTYPE html><html>
<head>
<style type="text/css">
.dip{
position:absolute;top:30px;left:190px;
}

.issue{
position:absolute;top:20px;left:-50px;width:250px;height:45px;border:none;background-color:#177bbb;color:white;font-size:18px;
}
.issue:hover{
position:absolute;top:20px;left:-50px;width:250px;height:45px;border:none;background-color:rgba(255,0,0,1);color:white;font-size:18px;
}
.pending{
position:absolute;top:20px;left:280px;width:250px;height:45px;border:none;background-color:#177bbb;color:white;font-size:18px;
}
.pending:hover{
position:absolute;top:20px;left:280px;width:250px;height:45px;border:none;background-color:rgba(255,0,0,1);color:white;font-size:18px;
}


.return{
position:absolute;top:80px;left:-50px;width:250px;height:45px;border:none;background-color:#177bbb;color:white;font-size:18px;
}
.return:hover{
position:absolute;top:80px;left:-50px;width:250px;height:45px;border:none;background-color:rgba(255,0,0,1);color:white;font-size:18px;
}
.all{
position:absolute;top:80px;left:280px;width:250px;height:45px;border:none;background-color:#177bbb;color:white;font-size:18px;
}
.all:hover{
position:absolute;top:80px;left:280px;width:250px;height:45px;border:none;background-color:rgba(255,0,0,1);color:white;font-size:18px;
}
.but2{
width:200px;height:25px;border:none;background-color:#177bbb;color:white;font-size:18px;
}
.but2:hover{
background-color:rgba(255,0,0,1);
}
</style>
</head>
</html>
