<?php
  include('conection.php');
  checkUser();
  include('config.php');

  // Insert User
  if($_POST['action']=='insert')
  {
    execQuery("INSERT INTO user (user,password,name,status) VALUES ('".$_POST['user']."','".$_POST['password']."','".$_POST['name']."','".$_POST['status']."')");
    header('Location: adminPanel.php');
  }

// Insert Quote
  if($_POST['action']=="frase")
  {
    $frase     = $_POST['frase'];
    execQuery("INSERT INTO frase (frase) VALUES ('".$frase."')");
    // echo '<script>alertaOK();</script>';
    header('Location: adminPanel.php');
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
    <div class="mainWrapper">
      <header>
        <div class="mainTitle titW">
          <h1>Administración</h1>
          <h4>Administrador actual: <?php echo strtoupper($_SESSION['user']); ?></h4>
        </div>
      </header>
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
        <div class="teamList col-md-6">
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
        <div class="container col-md-6 teamList">
          <h4>Frase del Día</h4>
          <div class="container teamsForm">
            <form id="TeamsForm" action="adminPanel.php" method="post">
              <div class="row col-md-12 addUsers">
                <input type="hidden" name="action" value="frase">
                <textarea class="form-control" rows="5" id="comment" name="frase" value="frase" placeholder="Manda magia papa"></textarea>
                </div>
              </div>
              <button type="submit" name="insert" value="insert data" class="btn btn-info addTeamBtn"> Agregar</button>
            </form>
          </div>
          <br><br><br><br>
        </div>
    <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    </div><!-- /Wrapper -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->

    <script type="text/javascript">
    function alertaOK() {


                  $.notify({
                    // options
                    title: 'Frase Agregada !',

                  },{
                    // settings
                    type: "danger",
                    allow_dismiss: true,
                    placement: {
                      from: "bottom",
                      align: "center"
                    },
                    offset: 200,
                    spacing: 10,
                    z_index: 1031,
                    delay: 5000,
                    timer: 1000,
                    animate: {
                      enter: 'animated fadeInDown',
                      exit: 'animated fadeOutUp'
                    },
                    icon_type:'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0} alertMWelcome" role="alert">' +
                    '<span class="closeX" data-notify="dismiss"><i class="fa fa-times"></i></span>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<div class="progress" data-notify="progressbar">' +
                    '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
                  });
    }

    </script>
  </body>
</html>
