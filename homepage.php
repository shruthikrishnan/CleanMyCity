<?php
session_start();
require('dbconfig/config.php');
$email_id = $_SESSION['email_id'];
$query="select * from user WHERE email_id= '$email_id'" ;
$data = mysqli_query($conn,$query);
$rowdata = mysqli_fetch_array($data);
$uid = $rowdata['uid'];
$email_id = $rowdata['email_id'];
$username = $rowdata['username'];


?>

<!DOCTYPE html>
<html>
<head>
<title>Home Page</title>
<link rel="stylesheet" href="mainpage.css">
<style>
.avartar{
	width:30px;
	height:30px;
}
</style>
</head>
<body >
	<div class="header ">
		<div class="inner-header">
			<div class="logo"><img src="img/avatar1.png" class="avartar"/>Welcome <?php echo $username; ?> 
			
			</div>
	       <div class="header-link" >
	       <a href="website.php">Logout</a>
		</div> 
		</div>
	</div>
	
	
	
	
		
	
	
	
	
	<?php
	if(isset($_POST['logout']))
		{	session_destroy();
			header('location:index.php');
		}
	?>
	</div>

<?php include('upload.php'); ?>
<?php include('images.php'); ?>




</html>