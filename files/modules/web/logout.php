<?php
include('conection.php');
session_destroy();
header('Location: login.php');
?>
