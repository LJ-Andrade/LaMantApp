<?php
  include('conection.php');
  checkUser();
  include('constant.php');

  //
  // if($_GET['action']=='create')
  // {
  //   execQuery("INSERT INTO user (user,password,name)VALUES('".$_GET['user']."','1212','pepe')");
  //   echo $_GET['user']." ha sido creado";
  // }
  //
  // if($_POST['action']=='insert')
  // {
  //   execQuery("INSERT INTO user (user,password)VALUES('".$_POST['user']."','".$_POST['password']."')");
  //   echo $_POST['user']." ha sido creado";
  // }
  //
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
    <?php include('../../../files/includes/inc.web.nav.php'); ?> <!-- Navegation -->
    <div class="welcome">
      <h3>Bienvenido <?php echo strtoupper($_SESSION['user'])?></h3>
      <h2>A <?php echo APP_TITLE?></h2>
      <?php
      $user = $_SESSION['user'];
      if($user == jav) {
      echo 'Hola padre, tomá: <a class="nav-link" href="styletest.php">Test </a>';
      };
      ?>
      </br></br>
      <?php
        $con = connect();
        $users = $con->query("SELECT * FROM user;");

        while ($mostrarDatos = $users->fetch_array(MYSQLI_BOTH))
           {
           echo'<div class="col-md-12 listTeams">
                <div class="col-md-3 col-sm-6">'.$mostrarDatos['user'].'</div>
                <div class="col-md-3 col-sm-6">'.$mostrarDatos['password'].'</div>
                <div class="col-md-3 col-sm-6">'.$mostrarDatos['creation_date'].'</div>

                </div>';
           }


        // if(count($Cant)>0)
        // {
        //   echo $Cant['user'];
        // }else{
        //   echo 'error';
        // }

      // $con = connect(); // Hace la conexión (viene de conection.php)
      // $resultado = mysqli_query($con, "SELECT * FROM user");
      // $fila      = mysqli_fetch_assoc($resultado);
      // echo $fila['password'].' , '.$fila['user']; // test




      ?>
    </div>


    <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
    <?php $con->close(); ?>
  </body>
</html>
