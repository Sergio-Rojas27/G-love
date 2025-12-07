<?php 
    $titulo_header = 'Registro';
    require_once __DIR__ . '../../templates/header.php';
?>
<form action="" method="POST" class="form-todo">
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
                <input required type="file" class="upload-button-styled" name="img1" id="im1" accept="image/*" required>
                <img src="media/NewImg.svg" alt="foto" id="img1" class="img-general">
            </label>
            <label for="im2">
                <input required type="file" class="upload-button-styled" name="img2" id="im2" accept="image/*" required>
                <img src="media/NewImg.svg" alt="foto" id="img2" class="img-general">
            </label>
            <label for="im3">
                <input required type="file" class="upload-button-styled" name="img3" id="im3" accept="image/*" required>
                <img src="media/NewImg.svg" alt="foto" id="img3" class="img-general">
            </label>            
        </div>
        <div class="container-img">
            <label for="im4">
                <input required type="file" class="upload-button-styled" name="img4" id="im4" accept="image/*" required>
                <img src="media/NewImg.svg" alt="foto" id="img4" class="img-general">
            </label>
            <label for="im5">
                <input required type="file" class="upload-button-styled" name="img5" id="im5" accept="image/*" required>
                <img src="media/NewImg.svg" alt="foto" id="img5" class="img-general">
            </label>
            <label for="im6">
                <input required type="file" class="upload-button-styled" name="img6" id="im6" accept="image/*" required>
                <img src="media/NewImg.svg" alt="foto" id="img6" class="img-general">
            </label>
        </div>
        <div class="container-img">
            <label for="im7">
                <input required type="file" class="upload-button-styled" name="img7" id="im7" accept="image/*" required>
                <img src="media/NewImg.svg" alt="foto" id="img7" class="img-general">
            </label>
            <label for="im8">
                <input required type="file" class="upload-button-styled" name="img8" id="im8" accept="image/*" required>
                <img src="media/NewImg.svg" alt="foto" id="img8" class="img-general">
            </label>
            <label for="im9">
                <input required type="file" class="upload-button-styled" name="img9" id="im9" accept="image/*" required>
                <img src="media/NewImg.svg" alt="foto" id="img9" class="img-general">
            </label>
        </div>
        <p style="color: #ffffff7e; font-family: 'open-sans', sans-serif;">Podrás editar toda tu información desde tu perfil</p>
    </div>

    <div class="buttons-container">
        <a href="?home"><button class="gradiente-morado">Atrás</button></a>

        <a href="?register4"><button type="submit" class="gradiente-verde">Siguiente</button></a>
    </div> 
</form>

<script src="fotos.js"></script>