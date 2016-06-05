<?php
  include('conection.php');
  checkUser();
  include('constant.php');

  $c = selectStuff("SELECT * FROM");
  echo $c['user'],$c['password']; 
?>
