<?php

// include(WEB_DIR . 'index/equipos.php');
$ruta = $_GET['?link'];

if (isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 1) {
  switch ($ruta) {
    case 'equipos':
        include(WEB_DIR . 'index/equipos.php');
      break;
    case 'liga':
        include(WEB_DIR . 'index/liga.php');
      break;
    case 'champion':
        include(WEB_DIR . 'index/champion.php');
      break;
    case 'estadypremios':
        include(WEB_DIR . 'index/estadypremios.php');
      break;
    case 'administrar':
    if (isset($_SESSION['app_id']) and $_users[$_SESSION['app_id']]['permisos'] >= 2 and $ruta == administrar) {
      include(WEB_DIR . 'private/cockpit.php');
    }
      break;
    default:
        include(WEB_DIR . 'index/index.php');
      break;
  }
}




?>
