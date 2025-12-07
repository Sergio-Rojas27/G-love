<?php 
    $titulo_header = 'Game Lovers';
    require_once __DIR__ . '../../templates/header.php';
?>
<form action="" method="POST" class="form-todo">
<p class="Subtitulos" style="text-align: center; margin-top: 1.5rem;">Cuéntanos que te interesa</p>

<div class="container-form">
    <div class="container-between">
        <select required name="genero-fav" id="genero-fav" class="form-input-40">
            <option value="" selected disabled hidden>Orientacion</option>
            <option value="heterosexual">Heterosexual</option>
            <option value="homosexual">Homosexual</option>
            <option value="bisexual">Bisexual</option>
            <option value="otro">Otro</option>
        </select>
        <select required name="genero-fav" id="genero-fav" class="form-input-40">
            <option value="" selected disabled hidden>Busco</option>
            <option value="accion">Acción</option>
            <option value="aventura">Aventura</option>
            <option value="deportes">Deportes</option>
            <option value="estrategia">Estrategia</option>
            <option value="rol">Rol</option>
            <option value="simulacion">Simulación</option>
            <option value="otros">Otros</option>
        </select>
    </div>
    <div class="file-container">
        <label for="ubicacion">
            <input required type="file" class="upload-button-styled" name="ubicacion" id="ubicacion" accept="image/*" required>
            <img src="media/mapa.svg" alt="">
        </label>
        <input type="text" class="input-sin-fondo" placeholder="Tu Ubicacion">
    </div>

    <div class="container">
        <input required type="text" id="distancia" name="distancia" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-input-distancia">
        <p class="texto-general" style="z-index: 3; margin-left: -50px;">km</p> <br>
        <p class="texto-general" style="z-index: 3; margin-left: 30px;">Distancia máxima</p>
    </div>
    <section class="container">
        <div class="container">
            <input required type="checkbox" id="mundo" name="mundo" value="si">
            <p class="texto-general">Todo el Mundo</p>
        </div>
    </section>

    <div class="register-container">
        <input type="text" class="form-input" placeholder="Buscar Juegos">
        <i class='icono'><img id="search1" src="media/search.png" alt=""></i>
    </div>
    <div class="container-scroll-y">
        <!-- Todos son de prueba, reemplazar por while y llenado -->
        <div class="container-item-scroll">
            <input type="checkbox">
            <p class="texto-general">Fortnite</p>
        </div>
        <div class="container-item-scroll">
            <input type="checkbox">
            <p class="texto-general">Fortnite</p>
        </div>
        <div class="container-item-scroll">
            <input type="checkbox">
            <p class="texto-general">Fortnite</p>
        </div>
        <div class="container-item-scroll">
            <input type="checkbox">
            <p class="texto-general">Fortnite</p>
        </div>
    </div>
        
        </div>
        <!-- UY PAPA MIGUEL NO TENGO NI PUTA IDEA DE COMO HACER LO DE LA CI Y LAS IMAGENES, BUENA SUERTE -->
    </div>

    <p class="Subtitulos" style="text-align: center; margin-top: 1.5rem;">Cuéntanos sobre ti</p>
    <div class="container-form">
        <div class="register-container">
            <input type="text" class="form-input" placeholder="Buscar Cualidades (max 6)">
            <i class='icono'><img id="search2" src="media/search.png" alt=""></i>
        </div>
        <div class="container-scroll-y">
            <!-- Todos son de prueba, reemplazar por while y llenado -->
            <div class="container-item-scroll">
                <input type="checkbox">
                <p class="texto-general">Fortnite</p>
            </div>
            <div class="container-item-scroll">
                <input type="checkbox">
                <p class="texto-general">Fortnite</p>
            </div>
            <div class="container-item-scroll">
                <input type="checkbox">
                <p class="texto-general">Fortnite</p>
            </div>
            <div class="container-item-scroll">
                <input type="checkbox">
                <p class="texto-general">Fortnite</p>
            </div>
        </div>
    </div>
    
    
    <div class="buttons-container">
        <a href="?home"><button class="gradiente-morado">Atrás</button></a>

        <a href="?register3"><button type="submit" class="gradiente-verde">Siguiente</button></a>
    </div> 
</div> 
</form>

<script src="script.js"></script>