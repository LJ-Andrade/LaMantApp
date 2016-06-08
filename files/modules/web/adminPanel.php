<?php
  include('conection.php');
  checkUser();
  include('config.php');

  // Insert User
  if($_POST['action']=='insert')
  {
    execQuery("INSERT INTO user (user,password,name,status) VALUES ('".$_POST['user']."','".$_POST['password']."','".$_POST['name']."','".$_POST['status']."')");

    //
    // $message= "INSERT INTO user (user,password,name,status) VALUES ('".$_POST['user']."','".$_POST['password']."','".$_POST['name']."','".$_POST['status']."')";
    // // $message = $_POST['user'];
    // echo $message;
    // echo "<script type='text/javascript'>alert('$message');</script>";

    // $message = $_POST['user'];
    // echo "<script type='text/javascript'>alert('$message');</script>";


    // $message = "'".$_POST['user']."','".$_POST['password'].','.$_POST['name'].','.$_POST['status'];
    // echo "<script type='text/javascript'>alert('$message');</script>";
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
      <div class="mainTitle titW">
        <h1>Administración</h1>
        <h4>Administrador actual: <?php echo strtoupper($_SESSION['user']); ?></h4>
      </div>
        <!-- /Page Header -->
    </header>
    <div class="mainWrapper">
      <!-- Muestra equipos -->
      <div class="container transContainer">
        <div class="teamList">
          <h4>Usuarios Activos</h4>
          <div class="row">
            <div class="col-md-2 txL"><b>Usuario</b></div>
            <div class="col-md-3 txL"><b>Nombre</b></div>
            <div class="col-md-3 txL"><b>Permisos</b></div>
            <div class="col-md-2 txR"><b>Creado el</b></div>
            <div class="col-md-2 txR"><b>Última Conexión</b></div>
          </div>
          <?php
            $Users = fetchAssoc("SELECT * FROM user");
            foreach($Users as $DBUser){
          ?>
          <div class="row">
            <div class="col-md-2 txL"><?php echo $DBUser['user']; ?></div>
            <div class="col-md-3 txL"><?php echo $DBUser['name']; ?></div>
            <div class="col-md-3 txL"><?php echo $DBUser['status']; ?></div>
            <div class="col-md-2 txR"><?php echo $DBUser['creation_date']; ?></div>
            <div class="col-md-2 txR"><?php echo $DBUser['last_login']; ?></div>
          </div>
          <?php
            }
          ?>
        </div>
      </div>

      <div class="container transContainer">
        <div class="teamList">
          <h4>Agregar Usuario</h4>
          <div class="container teamsForm">
            <form id="TeamsForm" action="adminPanel.php" method="post">
              <div class="row col-md-12 addUsers">
                <input type="hidden" name="action" value="insert">
                <input required name="user" placeholder="Nombre de Usuario"/><br>
                <input required name="name" placeholder="Nombre Real"/><br>
                <input required name="password" placeholder="Password"/><br>
                <span>Permisos</span>
                <div class="styled-select">
                  <select name="status">
                    <option value="0">0</option>
                    <option value="1">1</option>
                    <option value="2">2</option>
                  </select>
                </div>
              </div>
              <button type="submit" name="insert" value="insert data" class="btn btn-info addTeamBtn"><i class="fa fa-hand-peace-o"></i> Agregar</button>
            </form>
          </div>
        </div>
      </div>

     <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    </div><!-- /Wrapper -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
  </body>
</html>
