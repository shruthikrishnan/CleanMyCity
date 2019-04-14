<?php require('dbconfig/config.php');

?>
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="admin.css" type="text/css"> </link>
<title>admincomplete</title>
<style>
h1{
text-align:center;
    text-align: center;
    color: #003366;
    border-bottom: 1px solid #003366;
    padding: 19px;
    margin-bottom: 50px;	
}
table, th, td {
    border: 1px solid black;
}



</style>

</head>
<body>

<div id="mySidenav" class="sidenav">
  <a href="adminpending.php">Pending</a>
  <a href="adminprocessing.php">Processing</a>
  <a href="admincomplete.php">Complete</a>
 
</div>


<h1 >COMPLETE</h1>
<table align="center" cellspacing="0" cellpadding="0" width="70%">
<caption> The work which is completed. </caption>
	<tr>
		<th> Sr. No </th>
		<th> Image ID </th>
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
<td> <?php print $rowdata['img_id'] ?> </td>
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

<td> <a class="" href="reversgeocoding.php?finalLatitude=<?php print $rowdata['latitude'] ?> &finalLongitude=<?php print $rowdata['longitude'] ?>"<button> View </button> </a> </td>

</tr>
<?php $i=$i+1;  }  ?>
</table>

</body>
</html>




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

