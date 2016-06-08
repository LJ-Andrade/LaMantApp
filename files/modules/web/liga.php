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
      <div class="mainTitle titB"><h1>Liga</h1></div>
        <!-- /Page Header -->
    </header>
    <div class="mainWrapper">




<div class="container">
  <div class="row partidoyTabla">

    <div class="col-md-4 col-xs-12 ligaWelcome">
      <div class="container transContainer ligaWelcomeInner">
        <h3>Liga Loca llena de chele!</h3>
      </div>
    </div>

    <div class="col-md-8 ligaPartido ">
      <div class="container transContainer ligaPartidoInner">
        <form method="post" class="form-horizontal">
          <div class="col-md-6 col-xs-12">
            <div class="col-md-8">
              <select name="equipoLoc[]" class="form-control localSelection" id="select">
                <option>Local</option>
              </select>
            </div>
            <div class="col-md-4 col-xs-3">
              <input name="golesLoc[]" class="form-control" placeholder="Goles" type="number">
            </div>
            <div class="col-md-12 col-xs-9 transInput partidoExpulsados">
              <input name="expLoc[]" id="tags_1" type="text" class="tags" value="" />
              <label>Expulsados Locales</label>
            </div>
          </div>
          <div class="col-md-6 col-xs-12">
            <div class="col-md-8">
              <select name="equipoVis[]" class="form-control localSelection" id="select">
              <option >Local</option>
              </select>
            </div>
            <div class="col-md-4 col-xs-3">
              <input name="golesVis[]" class="form-control" placeholder="Goles" type="number">
            </div>
            <div class="col-md-12 col-xs-9 transInput partidoExpulsados">
              <input name="expVis[]" id="tags_2" type="text" class="tags" value="" />
              <label>Expulsados Visitantes</label>
            </div>
          </div>
          <div class="col-md-12 anotarPartido">
            <button type="submit" name="anotarResultado" class="btn btn-default">Fin del Partido</button>
          </div>
        </form>
      </div>
    </div>





  </div><!-- /1st Row -->
</div><!-- /Container -->

<div class="container">
  <div class="row">
    <div class="col-md-8 col-xs-12 ligaPartido ">
      <div class="container transContainer ligaPartidoInner">
        <h2>RESULTADOS</h2>
        <hr>
      </div>
    </div>

    <div class="col-md-4 col-xs-12 ligaTabla">
      <div class="container transContainer ligaInner">
        <h2>POSICIONES</h2>
        <hr>
        <ul>
          <li>Posicion 1</li>
          <li>Posicion 2</li>
          <li>Posicion 3</li>
          <li>Posicion 4</li>
        </ul>
      </div>
    </div>


  </div>
</div>



    </div><!-- /Wrapper -->
    <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
  </body>
</html>
