<?php
require('dbconfig/config.php');

$rawstatus = $_GET['q'];
$rawdata = explode("|",$rawstatus);
$status = $rawdata[0];
$img_id = $rawdata[1];


$query = "UPDATE `images` SET `Status` = '$status' WHERE `images`.`img_id` = $img_id;";
$data = mysqli_query($conn,$query);
if($data)
	print "updatation is successfully";
?>