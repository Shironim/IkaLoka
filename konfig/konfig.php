<?php
date_default_timezone_set('Asia/Jakarta');

session_start();

$servername = "localhost";
$database = "ikaloka";
$username = "root";
$password = "";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $database);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}
// echo "Connected successfully";

function base_url($url = null){
  $base = 'http://localhost/ikaloka/';

  if ($url != NULL) {
    echo $base . $url;
  }else{
    echo $base;
  }
}



?>