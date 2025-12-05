<?php


session_start();
//
// -------- CONFIGURACION DE AUTH0 PARA LOGIN --------
//
// Import the Composer Autoloader to make the SDK classes accessible:
require '../app/vendor/autoload.php';

// Load our environment variables from the .env file:
(Dotenv\Dotenv::createImmutable(__DIR__ . '/../'))->load();

// Now instantiate the Auth0 class with our configuration
$auth0 = new \Auth0\SDK\Auth0([
    'domain' => $_ENV['AUTH0_DOMAIN'],
    'clientId' => $_ENV['AUTH0_CLIENT_ID'],
    'clientSecret' => $_ENV['AUTH0_CLIENT_SECRET'],
    'cookieSecret' => $_ENV['AUTH0_COOKIE_SECRET']
]);

//
// -------- LOGICA DE ENRUTADO, todas las solicitudes pasan por aqui ---------
//

// (libreria simpleroute) Import our router library:
use Steampixel\Route;

// Define route constants:
define('ROUTE_URL_INDEX', rtrim($_ENV['AUTH0_BASE_URL'], '/'));
define('ROUTE_URL_LOGIN', ROUTE_URL_INDEX . '?login'); 
define('ROUTE_URL_CALLBACK', ROUTE_URL_INDEX . '/callback'); // a donde van DESPUES de loguearse
define('ROUTE_URL_LOGOUT', ROUTE_URL_INDEX . '?home'); // a donde van al desloguearse

Route::add('/', function() use ($auth0) {
  $session = $auth0->getCredentials();

  if ($session === null) {
    // The user isn't logged in.
    echo '<p>Please <a href="?login">log in</a>.</p>';
    return;
  }

  // The user is logged in.
  echo '<pre>';
  print_r($session->user);
  echo '</pre>';

  echo '<p>You can now <a href="?home">log out</a>.</p>';
});

$ruta = __DIR__;
$titulo = 'Game Lovers';
$pagina_solicitada = 'home'; // default a la pagina de titulo
$dir_vistas = '../app/views/';
$vista;

// todos los GET llegan aqui para escoger que pagina renderizar
if ($_SERVER['REQUEST_METHOD'] === 'GET') 
{
    // ejempllo: si href nos manda a "?to_home" se muestra el archivo home.php
    if (isset($_GET['home']))
    {
        $pagina_solicitada = 'home';
    }
    if (isset($_GET['register']))
    {
        $pagina_solicitada = 'register';
    }
    if (isset($_GET['login']))
    {
        $pagina_solicitada = 'login';
    }
    
    $vista = $dir_vistas . $pagina_solicitada . '.php';
}

// todas las solicitudes donde se sube un form o un dato pasan por aqui y se usar header() para redireccionar al get apropiado
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $url_destino = '?home';

    if (isset($_POST['home']))
    {
        header("Location: " . $url_destino , true, 303); // redirect por get
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo htmlspecialchars($titulo) ?></title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    <?php include_once $vista ?>
</body>
</html>