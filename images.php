<html>
<body>
<table border="1" align="center"cellspacing="0" cellpadding="0" width="70%">
	<tr>
		<th> Sr. No </th>
		<th> Image ID </th>
		<th> Posted On </th>
		<th> Image</th>
		<th> Status </th>  
	</tr>
</body>
</html>

<?php

require('dbconfig/config.php');
/*$email_id = $_SESSION['email_id'];*/
$query="SELECT * FROM `images` WHERE uid= '$uid'" ;
$data = mysqli_query($conn,$query);
$i = 1;
while($rowdata = mysqli_fetch_array($data)){ ?>

<tr>  
<td> <?php echo $i; ?> </td>
<td> <?php print $rowdata['img_id'] ?> </td>
<td> <?php print $rowdata['posted_on'] ?> </td>
<td> <img src="<?php print $rowdata['img_url'] ?>" height="24" width="24" /> </td>
<td> <?php if($rowdata['Status']== 0)print "Pending" ;
if($rowdata['Status']== 1)print "Processing" ;
if($rowdata['Status']== 2)print "Complete" ;


 ?> </td>

</tr>

<?php $i++;  }  ?>






</table>