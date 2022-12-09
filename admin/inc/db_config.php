<?php
// Global Variables including $con
$user = 'root';
$password = 'root';
$db = 'bhwebsite';
$host = 'localhost';
$port = 3306;

//  initializes MySQLi and returns an object to use with the mysqli_real_connect()
$link = mysqli_init();

//Create Connection 
$con = mysqli_real_connect(
   $link,
   $host,
   $user,
   $password,
   $db,
   $port
);

// Filter Login Input 
function filteration($data)
{
   foreach ($data as $key => $value) {
      $data[$key] = trim($value);
      $data[$key] = stripslashes($value);
      $data[$key] = htmlspecialchars($value);
      $data[$key] = strip_tags($value);
   }

   return $data;
}

//function to execute query
function select($sql, $values, $datatypes)
{
   $globals = $GLOBALS;
   //$globals['con'] = $globals['con'];
   foreach ($globals as $key => $value) {
      $GLOBALS[$key] = $value;
   }
   $con = $globals['con'];
   if ($stmt = mysqli_prepare($con, $sql)) {
      mysqli_stmt_bind_param($stmt, $datatypes, ...$values);
      if (mysqli_stmt_execute($stmt)) {
         $res = mysqli_stmt_get_result($stmt);
         mysqli_stmt_close($stmt);
         return $res;
      } else {
         mysqli_stmt_close($stmt);
         die("Query cannot be executed - Select");
      }
   } else {
      die("Query cannot be prepared - Select");
   }
}
?>