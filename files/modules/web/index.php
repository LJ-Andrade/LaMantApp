<?php
  include('conection.php');
  checkUser();
  include('config.php');
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
      $user1 = $_SESSION['user'];
      if($user1 == jav) {
      echo 'Hola padre, tomá: <a class="nav-link" href="styletest.php">Test </a>';
      };
      ?>
      </br></br>


    

    </div>


    <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->

  </body>
</html>
