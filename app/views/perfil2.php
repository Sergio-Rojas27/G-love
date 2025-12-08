<?php 
    $titulo_header = 'Game Lovers';
    require_once __DIR__ . '../../templates/header.php';
?>
<form action="" method="POST" class="form-todo">
    <div class="container-left">
        <img src="media/search.png" alt=""  class="img-perfil-p">
        <div id="container-names">
            <p class="Subtitulos" id="NombrePerfil">Nombre del tipo</p>
            <p class="Subtitulos-gris">Nickname del tipo</p>
        </div>
        <!--
        <div class="compartir">
            <img src="media/share.svg" alt="">
        </div>
        -->
    </div>

    <div class="container-center">
        <div class="btns-perfil">
            <p class="texto-general">Fotos</p>
        </div>
        <div class="btns-perfil">
            <p class="texto-general">Información</p>
        </div>
        <div class="btns-perfil">
            <p class="texto-general">Estadísticas</p>
        </div>
    </div>

    <p class="Subtitulos" style="text-align: center; margin-top: 1.5rem;">Información General</p>

    <div class="container-form">
        <input required type="text" id="nombre" name="nombre" class="form-input" placeholder="Nombre">
        <input required type="text" id="apellido" name="apellido" class="form-input" placeholder="Apellido">
        <div class="register-container">
            <input required type="password" id="correo" name="correo" class="form-input" placeholder="Correo Electrónico">
            <i class='bx'><img id="ojo" src="media/ojoA.png" alt=""></i>
        </div>
        <select required name="sexo" id="sexo" class="form-input">
            <option value="" selected disabled hidden>Género</option>
            <option value="1">Hombre</option>
            <option value="2">Mujer</option>
            <option value="3">Otro</option>
            <option value="4">Prefiero no decirlo</option>
        </select>
        <div class="container-between">
        <select required name="orientacion" id="genero-fav" class="form-input-40">
            <option value="" selected disabled hidden>Orientación</option>
            <option value="1">Heterosexual</option>
            <option value="2">Homosexual</option>
            <option value="3">Bisexual</option>
            <option value="4">Otro</option>
        </select>

        <select required name="busco" id="genero-fav" class="form-input-40">
            <option value="" selected disabled hidden>Busco</option>
            <option value="60">Amigos</option>
            <option value="62">Jugar</option>
            <option value="61">Relación seria</option>
            <option value="63">Relación casual</option>
        </select>
        </div>
        <div class="file-container">
            <label for="ubicacion">
                <input required type="file" class="upload-button-styled" name="ubicacion" id="ubicacion" accept="image/*" required>
                <img src="media/mapa.svg" alt="">
            </label>
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
                    <input type="checkbox" name="games[]" value="<?php echo $fila['id_game']; ?>">
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
                    <input type="checkbox" name="tags[]" value="<?php echo $fila['id_tag']; ?>">
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