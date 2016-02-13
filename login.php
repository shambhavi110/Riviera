<?php

	session_start();
	if(isset($_SESSION["name"])||isset($_SESSION["password"])||isset($_SESSION["name_ec"])||isset($_SESSION["name_iso"]))
	{		
	echo "<div class ='coordinval'>Successfully Logged-out!! <br>Please login again</div>";
	session_unset();
	header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
	header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
	session_destroy();
	}
	
	require 'sql_con.php';
	
	//Coordinators Login
	if(isset($_POST["cordinator_login"]))
	{
		$name="";
		$password="";
		if(isset($_POST["name"])&&isset($_POST["password"]))
		{
			$name=$_POST["name"];
			$password=$_POST["password"];
			$name = mysqli_real_escape_string($mysqli,$name);
			$password = mysqli_real_escape_string($mysqli,$password);
			$sql="SELECT * from `cordinator_login` where name='$name' and password='$password'";
			$res=mysqli_query($mysqli,$sql);
			$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
			if(is_array($row))
			{
				session_start();
				$_SESSION["name"]=$_POST["name"];
				mysqli_close($mysqli);
				
				//works when updated password like 'abc' in console instead of query with '$password'
				//works completely fine when both $password1 and $password2 are declared and update statement works,cannot 
				//go back to change passwordword again
				
				header("Location:event_reg.php");
				echo "Success!";
			}
			else
			{
				echo "<div class='coordinval'>Either the name or password is invalid!</div>";
			}
		}	
		else
		{
			echo "Please enter the both fields";
		}
		if(isset($_SESSION["name"]))
			echo "<strong></br>Status: Logged-in</strong>";
		else
		{
			echo "<div class='coordinval'><strong></br>Status: Not-Logged-in</strong></div>";
		}
	}

	//Admin Login

	else if(isset($_POST["admin_login"]))
	{
		$password="";
		if(isset($_POST["password"])&&isset($_POST["name"]))
		{
			$password=$_POST["password"];
			$name=$_POST["name"];
			$password = mysqli_real_escape_string($mysqli,$password);
			$name = mysqli_real_escape_string($mysqli,$name);
			$sql="SELECT * FROM `admin_login` WHERE password='$password' AND username='$name'";
			$res=mysqli_query($mysqli,$sql);
			$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
			if(is_array($row))
			{
				session_start();
				$_SESSION["password"]=$_POST["password"];
				mysqli_close($mysqli);
				
				//works when updated password like 'abc' in console instead of query with '$password'
				//works completely fine when both $password1 and $password2 are declared and update statement works,cannot 
				//go back to change password again
			
				header("Location:admin.php");
				Echo "Success!";
			}
			else
			{
				echo "<div class='admininval'>Either the name or password is invalid!</div>";
			}
		}	
		else
		{
			echo "Please enter the both fields";
		}
		if(isset($_SESSION["password"]))
				echo "<strong></br>Status: Logged-in</strong>";
		else
		{
			echo "<div class='admininval'><strong></br>Status: Not-Logged in</strong></div>";
		}
	}
	
	//Event-coordinator's Login
	
	else if(isset($_POST["event_cordinator_login"]))
	{
		$name="";
		$password="";
		if(isset($_POST["name"])&&isset($_POST["password"]))
		{
			$name=$_POST["name"];
			$password=$_POST["password"];
			$name = mysqli_real_escape_string($mysqli,$name);
			$password = mysqli_real_escape_string($mysqli,$password);
			$sql="SELECT * from `event_cord_login` where username='$name' and password='$password'";
			$res=mysqli_query($mysqli,$sql);
			$row = mysqli_fetch_array($res);
			if(is_array($row))
				{
				session_start();
				$_SESSION["name_ec"]=$_POST["name"];
				mysqli_close($mysqli);
				
				//works when updated passwordword like 'abc' in console instead of query with '$password'
				//works completely fine when both $password1 and $password2 are declared and update statement works,cannot 
				//go back to change passwordword again
				header("Location:event_cord.php");
				Echo "Success!";
				}
				else
				{
					echo "<div class='coordinval'>Either the name or password is invalid!</div>";
				}
		}	
		else
		{
			echo "Please enter the both fields";
		}

		if(isset($_SESSION["name"]))
				echo "<strong></br>Status: Logged-in</strong>";
			else
			{
				echo "<div class='admininval'><strong></br>Status: Not-Logged in</strong></div>";
			}
	}
	//IFO Login
	else if(isset($_POST["ifo_login"]))
	{
	$name="";
	$password="";
	if(isset($_POST["name"])&&isset($_POST["password"]))
	{
		$name=$_POST["name"];
		$password=$_POST["password"];
		$name = mysqli_real_escape_string($mysqli,$name);
		$password = mysqli_real_escape_string($mysqli,$password);
		$sql="SELECT * from `ifo_login` where username='$name' and password='$password'";
		$res=mysqli_query($mysqli,$sql);
		$row = mysqli_fetch_array($res,MYSQLI_ASSOC);
		if(is_array($row))
		{
			session_start();
			$_SESSION["name_iso"]=$_POST["name"];
			header("Location:iso_events.php");
			echo "Success!";
		}
		else
		{
			echo "<div class='coordinval'>Either the name or password is invalid!</div>";
		}
	}	
	else
	{
		echo "Please enter the both fields";
	}
	if(isset($_SESSION["name_iso"]))
				echo "<strong></br>Status: Logged-in</strong>";
	else
	{
				echo "<div class='admininval'><strong></br>Status: Not-Logged in</strong></div>";
	}
	}
