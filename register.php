<?php
	require 'dbconfig/config.php';
?>

<!DOCTYPE html>
<html>
<head>
<title>Registration Page</title>
<link rel="stylesheet" href="mainpage.css">
<style>
html { 
  background: url(img/register1.jpg) no-repeat center fixed; 
  background-size: cover;
}
.login-box{
    width: 500px;
    height:580px;
     background:rgba(0,0,0,0.5);
}



</style>

</head>
<body >
	<div class="login-box">
	
		<h2>Registration form</h2>
		<img src="img/avatarg.png" class="avatar"/>
	
	
	
	<form  action = "register.php" method = "POST" > 
		 <p> Email Id</p>
		 <input name="email_id" type="email_id"  placeholder="example@gmail.com"  required><br>
		 <p> Full Name </p>
            <input name="username" type="text"  placeholder="Type your username" required><br>
         <p> Password</p>
            <input name="password" type="Password"  placeholder="Type your password"required><br>
		<p>Confirm Password:</p>
		<input  name="cpassword" type="password"  placeholder="Confirm password" required ><br>
		
		<input name="submit_btn" type="submit" id="signup_btn" value="Sign up"><br>
		
		
		
		<a href="index.php"><input type="button" id="back_btn" value="Back"/></a>
	</form>
	
	
	
	</div>
	</body>
</html>



<?php
	
	
		if(isset($_POST['submit_btn']))
		{
			//echo '<script type="text/javascript"> alert("Sign up button clicked") </script>';
			$email_id = $_POST['email_id'];
			$username = $_POST['username'];
			$password = $_POST['password'];
			$cpassword = $_POST['cpassword'];
			
			 
		
		if($password==$cpassword)
		    {
				
			  $query= "select * from user WHERE email_id='$email_id'";
			  $query_run = mysqli_query($conn,$query);
		
		if(mysqli_num_rows($query_run)>0)
			  {
				  //there is already a user with the same username
			  echo '<script type="text/javascript"> alert("User already exists..try another username") </script>';
			  }
			
			else
			{
				  $query="INSERT INTO `user` (`uid`, `email_id`, `username`, `password`) 
				  VALUES (NULL, '$email_id', '$username', '$password');";
				  $query_run = mysqli_query($conn,$query);
				
				
				  if($query_run)
				  {
				  	echo '<script type="text/javascript"> alert("User Registered..Go to login page to login") </script>';
				  }
				  else
				  {
				  	echo '<script type="text/javascript"> alert("Error") </script>';
				  }
				
			  }
			
		  }
		  else{
			
		  	echo '<script type="text/javascript"> alert("Password and confirm password does not match ") </script>';
		  }
		
		}
	
	
	
	
	?>