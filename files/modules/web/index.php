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
  <body class="index">
    <div class="mainWrapper brd">
    <?php include('../../../files/includes/inc.web.nav.php'); ?> <!-- Navegation -->
      <!-- <div class="contentWrapper"> -->

          <div class="container mainMenuHome">
            <div class="mainMenuHomeInner">
              <div class="col-md-6 col-sm-6">
                <div class="homeMenuTitle">
                  <h1>Liga</h1>
                </div>
                <div class="homeMenuImg">
                  <a href="liga.php"><img src="../../../skin/images/body/menu/ligadiaria.jpg" alt="" class="animated fadeIn" /></a>
                </div>
              </div>
              <div  class="col-md-6 col-sm-6">
                <div class="homeMenuTitle">
                  <h1>Champion</h1>
                </div>
                <div id="test" class="homeMenuImg">
                  <a href="#"><img src="../../../skin/images/body/menu/mantis.jpg" alt="" class="animated fadeIn" />
                </div>
              </div>
              <div  class="col-md-6 col-sm-6">
                <div class="homeMenuTitle">
                  <h1>Títulos</h1>
                </div>
                <div class="homeMenuImg">
                  <a  href="premios.php"><img src="../../../skin/images/body/menu/premios.jpg" alt="" class="animated fadeIn" />
                </div>
              </div>
              <div class="col-md-6 col-sm-6">
                <div class="homeMenuTitle">
                  <h1>Estad&iacute;sticas</h1>
                </div>
                <div class="homeMenuImg">
                  <a href="estadist.php"><img src="../../../skin/images/body/menu/estadist.jpg" alt="" class="animated fadeIn" />
                </div>
              </div>
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
      <!-- </div> --><!-- /contentWrapper -->
      <?php include('../../includes/inc.web.footer.php'); ?> <!-- Footer -->
    </div>
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
    <script type="text/javascript">
      var url = window.location.href;
      if(url.indexOf('?msg=logOk') != -1) {
        $.notify({
          // options
          icon: 'fa fa-futbol-o',
          title: 'Bienvenido <?php echo strtoupper($_SESSION['user']); ?> a La Manta App!!',

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
