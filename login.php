<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de Sesion</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
     
    <div class="navbar">
        <div class="brillo-logo-navbar">
            <img src="media/gameloversLogo.svg" alt="Aca va el loguito, mogul" class="logo">
        </div>
        <p class="Titulos" style="display: block;">Inicio de Sesion</p>
    </div>

    <p class="Subtitulos" style="text-align: center; margin-top: 4.6875rem;">Bienvenid@ de vuelta!</p>

    <div class="container-form-login" style="margin-top: 1.5rem;">
        <input required type="text" id="Usuario" name="Usuario" class="form-input" placeholder="Usuario" style="color: white; padding-left: 1rem;">
        <div class="container" style="justify-content: center; align-items: center;">
            <input required type="password" id="password" name="password" class="form-input" placeholder="Contraseña" style="color: white; padding-left: 1rem;">
            <i class='bx bx-show-alt'></i>
        </div>
        <div class="buttons-container-center" style="margin-top: 2rem; gap: 1rem;">
            <a href="login.php"><button class="btn-google">
                <img src="media/google.svg" alt="" style="width: 5rem; height: 2rem;">
            </button></a>
            <a href="login.php"><button class="btn-facebook">
                <img src="media/facebook.svg" alt="" style="width: 6rem; height: 2rem;">
            </button></a>
        </div>

        <div class="buttons-container-center" style="margin-top: 7%;">
            <a href="index.php"><button class="btn-verde">Siguiente</button></a>
        </div>
        
        <p class="texto-general" style="text-align: center; margin-top: 4rem; margin-bottom: 0%;">¿Olvidaste tu contraseña?</p>
    </div>

    <div class="buttons-container" style="margin-top: 10rem;">
        <a href="login.php"><button class="btn-azul">Atras</button></a>
    </div>

    <script src="script.js"></script>
</body>
</html>