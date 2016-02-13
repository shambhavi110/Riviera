<?php
		
		session_start();
		if((isset($_SESSION["password"]))&&(isset($_POST["key"])))
		{	
				require 'sql_con.php';
				$name=$_POST["name"];
				$regno=$_POST["regno"];
				$phno=$_POST["ph"];
				$totalbooks=$_POST["total"];
				$book_issue=$_POST["from"];
				$book_return=$_POST["to"];
				$books_id=explode(",",$_POST["books_id"]);
				$sql_2="INSERT INTO `receipt`(regno,person_name,date_of_issue,date_of_return,no_of_books,contact_no) values('$regno','$name','$book_issue','$book_return',$totalbooks,'$phno')";
				$res_2=mysqli_query($mysqli,$sql_2);
				$flag = 0;
				if($res_2 == true)	
				{
					for($i=0;$i<$totalbooks;$i++)
					{
						$sql_3 ="INSERT INTO `receipt_book_ids` (regno,id) values ('$regno',$books_id[$i])"; 
						$rs = mysqli_query($mysqli,$sql_3);
						if($rs==true)
						{
							continue;
						}
						else
						{
							$flag = 1;
							break;
						}
					}
					if($flag==1)
					{
						for($j=0;$j<$i;$j++)
						{
							$sqlr_3 ="DELETE FROM `receipt_book_ids` WHERE id = $books_id[$j]"; 
							mysqli_query($mysqli,$sqlr_3);
						}
						$sqlr_2="DELETE FROM `receipt` WHERE regno='$regno'";
						mysqli_query($mysqli,$sqlr_2);
						echo "<h3>OOPS, There was a problem in registering!</h3> ";
					}
					else
					{
						echo "<h3>Receipt book added!</h3>";
						echo "Name: $name<br>Register no: $regno<br>Total no of books: $totalbooks";
					}
				}
				else
					echo "<h3>OOPS, There was a problem in registering!</h3> ";
				
				//use a session variable so as to print the info of the status of query like 
				//receipt registered in the home page of the respective login
				//and unset the session variables immediately
				mysqli_close($mysqli);
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