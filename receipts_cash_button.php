<?php
		session_start();
		if((isset($_SESSION["name"]))&&(isset($_REQUEST["key"])))
		{
			echo "<div><button class='all' onclick='Reciepts();'>Approve event receipts</button>
			<button class='query' onclick='add_query_reciept();'>Query event receipts</button>
			<button class='view' onclick='show_all_receipts_admin()'>View All Receipts</button>
			<button class='down' onclick = 'download_receipts_cash()'>Download Receipts</button></div>";
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
<!DOCTYPE html><html>
<head>
<style type="text/css">
.all{
position:absolute;top:50px;left:400px;
width:250px;height:45px;
background-color:#177bbb;
border:none;	
color:white;font-size:18px;
}
.query{
position:absolute;top:50px;left:120px;
width:250px;height:45px;
background-color:#177bbb;
border:none;	
color:white;font-size:18px;
}
.view{
position:absolute;top:150px;left:120px;
width:250px;height:45px;
background-color:#177bbb;
border:none;	
color:white;font-size:18px;
}
.down{
position:absolute;top:150px;left:400px;
width:250px;height:45px;
background-color:#177bbb;
border:none;	
color:white;font-size:18px;
}
.rbox{
position:absolute;top:200px;left:200px;
width:800px;height:250px;
background-color:rgba(254,243,167,0.8);
}
}
</style>
</head>
</html>