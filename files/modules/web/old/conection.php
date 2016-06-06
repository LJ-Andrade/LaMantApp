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


// function connect()
// {
//   $host     = '127.0.0.1';
//   $name     = 'root';
//   $pass     = 'root';
//   $database = 'lamantapp';
//
//   // Conectando, seleccionando la base de datos
//   $con = mysql_connect($host, $name, $pass, $database)
//       or die('No se pudo conectar: ' . mysql_error());
//   echo 'Connected successfully';
//   mysql_select_db($database) or die('No se pudo seleccionar la base de datos');
// }

?>
