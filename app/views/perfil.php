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
        <div class="compartir">
            <img src="media/share.svg" alt="">
        </div>
    </div>

    <div class="container-center">
        <div class="btns-perfil">
            <p class="texto-general">Fotos</p>
        </div>
        <div class="btns-perfil">
            <p class="texto-general">Información</p>
        </div>
        <div class="btns-perfil">
            <p class="texto-general">Metas</p>
        </div>
    </div>

    <p class="Subtitulos" style="text-align: center; margin-top: 1.5rem;">Fotos</p>

    <div class="container-form" style="padding-left: 0;">
                <div class="container-img">
            <label for="im1">
                <input required type="file" class="upload-button-styled" name="fotos[]" id="im1" accept="image/*" required>
                <img src="media/NewImg.svg"  alt="foto" id="img1" class="img-general">
            </label>
            <label for="im2">
                <input required type="file" class="upload-button-styled" name="fotos[]" id="im2" accept="image/*" required>
                <img src="media/NewImg.svg"  alt="foto" id="img2" class="img-general">
            </label>
            <label for="im3">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im3" accept="image/*">
                <img src="media/NewImg.svg" alt="foto" id="img3" class="img-general">
            </label>
        </div>
        <div class="container-img">
            <label for="im4">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im4" accept="image/*">
                <img src="media/NewImg.svg"  alt="foto" id="img4" class="img-general">
            </label>
            <label for="im5">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im5" accept="image/*">
                <img src="media/NewImg.svg"  alt="foto" id="img5" class="img-general">
            </label>
            <label for="im6">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im6" accept="image/*">
                <img src="media/NewImg.svg"  alt="foto" id="img6" class="img-general">
            </label>
        </div>

        <div class="container-img">
            <label for="im7">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im7" accept="image/*">
                <img src="media/NewImg.svg"  alt="foto" id="img7" class="img-general">
            </label>
            <label for="im8">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im8" accept="image/*">
                <img src="media/NewImg.svg"  alt="foto" id="img8" class="img-general">
            </label>
            <label for="im9">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im9" accept="image/*">
                <img src="media/NewImg.svg"  alt="foto" id="img9" class="img-general">
            </label>
        </div>
    </div>

</form>

<?php 
    $pagina = '4';
    require_once __DIR__ . '../../templates/footer.php';
?>
<script src="fotos.js"></script>
