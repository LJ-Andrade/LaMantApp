<?php
  include('conection.php');
  checkUser();
  include('config.php');

  // Select Queries
  $Team = fetchAssoc("SELECT * FROM team");
  $LeagueName = fetchAssoc("SELECT * FROM league");
  //
  // if($_POST['action']=="createLeague")
  // {
  //   $leagueName = $_POST['leagueName'];
  //   execQuery("INSERT INTO league (league_name) VALUES ('".$leagueName."')");
  //   echo 'OK. Liga agregada';
  // }
  // else {
  //   echo 'error';
  // }


  if($_POST['action']=="insertMatch")
  {
    $localTeam     = $_POST['visitorTeam'];
    execQuery("INSERT INTO game (gameTest) VALUES ('".$localTeam."')");
  }

  // if($_POST['action']=="insertMatch")
  // {
  //   $leagueSelected = $_POST['leagueNameSelect'];
  //   $localTeam      = $_POST['localTeam'];
  //   $localGoal      = $_POST['localGoals'];
  //   $localExp       = $_POST['localExp'];
  //   $visitorTeam    = $_POST['visitorTeam'];
  //   $visitorGoal    = $_POST['visitorGoals'];
  //   $visitorExp     = $_POST['visitorExp'];
  //
  //   // echo "'".$leagueSelected."','".$localTeam."','".$localGoal."','".$localExp."','".$visitorTeam."','".$visitorGoal."','".$visitorExp."'";
  // //
  // // $queryInsertMatch = execQuery("INSERT INTO match (league_id, localTeam, localGoals, localExp, visitorTeam, visitorGoals, visitorExp)
  // //   VALUES ('".$leagueSelected."','".$localTeam."','".$localGoal."','".$localExp."','".$visitorTeam."','".$visitorGoal."','".$visitorExp."')");
  //
  //   execQuery("INSERT INTO league (leagueName) VALUES ('".$localTeam."')");
  //
  // }



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
    <div class="container phpTest">
      <!-- <?php //echo "'".$leagueSelected."','".$localTeam."','".$localGoal."','".$localExp."','".$visitorTeam."','".$visitorGoal."','".$visitorExp."'";
      ?> -->

    </div>
    <div class="mainWrapper">
      <?php include('../../../files/includes/inc.web.nav.php'); ?> <!-- Navegation -->
      <div class="container flexAllCenter">
        <div class="title">
          <h1>LA LIGA !</h1>
        </div>
      </div>
      <div class="container">
        <div class="row partidoyTabla">
          <div class="col-md-4 col-xs-12 ligaWelcome">
            <div class="container transContainer ligaWelcomeInner">
              <h3>Creaci&oacute;n de Liga</h3>
              <p>Metele un nombre, pap&aacute;</p>
              <form class="" action="liga.php" method="post" class="form-horizontal addAndCloseLeague">
                <input type="text" name="leagueName" class="form-control" placeholder="Nombre de Liga">
                <input type="hidden" name="action" id="action" value="createLeague"/>
                <button type="submit" name="button" class="btn mainBtn">Crear</button>
              </form>
            </div>
          </div>
          <!-- Match -->
          <div class="col-md-8 ligaPartido">
            <div class="container transContainer ligaPartidoInner">
              <form method="post" class="form-horizontal">
                <div class="col-md-12 leagueSelector">
                  <div class="col-md-6 leagueSelectorTitle">
                    <p>Seleccione una liga <i class="fa fa-angle-double-right"></i></p>
                  </div>
                  <!-- League Name -->
                  <div class="col-md-6">
                    <?php
                    echo '<select class="form-control" name="leagueNameSelect" id="leagueNameSelect">';
                    echo '<option>Nombre de Liga...</option>';
                    foreach($LeagueName as $DBLeagueName)
                    { echo '<option id="'.$DBLeagueName['league_name'].'" name="'.$DBLeagueName['league_id'].'" value="'.$DBLeagueName['league_id'].'" >'.$DBLeagueName['league_name'].'</option>'; } ?>
                    </select>
                  </div>
                </div>
                <!-- /// LOCAL /// -->
                <div class="col-md-6 col-xs-12">
                  <!-- Local Team -->
                  <div class="col-md-8">
                    <?php
                    echo '<select class="form-control localSelection" name="localTeam" id="localTeam">';
                    foreach($Team as $DBTeam)
                    { echo '<option id="'.$DBTeam['team_name'].'" name"'.$DBTeam['team_name'].'" value="'.$DBTeam['team_name'].'" >'.strtoupper($DBTeam['team_name']).'</option>'; } ?>
                    </select>
                  </div>
                  <!-- Local Goals -->
                  <div class="col-md-4 col-xs-3">
                    <input name="localGoals" class="form-control" placeholder="Goles" type="number" min="0">
                  </div>
                  <!-- Local Exp -->
                  <div class="col-md-12 col-xs-9 transInput partidoExpulsados">
                    <input name="localExp" id="tags_1" type="text" class="tags" value="" />
                    <label>Expulsados Locales</label>
                  </div>
                </div>
                <!-- /// VISITOR /// -->
                <div class="col-md-6 col-xs-12">
                  <!-- Visitor Team -->
                  <div class="col-md-8">
                    <?php
                    echo '<select name="visitorTeam" class="form-control localSelection" id="select">';
                    foreach($Team as $DBTeam)
                    { echo '<option id="'.$DBTeam['team_name'].'" name"'.$DBTeam['team_name'].'" value="'.$DBTeam['team_name'].'" >'.strtoupper($DBTeam['team_name']).'</option>'; } ?>
                     ?>
                    </select>
                  </div>
                  <!-- Visitor Goals -->
                  <div class="col-md-4 col-xs-3">
                    <input name="visitorGoals" class="form-control" placeholder="Goles" type="number" min="0">
                  </div>
                  <!-- Visitor Exp -->
                  <div class="col-md-12 col-xs-9 transInput partidoExpulsados">
                    <input name="visitorExp" id="tags_2" type="text" class="tags" value="" />
                    <label>Expulsados Visitantes</label>
                  </div>
                </div>
                <div class="col-md-12">
                  <input type="hidden" name="action" id="action" value="insertMatch"/>
                  <button type="submit" class="btn mainBtn">Fin del Partido</button>
                </div>
              </form>
            </div>
          </div><!-- / Match -->
        </div><!-- /1st Row -->
      </div><!-- /Container -->

      <div class="container">
        <div class="row">
          <div class="col-md-8 col-xs-12 ligaPartido">
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
