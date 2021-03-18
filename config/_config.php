<?php
date_default_timezone_set('Asia/Jakarta');

session_start();
$con = mysqli_connect('localhost', 'root', '', 'ikaloka') or die('not connecting');

if (!$con) {
  echo "Error code " . mysqli_connect_error();
}

function base_url($url = null){
  $base = 'http://localhost/ikaloka/';

  if ($url != NULL) {
    echo $base . $url;
  }else{
    echo $base;
  }
}


?>