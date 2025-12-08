<?php 
    $titulo_header = 'Registro';
    require_once __DIR__ . '../../templates/header.php';
?>
<form action="" method="POST" class="form-todo">
<p class="Subtitulos" style="text-align: center; margin-top: 1.5rem;">Cuéntanos que te interesa</p>

<?php if (isset($_SESSION['message_register2'])): ?>
    <p id="" class="texto-general"><?php echo $_SESSION['message_register2'] ?></p>
<?php endif ?>

<div class="container-form">
    <div class="container-between" style="margin-top: 1.5rem;">
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

    <!--
    <div class="file-container">
        <label for="ubicacion">
            <input required type="file" class="upload-button-styled" name="ubicacion" id="ubicacion" accept="image/*" required>
            <img src="media/mapa.svg" alt="">
        </label>
        <input type="text" class="input-sin-fondo" placeholder="Tu Ubicacion">
    </div>

    <div class="container">
        <input required type="text" id="distance" name="distancia" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-input-distancia">
        <p class="texto-general" style="z-index: 3; margin-left: -50px;">km</p> <br>
        <p class="texto-general" style="z-index: 3; margin-left: 30px;">Distancia máxima</p>
    </div>

    <section class="container">
        <div class="container">
            <input required type="checkbox" id="world" name="mundo" value="si">
            <p class="texto-general">Todo el Mundo</p>
        </div>
    </section>
    -->

    <div class="register-container" style="margin-top: 1.5rem;">
        <input type="text" class="form-input" placeholder="Buscar Juegos">
        <i class='icono'><img id="search1" src="media/search.png" alt=""></i>
    </div>

    <div class="container-scroll-y">
        <!-- Todos son de prueba, reemplazar por while y llenado -->
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

    <p class="Subtitulos" style="text-align: center; margin-top: 1.5rem; margin-bottom: 0.5rem;">Cuéntanos sobre ti</p>
    <div class="register-container">
        <input type="text" class="form-input" placeholder="Buscar Cualidades (max 6)">
        <i class='icono'><img id="search2" src="media/search.png" alt=""></i>
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
    
    
    <div class="buttons-container">
        <a href="?register" class="gradiente-morado button-fake">Atrás</a>
        <button type="submit" class="gradiente-verde" name="registro_pag2">Siguiente</button>
    </div> 

</div> 
</form>

<script src="check.js"></script>