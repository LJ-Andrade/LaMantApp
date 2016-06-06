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
}

// echo $con->host_info . "\n"; Test de conexion

function fetchAssoc($Query)// para hacer SELECT
{
  $host     = '127.0.0.1';
  $user     = 'root';
  $password = 'root';
  $database = 'lamantapp';

  $con             = mysqli_connect($host, $user, $password, $database);
  $result          = mysqli_query($con, $Query);
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

  $con      = mysqli_connect($host, $user, $password, $database);
  return mysqli_query($con, $Query);
}


function connect()
{
  $host     = '127.0.0.1';
  $name     = 'root';
  $pass     = 'root';
  $database = 'lamantapp';

  // Conectando, seleccionando la base de datos
  $con = mysqli_connect($host, $name, $pass, $database);

}

?>
