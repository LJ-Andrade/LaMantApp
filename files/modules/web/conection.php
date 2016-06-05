<?php
session_name('lamantapp');
session_start();

date_default_timezone_set("America/Argentina/Buenos_Aires");
function checkUser()
{
  if(!$_SESSION['user'])
  {
    header("Location: login.php?msg=notvalid");
    die();
  }
}

$host     = '127.0.0.1';
$name     = 'root';
$pass     = 'root';
$database = 'lamantapp';


// Create connection
$con = new mysqli($host, $name, $pass, $database);
// Check connection
if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

// $resultado = mysqli_query($con, "SELECT * FROM user");
// $fila      = mysqli_fetch_assoc($resultado);
// echo $fila['user'];


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

  function connect() {
      $host     = '127.0.0.1';
      $name     = 'root';
      $pass     = 'root';
      $database = 'lamantapp';

      $con=new mysqli($host, $name, $pass, $database);
      return $con;
      }



$con->close();
?>
