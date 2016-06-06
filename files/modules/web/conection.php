<?php
session_name('lamantapp');
session_start();

function checkUser()
{
  if(!$_SESSION['user'])
  {
    header("Location: login.php?msg=notvalid");
    die();
  }
}

// $host     = '127.0.0.1';
// $user     = 'root';
// $password = 'root';
// $database = 'lamantapp';
//
// $mysqli  = new mysqli($host,$user,$password,$database);
// $mysqli->set_charset('utf8');
// if ($mysqli ->connect_errno) {
//     echo "Fallo al conectar a MySQL: (" . $mysqli ->connect_errno . ") " . $mysqli ->connect_error;
// }
// echo $mysqli ->host_info . "\n"; Test

// $mysqli  = new mysqli("127.0.0.1", "root", "root", "lamantapp", 3306);
// if ($mysqli ->connect_errno) {
//     echo "Fallo al conectar a MySQL: (" . $mysqli ->connect_errno . ") " . $mysqli ->connect_error;
// }


// echo $mysqli ->host_info . "\n"; Test de conexion
//
// $db_connection= mysql_connect($hostname, $username, $password)
// or die('Unable to connect to database! Please try again later.');


function fetchAssoc($Query)// para hacer SELECT
{
  $host     = '127.0.0.1';
  $user     = 'root';
  $password = 'root';
  $database = 'lamantapp';

  $mysqli          = mysqli_connect($host, $user, $password, $database);
  $result          = mysqli_query($mysqli , $Query);
  while($Data[]    = mysqli_fetch_assoc($result)){}
  array_pop($Data);
  return $Data;

}

function execQuery($Query)// para hacer INSERT, UPDATE y DELETE
{
  $host     = '127.0.0.1';
  $user     = 'root';
  $password = 'root';
  $database = 'lamantapp';

  $mysqli       = mysqli_connect($host, $user, $password, $database);
  return mysqli_query($mysqli , $Query);
}

?>
