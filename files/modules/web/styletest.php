<?php
  include('conection.php');
  checkUser();
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
    <!-- Muestra los equipos -->
    <!-- Ejemplos

    <a href="index.php?action=create&user=pepe">Crear usuario PEPE </a>

     -->

    <div class="container welcome">

      Bienvenido <?php echo $_SESSION['user']; ?>

      <h1>Prueba de Texto</h1>
      <h2>Prueba de Texto</h2>
      <h3>Prueba de Texto</h3>
      <h4>Prueba de Texto</h4>
      <h5>Prueba de Texto</h5>
      <p>Párrafo</p>
      <!-- <br><br><br><br>CREA TU USUARIO GUACHIN...
      <form action="" method="POST">
        <input type="hidden" name="action" id="action" value="insert"/>
        <label>Usuario: </label>
        <input type="text" name="user" id="user"/><br>
        <label>Contraseña: </label>
        <input type="password" name="password" id="password"/><br><br>
        <input type="submit" value="Enviar"/>
      </form> -->

    </div>

    <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
  </body>
</html>
