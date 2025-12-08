<?php
// Logica para recibir que usuario esta hablando con que usuario
$usuario_actual = 9; // ESTO DEBERIA VENIR DE LA SESSION
$usuario_chat = 8; // ACA VA EL USUARIO CON EL QUE SE VA A CHATEAR, ESTO DE OBTIENE DE UN POST AL PRESIONAR EL LA TARJETA DE CHAT
require_once __DIR__ . '../../controllers/messages.php';
$messagesController = new MessagesController();

$mensajes = $messagesController->getMessages($usuario_actual, $usuario_chat);
?>
<!-- TARJETA DE USUARIO -->
<div class="header">
    <div class="container">
        <button class="back-btn" onclick="window.location.href='?chats'">
            <img src="../public/media/back.png" alt="Foto de Perfil no valida" style="width: 2.5rem; height: 2.5rem;">
        </button>
        <img src="#" alt="Foto de Perfil no valida" class="avatar">
        <div class="username">Nombre Usuario</div>
    </div>
    <button class="info-btn" onCliclk="alert('Información del usuario')">
    <img src="../public/media/info.png" alt="Info" style="width: 1.4rem; height: 1.4rem;">
  </button>
</div>
<!-- INICIO DEL CHAT -->
<div class="chat-container">
    <?php
    foreach ($mensajes as $row) {
        $hora_db = new DateTime($row['send_on']);

        if($row['Sended']) {
            echo "<div class='sended-message'>" . htmlspecialchars($row['message']) ."<span class='hour-span'> ".htmlspecialchars($hora_db->format('h:i A')) ."</span></div><br>";
        } else {
            echo "<div class='recived-message'>" . htmlspecialchars($row['message']) . "<span class='hour-span'> ".htmlspecialchars($hora_db->format('h:i A')) ."</span></div><br>";
        }
    }
?>
</div>
<div class="sendMessage-container">
        <form class="chat-form" action="#" method="POST">
            
            <div class="input-wrapper">
                <input type="text" class="chat-input" placeholder="Mensaje" required>
            </div>

            <button type="submit" class="send-button">
                <img src="../public/media/sendMessage.png" alt="">
            </button>

        </form>
</div>
<?php 
    $pagina = '0';
    require_once __DIR__ . '../../templates/footer.php';
?>
