<?php 
    $usuario_actual = $_SESSION['usuario_id']    ; // ESTO DEBERIA VENIR DE LA SESSION
    require_once __DIR__ . '../../controllers/interacciones.php';
    $interacciones_controller = new InteraccionesController();
    $interacciones = $interacciones_controller->getInteractions($usuario_actual);
    // INCLUIR EL HEADER
    $titulo_header = 'Interacciones';
    require_once __DIR__ . '../../templates/header.php';

?>
    <?php foreach($interacciones as $interaccion){ 
        $hora_db = new DateTime($interaccion['dia']);
        if($interaccion['visible']==1 && $interaccion['alreadyLikedBack']==1){
            // MATCH VISIBLE
    ?>
    <div class="match-card">
    <img src="https://i.pinimg.com/736x/87/14/55/8714556a52021ba3a55c8e7a8338e552.jpg" alt="Perfil" class="profile-pic">
    
    <div class="right-content">
        <div class="info-bubble">
            <div class="username Subtitulos"><?php echo htmlspecialchars($interaccion['username'])?></div>
            <span class="timestamp texto-general"><?php echo htmlspecialchars($hora_db->format('h:i A'))?></span>
                <div class="message texto-general">
                    ¡Hicieron match! <span class="hearts">♡♡</span>
                </div>
        </div>

        <div class="actions">
        <a class="btn-chat button-fake" href="index.php?messaging&id_chat=<?php echo $interaccion['id_user_from']; ?>" style="margin: 0; padding: 0; width: 100%; ">Chatear</a>
        <button class="btn-delete">
          <img src="../public/media/trash.png" alt="" class="trash-icon">
        </button>
      </div>
    </div>
  </div>
    <?php
        } else if($interaccion['visible']==1 && $interaccion['alreadyLikedBack']==0){
            // LIKE VISIBLE            
    ?>
            <div class="match-card">
            <img src="https://i.pinimg.com/736x/87/14/55/8714556a52021ba3a55c8e7a8338e552.jpg" alt="Perfil" class="profile-pic">
            
            <div class="right-content">
                <div class="info-bubble">
                    <div class="username"><?php echo htmlspecialchars($interaccion['username'])?></div>
                    <span class="timestamp"><?php echo htmlspecialchars($hora_db->format('h:i A'))?></span>
                        <div class="message">
                            ¡Le gustaste! <span class="gheart">♡</span>
                        </div>
                </div>

                <div class="actions">
                <button class="btn-chat" href="index.php?messaging&id_chat=<?php echo $interaccion['id_user_from']; ?>">Chatear</button>
                <button class="btn-chat" style="width: 8%"><span style="font-size: 2rem">♡</span></button>
                <button class="btn-delete">
                <img src="../public/media/trash.png" alt="" class="trash-icon">
                </button>
            </div>
            </div>
        </div>

    <?php
        } else if ($interaccion['visible']==0 && $interaccion['alreadyLikedBack']==1){
            // MATCH NO VISIBLE
    ?>
        <div class="match-card">
            <img src="https://i.pinimg.com/736x/87/14/55/8714556a52021ba3a55c8e7a8338e552.jpg" alt="Perfil" class="profile-pic" style="filter: blur(4px); transition: filter 0.3s ease; ">
            <div class="right-content">
                <div class="info-bubble">
                    <div class="username">???</div>
                    <span class="timestamp"><?php echo htmlspecialchars($hora_db->format('h:i A'))?></span>
                        <div class="message">
                            ¡Hicieron match! <span class="hearts">♡♡</span>
                        </div>
                </div>

                <div class="actions">
                <button class="btn-chat" href="index.php?messaging&id_chat=<?php echo $interaccion['id_user_from']; ?>">Chatear</button>
                <button class="btn-delete">
                <img src="../public/media/trash.png" alt="" class="trash-icon">
                </button>
            </div>
            </div>
        </div>

    <?php
        } else {
            // LIKE NO VISIBLE
    ?>
        <div class="match-card">
            <img src="https://i.pinimg.com/736x/87/14/55/8714556a52021ba3a55c8e7a8338e552.jpg" alt="Perfil" class="profile-pic" style="filter: blur(4px); transition: filter 0.3s ease; ">
            
            <div class="right-content">
                <div class="info-bubble">
                    <div class="username">???</div>
                    <span class="timestamp"><?php echo htmlspecialchars($hora_db->format('h:i A'))?></span>
                        <div class="message">
                            ¡Le gustaste! <span class="gheart">♡</span>
                        </div>
                </div>

                <div class="actions">
                <button class="btn-chat" href="index.php?messaging&id_chat=<?php echo $interaccion['id_user_from']; ?>">Chatear</button>
                <button class="btn-chat" style="width: 8%"><span style="font-size: 2rem">♡</span></button>
                <button class="btn-delete">
                <img src="../public/media/trash.png" alt="" class="trash-icon">
                </button>
            </div>
            </div>
        </div>

    <?php   
        }
        ?>
        
    <?php } ?>
<?php 
    $pagina = '3';
    require_once __DIR__ . '../../templates/footer.php';
?>
