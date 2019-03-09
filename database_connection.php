<?php
$serverName = "localhost";
$userName	= "root";
$password	= "";
$database	= "Deepanshu";
$conn =mysqli_connect($serverName,$userName,$password,$database);

if (!$conn) {
die("error in creating connection:".mysqli_connect_error());
}

?>