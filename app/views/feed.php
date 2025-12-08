<?php 
    $titulo_header = 'Game Lovers';
    require_once __DIR__ . '../../templates/header.php';
    require_once __DIR__ . '../../controllers/interacciones.php';
    $interacciones_controller = new InteraccionesController();
    $stmt = $mysqli->prepare('CALL posibles_matches(?)');
    $stmt->bind_param('i', $_SESSION['usuario_id']);
    $stmt->execute();
    $posibles_matches = [];
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) {
        $posibles_matches[] = $row;
    }

    if (!isset($_SESSION['i'])) 
    {
        $_SESSION['i'] = 0;
    }

    if ($_SESSION['i'] >= count($posibles_matches)) 
    {
        $_SESSION['i'] = 0;
    }

    $persona_actual = $posibles_matches[$_SESSION['i']];
    $stmt->close();

    $fotos = [];
    $stmt = $mysqli->prepare('SELECT photo_route FROM users_photos WHERE id_user = ?;');
    $stmt->bind_param('i', $persona_actual['id_user']);
    $stmt->execute();
    $result = $stmt->get_result();

    while ($row = $result->fetch_assoc()) 
    {
        $fotos[] = $row;
    }

?>
<form action="" method="POST" class="form-todo">

    <div class="container-center">
        <div class="container-profile" style="background-image: url('<?php echo(($interacciones_controller->getProfilePic($persona_actual['id_user']) <> null) ? '../app/user_pictures/'.$interacciones_controller->getProfilePic($persona_actual['id_user']): '../app/user_pictures/default.png')?>');">
            <div class="container-center"  style="margin-top: 0;">
                <div class="container-indicate-img">
                    <?php foreach($fotos as $foto): ?>
                        <div class="indicate-img"></div>
                    <?php endforeach ?>
                </div>
            </div>

            <div class="container-center" style="margin-top: 306px;">
                <div class="container-info-profile">
                    <div class="container-info">
                        <img src="media/iconPerson.svg" alt="" style="margin-right: 8px; margin-left: -10%;">
                        <p class="Subtitulos"><?php echo htmlspecialchars($persona_actual['first_name']); ?></p>
                    </div>
                    <!--
                    <div class="container-info">
                        <p class="Subtitulos-gris">A x.KM</p>
                    </div> -->
                </div>
            </div>
            <div class="container-info" style="margin-top: 0;">
                <?php 
                    $stmt->close();
                    // selecionar datos de la persona actual en la tabla personas
                    $stmt = $mysqli->prepare('SELECT * FROM users WHERE id_user = ?;');
                    $stmt->bind_param('i', $persona_actual['id_user']);
                    $stmt->execute();
                    $resultado = $stmt->get_result();
                    $persona_actual = $resultado->fetch_assoc();
                ?>
                <p class="Subtitulos-gris" style="padding-left: 0.5rem;"><?php echo htmlspecialchars($persona_actual['username']); ?></p>
            </div>
            <div class="container-info">
                <div class="container-tags">
                <?php 
                    $stmt->close();
                    $stmt = $mysqli->prepare('SELECT tag FROM tags INNER JOIN users_tags ON tags.id_tag = users_tags.id_tag WHERE users_tags.id_user = ? LIMIT 4;');
                    $stmt->bind_param('i', $persona_actual['id_user']);
                    $stmt->execute();
                    $tags = $stmt->get_result()->fetch_all(MYSQLI_ASSOC);
                    $stmt->close();
                ?>
                <?php foreach($tags as $tag): ?>
                    <div class="tags">
                        <p class="texto-general"><?php echo htmlspecialchars($tag['tag']); ?></p>
                    </div>
                <?php endforeach; ?>
                    <div class="tags" style="background: var(--gradiente-morado);">
                        <p class="texto-general">Ver más ...</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-center">
        <div class="container-feed-buttons">
            <button class="btn-feed-x" type="submit" name="rechazo_persona">
                <img src="media/rechazo.svg" alt="">
            </button>

            <button class="btn-feed-next" type="submit" name="siguiente_persona">
                <img src="media/siguiente.svg" alt="">
            </button>

            <button class="btn-feed-like" type="submit" value="<?php echo $persona_actual['id_user']; ?>" name="like_persona">
                <img src="media/like.svg" alt="">
            </button>
        </div>
    </div>

</form>

<?php 
    $pagina = '1';
    require_once __DIR__ . '../../templates/footer.php';
?>
