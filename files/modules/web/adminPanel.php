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
  <body class="ligaMain">
    <?php include('../../../files/includes/inc.web.nav.php'); ?> <!-- Navegation -->
    <header>
      <!-- Page Header -->
      <div class="mainTitle titW">
        <h1>Administración</h1>
        <h4>Administrador actual: <?php echo $_SESSION['user'] ?></h4>

      </div>
      h
        <!-- /Page Header -->
    </header>
    <div class="mainWrapper">

      <!-- Muestra equipos -->
      <div class="container transContainer">
        <div class="teamList">
          <h4>Usuarios Activos</h4>
          <div class="row">
            <div class="col-md-2">Usuario</div>
            <div class="col-md-3">Nombre</div>
            <div class="col-md-1">Permisos</div>
            <div class="col-md-3">Creado el</div>
            <div class="col-md-3">Última Conexión</div>
          </div>
          <?php
            $Users = fetchAssoc("SELECT * FROM user");
            foreach($Users as $DBUser){
          ?>
          <div class="row">
            <div class="col-md-2"><?php echo $DBUser['user']; ?></div>
            <div class="col-md-3"><?php echo $DBUser['name']; ?></div>
            <div class="col-md-1"><?php echo $DBUser['status']; ?></div>
            <div class="col-md-3"><?php echo $DBUser['creation_date']; ?></div>
            <div class="col-md-3"><?php echo $DBUser['last_login']; ?></div>
          </div>
          <?php
            }
          ?>
        </div>
      </div>




    <!-- <?php  closeCon()  ?> -->
    </div><!-- /Wrapper -->
    <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
  </body>
</html>
