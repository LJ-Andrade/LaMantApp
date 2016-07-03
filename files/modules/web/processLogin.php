<?php
  include('conection.php');

  $User     = $_POST['user'];
  $Password = $_POST['password'];

  // Ejemplo para recorrer un array con los datos de una tabla
  // $Users = fetchAssoc("SELECT * FROM user");
  //
  // foreach($Users as $DBUser){
  //
  //   if($DBUser['user']==$User && $DBUser['password']==$Password)
  //   {
  //     $_SESSION['user']= $User;
  //     header("Location: index.php");
  //     die();
  //   }
  // }
  //
  // header("Location: login.php?msg=error");

  $Cant = fetchAssoc("SELECT user_id FROM user WHERE user='".$User."' AND password='".$Password."'");
  if(count($Cant)>0)
  {
    $_SESSION['user']= $User;
    header("Location: index.php?msg=logOk");
  }else{
    header("Location: login.php?msg=error");
  }



?>
