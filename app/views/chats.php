<?php 
    // LOGICA PARA RECIBIR QUE USUARIO ESTA HABLANDO CON QUE USUARIO
    // PERDON PERO NO ME ACUERDO COMO OBTENER EL USUARIO EN SESSION[]
    $usuario_actual = '8'; // ESTO DEBERIA VENIR DE LA SESSION
    require_once __DIR__ . '../../controllers/messages.php';
    $chat_controller = new MessagesController();
    $chats = $chat_controller->getChats($usuario_actual);
    // INCLUIR EL HEADER
    $titulo_header = 'Chats';
    require_once __DIR__ . '../../templates/header.php';
?>
<div class="search-container">
    <form action="" method="POST" styyle="width: 100%; display: flex; justify-content: center;">
        <div class="chats-container">
            <input required type="text" id="search" name="search" class="search-input" placeholder="Buscar">
            <i class='bx'><img id="ojo" src="media/ojoA.png" alt=""></i>
        </div>
    </form>
</div>
<div class="chats-list-container">
    <!-- LISTA DE CHATS -->
        <!-- Un Chat -->
        <?php foreach($chats as $chat){ 
            $hora_db = new DateTime($row['send_on']);
            ?>
        <div class="notification-card">
            <img src="https://i.pinimg.com/736x/89/66/af/8966af4dfa228308488001646271a742.jpg" alt="Foto de perfil" class="avatar">

            <div class="content">
                <div class="username"><?php echo htmlspecialchars($chat['usernameChat'])  ?></div>
                <p class="message"><?php echo htmlspecialchars($chat['ultimo_mensaje']) ?></p>
                <span class="timestamp"><?php echo htmlspecialchars($hora_db)?></span>
            </div>
        </div>
        <?php } ?>
</div>
<!-- Hay que hacer el navbar que va en el footer e incluirlo aca -->