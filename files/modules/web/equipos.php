<?php
  include('conection.php');
  checkUser();
  include('config.php');

  if($_POST['action']=="insert")
  {
    $team_name     = $_POST['team_name'];
    $user_id       = $_POST['user_id'];
    $national_team = $_POST['national_team'];
    $club          = $_POST['club'];

    execQuery("INSERT INTO team (user_id,team_name,national_team,club) VALUES ('".$user_id."','".$team_name."','".$national_team."','".$club."')");
  }

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
      <div class="mainTitle titW"><h1>Equipos</h1></div>
        <!-- /Page Header -->
    </header>
    <div class="mainWrapper">

      <!-- Muestra equipos -->
      <div class="container transContainer">
        <div class="teamList">
          <div class="row">
            <div class="col-md-2"><b>Nombre</b></div>
            <div class="col-md-3"><b>DT</b></div>
            <div class="col-md-2"><b>Selección</b></div>
            <div class="col-md-2"><b>Club</b></div>
            <div class="col-md-3"><b>Títulos</b></div>
          </div>
          <?php
            // $Teams = fetchAssoc("SELECT * FROM team");
            // foreach($Teams as $team){

          $Teams = fetchAssoc("SELECT * FROM team JOIN user on team.user_id = user.user_id");

             foreach($Teams as $team)
            {
            ?>
          <div class="row">
            <div class="col-md-2"><?php echo $team['team_name']; ?></div>
            <div class="col-md-3"><?php echo strtoupper($team['user']); ?></div>
            <div class="col-md-2"><?php echo $team['national_team']; ?></div>
            <div class="col-md-2"><?php echo $team['club']; ?></div>
            <div class="col-md-3"></div>
          </div>
          <?php
            };
          ?>
        </div>
      </div>
      <div class="container transContainer">
        <div class="teamList">
          <h4>Insertar equipo</h4>
          <div class="container teamsForm">
            <form id="TeamsForm" method="post">
              <div class="row col-md-12 addTeams">
                <input required name="team_name" placeholder="Nombre de Equipo"/><br>
                <div class="teamSelect">
                  <span>T&eacute;cnico: </span>
                  <div class="styled-select">
                    <?php
                    echo '<select class="" name="user_id" id="user_id">';
                    $Users = fetchAssoc("SELECT * FROM user");
                    foreach($Users as $DBUser)
                    { echo '<option id="'.$DBUser['user_id'].'" value="'.$DBUser['user_id'].'" >'.strtoupper($DBUser['user']).'</option>'; } ?>
                    </select>
                  </div>
                </div>
                <input required name="national_team" placeholder="Selecci&oacute;n"/>
                <input required name="club" placeholder="1er Club"/>
                <input type="hidden" name="action" id="action" value="insert"/>
              </div>
              <button type="submit" name="insertar" value="Ingresar" class="btn btn-info addTeamBtn"><i class="fa fa-hand-peace-o"></i> Anotar</button>
            </form>
          </div>
        </div>
      </div>
    </div><!-- /Wrapper -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
  </body>
</html>
