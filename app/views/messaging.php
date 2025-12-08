<?php
// Logica para recibir que usuario esta hablando con que usuario
require_once __DIR__ . '../../controllers/messages.php';
$messagesController = new MessagesController();
$usuario_actual = $_SESSION['usuario_id']; 
if (isset($_GET['id_chat'])) {
    $usuario_chat = intval($_GET['id_chat']);
}
if (isset($_POST['id_chat'])) {
    $usuario_chat = intval($_POST['id_chat']);
}  

// Logica para obtener el username del usuario con el que se esta chateando
global $mysqli;
$stmt = $mysqli->prepare("select username from users where id_user = ?");
$stmt->bind_param("i", $usuario_chat);
if ($stmt->execute()) {
    $result = $stmt->get_result();
    if ($result) {
        while ($row = $result->fetch_assoc()) {
            $username = $row;
        }
        $result->free();
    } 
}
$stmt->close();

// Consumir posibles resultados adicionales del procedimiento almacenado
while ($mysqli->more_results() && $mysqli->next_result()) {
    $extra = $mysqli->use_result();
    if ($extra) {
        $extra->free();
    }
}



$mensajes = $messagesController->getMessages($usuario_actual, $usuario_chat);
?>
<!-- TARJETA DE USUARIO -->
<div class="header">
    <div class="container">
            <button class="back-btn" onclick="window.location.href='?chats'">
            <img src="../public/media/back.png" alt="Foto de Perfil no valida" style="width: 2.5rem; height: 2.5rem;">
        </button>
        <img src="#" alt="Foto de Perfil no valida" class="avatar">
        <div class="username"><?php echo $username['username']?></div>
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
                <input type="text" class="chat-input" placeholder="Mensaje" id="message" name="message" required>
            </div>
            <input type="hidden" name="usuario_id" value="<?php echo $usuario_chat; ?>">
            <input type="hidden" name="usuario_actual" value="<?php echo $usuario_actual; ?>">
            <button type="submit" class="send-button" name="send_message">
                <img src="../public/media/sendMessage.png" alt="">
            </button>

        </form>
</div>
<?php 
    $pagina = '0';
    require_once __DIR__ . '../../templates/footer.php';
?>
