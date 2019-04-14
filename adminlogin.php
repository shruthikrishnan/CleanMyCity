<?php
session_start();
require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Login Page</title>
<link rel="stylesheet" href="mainpage.css" type="text/css"></link>
<style>

body{

  background: url(adminbg.jpg) no-repeat center fixed; 
  background-size: cover;
}
.login-box{
	padding-bottom:25px;
    width: 450px;
    height:410px;
    
}




</style>
</head>
<body >
	
	 <div class="login-box">
        <img src="img/admin.png" class="avatar">
           <h1> Login Here</h1>
            <form action="adminpending.php" method="post">
           <p> Email Id</p>
		 <input name="email_id" type="email_id"  placeholder="example@gmail.com" required><br>
            <p> Password</p>
            <input name="password" type="Password"  placeholder="Type your password"required><br>
            <input name="login" type="submit"  value="Login"><br>
          
            
                
                
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
				header('location:adminpending.php');
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