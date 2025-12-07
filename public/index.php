<?php
session_start();
require_once '../app/controllers/db_conexion.php';
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
        if (isset($_GET['register2']))
    {
        $pagina_solicitada = 'register2';
    }
    if (isset($_GET['register3']))
    {
        $pagina_solicitada = 'register3';
    }
    if (isset($_GET['register4']))
    {
        $pagina_solicitada = 'register4';
    }
    if (isset($_GET['feed']))
    {
        $pagina_solicitada = 'feed';
    }
    if (isset($_GET['login']))
    {
        $pagina_solicitada = 'login';
    }
    if (isset($_GET['register2']))
    {
        $pagina_solicitada; // como sea que la haya llamado sergio
    }
    
    $vista = $dir_vistas . $pagina_solicitada . '.php';
}

// todas las solicitudes donde se sube un form o un dato pasan por aqui y se usar header() para redireccionar al get apropiado
if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
    $url_destino = '?home';

    if (isset($_POST['enter_login']))
    {
        $usuario_correo = htmlspecialchars($_POST['user']) ?? null;
        $contrasena = htmlspecialchars($_POST['password']) ?? null;
        $ingreso_valido = false;
        
        // logica para corrocoquear base de datos
        $stmt = $mysqli->prepare('SELECT email, password FROM users WHERE password = ? and email = ? LIMIT 1;');
        $stmt->bind_param('ss', $contrasena, $usuario_correo);
        $stmt->execute();
        $resultados = $stmt->get_result();
        
        if ($resultados->num_rows == 0)
        {
            $url_destino = '?login';
            $_SESSION['message_login'] = 'Credenciales invalidas';
        }
        else
        {
            $fila = $resultados->fetch_assoc();
            $url_destino = '?register';
            // if credenciales coinciden destino='?feed' y usuarios en session[]
            unset($_SESSION['message_login']);
        }
    }

    if (isset($_POST['registro_pag1']))
    {
        $url_destino = 'register2';

        $nombre = htmlspecialchars($_POST['nombre']);
        $apellido = htmlspecialchars($_POST['apellido']);
        $correo = htmlspecialchars($_POST['correo']);
        $contrasena = htmlspecialchars($_POST['contrasena']);
        $confirmacion = htmlspecialchars($_POST['confirmacion']);
        $sexo = htmlspecialchars($_POST['sexo']);
        $cedula = htmlspecialchars($_POST['cedula']);
        $nacimiento = htmlspecialchars($_POST['nacimiento']);
        $terminos =  htmlspecialchars($_POST['terminos']);
        $privacidad =  htmlspecialchars($_POST['privacidad']);

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