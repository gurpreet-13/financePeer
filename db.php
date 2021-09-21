<?php

$db_host = "localhost";
$db_user="root";
$db_password="";
$db_dbName = "financepeer";

$connection = mysqli_connect($db_host,$db_user,$db_password,$db_dbName);

if(!$connection){
    die('Database connection failed' . mysqli_error($connection));
}

?>
