<?php error_reporting(0); ?>

<!Doctype html>
<html>
 <head>
 <title>Upload images to mysql database.</title>
 <style type="text/css">
 img{
 margin: .2em;
 border: 1px solid #555;
 padding: .2em;
 vertical-align: top;
 }
 </style>
 </head>
 <body>
 
--<form action="upload.php" method="post" enctype="multipart/form-data">
     <div>
 <h3>Image Upload:</h3></div>
 
            <input name="username" type="text"  placeholder="Type your username" required><br>
           
 
 <label> Username :</label>
 <input name="username" type="text" placeholder="John Doe" required>
 <label>Phone number</label>
 <input type="tel" placeholder="+91 000 00 00"></input>
 
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="submit" name="submit">
</form>
</body>
</html>

<?php
$target_file = "upload/"; //folder name

$filename = $_FILES["fileToUpload"]["name"];
$temname =  $_FILES["fileToUpload"]["tmp_name"];
$dir = $target_file .basename($_FILES["fileToUpload"]["name"]);
echo $filename;

if(!(move_uploaded_file($temname, "$target_file/$filename"))){
	echo "something Went Wrong" ;}

	

$dir = scandir($target_file);
foreach($dir as $value){
	$imgdata = exif_read_data("upload/$value");

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


		$GPSLongitude0 = $imgdata['GPSLongitude']['0'];
		//var_dump($GPSLatitude);
		$GPSLongituderaw0 = explode("/", $GPSLongitude0);
		$degree = $GPSLongituderaw0['0'] / $GPSLongituderaw0['1']; //degree

		$GPSLongitude1 = $imgdata['GPSLongitude']['1'];
		$GPSLongituderaw1 = explode("/", $GPSLongitude1);
		$min = $GPSLongituderaw1['0'] / $GPSLongituderaw1['1']; //min

		$GPSLongitude2 = $imgdata['GPSLongitude']['2'];
		$GPSLongituderaw2 = explode("/", $GPSLongitude2);
		$sec = $GPSLongituderaw2['0'] / $GPSLongituderaw2['1']; //sec



		$finalLongitude = $degree + $min/60 + $sec/3600;

		//print $value." ----> Latitude : ". $finalLatitude." | Longitude :". $finalLongitude ."<br>"; 
	print "<a href='reversgeocoding.php?finalLatitude=$finalLatitude&finalLongitude=$finalLongitude'>";
	print "<img src='upload/$value' width='200'/>";
	print "</a>";

	
}













?>


