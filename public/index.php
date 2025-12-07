<?php
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
    $vista = $dir_vistas . 'messaging' . '.php';
}

// todas las solicitudes donde se sube un form o un dato pasan por aqui y se usar header() para redireccionar al get apropiado
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $url_destino = '?home';

    if (isset($_POST['enter_login']))
    {
        $url_destino = '?home'; // temporalmente mientras esta listo el incio
        $usuario = htmlspecialchars($_POST['user']) ?? null;
        $contrasena = htmlspecialchars($_POST['password']) ?? null;
        $ingreso_valido = false;
        // logica para corrocoquear base de datos
        // if credenciales coinciden destino='?feed' y usuarios en session[]

    }
    
    header("Location: " . $url_destino , true, 303); // redirect por get
    exit;
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