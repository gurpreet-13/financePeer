<?php

$db_host = "localhost";
$db_user="root";
$db_password="";
$db_dbName = "financepeer";

$connection = mysqli_connect($db_host,$db_user,$db_password,$db_dbName);

$fileUpload = "data (13).json";

$getData = file_get_contents($fileUpload);

$array = json_decode($getData,true);

foreach($array as $row){
  $insertQuery = "INSERT INTO data_json(userId, id, title, body) VALUES('".$row["userId"]."', '".$row["id"]."','".$row["title"]."','".$row["body"]."')";
   $checkInsertion = mysqli_query($connection,$insertQuery);

}

if($checkInsertion){
?>
<script>
  location.replace("jsonTable.php");
</script>
<?php
}

 ?>
