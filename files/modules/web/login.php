<?php
  if($_GET['msg']=='error')
    echo 'Le pifiaste amego';
  if($_GET['msg']=='notvalid')
    echo 'No pode entrar ahi ameo';
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
  <body class="loginScreen">
    <?php //include('../../../files/includes/inc.web.nav.php'); ?>
    <div class="mainWrapper">
      <div id="mainLogin">
        <form action="processLogin.php" method="POST">
          <h1>La Manta App</h1>
          <p>Despleg&aacute; la manta del poder</p>
          <hr>
          <div class="loginRow">
            <i class="fa fa-user"></i>
            <input type="text" name="user" id="user" placeholder="Usuario"/>
          </div>
          <div class="loginRow">
            <i class="fa fa-lock"></i>
            <input type="password" name="password" id="password"  placeholder="Password"/>
          </div><br>
          <button type="submit" value="Enviar"/>Ingresar</button>
        </form>
      </div>
    </div>
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
  </body>
</html>
