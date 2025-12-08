<?php
session_start();
require_once '../app/controllers/db_conexion.php';
$ruta = __DIR__;
$pagina_solicitada = 'home'; // default a la pagina de titulo
$titulo = 'Game Lovers';
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
    if (isset($_GET['messaging']))
    {
        $pagina_solicitada = 'messaging';
    }
    if (isset($_GET['chats']))
    {
        $pagina_solicitada = 'chats';
    }
    if (isset($_GET['perfil']))
    {
        $pagina_solicitada = 'perfil';
    }
    if (isset($_GET['perfil2']))
    {
        $pagina_solicitada = 'perfil2';
    }
    if (isset($_GET['perfil3']))
    {
        $pagina_solicitada = 'perfil3';
    }
    if (isset($_GET['interacciones']))
    {
        $pagina_solicitada = 'interacciones';
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
            $url_destino = '?feed';
            $_SESSION['usuario_id'] = $fila['id_user'];
            unset($_SESSION['message_login']);
        }
    }

    if (isset($_POST['registro_pag1']))
    {
        $_SESSION['reg_nombre'] = htmlspecialchars($_POST['nombre']) ?? null;
        $_SESSION['reg_apellido'] = htmlspecialchars($_POST['apellido']) ?? null;
        $_SESSION['reg_correo'] = htmlspecialchars($_POST['correo']) ?? null;
        $_SESSION['reg_contrasena'] = htmlspecialchars($_POST['password']) ?? null;
        $_SESSION['reg_confirmacion'] = htmlspecialchars($_POST['conf-pass']) ?? null;
        $_SESSION['reg_sexo'] = htmlspecialchars($_POST['sexo']) ?? null;
        $_SESSION['reg_cedula'] = htmlspecialchars($_POST['cedula']) ?? null;
        $_SESSION['reg_nacimiento'] = htmlspecialchars($_POST['nacimiento']) ?? null;
        $_SESSION['reg_terminos'] =  htmlspecialchars($_POST['terminos']) ?? null;
        $_SESSION['reg_privacidad'] =  htmlspecialchars($_POST['privacidad']) ?? null;

        $info_valida = isset($_SESSION['reg_nombre'], $_SESSION['reg_apellido'], $_SESSION['reg_correo'], $_SESSION['reg_contrasena'], $_SESSION['reg_confirmacion'], $_SESSION['reg_sexo'], $_SESSION['reg_cedula'], $_SESSION['reg_nacimiento'], $_SESSION['reg_terminos'], $_SESSION['reg_privacidad'])
                        && ($_SESSION['reg_contrasena'] === $_SESSION['reg_confirmacion']);

        if ($info_valida)
        {            
            $url_destino = '?register2';
        }
        else
        {
            $url_destino = '?register';
            $_SESSION['message_register'] = 'Información inválida, por favor verifique e intente de nuevo.';
        }
    }
    
    if (isset($_POST['registro_pag2']))
    {
        $url_destino = '?register3';

        $_SESSION['reg_orientacion'] = htmlspecialchars($_POST['orientacion']) ?? null;
        $_SESSION['reg_busco'] = htmlspecialchars($_POST['busco']) ?? null;
        $_SESSION['reg_ubicacion'] = htmlspecialchars($_POST['ubicacion']) ?? null;
        $_SESSION['reg_distancia'] = htmlspecialchars($_POST['distancia']) ?? null;
        $_SESSION['reg_mundo'] = htmlspecialchars($_POST['mundo']) ?? null;
        $_SESSION['reg_juegos'] = $_POST['juegos'] ?? null;
        $_SESSION['reg_tags'] = $_POST['tags'] ?? null;
    }

    if (isset($_POST['registro_pag3']))
    {
        $url_destino = '?register4';

        $_SESSION['reg_nickname'] = htmlspecialchars($_POST['nickname']) ?? null;        
        // logica para subir imagenes
        $_SESSION['reg_avatar'] = $_FILES['avatar'] ?? null;
        $_SESSION['reg_fotos_galeria'] = $_FILES['fotos'] ?? null;

        $verified = 0;
        //subir toda la informacion de las 3 paginas de registro a la base de datos
        // register_pag1
        $stmt = $mysqli->prepare('INSERT INTO users (first_name, last_name, email, password, gender, birth, identification_number, verified, orientation, username) VALUES (?,?,?,?,?,?,?,?,?,?);');
        $stmt->bind_param('ssssssssis', $_SESSION['reg_nombre'], $_SESSION['reg_apellido'], $_SESSION['reg_correo'], $_SESSION['reg_contrasena'], $_SESSION['reg_sexo'], $_SESSION['reg_nacimiento'], $_SESSION['reg_cedula'], $verified, $_SESSION['reg_orientacion'], $_SESSION['reg_nickname']); // no verificado por defecto
        $stmt->execute();

        $id_user_nuevo = $mysqli->insert_id;

        // register_pag2
        foreach ($_SESSION['reg_juegos'] as $game_id)
        {
            $stmt = $mysqli->prepare('INSERT INTO users_games (id_user, id_game) VALUES (?, ?);');
            $stmt->bind_param('ii', $id_user_nuevo, $game_id);
            $stmt->execute();
        }

        $stmt = $mysqli->prepare('INSERT INTO users_tags(id_user, id_tag) VALUES (?, (SELECT id_tag FROM tags WHERE id_tag = ?));');
        foreach ($_SESSION['reg_tags'] as $id_tag)
        {
            $stmt->bind_param('ii', $id_user_nuevo, $id_tag);
            $stmt->execute();
        }

        $stmt = $mysqli->prepare('INSERT INTO users_tags(id_user, id_tag) VALUES (?, (SELECT id_tag FROM tags WHERE id_tag = ?));');
        $stmt->bind_param('ii', $id_user_nuevo, $_SESSION['reg_busco']); 
        $stmt->execute();

        // register_pag3
        // guardar las fotos del usuario en el servidor
        $ubicacion_fotos = '../app/user_pictures/';


        // Validaciones de seguridad
        $permitidos = array("image/jpg", "image/jpeg", "image/png");
        $limite_kb = 2000; // 2MB

        // verificar que el directorio existe y tiene los permisos
        if (!is_dir($ubicacion_fotos)) 
        {
            mkdir($ubicacion_fotos, 0777, true); 
        }

        $avatar = $_SESSION['reg_avatar'];

        $tipo_archivo = $avatar['type'];
        $tamano_archivo = $avatar['size'];

        // Validar el Avatar
        if ($avatar && $avatar['error'] == UPLOAD_ERR_OK) 
        {
            
            // Obtener la extensión original para guardarla
            $extension = pathinfo($avatar['name'], PATHINFO_EXTENSION);
            
            // Generar un nombre único para el avatar usando el ID del usuario
            $nombre_avatar = $id_user_nuevo . uniqid() . '.' . $extension;
            $ruta_destino_avatar = $ubicacion_fotos . $nombre_avatar;

            // Mover el archivo
            if (move_uploaded_file($avatar_data['tmp_name'], $ruta_destino_avatar)) 
            {
                // Actualizar la DB con la ruta del avatar
                $stmt = $mysqli->prepare('INSERT INTO users_photos (id_user, photo_route, is_profile) VALUES (?, ?, 1);');
                $stmt->bind_param('is', $id_user_nuevo, $ruta_destino_avatar);
                $stmt->execute();
            }
        }

        foreach ($_SESSION['reg_fotos_galeria'] as $foto)
        {

            if (!is_dir($ubicacion_fotos)) 
            {
                mkdir($ubicacion_fotos, 0777, true); 
            }

            $tipo_archivo = $foto['type'];
            $tamano_archivo = $foto['size'];

            // Validar el Avatar
            if ($foto && $foto['error'] == UPLOAD_ERR_OK) 
            {
                
                // Obtener la extensión original para guardarla
                $extension = pathinfo($foto['name'], PATHINFO_EXTENSION);
                
                // Generar un nombre único para el avatar usando el ID del usuario
                $nombre_foto = $id_user_nuevo . uniqid() . '.' . $extension;
                $ruta_destino_foto = $ubicacion_fotos . $nombre_foto;

                // Mover el archivo
                if (move_uploaded_file($avatar_foto['tmp_name'], $ruta_destino_foto)) 
                {
                    // Actualizar la DB con la ruta del avatar
                    $stmt = $mysqli->prepare('INSERT INTO users_photos (id_user, photo_route, is_profile) VALUES (?, ?, 1);');
                    $stmt->bind_param('is', $id_user_nuevo, $ruta_destino_avatar);
                    $stmt->execute();
                }
            }
        }

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