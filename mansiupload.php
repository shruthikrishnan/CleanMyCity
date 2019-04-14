<style>
input#fileToUpload {
    float: left;
    margin: 18px;
    
}
</style>


 
<form action="logoutpage.php" method="post" enctype="multipart/form-data">
   <input type="file" name="fileToUpload" id="fileToUpload"><br>
    <input type="submit" value="submit" name="submit">
</form>

<?php
require('dbconfig/config.php');
?>