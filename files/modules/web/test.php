<?php



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
?>
