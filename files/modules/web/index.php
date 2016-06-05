<?php
  include('conection.php');
  checkUser();
  include('constant.php');

  //
  // if($_GET['action']=='create')
  // {
  //   execQuery("INSERT INTO user (user,password,name)VALUES('".$_GET['user']."','1212','pepe')");
  //   echo $_GET['user']." ha sido creado";
  // }
  //
  // if($_POST['action']=='insert')
  // {
  //   execQuery("INSERT INTO user (user,password)VALUES('".$_POST['user']."','".$_POST['password']."')");
  //   echo $_POST['user']." ha sido creado";
  // }
  //
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <!-- Required meta tags always come first -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <?php include('../../../files/includes/inc.web.head.php'); ?> <!-- Head -->

</head>
  <body>
    <?php include('../../../files/includes/inc.web.nav.php'); ?> <!-- Navegation -->
    <div class="welcome">
      <h3>Bienvenido <?php echo strtoupper($_SESSION['user'])?></h3>
      <h2>A <?php echo APP_TITLE?></h2>
      <?php
      $user = $_SESSION['user'];
      if($user == jav) {
      echo 'Es igual';
      };
      //  if($user = jav) {
      // echo '<li class="nav-item"><a class="nav-link" href="styletest.php">Test </a></li>';
      // } ?>
    </div>


    <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
  </body>
</html>
