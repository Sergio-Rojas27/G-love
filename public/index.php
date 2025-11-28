<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenida</title>
    <link rel="stylesheet" href="styles/styles.css">
</head>
<body>
    
    <!-- muchachos por si las moscas TODAS las solicitudes que se le hagan a la pagina deben pasar por un controllador index y de ahi se redireccionan, por seguridad -->

    <div class="head">
        <div class="brillo-logo">
            <img src="media/gameloversLogo 2.svg" alt="Aca va el loguito, mogul" class="logo-head">
        </div>
        <img src="media/Titulo.svg" alt="" class="titulo-head">
    </div>

    <div class="carrusel">
        <div class="group">
            <div>
                <img src="media/conoce.svg" alt="" class="img-card">
            </div>
            <div>
                <img src="media/chatea.svg" alt="" class="img-card">
            </div>
            <div>
                <img src="media/conecta.svg" alt="" class="img-card">
            </div>
        </div>
        <div aria-hidden class="group">
            <div>
                <img src="media/conoce.svg" alt="" class="img-card">
            </div>
            <div>
                <img src="media/chatea.svg" alt="" class="img-card">
            </div>
            <div>
                <img src="media/conecta.svg" alt="" class="img-card">
            </div>
        </div>
            <!-- ESTE ESTÁ PORQUE SINO EN ESCRITORIO QUEDA ESPACIO ANTES DEL REINICIO -->
        <div aria-hidden class="group">
            <div>
                <img src="media/conoce.svg" alt="" class="img-card">
            </div>
            <div>
                <img src="media/chatea.svg" alt="" class="img-card">
            </div>
            <div>
                <img src="media/conecta.svg" alt="" class="img-card">
            </div>
        </div>
    </div>

    <p class="Subtitulos" style="text-align: center;">¿List@ para ser <br>parte de game lovers?</p>

    <div class="buttons-container-center" style="margin-top: 7%;">
        <a href="../app/views/register.php"><button class="gradiente-verde">Registrarse</button></a>
    </div>

    <p class="texto-general" style="text-align: center; margin-top: 25%;">¿Ya tienes una cuenta?</p>

    <div class="buttons-container-center">
        <a href="../app/views/login.php"><button class="gradiente-morado">Iniciar sesión</button></a>
    </div>
</body>
</html>