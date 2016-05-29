<!DOCTYPE html>
<html lang="es">
  <?php include(WEB_DIR . 'includes/head.php'); ?>
  <body class="ligaMain">
    <?php include(WEB_DIR . 'includes/nav.php'); ?>
    <div class="container liga">
      <div class="row">
        <h1>La Mantis Champion League</h1>
        <!-- Partido -->
        <div class="row">
          <div class="col-md-8 ligaPartido">
            <div class="container col-md-6 partidoResultados">
              <form class="form-horizontal formResultados">
                <div class="col-md-9 col-xs-12">
                  <select class="form-control" id="select">
                    <option>Local</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="col-md-3 col-xs-3 partidoResultadosGoles">
                  <input class="form-control" id="inputEmail" placeholder="Goles" type="text">
                </div>
                <div class="col-md-12 col-xs-9">
                  <input class="form-control" id="inputEmail" placeholder="Expulsados" type="text">
                </div>
              </form>
            </div>
            <div class="container col-md-6 col-xs-12 partidoResultados">
              <form class="form-horizontal">
                <div class="col-md-9">
                  <select class="form-control" id="select">
                    <option>Local</option>
                    <option>2</option>
                    <option>3</option>
                    <option>4</option>
                    <option>5</option>
                  </select>
                </div>
                <div class="col-md-3 col-xs-3 partidoResultadosGoles">
                  <input class="form-control" id="inputEmail" placeholder="Goles" type="text">
                </div>
                <div class="col-md-12 col-xs-9">
                  <input class="form-control" id="inputEmail" placeholder="Expulsados" type="text">
                </div>
              </form>
            </div>
            <button type="reset" class="btn btn-default">Fin del Partido</button>
          </div>

        <!-- /Partidos -->
        <div class="col-md-3 col-xs-12 pull-right ligaTabla">
          <div class="ligaPosiciones">
            <h4>Posiciones</h4>
            <hr>
            <ul>
              <li>Equipo ! Resultado</li>
            </ul>
            <hr>
          </div>
          <div class="ligaResultados">
            <h4>Resultados</h4>
            <hr>
            <ul>
              <li>Equipo ! Resultado</li>
            </ul>
            <hr>
          </div>
          <button type="submit" class="btn btn-primary">Cerrar Liga</button>
        </div>
        </div>


      </div>
    </div>








    <?php include(WEB_DIR . 'includes/footer.php'); ?>
    <?php include(WEB_DIR . 'includes/scripts.php'); ?>
  </body>
</html>
