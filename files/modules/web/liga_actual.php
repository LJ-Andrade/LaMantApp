<?php
  include('conection.php');
  checkUser();
  include('config.php');

  $leagueID = $_GET['id'];



  // Select Queries
  $Team = fetchAssoc("SELECT * FROM team");
  $Leagues = fetchAssoc("SELECT * FROM league");
  $Matches = fetchAssoc("SELECT * FROM game WHERE league_id = '$leagueID'");
  $actualLeague = fetchAssoc("SELECT * FROM league WHERE league_id = '$leagueID'");
  $leagueID = $actualLeague[0]['league_id'];
  $leagueName = $actualLeague[0]['league_name'];
  // League name: $actualLeague[0]['league_name'];


  if($_POST['action']=="createLeague")
  {
    $NewleagueName = $_POST['leagueName'];
    execQuery("INSERT INTO league (league_name) VALUES ('".$NewleagueName."')");
    $lastLeague = fetchAssoc("SELECT * FROM league ORDER BY league_id DESC LIMIT 0,1");
    $lastLeagueID = $lastLeague[0]['league_id'];
    header('Location: liga_actual.php?id='.$lastLeagueID.'&msg=leagueCreated');
    die();
  };
  if($_POST['action']=="insertMatch")
  {
    // $leagueSelected = $_POST['leagueNameSelect'];
    $localTeam      = $_POST['localTeam'];
    $localGoal      = $_POST['localGoals'];
    $localExp       = $_POST['localExp'];
    $visitorTeam    = $_POST['visitorTeam'];
    $visitorGoal    = $_POST['visitorGoals'];
    $visitorExp     = $_POST['visitorExp'];

    if ($localTeam == $visitorTeam ) {
        header('Location: liga_actual.php?msg=sameTeam');
       //<p style="text-align: center; color: #fff">No puede jugar contra si mismo</p>';
    }
    else {
  $queryInsertMatch = execQuery("INSERT INTO game (league_id, localTeam, localGoals, localExp, visitorTeam, visitorGoals, visitorExp)
    VALUES ('".$leagueID."','".$localTeam."','".$localGoal."','".$localExp."','".$visitorTeam."','".$visitorGoal."','".$visitorExp."')");
    header('Location: liga_actual.php?id='.$leagueID.'&msg=matchOver');
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
  <body class="blackBack">
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
      <!-- League Container -->
      <div class="container animated fadeIn">
        <div class="row trans-container whiteContainer">
          <!-- Match Creator -->
          <form method="post" class="form-horizontal">
            <div class="col-md-12 greyTitle">
              <?php
                 echo '<span>Liga en curso: <b>'.$leagueName.'</b></span>' ;
              ?>
            </div>
            <div class="playersInputs">
              <!-- /// LOCAL /// -->
              <div class="col-md-6 col-xs-12">
                <!-- Local Team -->
                <div class="col-md-8 col-xs-12">
                  <?php
                  echo '<select class="form-control localSelection" name="localTeam" id="localTeam">';
                  echo '<option disabled selected required="">Seleccion&aacute;r Local...</option>';
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
                  echo '<option disabled selected required="">Seleccion&aacute; Visitante...</option>';
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
          </form><!-- Match Creator -->
        </div>
      </div>
      <!-- /League Container -->

      <!-- ////////// OK ////////////// -->

      <div class="container animated fadeIn">
        <div class="row whiteContainer">
          <div class="col-md-8 col-xs-12">
            <h2 class="txC">RESULTADOS</h2>
            <div class="table-responsive resultsTable">
              <table class="table">
                <thead>
                  <tr  class="txC">
                    <th>Local</th>
                    <th class="leagueResultTd">Vs.</th>
                    <th>Visitante</th>
                  </tr>
                </thead>
                <?php
                // Printing Match
                foreach ($Matches as $DBMatch) {
                ?>
                     <tbody>
                       <!-- Results (Goals) -->
                      <tr>
                        <td><?php echo $DBMatch['localTeam'] ?></td>
                        <td class="leagueResultTd"><?php echo $DBMatch['localGoals'].'-'.$DBMatch['visitorGoals']; ?></td>
                        <td><?php echo $DBMatch['visitorTeam'] ?></td>
                      </tr>
                      <tr>
                        <!-- Expelled Players -->
                        <td>
                          <?php
                          if (empty($DBMatch['localExp'] )) {
                              echo '-';
                          }
                          else {
                            echo '<span>'.$DBMatch['localExp'].'&nbsp;<img src="../../../skin/images/body/icons/redcard.png" alt="" class="miniRedCard" /></span>';
                          }; ?>
                        </td>
                        <td>Exp.</td>
                        <td><?php
                        if (empty($DBMatch['visitorExp'] )) {
                            echo '-';
                        }
                        else {
                          echo '<span>'.$DBMatch['visitorExp'].'&nbsp;<img src="../../../skin/images/body/icons/redcard.png" alt="" class="miniRedCard" /></span>';
                        }; ?></td>
                        </tr>
                      </tbody>
                <?php
                  }

                 ?>

              </table>
            </div>


          </div><!-- /col-md-8 -->
          <!-- Positions -->
          <div class="col-md-4 col-xs-12 ">
            <h2>POSICIONES</h2>
            <hr>
            <ul>
              <li>Posicion 1</li>
              <li>Posicion 2</li>
              <li>Posicion 3</li>
              <li>Posicion 4</li>
            </ul>
          </div><!-- /col-md-4 -->
          <!-- Positions -->
        </div><!-- /whiteContainer -->
      </div>




    <!-- //////////////////////////// -->


    </div><!-- /Wrapper -->
    <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->

    <script type="text/javascript">

    alertMe("&msg=leagueCreated", "Liga Creada", "fa fa-check" );
    alertMe("&msg=matchOver", "Partido Anotado!", "fa fa-check" );
    alertMe("?msg=sameTeam", "No puede jugar contra si mismo!", "fa fa-ban" );
    alertMe("?msg=selectTeam", "Te olvidaste de seleccionar un equipo capo!", "fa fa-ban" );


    </script>
  </body>
</html>
