<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <nav>
        <img src="#" alt="Aca va el loguito, mogul">
        <h2 class="Titulos">Registro</h2>
    </nav>
    <form action="">
    <div class="container-form">
            <input type="text" id="nombre" name="nombre" class="form-input" placeholder="Nombre">
            <input type="text" id="apellido" name="apellido" class="form-input" placeholder="Apellido">
            <input type="text" id="correo" name="correo" class="form-input" placeholder="Correo Electrónico">
            <input type="password" id="password" name="password" class="form-input" placeholder="Contraseña">
            <input type="password" id="conf-pass" name="conf-pass" class="form-input" placeholder="Confirmar contraseña">
            <select name="sexo" id="sexo" class="form-input">
                <option value="" selected disabled hidden>Sexo</option>
                <option value="masculino">Masculino</option>
                <option value="femenino">Femenino</option>
                <option value="otro">Otro</option>
                <option value="ninguno">Prefiero no decirlo</option>
            </select>
            <section style="margin-top: 5%">
                <span class="texto-general">Nacimiento: </span>
                <input type="date" name="nacimiento" id="nacimiento">

            </section>
            <!-- UY PAPA MIGUEL NO TENGO NI PUTA IDEA DE COMO HACER LO DE LA CI Y LAS IMAGENES, BUENA SUERTE -->
        </div>
        <section class="checkbox-container">
            <input type="checkbox" id="terminos" name="terminos" value="si">
            <label for="terminos">Terminos y Condiciones</label>
        </section>
    </form>
</body>
</html>