<?php 
    // LOGICA PARA RECIBIR QUE USUARIO ESTA HABLANDO CON QUE USUARIO
    // PERDON PERO NO ME ACUERDO COMO OBTENER EL USUARIO EN SESSION[]
    $usuario_actual = $_SESSION['usuario_id']; // ESTO DEBERIA VENIR DE LA SESSION
    require_once __DIR__ . '../../controllers/messages.php';
    $chat_controller = new MessagesController();
    $chats = $chat_controller->getChats($usuario_actual);
    require_once __DIR__ . '../../controllers/interacciones.php';
    $interacciones_controller = new InteraccionesController();
    // INCLUIR EL HEADER
    $titulo_header = 'Chats';
    require_once __DIR__ . '../../templates/header.php';
?>
<div class="search-container">
    <form action="" method="POST" styyle="width: 100%; display: flex; justify-content: center;">
        <div class="chats-container">
            <input required style="margin-bottom: 1.5rem; margin-top: 1.5rem;" type="text" id="search" name="search" class="search-input" placeholder="Buscar">
            <i class='bx'><img id="ojo" src="media/search.png" alt=""></i>
        </div>
    </form>
</div>

<?php 
    $pagina = '2';
    require_once __DIR__ . '../../templates/footer.php';
?>

<div class="chats-list-container">
    <!-- LISTA DE CHATS -->
        <?php foreach($chats as $chat){ 
            $hora_db = new DateTime($chat['fecha_hora']);
            ?>
        <!-- Un Chat -->
         <a href="index.php?messaging&id_chat=<?php echo $chat['contacto_id']; ?>" style="margin: 0; padding: 0; width: 100%; ">
        <div class="notification-card" style="margin-left: 5%; margin-bottom: 5%;">
            <img src="<?php echo(($interacciones_controller->getProfilePic($chat['contacto_id']) <> null) ? '../app/user_pictures/'.$interacciones_controller->getProfilePic($chat['contacto_id']): '../app/user_pictures/default.png')?>" alt="Foto de perfil" class="avatar">
            <div class="content">
                <div class="username Subtitulos"><?php echo htmlspecialchars($chat['usernameChat'])  ?></div>
                <p class="message texto-general"><?php echo htmlspecialchars($chat['ultimo_mensaje']) ?></p>
                <span class="timestamp texto-general"><?php echo htmlspecialchars($hora_db->format('h:i A'))?></span>
            </div>
        </div>
        </a>
    <?php } ?>
</div>
<!-- Hay que hacer el navbar que va en el footer e incluirlo aca -->