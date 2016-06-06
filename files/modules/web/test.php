<?php

  include('conection.php');
  checkUser();
  include('config.php');



$host     = '127.0.0.1';
$user     = 'root';
$password = 'root';
$database = 'lamantapp';


$con = new mysqli($host,$user,$password,$database);
if ($con->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
}
echo $con->host_info . "\n";

$con = new mysqli("127.0.0.1", "root", "root", "lamantapp", 3306);
if ($con->connect_errno) {
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
};

// echo $con->host_info . "\n"; Test de conexion


// function fetchAssoc($Query)// para hacer SELECT
// {
//   $host     = '127.0.0.1';
//   $user     = 'root';
//   $password = 'root';
//   $database = 'lamantapp';
//
//   $mysqli          = mysqli_connect($host, $user, $password, $database);
//   $result          = mysqli_query($mysqli , $Query);
//   while($Data[]    = mysqli_fetch_assoc($result)){}
//   array_pop($Data);
//   return $Data;
//
// }

// SELECT `user_id` FROM `user` WHERE `user` LIKE 'jav'
$jav = jav;
$DBUser = fetchAssoc("SELECT user_id FROM user WHERE user = '$jav'");
  var_dump($DBUser);


?>
