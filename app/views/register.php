<?php 
    $titulo_header = 'Registro';
    require_once __DIR__ . '../../templates/header.php';
?>
<form action="" method="POST"  class="form-todo">
<div class="container-form">
        <input required type="text" id="nombre" name="nombre" class="form-input" placeholder="Nombre">
        <input required type="text" id="apellido" name="apellido" class="form-input" placeholder="Apellido">
        <input required type="text" id="correo" name="correo" class="form-input" placeholder="Correo Electrónico">
        <div class="register-container">
            <input required type="password" id="password" name="password" class="form-input" placeholder="Contraseña">
            <i class='bx'><img id="ojo" src="media/ojoA.png" alt=""></i>
        </div>
        <div class="register-container">
            <input required type="password" id="conf-pass" name="conf-pass" class="form-input" placeholder="Confirmar contraseña">
            <i class='bx1'><img id="ojo1" src="media/ojoA.png" alt=""></i>
        </div>
        <select required name="sexo" id="sexo" class="form-input">
            <option value="" selected disabled hidden>Sexo</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
            <option value="ninguno">Prefiero no decirlo</option>
        </select>
        <section id='container-nacimiento' style="margin-top: 5%">
            <span class="texto-general">Nacimiento: </span>
            <input required type="date" name="nacimiento" id="nacimiento">
        </section>
        <div class="file-container">
            <label for="cedula">
                <input required type="file" class="upload-button-styled" name="cedula" id="cedula" accept="image/*" required>
                <img src="media/Btn-Upload.png" alt="">
            </label>
            <span id="file-name-display" class="file-name">Ningún archivo seleccionado.</span>
        </div>
        
        </div>
        <!-- UY PAPA MIGUEL NO TENGO NI PUTA IDEA DE COMO HACER LO DE LA CI Y LAS IMAGENES, BUENA SUERTE -->
    </div>
    <section class="checkbox-container">
        <div class="container">
            <input required type="checkbox" id="terminos" name="terminos" value="si">
            <p class="texto-general">Terminos y condiciones</p>
        </div>
        <div class="container">
            <input required type="checkbox" id="privacidad" name="privacidad" value="si">
            <p class="texto-general">Política de privacidad</p>
        </div>
    </section>
    
    <div class="buttons-container">
        <a href="?home"><button formnovalidate class="gradiente-morado">Atrás</button></a>

        <a href="?register2"><button type="submit" name="registro_pag1" class="gradiente-verde">Siguiente</button></a>
    </div> 
</div> 
</form>

<script src="script.js"></script>