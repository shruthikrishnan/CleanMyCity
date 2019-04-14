<?php
	include'./dp.php';
	session_start();
	if(isset($_POST["sub"]))
	{
		$username=$_POST["txtuser"];
		$password=md5($_POST["txtpassword"]);

			$query="select *  from admin where username='$username' and password='$password'";
			$exe_query = mysqli_query($conn,$query);
			$found_num_rows= mysqli_num_rows($exe_query);
			
			if($found_num_rows==1)
			{
			$_SESSION["login_user"]=$username;
			header("location:index.php?success=Login Successful");
			}
			else{
				header("location:index.php?invalid=Your username or password is incorrect.PLEASE TRY AGAIN");
				
			}
		
		
	}



?>