?>
<html>
<head>
<title>Riviera Login</title>
<style type="text/css">
@-moz-keyframes bounceleft {
  0% {
	-moz-transform:translateX(-100%);
    opacity: 0;
  }
  
  15% {
  	-moz-transform:translateX(0);
    padding-bottom: 5px;
  }
  30% {
  	-moz-transform:translateX(-20%);
  }
  40% {
  	-moz-transform:translateX(0%);
    padding-bottom: 6px;
  }
  50% {
  	-moz-transform:translateX(-10%);
  }
  70% {
  	-moz-transform:translateX(0%);
    padding-bottom: 7px;
  }
  80% {
  	-moz-transform:translateX(-5%);
  }
}

@-moz-keyframes bounceright {
  0% {
	-moz-transform:translateX(100%);
    opacity: 0;
  }
  
  15% {
  	-moz-transform:translateX(0);
    padding-bottom: 5px;
  }
  30% {
  	-moz-transform:translateX(20%);
  }
  40% {
  	-moz-transform:translateX(0%);
    padding-bottom: 6px;
  }
  50% {
  	-moz-transform:translateX(10%);
  }
  70% {
  	-moz-transform:translateX(0%);
    padding-bottom: 7px;
  }
  80% {
  	-moz-transform:translateX(5%);
  }
}

