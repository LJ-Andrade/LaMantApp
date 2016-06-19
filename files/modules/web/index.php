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
  <body class="index">
    <div class="mainWrapper">
    <?php include('../../../files/includes/inc.web.nav.php'); ?> <!-- Navegation -->
      <div class="contentWrapper">
        <div class="welcome">
          <h3>Bienvenido <?php echo strtoupper($_SESSION['user'])?></h3>
          <h2>A <?php echo APP_TITLE?></h2>
          <?php
          $user1 = $_SESSION['user'];
          if($user1 == jav) {
          echo 'Hola, creador! Eres tú!';
          };
          ?>
          </br></br>
        </div>



        <div class="row">
          <div class="container homeMenu">
            <div class="col-md-3 col-sm-6">
              <div class="homeMenuTitle">
                <h1>Liga</h1>
              </div>
              <div class="homeMenuImg">
                <a href="liga.php"><img src="../../../skin/images/body/menu/ligadiaria.jpg" alt="" class="animated fadeIn" /></a>
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="homeMenuTitle">
                <h1>Champion</h1>
              </div>
              <div class="homeMenuImg">
                <a href="mantis.php"><img src="../../../skin/images/body/menu/mantis.jpg" alt="" class="animated fadeIn" />
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="homeMenuTitle">
                <h1>Títulos</h1>
              </div>
              <div class="homeMenuImg">
                <a href="premios.php"><img src="../../../skin/images/body/menu/premios.jpg" alt="" class="animated fadeIn" />
              </div>
            </div>
            <div class="col-md-3 col-sm-6">
              <div class="homeMenuTitle">
                <h1>Estad&iacute;sticas</h1>
              </div>
              <div class="homeMenuImg">
                <a href="estadist.php"><img src="../../../skin/images/body/menu/estadist.jpg" alt="" class="animated fadeIn" />
              </div>
            </div>
          </div>
        </div>

      </div>
      <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
      <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->

    </div>
  </body>
</html>
