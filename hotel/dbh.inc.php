<?php
ob_start(); //Turns on output buffering 
$servername = "localhost";
$dbUsername = "root";
$dbPassword = "";
$dbName = "tourism";

$conn = mysqli_connect($servername, $dbUsername, $dbPassword, $dbName);

if(!$conn){
  die("connection failed".mysqli_connect_error());
}