@-moz-keyframes bounce {
  0% {
	-moz-transform:translateY(-100%);
    opacity: 0;
  }
  16% {
  	-moz-transform:translateY(0);
    padding-bottom: 5px;
  } 
17% {
  	-moz-transform:translateY(20);
    padding-bottom: 5px;
  }  
  15% {
  	-moz-transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	-moz-transform:translateY(-11%);
  }
  40% {
  	-moz-transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	-moz-transform:translateY(-8%);
  }
  70% {
  	-moz-transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	-moz-transform:translateY(-5%);
  }
  90% {
  	-moz-transform:translateY(0%);
  }
}
@-moz-keyframes bouncedown {
  0% {
	-moz-transform:translateY(100%);
    opacity: 0;
  }
  16% {
  	-moz-transform:translateY(0);
    padding-bottom: 5px;
  } 
17% {
  	-moz-transform:translateY(-20);
    padding-bottom: 5px;
  }  
  15% {
  	-moz-transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	-moz-transform:translateY(11%);
  }
  40% {
  	-moz-transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	-moz-transform:translateY(8%);
  }
  70% {
  	-moz-transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	-moz-transform:translateY(5%);
  }
  90% {
  	-moz-transform:translateY(0%);
  }
}
@-ms-keyframes bounceleft {
  0% {
	-ms-transform:translateX(-100%);
    opacity: 0;
  }
  
  15% {
  	-ms-transform:translateX(0);
    padding-bottom: 5px;
  }
  30% {
  	-ms-transform:translateX(-20%);
  }
  40% {
  	-ms-transform:translateX(0%);
    padding-bottom: 6px;
  }
  50% {
  	-ms-transform:translateX(-10%);
  }
  70% {
  	-ms-transform:translateX(0%);
    padding-bottom: 7px;
  }
  80% {
  	-ms-transform:translateX(-5%);
  }
}

@-ms-keyframes bounceright {
  0% {
	-ms-transform:translateX(100%);
    opacity: 0;
  }
  
  15% {
  	-ms-transform:translateX(0);
    padding-bottom: 5px;
  }
  30% {
  	-ms-transform:translateX(20%);
  }
  40% {
  	-ms-transform:translateX(0%);
    padding-bottom: 6px;
  }
  50% {
  	-ms-transform:translateX(10%);
  }
  70% {
  	-ms-transform:translateX(0%);
    padding-bottom: 7px;
  }
  80% {
  	-ms-transform:translateX(5%);
  }
}

@-ms-keyframes bounce {
  0% {
	-ms-transform:translateY(-100%);
    opacity: 0;
  }
  16% {
  	-ms-transform:translateY(0);
    padding-bottom: 5px;
  } 
17% {
  	-ms-transform:translateY(20);
    padding-bottom: 5px;
  }  
  15% {
  	-ms-transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	-ms-transform:translateY(-11%);
  }
  40% {
  	-ms-transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	-ms-transform:translateY(-8%);
  }
  70% {
  	-ms-transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	-ms-transform:translateY(-5%);
  }
  90% {
  	-ms-transform:translateY(0%);
  }
}
@-ms-keyframes bouncedown {
  0% {
	-ms-transform:translateY(100%);
    opacity: 0;
  }
  16% {
  	-ms-transform:translateY(0);
    padding-bottom: 5px;
  } 
17% {
  	-ms-transform:translateY(-20);
    padding-bottom: 5px;
  }  
  15% {
  	-ms-transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	-ms-transform:translateY(11%);
  }
  40% {
  	-ms-transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	-ms-transform:translateY(8%);
  }
  70% {
  	-ms-transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	-ms-transform:translateY(5%);
  }
  90% {
  	-ms-transform:translateY(0%);
  }
}
@-webkit-keyframes bounceleft {
  0% {
	-webkit-transform:translateX(-100%);
    opacity: 0;
  }
  
  15% {
  	-webkit-transform:translateX(0);
    padding-bottom: 5px;
  }
  30% {
  	-webkit-transform:translateX(-20%);
  }
  40% {
  	-webkit-transform:translateX(0%);
    padding-bottom: 6px;
  }
  50% {
  	-webkit-transform:translateX(-10%);
  }
  70% {
  	-webkit-transform:translateX(0%);
    padding-bottom: 7px;
  }
  80% {
  	-webkit-transform:translateX(-5%);
  }
}

@-webkit-keyframes bounceright {
  0% {
	-webkit-transform:translateX(100%);
    opacity: 0;
  }
  
  15% {
  	-webkit-transform:translateX(0);
    padding-bottom: 5px;
  }
  30% {
  	-webkit-transform:translateX(20%);
  }
  40% {
  	-webkit-transform:translateX(0%);
    padding-bottom: 6px;
  }
  50% {
  	-webkit-transform:translateX(10%);
  }
  70% {
  	-webkit-transform:translateX(0%);
    padding-bottom: 7px;
  }
  80% {
  	-webkit-transform:translateX(5%);
  }
}

