<?php
//regex need to be added
		
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_REQUEST["name"])))
		{
			require 'sql_con.php';
			$u1 = "username_1";
			$u2 = "username_2";
			$u3 = "username_3";
			$c1 = "club_user_err1";
			$c2 = "club_user_err2";
			$c3 = "club_user_err3";
			$name = $_REQUEST["name"];
			$mail = $_REQUEST["mail"];
			$sql_1 = "INSERT INTO `club_names`(club_name,club_total_logins,club_total_events) values('$name',0,0)";
			$res_1 = mysqli_query($mysqli,$sql_1);
			if($res_1==true)
			{
				$sql_2 = "SELECT club_id FROM `club_names` where club_name='$name'";
				$res_2 = mysqli_query($mysqli,$sql_2);
				if($res_2==true)
				{
					$arr = mysqli_fetch_array($res_2);
					$id = $arr["club_id"];
					
					$sql_3 = "INSERT INTO `event_mail` values('$mail',0,$id)";
					$res_3 = mysqli_query($mysqli,$sql_3);
					if($res_3==true)
					{
					echo 
						"<input type='text' name='username' id='username_1' placeholder='Username 1' onkeyup = 'club_user_err($u1,$c1)' autocomplete='off'><div id ='club_user_err1'></div>
						<input type='password' name='password' id='password_1' placeholder='Password 1'><br/><br/>";
						//<input type='pass' name='username' id='username' placeholder='username'>
						//confirmation of password needs to be done using js
					echo"<input type='text' name='username' id='username_2' placeholder='Username 2' onkeyup = 'club_user_err($u2,$c2)' autocomplete='off'><div id ='club_user_err2'></div>
						<input type='password' name='password' id='password_2' placeholder='Password 2'><br/><br/>

						<input type='text' name='username' id='username_3' placeholder='Username 3' onkeyup = 'club_user_err($u3,$c3)' autocomplete='off'><div id ='club_user_err3'></div>
						<input type='password' name='password' id='password_3' placeholder='Password 3'><br/><br/>";

						echo "<paper-button class='submit' value='submit' id=".$id." onclick='make_club_accounts(this.id)'>Submit</paper-button>";
					}
					else
					{
						echo "<h3>OOPS! We were not able to store your credentials.</h3>";
						$sql_4 = "DELETE FROM `club_names` where club_name='$name'";
						$res_4 = mysqli_query($mysqli,$sql_4);
					}
				}
				
				else
				{
					echo "No such club exists";
				}
			}
			else
			{
				echo "<h3>OOPS! We were not able to store your credentials.</h3>";
			}
			mysqli_close($mysqli);
		}
		else if(((!isset($_SESSION["password"]))&&(!isset($_REQUEST["name"])))||((isset($_SESSION["password"]))&&(!isset($_REQUEST["name"]))))
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
#username_1{position:absolute;top:80px;left:300px;width:200px;height:40px;}
#password_1{position:absolute;top:140px;left:300px;width:200px;height:40px;}
#username_2{position:absolute;top:200px;left:300px;width:200px;height:40px;}
#password_2{position:absolute;top:260px;left:300px;width:200px;height:40px;}
#username_3{position:absolute;top:320px;left:300px;width:200px;height:40px;}
#password_3{position:absolute;top:380px;left:300px;width:200px;height:40px;}
.submit{position:absolute;top:440px;left:300px;width:200px;height:40px;background-color:rgb(14,122,195);color:white;}
#club_user_err1{position:absolute;top:80px;left:550px;font-size:18px;color:red;}
#club_user_err2{position:absolute;top:200px;left:550px;font-size:18px;color:red;color:red;}
#club_user_err3{position:absolute;top:320px;left:550px;font-size:18px;color:red;}
</style>