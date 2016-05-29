<!DOCTYPE html>
<html lang="es">
  <?php include(WEB_DIR . 'includes/head.php'); ?>
  <body>
    <?php include(WEB_DIR . 'includes/nav.php'); ?>

    <div class="container welcome">
      <?php
          if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 0) {
            echo 'Bienvenido  &nbsp;' .  strtoupper($_users[$_SESSION['app_id']]['user']) . '&nbsp; a <h2> '. APP_TITLE . '</h2>';
          }
          else {
            echo '
                  <div class="homeWelcomeMessage">
                    <p>Si querés <b>desplegar</b> todo el poder de</p>
                    <h1>La MantaApp</h1><i class="fa fa-chevron-down"></i><br /><a href="#" data-toggle="modal" data-target="#Login">
                    <button type="button" class="btn btndefault mainBtn">Logueate Capo</button></a>
                  </div>
                  <div class="container homeMantero">
                    <div class="row">
                      <img src="view/images/mantero.gif" alt="" />
                    </div>
                  </div>';
          }
      ?>
      <!-- Acá el programa me reconoce como su DIOS -->
      <?php
         if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['user'] == 'javzero') {
           echo 'OH! Creador! Eres tú ?';
         } if(isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] == 0) {
           echo 'Hacete una cuenta de verdad! PETAZO!';
         }
      ?>

      <!-- Succes y error si activa o no  -->
      <?php
            if(isset($_GET['activatesuccess'])) {
              echo '<div class="container alertContainer alert alert-success fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>OK!</strong><br /> Usuario activado correctamente.</div>';
            }
      ?>
      <?php
            if(isset($_GET['activateerror'])) {
              echo '<div class="container alertContainer alert alert-success fade in">
                      <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                      <strong>No</strong> se pudo activar el usuario</div>';
            }
      ?>
      </div><!-- /welcome -->
      <!-- Contenido si está logueado -->
      <div class="container">

        <?php
        if (isset($_SESSION['app_id'])) {
          echo '<div class="container homeMenu flex-container">
                  <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-3 menuCard">
                      <div class="card">
                        <a href="?view=links&?link=equipos"><img class="card-img-top" src="view/images/menu/ligadiaria.jpg" alt="Card image cap"></a>
                        <div class="card-block"><h4>EQUIPOS</h4></div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 menuCard">
                      <div class="card">
                        <a href="?view=links&?link=liga"><img class="card-img-top" src="view/images/menu/estadist.jpg" alt="Card image cap"></a>
                        <div class="card-block"><h4>LIGA</h4></div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 menuCard">
                      <div class="card">
                        <a href="?view=links&?link=champion"><img class="card-img-top" src="view/images/menu/mantis.jpg" alt="Card image cap"></a>
                        <div class="card-block"><h4>LA CHAMPION</h4></div>
                      </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3 menuCard">
                      <div class="card">
                        <a href="?view=links&?link=estadypremios"><img class="card-img-top" src="view/images/menu/premios.jpg" alt="Card image cap"></a>
                          <div class="card-block"><h4>ESTADÍSTICAS Y PREMIOS</h4></div>
                      </div>
                    </div>
                  </div>
                </div>';
        }
         ?>
      </div>



    <!-- ///////////// CATEGORIAS ////////////////// -->




<br>
<br>
<br>
<br>
<br>
    <?php include(WEB_DIR . 'includes/footer.php'); ?>
    <?php include(WEB_DIR . 'includes/scripts.php'); ?>
  </body>
</html>
