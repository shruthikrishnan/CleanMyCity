<?php require('dbconfig/config.php');
$email_id = $_SESSION['email_id'];
?>



<h1 id="txtHint"> </h1>


<table border="1">
	<tr>
		<th> Sr. No </th>
		<th>Username</th>
		<th> Posted On </th>
		<th> Image</th>
		<th>Latitude</th>
		<th>Longitude</th>
		<th> Change Status </th>
		
		<th> Map </th>  
	</tr>
<?php


$query="SELECT * FROM `images` AS img, `user`AS usr WHERE img.uid=usr.uid AND Status=0";
$data = mysqli_query($conn,$query);
$i = 1;
while($rowdata = mysqli_fetch_array($data)){
 
 ?>
<tr>  
<td> <?php echo $i; ?> </td>
<td> <?php print $rowdata['username'] ?> </td>
<td> <?php print $rowdata['posted_on'] ?> </td>
<td> <img src="<?php print $rowdata['img_url'] ?>" height="50" width="50" /> </td>
<td> <?php print $rowdata['latitude'] ?> </td>
<td> <?php print $rowdata['longitude'] ?> </td>

<td> <?php // print $rowdata['Status'] ?> 
	<select onchange="update(this.value)">
		<option <?php if($rowdata['Status']==0) print "selected" ;?> value="0|<?php  print $rowdata['img_id'] ?>">  Pending </option>
		<option <?php if($rowdata['Status']==1) print "selected" ;?> value="1|<?php  print $rowdata['img_id'] ?>"> Processing</option>
		<option  <?php if($rowdata['Status']==2) print "selected" ;?> value="2|<?php  print $rowdata['img_id'] ?>"> Complete </option>
	</select>
</td>

<td> <a href="reversgeocoding.php?finalLatitude=<?php print $rowdata['latitude'] ?> &finalLongitude=<?php print $rowdata['longitude'] ?>"<button> View </button> </a> </td>

</tr>
<?php $i=$i+1;  }  ?>
</table>



<table border="1">
	<tr>
		<th> Sr. No </th>
		<th>Username</th>
		<th> Posted On </th>
		<th> Image</th>
		<th>Latitude</th>
		<th>Longitude</th>
		<th> Change Status </th>
		
		<th> Map </th>  
	</tr>
<?php


$query="SELECT * FROM `images` AS img, `user`AS usr WHERE img.uid=usr.uid AND Status=1";
$data = mysqli_query($conn,$query);
$i = 1;
while($rowdata = mysqli_fetch_array($data)){
 
 ?>
<tr>  
<td> <?php echo $i; ?> </td>
<td> <?php print $rowdata['username'] ?> </td>
<td> <?php print $rowdata['posted_on'] ?> </td>
<td> <img src="<?php print $rowdata['img_url'] ?>" height="50" width="50" /> </td>
<td> <?php print $rowdata['latitude'] ?> </td>
<td> <?php print $rowdata['longitude'] ?> </td>

<td> <?php // print $rowdata['Status'] ?> 
	<select onchange="update(this.value)">
		<option <?php if($rowdata['Status']==0) print "selected" ;?> value="0|<?php  print $rowdata['img_id'] ?>">  Pending </option>
		<option <?php if($rowdata['Status']==1) print "selected" ;?> value="1|<?php  print $rowdata['img_id'] ?>"> Processing</option>
		<option  <?php if($rowdata['Status']==2) print "selected" ;?> value="2|<?php  print $rowdata['img_id'] ?>"> Complete </option>
	</select>
</td>

<td> <a href="reversgeocoding.php?finalLatitude=<?php print $rowdata['latitude'] ?> &finalLongitude=<?php print $rowdata['longitude'] ?>"<button> View </button> </a> </td>

</tr>
<?php $i=$i+1;  }  ?>
</table>


<table border="1">
	<tr>
		<th> Sr. No </th>
		<th>Username</th>
		<th> Posted On </th>
		<th> Image</th>
		<th>Latitude</th>
		<th>Longitude</th>
		<th> Change Status </th>
		
		<th> Map </th>  
	</tr>
<?php


$query="SELECT * FROM `images` AS img, `user`AS usr WHERE img.uid=usr.uid AND Status=2";
$data = mysqli_query($conn,$query);
$i = 1;
while($rowdata = mysqli_fetch_array($data)){
 
 ?>
<tr>  
<td> <?php echo $i; ?> </td>
<td> <?php print $rowdata['username'] ?> </td>
<td> <?php print $rowdata['posted_on'] ?> </td>
<td> <img src="<?php print $rowdata['img_url'] ?>" height="50" width="50" /> </td>
<td> <?php print $rowdata['latitude'] ?> </td>
<td> <?php print $rowdata['longitude'] ?> </td>

<td> <?php // print $rowdata['Status'] ?> 
	<select onchange="update(this.value)">
		<option <?php if($rowdata['Status']==0) print "selected" ;?> value="0|<?php  print $rowdata['img_id'] ?>">  Pending </option>
		<option <?php if($rowdata['Status']==1) print "selected" ;?> value="1|<?php  print $rowdata['img_id'] ?>"> Processing</option>
		<option  <?php if($rowdata['Status']==2) print "selected" ;?> value="2|<?php  print $rowdata['img_id'] ?>"> Complete </option>
	</select>
</td>

<td> <a href="reversgeocoding.php?finalLatitude=<?php print $rowdata['latitude'] ?> &finalLongitude=<?php print $rowdata['longitude'] ?>"<button> View </button> </a> </td>

</tr>
<?php $i=$i+1;  }  ?>
</table>





















<script>
function update(str) {
        xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("txtHint").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET","update.php?q="+str,true);
        xmlhttp.send();
    
}
</script>

