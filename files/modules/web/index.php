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
  <body>
    <div class="mainWrapper">
    <?php include('../../../files/includes/inc.web.nav.php'); ?> <!-- Navegation -->
      <!-- <div class="contentWrapper"> -->
      <div class="container flexAllCenter">
        <div class="title">
          <p>Bienvenidos a</p>
          <h1>LA MANTA APP !!</h1>
        </div>
      </div>
      <div class="container mainMenuHome">
        <div class="col-md-6">
          <div class="mainMenuItems">
            <ul>
              <a href="liga.php"><li class="menu1"><i class="fa fa-wheelchair"></i> Liga</li></a>
              <a href="mantis.php"><li class="menu2"><i class="fa fa-trophy"></i> Mantis</li></a>
              <a href="titulos.php"><li class="menu3"><i class="fa fa-shopping-cart"></i> T&iacute;tulos</li></a>
              <a href="estadist.php"><li class="menu4"><i class="fa fa-bar-chart"></i> Estad&iacute;sticas</li></a>
            </ul>
          </div>
        </div>
        <div class="col-md-6 mainMenuImgs">
          <img id="menuImg" src="../../../skin/images/body/menu/main.jpg" alt="" class="animated fadeIn" />
        </div>
      </div>
      <!-- Modal -->
      <div id="myModal" class="modal fade bd-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-sm">
          <div class="modal-content">
            ...
          </div>
        </div>
      </div>
      <!-- Modal -->
      <div class="container randomQuote">
        <?php


               echo '<div>';
              $frase = fetchAssoc("SELECT frase FROM frase ORDER BY RAND() limit 0,1");
               foreach($frase as $DBfrase)
               { echo $DBfrase['frase']; };
               echo '</div>';
               ?>

      </div>
      <!-- </div> --><!-- /contentWrapper -->
    </div>
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
    <script type="text/javascript">
      var url = window.location.href;
      if(url.indexOf('?msg=logOk') != -1) {
        $.notify({
          // options
          icon: 'fa fa-futbol-o',
          title: 'Bienvenido <?php  echo strtoupper($_SESSION['user']); ?> a La Manta App!!',

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

    ////////////////////////////////

    function hoverMenu() {
      $('.menu1').mouseover(function() {
        $('#menuImg').attr('src','../../../skin/images/body/menu/ligadiaria.jpg');
      });
      $('.menu2').mouseover(function() {
        $('#menuImg').attr('src','../../../skin/images/body/menu/mantis.jpg');
      });
      $('.menu3').mouseover(function() {
        $('#menuImg').attr('src','../../../skin/images/body/menu/premios.jpg');
      });
      $('.menu4').mouseover(function() {
        $('#menuImg').attr('src','../../../skin/images/body/menu/estadist.jpg');
      });
      $('.menu1, .menu2, .menu3, .menu4').mouseout(function(){
        $('#menuImg').attr('src','../../../skin/images/body/menu/main.jpg');
      });
    }
    hoverMenu();
    </script>
    <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
  </body>
</html>
