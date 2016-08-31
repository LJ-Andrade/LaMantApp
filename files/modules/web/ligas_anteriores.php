<?php
  include('conection.php');
  checkUser();
  include('config.php');

  $leagueID = $_GET['id'];

  // Select Queries
  $Leagues = fetchAssoc("SELECT * FROM league");
  $Matches = fetchAssoc("SELECT * FROM game WHERE league_id = '$leagueID'");

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
      <!-- Select New league or Continue League -->
      <div class="container animated fadeIn">
        <div class="row">
          <div class="trans-container flexAllCenter">
            <!-- Continue -->
            <form id="continueLeagueForm" class="form-horizontal blackTransForm animated fadeIn" action="ligas_anteriores.php" method="get">
              <label class="i-title">Que liga quer&eacute;s ver?</label>
              <label class="i-title"></label>
                <?php
                  echo '<select id="id" name="id" class="form-control localSelection">';
                foreach ($Leagues as $DBLeagues){
                  echo '<option value="'.$DBLeagues['league_id'].'">'.$DBLeagues['league_name'].'</option>';
                }  ?>
              </select><br>
              <input type="hidden" name="action" id="action" value="ls"/>
              <button type="submit" class="btn mainBtn"><i class="fa fa-check"></i> Continuar</button>
            </form>
          </div>
        </div>
      </div>
      <!-- /Select New league or Continue League -->
      <!-- Show Matches -->
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
          <!-- Show Matches -->
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

    </div><!-- /Wrapper -->
    <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
    <script type="text/javascript">
    </script>
  </body>
</html>