@-webkit-keyframes bounce {
  0% {
	-webkit-transform:translateY(-100%);
    opacity: 0;
  }
  16% {
  	-webkit-transform:translateY(0);
    padding-bottom: 5px;
  } 
17% {
  	-webkit-transform:translateY(20);
    padding-bottom: 5px;
  }  
  15% {
  	-webkit-transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	-webkit-transform:translateY(-11%);
  }
  40% {
  	-webkit-transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	-webkit-transform:translateY(-8%);
  }
  70% {
  	-webkit-transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	-webkit-transform:translateY(-5%);
  }
  90% {
  	-webkit-transform:translateY(0%);
  }
}
@-webkit-keyframes bouncedown {
  0% {
	-webkit-transform:translateY(100%);
    opacity: 0;
  }
  16% {
  	-webkit-transform:translateY(0);
    padding-bottom: 5px;
  } 
17% {
  	-webkit-transform:translateY(-20);
    padding-bottom: 5px;
  }  
  15% {
  	-webkit-transform:translateY(0);
    padding-bottom: 5px;
  }
  30% {
  	-webkit-transform:translateY(11%);
  }
  40% {
  	-webkit-transform:translateY(0%);
    padding-bottom: 6px;
  }
  50% {
  	-webkit-transform:translateY(8%);
  }
  70% {
  	-webkit-transform:translateY(0%);
    padding-bottom: 7px;
  }
  80% {
  	-webkit-transform:translateY(5%);
  }
  90% {
  	-webkit-transform:translateY(0%);
  }
}

.admininval{
color:white;position:absolute;top:290px;left:170px;font-size:21px;
}
.facultyinval{
color:white;position:absolute;top:290px;left:170px;font-size:21px;
}
.coordinval{
color:white;position:absolute;top:290px;left:170px;font-size:21px;
}

