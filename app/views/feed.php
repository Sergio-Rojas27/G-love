<?php 
    $titulo_header = 'Game Lovers';
    require_once __DIR__ . '../../templates/header.php';
?>
<form action="" method="POST" class="form-todo">

<<<<<<< HEAD
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
        <input required type="text" id="distanci" name="distanci" maxlength="15" oninput="this.value = this.value.replace(/[^0-9]/g, '')" class="form-input-distancia">
        <p class="texto-general" style="z-index: 3; margin-left: -50px;">km</p> <br>
        <p class="texto-general" style="z-index: 3; margin-left: 30px;">Distancia máxima</p>
    </div>
    <section class="container">
        <div class="container">
            <input required type="checkbox" id="mund" name="mundo" value="si">
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
=======
    <div class="container-center">
        <div class="container-profile">
            <div class="container-center"  style="margin-top: 0;">
                <div class="container-indicate-img">
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                </div>
>>>>>>> 7df11f08b476100cb2b6d466f4198367e5633c31
            </div>

            <div class="container-center" style="margin-top: 306px;">
                <div class="container-info-profile">
                    <div class="container-info">
                        <img src="media/iconPerson.svg" alt="" style="margin-right: 8px; margin-left: -10%;">
                        <p class="Subtitulos">Nombre Apellido</p>
                    </div>
                    <div class="container-info">
                        <p class="Subtitulos-gris">A x.KM</p>
                    </div>
                </div>
            </div>
            <div class="container-info" style="margin-top: 0;">
                <p class="Subtitulos-gris">EL nickname del tipo</p>
            </div>
            <div class="container-info">
                <div class="container-tags">
                    <div class="tags">
                        <p class="texto-general">Mandibuleo</p>
                    </div>
                    <div class="tags">
                        <p class="texto-general">Mandibuleo</p>
                    </div>
                    <div class="tags">
                        <p class="texto-general">Mandibuleo</p>
                    </div>   
                    <div class="tags">
                        <p class="texto-general">Mandibuleo</p>
                    </div>
                    <div class="tags">
                        <p class="texto-general">Ver Mas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-center">
        <div class="container-feed-buttons">
            <button class="btn-feed-x">
                <img src="media/rechazo.svg" alt="">
            </button>

            <button class="btn-feed-next">
                <img src="media/siguiente.svg" alt="">
            </button>

            <button class="btn-feed-like">
                <img src="media/like.svg" alt="">
            </button>
        </div>
    </div>

</form>

<?php 
    $pagina = '1';
    require_once __DIR__ . '../../templates/footer.php';
?>
