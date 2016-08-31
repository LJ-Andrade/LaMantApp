<?php
  include('conection.php');
  checkUser();
  include('config.php');

  // Select Queries

  $actualLeagueID = fetchAssoc("SELECT league_id FROM league");

  $actualLeagueName = fetchAssoc("SELECT * FROM league WHERE league_id = '$selectedLeague'");
  $lastLeagueName = fetchAssoc("SELECT * FROM league ORDER BY league_id DESC LIMIT 0,1");

  // Selecciona la última liga para mostrar resultados de partidos
  $selectedLeague = maxValueInArray($actualLeagueID, "league_id");

  if($_POST['action']=="leagueselected") {
    $league_name = $_POST['selectedleague'];
    echo $league_name;
  };
  $leagues = fetchAssoc("SELECT * FROM league");
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
    <div class="mainWrapper">
      <?php include('../../../files/includes/inc.web.nav.php'); ?> <!-- Navegation -->
      <div class="container flexAllCenter">
        <div class="title">
          <h1>Ligas Anteriores</h1>

        </div>
      </div>
      <div class="container">
        <div class="row leagueRow2 transContainer">
          <div class="">
            <div class="col-md-12 col-xs-12 leagueItem selectALeague">
              <div class="container leagueItemInner">
                <h3>Seleccione una liga</h3>
                <?php echo $league_name;  ?>
                <br>
                <form class="" action="mantis.php" method="get">
                  <div class="form-group">
                    <?php
                    echo '<select id="id" name="id" class="form-control">';
                    foreach ($leagues as $leagueRow) {
                      echo $leagueRow['league_name'];
                      echo '<option value="'.$leagueRow['league_id'].'">'.$leagueRow['league_name'].'</option>';
                      }
                    ?>
                    </select>
                    <input type="hidden" name="action" id="action" value="leagueselected"/>
                    <br>
                    <button type="submit" class="btn mainBtn">Mostrar Resultados</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          <!-- Match -->

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
