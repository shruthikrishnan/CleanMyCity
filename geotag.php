<?php

$imgdata = exif_read_data("img/photo.jpg");

$GPSLatitude0 = $imgdata['GPSLatitude']['0'];
$GPSLatituderaw0 = explode("/", $GPSLatitude0);
$degree = $GPSLatituderaw0['0'] / $GPSLatituderaw0['1']; //degree

$GPSLatitude1 = $imgdata['GPSLatitude']['1'];
$GPSLatituderaw1 = explode("/", $GPSLatitude1);
$min = $GPSLatituderaw1['0'] / $GPSLatituderaw1['1']; // min

$GPSLatitude2 = $imgdata['GPSLatitude']['2'];
$GPSLatituderaw2 = explode("/", $GPSLatitude2);
$sec = $GPSLatituderaw2['0'] / $GPSLatituderaw2['1']; // Sec


$finalLatitude = $degree + $min/60 + $sec/3600;  
print_r($finalLatitude);



//var_dump($GPSLatitude);
$GPSLongitude0 = $imgdata['GPSLongitude']['0'];
$GPSLongituderaw0 = explode("/", $GPSLongitude0);
$degree = $GPSLongituderaw0['0'] / $GPSLongituderaw0['1']; //degree

$GPSLongitude1 = $imgdata['GPSLongitude']['1'];
$GPSLongituderaw1 = explode("/", $GPSLongitude1);
$min = $GPSLongituderaw1['0'] / $GPSLongituderaw1['1']; //min

$GPSLongitude2 = $imgdata['GPSLongitude']['2'];
$GPSLongituderaw2 = explode("/", $GPSLongitude2);
$sec = $GPSLongituderaw2['0'] / $GPSLongituderaw2['1']; //sec



$finalLongitude = $degree + $min/60 + $sec/3600;
print_r($finalLongitude);
?>
<?php
if(isset($_POST['submit'])){

$file = $_FILES['file'];
$fileName = $_FILES['file']['name']	;
//print_r($file);
$fileName = $_FILES['file']['name']	;
$fileTmpName = $_FILES['file']['tmp_name'];
//$fileSize = $_FILES['file']['size']	;
$fileError= $_FILES['file']['error'];
$fileType= $_FILES['file']['type'];	

$fileExt = explode('.',$filename);
$fileActualExt = strtolower(end($fileExt));
$allowed = array('jpg','jpeg','png');


if(in_array($fileActualExt,$allowed)){
	
	if($fileError === 0){
		if($fileSize < 1000000){
			$fileNameNew = uniqid('',true).".".$fileActualExt;
			$fileDestination = 'uploads/'.$fileNameNew;
			move_uploaded_file($fileTmpName,$fileDestination);
			header("Location: geotag.php?uploadsuccess");
			
		}
		
	}else{
		echo "There was a error upload your file!";
}}else 
{
	echo "You cannot uplaod a photo of this type";
}
	
	
	
}

?>

<!DOCTYPE html>
<html>
<body>

<form action="upload.php" method="post" enctype="multipart/form-data">
    Select image to upload:<br>
    <input type="file" name="file"><br><br>
    <button type="submit" value="Submit">UPLOAD</button>
</form>

</body>
</html>
