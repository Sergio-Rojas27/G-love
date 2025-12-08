<?php 
    $titulo_header = 'Registro';
    require_once __DIR__ . '../../templates/header.php';
?>
<form action="" method="POST" class="form-todo" enctype="multipart/form-data">
    <p class="Subtitulos" style="text-align: center; margin-top: 1.5rem;">Últimos detalles</p>
    <div class="container-form">
        <label for="avatar">
            <input required type="file" class="upload-button-styled" name="avatar" id="avatar" accept="image/*" required>
            <img src="media/FotoVacia.svg" alt="foto" id="foto-perfil" class="img-perfil">
        </label>
        <p class="texto-general" style="text-align: center; ">Foto de Perfil</p>

        <input required type="text" id="nickname" name="nickname" class="form-input" placeholder="Nombre de Usuario o Nickname">
        <p class="Subtitulos" style="text-align: center; margin-top: 1.5rem;">Agrega de 2 a 9 fotos</p>

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

        <p style="color: #ffffff7e; font-family: 'open-sans', sans-serif;">Podrás editar toda tu información desde tu perfil</p>
    </div>

    <div class="buttons-container">
        <a href="?register2" class="gradiente-morado button-fake">Atrás</a>
        <button type="submit" name="registro_pag3" class="gradiente-verde">Siguiente</button>
    </div> 
</form>

<script src="fotos.js"></script>