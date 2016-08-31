<?php
  session_start();

    if($_GET['msg']=='notvalid')
    echo 'ERROR PADRE';

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
    <div class="mainWrapper">
      <div id="mainLogin">
        <form id="loginForm" action="process-login.php"  onsubmit="return validateForm()" method="POST">
          <h1>La Manta App</h1>
          <p>Despleg&aacute; la manta del poder</p>
          <hr>
          <div class="loginRow">
            <i class="fa fa-user"></i>
            <input  id="user" type="text" name="user" placeholder="Usuario"/>
          </div>
          <div class="loginRow">
            <i class="fa fa-lock"></i>
            <input id="password" type="password" name="password" placeholder="Password"/>
          </div><br>
          <button type="submit" value="Enviar" onclick="verifyMail();"/>Ingresar</button>
        </form>
      </div>
    </div>
    <?php include('../../includes/inc.web.scripts.php'); ?> <!-- Scripts -->
    <script type="text/javascript">
    // Verify

    function validateForm() {
      var user = document.forms["loginForm"]["user"].value;
      var password = document.forms["loginForm"]["password"].value;

      // Usuario Vacio
      if (user == null || user == "") {
        $.notify({
          // options
          icon: 'fa fa-wheelchair',
          title: 'Tenés que colocar tu IUSER, Pa.',

          },{
            // settings
            type: "danger",
            placement: {
              from: "bottom",
              align: "center"
            },
            offset: 200,
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0} alertMError" role="alert">' +
                      '<span class="closeX" data-notify="dismiss"><i class="fa fa-times"></i></span>' +
                      '<span data-notify="icon"></span> ' +
                      '<span data-notify="title">{1}</span> ' +
                      '<div class="progress" data-notify="progressbar">' +
                      '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                      '</div>' +
                      '<a href="{3}" target="{4}" data-notify="url"></a>' +
                      '</div>'
              });
          return false;
      }
      // Password Vacio
      else if (password == null || password == "" ) {
        $.notify({
          // options
          icon: 'fa fa-wheelchair',
          title: 'Tenés que colocar tu PASGUOR, capo.',

          },{
            // settings
            type: "danger",
            placement: {
              from: "bottom",
              align: "center"
            },
            offset: 200,
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0} alertMError" role="alert">' +
                      '<span class="closeX" data-notify="dismiss"><i class="fa fa-times"></i></span>' +
                      '<span data-notify="icon"></span> ' +
                      '<span data-notify="title">{1}</span> ' +
                      '<div class="progress" data-notify="progressbar">' +
                      '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                      '</div>' +
                      '<a href="{3}" target="{4}" data-notify="url"></a>' +
                      '</div>'
              });
          return false;
      }
    }


    var url = window.location.href;
    if(url.indexOf('?msg=error') != -1) {
      $.notify({
      	// options
      	icon: 'fa fa-wheelchair',
      	title: 'Escribí bien paralítico',

        },{
        	// settings
        	type: "danger",
        	allow_dismiss: true,
        	placement: {
        		from: "top",
        		align: "center"
        	},
        	offset: 20,
        	spacing: 10,
        	z_index: 1031,
        	delay: 5000,
        	timer: 1000,
        	animate: {
        		enter: 'animated fadeInDown',
        		exit: 'animated fadeOutUp'
        	},
          icon_type:'class',
          template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0} alertMError" role="alert">' +
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
