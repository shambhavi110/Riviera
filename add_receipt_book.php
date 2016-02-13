<!DOCTYPE html><html>
<head>
<style type="text/css">
.rname{position:absolute;top:40px;left:200px;}
.name{position:absolute;top:40px;left:280px;width:250px;height:45px;border:none;}
.rreg{position:absolute;top:100px;left:140px;}
.regno{position:absolute;top:100px;left:280px;width:250px;height:45px;border:none;}
.rph{position:absolute;top:160px;left:140px;}
.ph{position:absolute;top:160px;left:280px;width:250px;height:45px;border:none;}
.rfrom{position:absolute;top:220px;left:195px;}
.issue{position:absolute;left:280px;top:220px;width:250px;height:45px;border:none;}
.rto{position:absolute;top:280px;left:220px;}
.return{position:absolute;left:280px;top:280px;width:250px;height:45px;border:none;}
.rnum{position:absolute;top:340px;left:90px;}
.num{position:absolute;left:280px;top:340px;width:250px;height:45px;border:none;}
.rid{position:absolute;top:450px;left:220px;}
.id{position:absolute;left:280px;top:390px;width:250px;height:45px;border:none;}
.submit{position:absolute;left:280px;top:400px;width:250px;height:45px;border:none;background-color:#177bbb;color:white;font-size:18px;}
</style>
</head>
<body>
<?php
		session_start();
		if((isset($_SESSION["password"])))
		{	
				require 'sql_con.php';
				$d = date('Y-m-d') ;
				$d = date('Y-m-d', strtotime($d. ' + 7 days'));
				echo "<h4 class='rname'>Name</h4><input type='text' id='name' name='name' class='name' placeholder='Name' autocomplete='off' onkeypress='return isAlpha(event)'>
				<h4 class='rreg'>Register Number</h4><input type='text' name='regno' id='regno' class='regno' placeholder='Eg:13BCE0001' id = 'regno' onkeyup='isRegno()' maxlength = '9' autocomplete='off'>
				<div id ='regnoer' style='position:absolute;top:115px;left:550px;color:red;font-size:18px;'></div>
				<h4 class='rph'>Phone Number</h4><input type='text' name='phno' id ='ph' class='ph' placeholder='Eg:9090000007' onkeypress='return isNumber(event)' autocomplete ='off' maxlength = '10'>
				<h4 class='rfrom'>From</h4><input type='date' id='from' name='book_issue' class='issue'  value ='".date('Y-m-d') ."'>
				<h4 class='rto'>To</h4><input type='date' id='to' name='book_return' class='return' value ='". $d ."'>
				<h4 class='rnum'>Total Number of Books</h4><input type='text' id='totalbooks' name='totalbooks' id='totalbooks' class='num' onkeyup='book_id_fields()' placeholder='Eg:2,3,4' onkeypress='return isNumber(event)' autocomplete ='off'>
				<h4 class ='rid'>ID</h4><div class ='id' id ='books_id' style='position:absolute;top:460px;left:280px;'></div>
				<input type='button' name='submit' class='submit' value ='Submit' onclick='sub_receipt_book()'>";
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
</body>
</html>