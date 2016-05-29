<?php

session_start();
date_default_timezone_set('America/Argentina/Buenos_Aires');

// Constantes de Conexión
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','root');
define('DB_NAME','lamantapp');

// Constantes de App
define('WEB_DIR','web/'); // Web Directory
define('APP_URL','http://localhost/LaMantApp/'); // Author
define('PAGE_TITLE','La MantApp'); // Page title
define('APP_TITLE','La MantApp <span style="font-size: 15px; vertical-align: text-top">&reg;<span>'); // App title
define('APP_VERSION','Versi&oacute;n 1.0 - Passe Rasteirinho - Alpha'); // Version
define('APP_AUTHOR','ElVieja'); // Author

// Constantes de PHPMailer
define('PHPMAILER_HOST','zorro.avnam.net');
define('PHPMAILER_USER','lamantapp@studiovimana.com');
define('PHPMAILER_PASS','12121212');
define('PHPMAILER_PORT',465);

require('vendor/autoload.php');
require('core/models/class.Conection.php');
require('core/bin/functions/Encrypt.php');
require('core/bin/functions/Users.php');
require('core/bin/functions/EmailTemplate.php');
require('core/bin/functions/LostpassTemplate.php');
require('core/bin/functions/Categorias.php');
// require('core/bin/functions/Equipos.php');
// require('core/bin/functions/Foros.php');
// require('core/bin/functions/UrlAmigable.php');
// require('core/bin/functions/BBcode.php');
// require('core/bin/functions/OnlineUsers.php');
// require('core/bin/functions/GetUserStatus.php');
// require('core/bin/functions/IncreaseVisita.php');

$_categorias = Categorias();
$_users = Users();
// $_foros = Foros();

?>
