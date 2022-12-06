<?php

// $uname = 'root';
// $pass = '';
// $db = 'reglog';
// $hname = 'localhost';

//     $conn = mysqli_connect($uname,$pass,$db,$hname);
//     if(!$conn){
//         die("Cannot Connect to Database".mysqli_connect_error());
//     }

$user = 'root';
$password = 'root';
$db = 'bhwebsite';
$host = 'localhost';
$port = 3306;

$link = mysqli_init();
$con = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);

function filteration($data){
   foreach($data as $key => $value){
      $data[$key] = trim($value);
      $data[$key] = stripslashes($value);
      $data[$key] = htmlspecialchars($value);
      $data[$key] = strip_tags($value);
   }

   return $data;
}

function select($sql,$values,$datatypes){
   
}

?>