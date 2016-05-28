<?php

function EmailTemplate($user,$link) {
  $HTML = '
  <html>
  <body style="background: #676767;font-family: Verdana; font-size: 14px;color:#ffffff;">
  <div style="">
      <h2>Hola '.$user.'</h2>
      <p style="font-size:17px;">Gracias por registrarte en '. APP_TITLE .'.</p>
  	<p>Solo queda un paso para desplegar La Manta: verificar que seas un Mantero de verdad.</p>
  	<p style="padding:15px;background-color:#ECF8FF;">
  		Para hacerlo hacé <a style="font-weight:bold;color: #2BA6CB;" href="'.$link.'" target="_blank">click acá &raquo;</a>
  	</p>
      <p style="font-size: 9px;">Desarrollado por '.APP_AUTHOR.' &copy; '. date('Y',time()) .' '.APP_TITLE.'. Todos los derechos reservados.</p>
  </div>
  </body>
  </html>
  ';

      return $HTML;
}

?>
