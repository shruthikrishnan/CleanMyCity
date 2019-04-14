<?php
session_start();
require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Page</title>
<link rel="stylesheet" href="mainpage.css" type="text/css"></link>
<style>

html { 
  background: url(.jpg) no-repeat center fixed; 
  background-size: cover;
}

</style>
</head>
<body >
	
	 <div class="login-box">
        <img src="img/avatar1.png" class="avatar">
           <h1> Login Here</h1>
            <form action="index.php" method="post">
           <p> Email Id</p>
		 <input name="email_id" type="email_id"  placeholder="example@gmail.com" required><br>
            <p> Password</p>
            <input name="password" type="Password"  placeholder="Type your password"required><br>
            <input name="login" type="submit"  value="Login"><br>
            <a href="register.php"><input type="button" id="register_btn" value="Register"></a>
            
                
                
            </form>
	
	<?php
		if(isset($_POST['login']))
		{
			//echo '<script type="text/javascript"> alert("Login button clicked") </script>';
			$email_id=$_POST['email_id'];
			$password=$_POST['password'];
			
			$query="select * from user WHERE email_id='$email_id' AND password='$password'";
			
			$query_run = mysqli_query($conn,$query);
			if(mysqli_num_rows($query_run)>0)
			{
				//valid
				$_SESSION['email_id']= $email_id;
				header('location:homepage.php');
			}
			else
			{
				//Invalid
				echo '<script type="text/javascript"> alert("Invalid email_id or password") </script>';
			}
		
		}
	
	
	
	?>
	
	</div>
</html>