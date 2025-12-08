<?php 
    $titulo_header = 'Game Lovers';
    require_once __DIR__ . '../../templates/header.php';

    // seleccionar el usuario actual y todos sus datos
    $stmt = $mysqli->prepare('SELECT * FROM users u JOIN users_tags ut ON u.id_user = ut.id_user JOIN users_games ug ON u.id_user = ug.id_user WHERE u.id_user = ?;');
    $stmt->bind_param('i', $_SESSION['usuario_id']);
    $stmt->execute();
    $result = $stmt->get_result();
    while ($row = $result->fetch_assoc()) {
        $user = $row;
    }

    $user = $user;
?>
<form action="" method="POST" class="form-todo">
    <div class="container-left">
        <img src="media/search.png" alt=""  class="img-perfil-p">
        <div id="container-names">
            <p class="Subtitulos" id="NombrePerfil"><?php echo htmlspecialchars($user['first_name']); ?></p>
            <p class="Subtitulos-gris"><?php echo htmlspecialchars($user['username']); ?></p>
        </div>
        <!--
        <div class="compartir">
            <img src="media/share.svg" alt="">
        </div>
        -->
    </div>

    <div class="container-center">
        <a href="index.php?perfil" class="btns-perfil">
            <p class="texto-general">Fotos</p>
        </a>
        <a href="index.php?perfil2" class="btns-perfil">
            <p class="texto-general">Información</p>
        </a>
        <a href="index.php?perfil3" class="btns-perfil">
            <p class="texto-general">Estadísticas</p>
        </a>
    </div>

    <p class="Subtitulos" style="text-align: center; margin-top: 1.5rem;">Información General</p>

    <div class="container-form">
        <input required type="text" id="nombre" name="nombre" class="form-input" placeholder="Nombre" value="<?php echo htmlspecialchars($user['first_name']); ?>">
        <input required type="text" id="apellido" name="apellido" class="form-input" placeholder="Apellido" value="<?php echo htmlspecialchars($user['last_name']); ?>">
        <div class="register-container">
            <input required type="password" id="correo" name="correo" class="form-input" placeholder="Correo Electrónico" value="<?php echo htmlspecialchars($user['email']); ?>">
            <i class='bx'><img id="ojo" src="media/ojoA.png" alt=""></i>
        </div>
        <select required name="sexo" id="sexo" class="form-input">
            <option value="" disabled hidden>Género</option>
            <option value="1" <?php echo ($user['gender'] == 1) ? 'selected' : ''; ?>>Hombre</option>
            <option value="2" <?php echo ($user['gender'] == 2) ? 'selected' : ''; ?>>Mujer</option>
            <option value="3" <?php echo ($user['gender'] == 3) ? 'selected' : ''; ?>>Otro</option>
            <option value="4" <?php echo ($user['gender'] == 4) ? 'selected' : ''; ?>>Prefiero no decirlo</option>
        </select>
        <div class="container-between">
        <select required name="orientacion" id="genero-fav" class="form-input-40">
            <option value="" disabled hidden>Orientación</option>
            <option value="1" <?php echo ($user['sexual_orientation'] == 1) ? 'selected' : ''; ?>>Heterosexual</option>
            <option value="2" <?php echo ($user['sexual_orientation'] == 2) ? 'selected' : ''; ?>>Homosexual</option>
            <option value="3" <?php echo ($user['sexual_orientation'] == 3) ? 'selected' : ''; ?>>Bisexual</option>
            <option value="4" <?php echo ($user['sexual_orientation'] == 4) ? 'selected' : ''; ?>>Otro</option>
        </select>

        <select required name="busco" id="genero-fav" class="form-input-40">
            <option value="" disabled hidden>Busco</option>
            <option value="60" <?php echo ($user['searching_for'] == 60) ? 'selected' : ''; ?>>Amigos</option>
            <option value="62" <?php echo ($user['searching_for'] == 62) ? 'selected' : ''; ?>>Jugar</option>
            <option value="61" <?php echo ($user['searching_for'] == 61) ? 'selected' : ''; ?>>Relación seria</option>
            <option value="63" <?php echo ($user['searching_for'] == 63) ? 'selected' : ''; ?>>Relación casual</option>
        </select>
        </div>
        <div class="file-container">
            <!--
            <label for="ubicacion">
                <input required type="file" class="upload-button-styled" name="ubicacion" id="ubicacion" accept="image/*" required>
                <img src="media/mapa.svg" alt="">
            </label>
            -->
            <input type="text" class="input-sin-fondo" placeholder="Tu Ubicacion">
        </div>
    </div>
    
    <p class="Subtitulos" style="text-align: center; margin-top: 1.5rem;">Juegos y Cualidades</p>

    <div class="container-form">
        <div class="register-container">
            <input type="text" class="form-input" placeholder="Buscar Juegos">
            <i class='icono'><img id="search1" src="media/search.png" alt=""></i>
        </div>
            <div class="container-scroll-y">
            <?php 
                $stmt = $mysqli->prepare('SELECT id_game, game_name FROM games;');
                $stmt->execute();
                $resultados = $stmt->get_result();
            ?>
            <?php while($fila = $resultados->fetch_assoc()): ?>
                <div class="container-item-scroll">
                    <?php 
                        $checked = '';
                        $stmt2 = $mysqli->prepare('SELECT * FROM users_games WHERE id_user = ? AND id_game = ?;');
                        $stmt2->bind_param('ii', $_SESSION['usuario_id'], $fila['id_game']);
                        $stmt2->execute();
                        $result2 = $stmt2->get_result();
                        if ($result2->num_rows > 0) {
                            $checked = 'checked';
                        }
                    
                    ?>
                    <input type="checkbox" name="games[]" <?php echo $checked; ?> value="<?php echo $fila['id_game']; ?>" />
                    <p class="texto-general" style="text-align: left;"><?php echo $fila['game_name']; ?></p>
                </div>
            <?php endwhile ?>
        </div>

        <div class="register-container" style="margin-top: 2rem;">
            <input type="text" class="form-input" placeholder="Buscar Juegos">
            <i class='icono'><img id="search1" src="media/search.png" alt=""></i>
        </div>
        <div class="container-scroll-y">
            <?php 
                $stmt = $mysqli->prepare('SELECT id_tag, tag FROM tags;');
                $stmt->execute();
                $resultados = $stmt->get_result();
            ?>
            <?php while($fila = $resultados->fetch_assoc()): ?>
                <div class="container-item-scroll">
                    <?php 
                        $checked = '';
                        $stmt2 = $mysqli->prepare('SELECT * FROM users_tags WHERE id_user = ? AND id_tag = ?;');
                        $stmt2->bind_param('ii', $_SESSION['usuario_id'], $fila['id_tag']);
                        $stmt2->execute();
                        $result2 = $stmt2->get_result();
                        if ($result2->num_rows > 0) {
                            $checked = 'checked';
                        }
                    ?>
                    <input type="checkbox" name="tags[]" <?php echo $checked; ?> value="<?php echo $fila['id_tag']; ?>"/>
                    <p class="texto-general"><?php echo $fila['tag']; ?></p>
                </div>
            <?php endwhile ?>
        </div>
    </div>

    <div class="button-container">
        <button class="gradiente-morado button-fake" id="guardar-perfil">Editar Perfil</button>
    </div> 

</form>

<?php 
    $pagina = '4';
    require_once __DIR__ . '../../templates/footer.php';
?>
<script src="fotos.js"></script>