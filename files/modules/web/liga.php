<?php
  include('conection.php');
  checkUser();
  include('config.php');

  // Select Queries
  $Leagues = fetchAssoc("SELECT * FROM league");
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
            <!-- Create Or Continue -->
            <button id="createLeagueBtn" type="button" class="btn mainBtn btnIsolate animated fadeIn"><i class="fa fa-plus"></i> Crear Nueva Liga</button>
            <button id="continueLeagueBtn" type="button" class="btn mainBtn btnIsolate animated fadeIn"><i class="fa fa-refresh"></i> Continuar Liga</button>
            <!-- /Create Or Continue -->
            <!-- Create -->
            <form id="createLeagueForm" class="blackTransForm Hidden animated fadeIn" action="liga_actual.php" method="post" class="form-horizontal addAndCloseLeague">
              <div class="closeForm"><i class="fa fa-times"></i></div>
              <label class="i-title">Creaci&oacute;n de Liga</label>
              <input type="text" name="leagueName" required="" class="form-control" placeholder="Nombre de Liga">
              <input type="hidden" name="action" id="action" value="createLeague"/>
              <button type="submit" name="button" class="btn mainBtn"><i class="fa fa-check"></i> Crear</button>
            </form>
            <!-- Continue -->
            <form id="continueLeagueForm" class="form-horizontal blackTransForm Hidden animated fadeIn" action="liga_actual.php" method="get">
              <div class="closeForm"><i class="fa fa-times"></i></div>
              <label class="i-title">Seleccion&aacute; la liga que quer&eacute;s continuar</label>
                <?php
                  echo '<select id="id" name="id" class="form-control localSelection" >';
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

    </div><!-- /Wrapper -->
    <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
    <script type="text/javascript">
    alertMe("?msg=leagueCreated", "Liga Creada", "fa fa-check" );
    alertMe("?msg=matchOver", "Partido Anotado!", "fa fa-check" );
    alertMe("?msg=sameTeam", "No puede jugar contra si mismo!", "fa fa-ban" );
    </script>
  </body>
</html>
