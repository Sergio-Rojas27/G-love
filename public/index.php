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

        unset($_SESSION['reg_nombre'], $_SESSION['reg_apellido'], $_SESSION['reg_correo'], $_SESSION['reg_contrasena'], $_SESSION['reg_confirmacion'], $_SESSION['reg_sexo'], $_SESSION['reg_cedula'], $_SESSION['reg_nacimiento'], $_SESSION['reg_terminos'], $_SESSION['reg_privacidad']);
        unset($_SESSION['reg_orientacion'], $_SESSION['reg_busco'], $_SESSION['reg_ubicacion'], $_SESSION['reg_distancia'], $_SESSION['reg_mundo'], $_SESSION['reg_juegos'], $_SESSION['reg_tags']);
        unset($_SESSION['reg_nickname']);
        unset($_SESSION['message_register']);
        unset($_SESSION['message_register2']);
        unset($_SESSION['message_register3']);

        $pagina_solicitada = 'home';
    }
    if (isset($_GET['register']))
    {
        $pagina_solicitada = 'register';
    }
    if (isset($_GET['register2']))
    {
        // si la pagina 1 del registro no se ha completado, redirigir ahi
        if (!isset($_SESSION['reg_nombre'], $_SESSION['reg_apellido'], $_SESSION['reg_correo'], $_SESSION['reg_contrasena'], $_SESSION['reg_confirmacion'], $_SESSION['reg_sexo'], $_SESSION['reg_cedula'], $_SESSION['reg_nacimiento'], $_SESSION['reg_terminos'], $_SESSION['reg_privacidad']))
        {
            header('Location: ?register');
            exit();
        }
        $pagina_solicitada = 'register2';
    }
    if (isset($_GET['register3']))
    {
        // si la pagina 2 del registro no se ha completado, redirigir ahi
        if (!isset($_SESSION['reg_orientacion'], $_SESSION['reg_busco'], $_SESSION['reg_ubicacion'], $_SESSION['reg_distancia'], $_SESSION['reg_mundo'], $_SESSION['reg_juegos'], $_SESSION['reg_tags']))
        {
            header('Location: ?register2');
            exit();
        }
        $pagina_solicitada = 'register3';
    }
    if (isset($_GET['register4']))
    {
        // si la pagina 3 del registro no se ha completado, redirigir ahi
        if (!isset($_SESSION['reg_juegos'], $_SESSION['reg_tags']))
        {
            // limpiar variables de sesion del registro
            unset($_SESSION['reg_nombre'], $_SESSION['reg_apellido'], $_SESSION['reg_correo'], $_SESSION['reg_contrasena'], $_SESSION['reg_confirmacion'], $_SESSION['reg_sexo'], $_SESSION['reg_cedula'], $_SESSION['reg_nacimiento'], $_SESSION['reg_terminos'], $_SESSION['reg_privacidad']);
            unset($_SESSION['reg_orientacion'], $_SESSION['reg_busco'], $_SESSION['reg_ubicacion'], $_SESSION['reg_distancia'], $_SESSION['reg_mundo'], $_SESSION['reg_juegos'], $_SESSION['reg_tags']);
            unset($_SESSION['reg_nickname']);
            header('Location: ?register3');
            exit();
        }

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
    if(isset($_GET['messaging']))
    {
        $pagina_solicitada = 'messaging';
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
        $stmt = $mysqli->prepare('SELECT id_user, email, password FROM users WHERE password = ? and email = ? LIMIT 1;');
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
    if(isset($_POST['send_message'])){
        require_once '../app/controllers/messages.php';
        $messagesController = new MessagesController();
        $usuario_chat = intval($_POST['usuario_id']);
        $usuario_actual = intval($_POST['usuario_actual']);

        $mensaje = trim($_POST['message']);
        $messagesController->sendMessage($usuario_actual, $usuario_chat, $mensaje);
        $url_destino = '?messaging&id_chat=' . $usuario_chat;
        $vista = $dir_vistas . 'messaging' . '.php';
    }
    if (isset($_POST['registro_pag1']))
    {
        unset($_SESSION['message_register']);

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

        //verificar que el correo no exista ya en la bdd
        $stmt = $mysqli->prepare('SELECT id_user FROM users WHERE email = ? LIMIT 1;');
        $stmt->bind_param('s', $_SESSION['reg_correo']);
        $stmt->execute();
        $resultados = $stmt->get_result();
        if ($resultados->num_rows > 0)
        {
            $info_valida = false;
            $_SESSION['message_register'] = 'El correo ya está en uso.';
        }

        //verificar que la identificacion no exista tampoco
        $stmt = $mysqli->prepare('SELECT id_user FROM users WHERE identification_number = ? LIMIT 1;');
        $stmt->bind_param('s', $_SESSION['reg_cedula']);
        $stmt->execute();
        $resultados = $stmt->get_result();
        if ($resultados->num_rows > 0)
        {
            $info_valida = false;
            $_SESSION['message_register'] = 'El número de identificación ya está en uso.';
        }

        // verificar que el sexo seleccionado sea una de las opciones disponibles
        $opciones_sexo = ['1', '2', '3', '4'];
        if (!in_array($_SESSION['reg_sexo'], $opciones_sexo))
        {
            $info_valida = false;
            $_SESSION['message_register'] = 'Género inválido.';
        }

        // verificar que la fecha sea valida, mayor de 18 y no posterior a la fecha actual
        $fecha_nacimiento = DateTime::createFromFormat('Y-m-d', $_SESSION['reg_nacimiento']);
        $fecha_actual = new DateTime();
        if (!$fecha_nacimiento || $fecha_nacimiento > $fecha_actual)
        {
            $info_valida = false;
            $_SESSION['message_register'] = 'Fecha de nacimiento inválida.';
        }
        else
        {
            $edad = $fecha_nacimiento->diff($fecha_actual)->y;
            if ($edad < 18)
            {
                $info_valida = false;
                $_SESSION['message_register'] = 'Debes ser mayor de 18 años para registrarte.';
            }
        }

        // verificar que las contraseñas coincidan
        if ($_SESSION['reg_contrasena'] !== $_SESSION['reg_confirmacion'])
        {
            $info_valida = false;
            $_SESSION['message_register'] = 'Las contraseñas no coinciden.';
        }

        if ($info_valida)
        {            
            $url_destino = '?register2';
        }
        else
        {
            $url_destino = '?register';
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
        $_SESSION['reg_juegos'] = $_POST['games'] ?? null;
        $_SESSION['reg_tags'] = $_POST['tags'] ?? null;

        //verificar que los juegos seleccionados existan en la base de datos
        $juegos_validos = [];
        foreach ($_SESSION['reg_juegos'] as $id_juego)
        {
            $stmt = $mysqli->prepare('SELECT id_game FROM games WHERE id_game = ? LIMIT 1;');
            $stmt->bind_param('i', $id_juego);
            $stmt->execute();
            $resultados = $stmt->get_result();
            if ($resultados->num_rows > 0)
            {
                $juegos_validos[] = $id_juego; // solo agregar si es valido
            }
        }
        $_SESSION['reg_juegos'] = $juegos_validos;

        //verificar que las etiquetas seleccionadas existan en la base de datos
        $tags_validos = [];
        foreach ($_SESSION['reg_tags'] as $id_tag)
        {
            $stmt = $mysqli->prepare('SELECT id_tag FROM tags WHERE id_tag = ? LIMIT 1;');
            $stmt->bind_param('i', $id_tag);
            $stmt->execute();
            $resultados = $stmt->get_result();
            if ($resultados->num_rows > 0)
            {
                $tags_validos[] = $id_tag; // solo agregar si es valido
            }
        }
        $_SESSION['reg_tags'] = $tags_validos;

        // verificar que la orientacion y lo que busca sean opciones validas
        $opciones_orientacion = ['1', '2', '3', '4'];
        if (!in_array($_SESSION['reg_orientacion'], $opciones_orientacion))
        {
            $url_destino = '?register2';
            $_SESSION['message_register2'] = 'Orientación inválida.';
        }
        $opciones_busco = ['60', '61', '62', '63'];
        if (!in_array($_SESSION['reg_busco'], $opciones_busco))
        {
            $url_destino = '?register2';
            $_SESSION['message_register2'] = 'Opción inválida en "Busco".';
        }

        unset($_SESSION['message_register2']);
    }

    if (isset($_POST['registro_pag3']))
    {
        $url_destino = '?register4';

        $_SESSION['reg_nickname'] = htmlspecialchars($_POST['nickname']) ?? null;        
        // logica para subir imagenes

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

        $stmt = $mysqli->prepare('INSERT INTO users_tags(id_user, id_tag) VALUES (?, ?);');
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

        $avatar = $_FILES['avatar'];

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
            if (move_uploaded_file($avatar['tmp_name'], $ruta_destino_avatar)) 
            {
                // Actualizar la DB con el NOMBRE del archivo
                $stmt = $mysqli->prepare('INSERT INTO users_photos (id_user, photo_route, isProfile) VALUES (?, ?, 1);');
                $stmt->bind_param('is', $id_user_nuevo, $nombre_avatar); // <--- Usamos $nombre_avatar
                $stmt->execute();
            }
        }

        $galeria_data = $_FILES['fotos'];
        $cantidad_fotos = count($galeria_data['name'] ?? []);

        for ($i = 0; $i < $cantidad_fotos; $i++)
        {

            // Verificamos si hubo un error y si el slot no está vacío
            if ($galeria_data['error'][$i] === UPLOAD_ERR_OK && !empty($galeria_data['tmp_name'][$i])) 
            {
                // 1. Obtener los datos del archivo actual usando el índice $i
                $nombre_temporal = $galeria_data['tmp_name'][$i];
                $nombre_original = $galeria_data['name'][$i];
                
                // 2. Generar nombre único
                $extension = pathinfo($nombre_original, PATHINFO_EXTENSION);
                $nombre_foto = $id_user_nuevo . '_galeria_' . uniqid() . '.' . $extension;
                $ruta_destino_foto = $ubicacion_fotos . $nombre_foto;

                // 3. Mover el archivo
                if (move_uploaded_file($nombre_temporal, $ruta_destino_foto)) 
                {
                    // CORRECCIÓN 3: Insertamos el nombre del archivo ($nombre_foto) y establecemos is_profile = 0
                    $stmt = $mysqli->prepare('INSERT INTO users_photos (id_user, photo_route, isProfile) VALUES (?, ?, 0);'); // 0 = Galería
                    $stmt->bind_param('is', $id_user_nuevo, $nombre_foto); // <--- CORREGIDO!
                    $stmt->execute();
                }
            }
        }


    }
    
    if (isset($_POST['registro_pag3'])) {
        if ($_FILES['avatar']['error'] !== UPLOAD_ERR_OK) {
            // Muestra el código de error para el Avatar
            $_SESSION['upload_error'] = 'Error de subida de Avatar. Código: ' . $_FILES['avatar']['error'];
        }

        $galeria_data = $_FILES['fotos'];
        $cantidad_fotos = count($galeria_data['name'] ?? []);
        for ($i = 0; $i < $cantidad_fotos; $i++) {
            if ($galeria_data['error'][$i] !== UPLOAD_ERR_OK && $galeria_data['error'][$i] !== UPLOAD_ERR_NO_FILE) {
                // Muestra el código de error para la Galería
                $_SESSION['upload_error'] = 'Error de subida en foto ' . ($i + 1) . '. Código: ' . $galeria_data['error'][$i];
            }
        }
    }

    if (isset($_POST['siguiente_persona']))
    {
        $url_destino = '?feed';
        $_SESSION['i'] += 1;
    }
    if (isset($_POST['like_persona']))
    {
        $url_destino = '?feed';
        $_SESSION['i'] += 1;

        // registrar el like en la base de datos
        $stmt = $mysqli->prepare('INSERT INTO users_likes (id_user_from, id_user_to, visible, dia) VALUES (?, ?, 1, CURRENT_DATE());'); 
        $stmt->bind_param('ii', $_SESSION['usuario_id'], $_POST['like_persona']);
        $stmt->execute();
    }
    if (isset($_POST['rechazo_persona']))
    {
        $url_destino = '?feed';
        $_SESSION['i'] += 1;
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
    <link rel="icon" type="image/x-icon" href="media/Ico.ico">
</head>
<body>
    <?php include_once $vista ?>
</body>
</html>