<?php
  include('conection.php');
  checkUser();
  include('constant.php');



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
  <body class="ligaMain">
    <?php include('../../../files/includes/inc.web.nav.php'); ?> <!-- Navegation -->
    <header>
      <!-- Page Header -->
      <div class="mainTitle titW"><h1>Liga</h1></div>
        <!-- /Page Header -->
    </header>
    <div class="mainWrapper">

      <!-- Muestra equipos -->
      <div class="container transContainer">
        <div class="row">
          <div class="teamList">
            <h4>Usuarios Activos</h4>

            <?php
            // Creación de la consulta SQL



            ?>
          </div>
        </div>
      </div>




    <!-- <?php  closeCon()  ?> -->
    </div><!-- /Wrapper -->
    <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
  </body>
</html>
