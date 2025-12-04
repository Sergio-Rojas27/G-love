<?php 
    $titulo_header = 'Registro';
    require_once __DIR__ . '../../templates/header.php';
?>
<form action="" method="POST">
<div class="container-form">
        <input required type="text" id="nombre" name="nombre" class="form-input" placeholder="Nombre">
        <input required type="text" id="apellido" name="apellido" class="form-input" placeholder="Apellido">
        <input required type="text" id="correo" name="correo" class="form-input" placeholder="Correo Electrónico">
        <input required type="password" id="password" name="password" class="form-input" placeholder="Contraseña">
        <input required type="password" id="conf-pass" name="conf-pass" class="form-input" placeholder="Confirmar contraseña">
        <select required name="sexo" id="sexo" class="form-input">
            <option value="" selected disabled hidden>Sexo</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
            <option value="ninguno">Prefiero no decirlo</option>
        </select>
        <section style="margin-top: 5%">
            <span class="texto-general">Nacimiento: </span>
            <input required type="date" name="nacimiento" id="nacimiento">
        </section>
        <input required type="file" name="cedula" id="cedula" accept="image/*" required>
        <!-- UY PAPA MIGUEL NO TENGO NI PUTA IDEA DE COMO HACER LO DE LA CI Y LAS IMAGENES, BUENA SUERTE -->
    </div>
    <section class="checkbox-container">
        <input required type="checkbox" id="terminos" name="terminos" value="si">
        <label for="terminos">Terminos y condiciones</label> <br>
        <input required type="checkbox" id="privacidad" name="privacidad" value="si">
        <label for="terminos">Política de privacidad</label>
    </section>
    <div class="buttons-container">
        <button type="submit" class="gradiente-verde">Siguiente</button>
</div> 
</form>
        <a href="?home"><button class="gradiente-morado">Atrás</button></a>