body{background-image:url('bg.jpg');background-repeat:no-repeat;}
.head{color:#5F5854;position:absolute;left:80px;}

.admin{background-color:rgba(241,238,99,0.8);
position:absolute;top:60px;left:535px;width:300px;height:300px;
box-shadow: 7px 7px 7px #61622F;
-webkit-animation: bounce 2000ms ease-out;-moz-animation: bounce 2000ms ease-out;-ms-animation: bounce 2000ms ease-out;
}

.user{
position:absolute;top:95px;left:25px;
width:250px;height:45px;border:none;
}
.password{
position:absolute;top:150px;left:25px;
width:250px;height:45px;border:none;
}

.submit{
position:absolute;top:220px;left:25px;
width:250px;height:45px;
background-color:#177bbb;
border:none;	
color:white;font-size:18px;
}
.login{
position:absolute;top:200px;left:30px;
width:250px;height:45px;
background-color:#177bbb;
border:none;	
color:white;font-size:18px;
}
.submit:hover{background-color:#E65100;}
.login:hover{background-color:#E65100;}
.fname{
position:absolute;top:75px;left:30px;
width:250px;height:45px;border:none;
}
.fpassword{
position:absolute;top:130px;left:30px;
width:250px;height:45px;border:none;
}

.coordinator{
position:absolute;width:300px;height:275px;background-color:rgba(241,238,99,0.8);top:390px;left:165px;

box-shadow: 6px 6px 6px #61622F;-webkit-animation: bounceleft 2000ms ease-out;-moz-animation: bounceleft 2000ms ease-out;-ms-animation: bounceleft 2000ms ease-out;
}
.cohead{position:absolute;left:50px;color:#5F5854;}
.cohead{position:absolute;left:50px;color:#5F5854;}

.ecoordinator{
position:absolute;top:390px;left:920px;width:300px;height:275px;background-color:rgba(241,238,99,0.8);
box-shadow: 7px 7px 7px #61622F;-webkit-animation: bounceright 2000ms ease-out;-moz-animation: bounceright 2000ms ease-out;-ms-animation: bounceright 2000ms ease-out;
}
.ecohead{
position:absolute;left:50px;color:#5F5854;
}
.ecouser{
position:absolute;top:75px;left:30px;
width:250px;height:45px;border:none;
}
.ecopassword{
position:absolute;top:130px;left:30px;
width:250px;height:45px;border:none;
}
.ecologin{
position:absolute;top:200px;left:30px;
width:250px;height:45px;
background-color:#177bbb;
border:none;	
color:white;font-size:18px;
}
.ecologin:hover{background-color:#E65100;}
.ifo{
position:absolute;top:390px;left:535px;width:300px;height:275px;background-color:rgba(241,238,99,0.8);
box-shadow: 7px 7px 7px #61622F;-webkit-animation: bouncedown 2000ms ease-out;-moz-animation: bouncedown 2000ms ease-out;-ms-animation: bouncedown 2000ms ease-out;
}
.ifohead{
position:absolute;left:100px;color:#5F5854;
}
.ifopassword{
position:absolute;top:130px;left:30px;
width:250px;height:45px;border:none;
}
.ifouser{
position:absolute;top:75px;left:30px;
width:250px;height:45px;border:none;
}
.ifologin{
position:absolute;top:200px;left:30px;
width:250px;height:45px;
background-color:#177bbb;
border:none;	
color:white;font-size:18px;
}
.ifologin:hover{background-color:#E65100;}
.vit_logo{
position:absolute;top:10px;left:80%;
}
.riviera_logo{
opacity:0.7;width:480px;height:30%;position:absolute;top:0px;
}
</style>
</head>
<body>

<!--Admin Login -->
<div class="admin">
<h2 class="head">Admin Login</h1>
<form action= "<?php echo $_SERVER["PHP_SELF"];?>"  method="POST">
<input type="text" class="user" placeholder="Enter User ID" autocomplete='off' name='name' id ='name'>
<input type="password" name="password" class="password" placeholder="Enter Password" autocomplete="off" />
<input type="submit" class="submit" name="admin_login" value="Login as Admin" />
</form>
</div>

<!--Co-ordinator Login -->
<div class="coordinator">
<h2 class="cohead" >Co-ordinators Login</h2>
<form action= "<?php echo $_SERVER["PHP_SELF"];?>"  method="POST">
<input type="text" name="name" class="fname" placeholder="Enter User ID" autocomplete="off" />
<input type="password" name="password" class="fpassword" placeholder="Enter Password" autocomplete="off"  />
<input type="submit" name="cordinator_login" class="login" value="Login as Co-ordinator"/></p>
</form>
</div>

<!--Event Co-ordinator Login -->
<div class="ecoordinator">
<h2 class="ecohead">Event Co-ordinators</h2>
<form action= "<?php echo $_SERVER["PHP_SELF"];?>"  method="POST">
<input type = "text" name="name" placeholder="Enter User ID" class="ecouser" autocomplete="off" />
<input type="password" name="password" class="ecopassword" placeholder="Enter Password" autocomplete="off"  />
<input type="submit" name="event_cordinator_login" class="ecologin" value="Login as Event Co-ordinator"/></p>
</form>
</div>

<!--IFO Login-->
<div class="ifo">
<h2 class="ifohead">ISO Login</h2>
<form action= "<?php echo $_SERVER["PHP_SELF"];?>"  method="POST">
<input type="text" placeholder="Enter User ID" class="ifouser" id = 'name' name = 'name' autocomplete="off" >
<input type="password" placeholder="Enter Password" class="ifopassword" id ='password' name ='password' autocomplete="off" >
<input type="submit" id="ifo_login" name="ifo_login" value="Login as ISO" class="ifologin">
</form>
</div>

</body>
</html>