<?php

$sname = "localhost";
$uname = "root";
$password = "root";
$port = 8888;

$db_name = "pkl2";

// $connCreate = new mysqli($sname, $uname, $password);

$conn = mysqli_connect($sname,$uname,$password,$db_name,$port);

if(!$conn){
  echo "Connection failed!";
}

?>