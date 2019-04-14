<style>
input#fileToUpload {
    float: left;
    margin: 18px;
    
}
</style>


 
<form action="homepage.php" method="post" enctype="multipart/form-data">
   <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input type="submit" value="submit" name="submit">
</form>

<?php
require('dbconfig/config.php');
error_reporting(0);

function spatialdata($imagepath){
$imgdata = exif_read_data("$imagepath");

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
$spatialdata[] = $finalLatitude; 

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
$spatialdata[] = $finalLongitude;
return $spatialdata ;


}


if(isset($_POST['submit']))
		{
			$filename = $_FILES["fileToUpload"]["name"];
			$tempname =  $_FILES["fileToUpload"]["tmp_name"];
			$destination = "upload/$filename" ;
			
			if(!(move_uploaded_file($tempname,$destination )))
			{
			echo "something Went Wrong" ;
			
			}
			
			$spatialdata = spatialdata($destination);
			
			$finalLatitude = $spatialdata[0];
			$finalLongitude = $spatialdata[1];
			
			
					$query ="INSERT INTO `images` (`img_id`, `uid`, `img_url`,`latitude`,`longitude`, `posted_on`, `Status`)
					 VALUES (NULL, '$uid', '$destination',$finalLatitude,$finalLongitude, CURRENT_TIMESTAMP, 'pending');";
					
					if($conn->query($query))
					{
						echo "<h1 style='color:green;clear:both;'> User Image($filename) is inserted successfully </h1>";
					}
					else{
					echo "<h1 style='color:red;clear:both;'> Uploaded Image($filename) Does not contain Geo tagging Information. </h1>";
						}
			
		}

?>


