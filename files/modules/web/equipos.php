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
      <div class="mainTitle titW"><h1>Equipos</h1></div>
        <!-- /Page Header -->
    </header>
    <div class="mainWrapper">

      <!-- Muestra equipos -->
      <div class="container transContainer">
        <div class="teamList">
          <h4>Equipos Activos</h4>
          <div class="row">
            <div class="col-md-2">Nombre</div>
            <div class="col-md-3">DT</div>
            <div class="col-md-1">Selección</div>
            <div class="col-md-3">Club</div>
            <div class="col-md-3">Títulos</div>
          </div>
          <?php
            $Teams = fetchAssoc("SELECT * FROM team");
            foreach($Teams as $team){
          ?>
          <div class="row">
            <div class="col-md-2"><?php echo $team['team_name']; ?></div>
            <div class="col-md-3"><?php echo $team['user_id']; ?></div>
            <div class="col-md-1"><?php echo $team['national_team']; ?></div>
            <div class="col-md-3"><?php echo $team['club']; ?></div>
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
            <form id="TeamsForm" action="" method="post">
              <div class="row col-md-12 addTeams">
                <input required name="team_name[]" placeholder="Equipo"/>
                <h5>D.T.</h5>
                  <?php
                  echo '<select class="" name="user_id[]">';
                  $Users = fetchAssoc("SELECT * FROM user");
                  foreach($Users as $DBUser)
                  { echo '<option id="'.$DBUser['user_id'].'" >'.$DBUser['user'].'
                          </option>'; } ?>
                </select>
                <input required name="national_team[]" placeholder="Selecci&oacute;n"/>
                <input required name="club[]" placeholder="1er Club"/>
              </div>
              <button type="submit" name="insertar" value="Ingresar" class="btn btn-info addTeamBtn"><i class="fa fa-hand-peace-o"></i> Anotar</button>
            </form>
          </div>
        </div>
      </div>
      <?php
      if(isset($_POST['insertar']))
      {
      $team_name     = ($_POST['team_name']);
      $user_id       = ($_POST['user_id']);
      $national_team = ($_POST['national_team']);
      $club          = ($_POST['club']);

      $team1field = current($team_name);
      $team2field = current($user_id);
      $team3field = current($national_team);
      $team4field = current($club);
      $userId = fetchAssoc("SELECT user_id FROM user WHERE user = '$team2field'");
      // var_dump($userId);
      
}
      // $con    = mysqli_connect($host, $user, $password, $database);
      // $query  = "SELECT user_id FROM user WHERE user = jav";
      // $result = mysqli_query($con, $query);
      //
      // var_dump($result['user_id'])
      // $row = mysqli_fetch_array($result, MYSQLI_BOTH);
      // printf ($row['user_id']);
      // echo  $team1field;
      // // echo  $team2field;
      // echo  $team3field;
      // echo  $team4field;
      // echo $teamToInsertion;

      // execQuery("INSERT INTO team (team_name,user_id,national_team,club) VALUES $teamToInsertion")

      ?>


    </div><!-- /Wrapper -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
  </body>
</html>
