<?php
  include('conection.php');
  checkUser();
  include('config.php');

  // Select Queries
  $Team = fetchAssoc("SELECT * FROM team");


  if($_POST['action']=="createLeague")
  {
    $leagueName = $_POST['leagueName'];
    execQuery("INSERT INTO league (league_name) VALUES ('".$leagueName."')");
    header('Location: liga.php?msg=leagueCreated');
    die();
  };

  if($_POST['action']=="insertMatch")
  {
    $leagueSelected = $_POST['leagueNameSelect'];
    $localTeam      = $_POST['localTeam'];
    $localGoal      = $_POST['localGoals'];
    $localExp       = $_POST['localExp'];
    $visitorTeam    = $_POST['visitorTeam'];
    $visitorGoal    = $_POST['visitorGoals'];
    $visitorExp     = $_POST['visitorExp'];

    if ($localTeam == $visitorTeam) {
      echo '<p style="text-align: center; color: #fff">No puede jugar contra si mismo</p>';
    }
    else {
  $queryInsertMatch = execQuery("INSERT INTO game (league_id, localTeam, localGoals, localExp, visitorTeam, visitorGoals, visitorExp)
    VALUES ('".$leagueSelected."','".$localTeam."','".$localGoal."','".$localExp."','".$visitorTeam."','".$visitorGoal."','".$visitorExp."')");
    header('Location: liga.php?msg=matchOver');
    die();
    }
  };
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
    <!-- PHP TEST -->
    <!-- <div class="container phpTest">
     <?php  //echo "'".$leagueSelected."','".$localTeam."','".$localGoal."','".$localExp."','".$visitorTeam."','".$visitorGoal."','".$visitorExp."'";
      ?>
    </div> -->
    <!-- PHP TEST -->
    <div class="mainWrapper">
      <?php include('../../../files/includes/inc.web.nav.php'); ?> <!-- Navegation -->
      <div class="container flexAllCenter">
        <div class="title">
          <h1>LA LIGA !</h1>
        </div>
      </div>
      <div class="container">
        <div class="row leagueRow">
          <div class="col-md-4 col-xs-12 leagueItem">
            <div class="container transContainer leagueItemInner">
              <h3>Creaci&oacute;n de Liga</h3>
              <form class="" action="liga.php" method="post" class="form-horizontal addAndCloseLeague">
                <input type="text" name="leagueName" class="form-control" placeholder="Nombre de Liga">
                <input type="hidden" name="action" id="action" value="createLeague"/>
                <button type="submit" name="button" class="btn mainBtn">Crear</button>
              </form>
            </div>
          </div>
          <!-- Match -->
          <div class="col-md-8 col-xs-12">
            <div class="container transContainer">
              <form method="post" class="form-horizontal">
                <div class="col-md-12 leagueSelector">
                  <?php
                    $actualLeagueID = fetchAssoc("SELECT league_id FROM league");

                    // Selecciona la última liga para mostrar resultados de partidos
                    $selectedLeague = maxValueInArray($actualLeagueID, "league_id");
                  ?>
                  <div class="col-md-12 col-sm-12 actualLeagueResults">
                    <?php
                      $actualLeagueName = fetchAssoc("SELECT * FROM league WHERE league_id = '$selectedLeague'");
                      $lastLeagueName = fetchAssoc("SELECT * FROM league ORDER BY league_id DESC LIMIT 0,1");
                       foreach($lastLeagueName as $DBlastLeagueName)
                       {
                         echo '<label for="leagueNameSelect" name="'.$selectedLeague.'"></label>
                         <input type="hidden" id="leagueNameSelect" name="leagueNameSelect"  value="'.$selectedLeague.'">Liga en curso: <b>'.$DBlastLeagueName['league_name'].'</b></input>';
                       }
                      ?>
                  </div>

                </div>
                <div class="playersInputs">
                  <!-- /// LOCAL /// -->
                  <div class="col-md-6 col-xs-12">
                    <!-- Local Team -->
                    <div class="col-md-8 col-xs-12">
                      <?php
                      echo '<select class="form-control localSelection" name="localTeam" id="localTeam">';
                      foreach($Team as $DBTeam)

                      { echo '<option id="'.$DBTeam['team_name'].'" name"'.$DBTeam['team_name'].'" value="'.$DBTeam['team_name'].'" >'.strtoupper($DBTeam['team_name']).'</option>'; } ?>
                      </select>
                    </div>
                    <!-- Local Goals -->
                    <div class="col-md-4 col-xs-12">
                      <input name="localGoals" class="form-control" placeholder="Goles" type="number" min="0">
                    </div>
                    <!-- Local Exp -->
                    <div class="col-md-12 col-xs-12 transInput partidoExpulsados">
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
                    <div class="col-md-4 col-xs-12">
                      <input name="visitorGoals" class="form-control" placeholder="Goles" type="number" min="0">
                    </div>
                    <!-- Visitor Exp -->
                    <div class="col-md-12 col-xs-12 transInput partidoExpulsados">
                      <input name="visitorExp" id="tags_2" type="text" class="tags" value="" />
                      <label>Expulsados Visitantes</label>
                    </div>
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
        <div class="row leagueRow">
          <div class="col-md-8 col-xs-12">
            <div class="container transContainer">
              <div class="row">
                <div class="col-md-12 col-sm-12">
                  <h2>RESULTADOS</h2>
                </div>
                <?php
                  // $actualLeagueID = fetchAssoc("SELECT league_id FROM game");
                  // // Selecciona la última liga para mostrar resultados de partidos
                  // $selectedLeague = maxValueInArray($actualLeagueID, "league_id");
                ?>
                <div class="col-md-12 col-sm-12 actualLeagueResults">
                  <?php
                    // $actualLeagueName = fetchAssoc("SELECT * FROM league WHERE league_id = '$selectedLeague'");
                    foreach($lastLeagueName as $DBlastLeagueName)
                    {
                      echo '<label name="leagueNameSelect" value="'.$selectedLeague.'">Liga: <b>'.$DBlastLeagueName['league_name'].'</b></label>';
                    }
                    ?>
                </div>
              </div>
              <?php
              $GameResults = fetchAssoc("SELECT * FROM game WHERE league_id = '$selectedLeague'");
               foreach($GameResults as $DBGameResults)
               {
                 ?>
              <div class="row gamesResultsRow">
                <div class="col-md-5 txR"><?php echo $DBGameResults['localTeam'] ?></div>
                <div class="col-md-2"><span class="goals"><?php echo $DBGameResults['localGoals'].'&nbsp;-&nbsp;'.$DBGameResults['visitorGoals'] ?></span></div>
                <div class="col-md-5 txL"><?php echo $DBGameResults['visitorTeam'] ?></div>
              </div>
              <div class="row gamesResultsExp">
                <div class="col-md-6 gameResultsexpLocal">
                  <?php
                  if (empty($DBGameResults['localExp'])) {
                      echo '-';
                  }
                  else {
                    echo '<span>'.$DBGameResults['localExp'].'&nbsp;<img src="../../../skin/images/body/icons/redcard.png" alt="" /></span>';
                  };
                  ?>
                </div>
                <div class="col-md-6 gameResultsexpVisitor">
                  <?php
                  if (empty($DBGameResults['visitorExp'])) {
                      echo '-';
                  }
                  else {

                    echo '<span>'.$DBGameResults['visitorExp'].'&nbsp;<img src="../../../skin/images/body/icons/redcard.png" alt="" /></span>';
                  };
                  ?>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
          <div class="col-md-4 col-xs-12">
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
    <script type="text/javascript">
    // $(function () {
    //     $("#leagueNameSelect").on("change", function () {
    //         var text = $(this).find('option:selected').text();
    //         var value = $(this).val();
    //         // var string = 'Text: '+text+' - Value: '+value;
    //         var string = text;
    //         // var string = text
    //         $('#actualLeagueResults').text(string);
    //         $('#actualLeagueID').text(value)
    //     });
    // });
    //

    //
    // ?msg=leagueCreated
    // Bienvenido <?php  echo strtoupper($_SESSION['user']); ?> a La Manta App!!
    //

    alertMe("?msg=leagueCreated", "Liga Creada", "fa fa-check" );
    alertMe("?msg=matchOver", "Partido Anotado!", "fa fa-check" );





    </script>
  </body>
</html>
