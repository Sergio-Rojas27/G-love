<?php 
    $titulo_header = 'Inicio de Sesión';
    require_once __DIR__ . '../../templates/header.php';
?>
<p class="Subtitulos" style="text-align: center; margin-top: 4.6875rem;">Bienvenid@ de vuelta!</p>

<div class="container-form-login" style="margin-top: 1.5rem;">
    <form method="POST" action="">
        <input required type="text" id="Usuario" name="Usuario" class="form-input" placeholder="Usuario" style="color: white; padding-left: 1rem;">
        <div class="container" style="justify-content: center; align-items: center;">
            <input required type="password" id="password" name="password" class="form-input" placeholder="Contraseña" style="color: white; padding-left: 1rem;">
            <i class='bx'><img id="ojo" src="media/ojoA.png" alt=""></i>
        </div>
        <div class="buttons-container-center" style="margin-top: 2rem; gap: 1rem;">
            <a href="login.php"><button class="gradiente-blanco">
                <img src="media/google.svg" alt="" style="width: 5rem; height: 2rem;">
            </button></a>
            <a href="login.php"><button class="gradiente-azul">
                <img src="media/facebook.svg" alt="" style="width: 6rem; height: 2rem;">
            </button></a>
        </div>

        <div class="buttons-container-center" style="margin-top: 7%;">
            <a href=""><button class="gradiente-verde">Siguiente</button></a>
        </div>
        
        <p class="texto-general" style="text-align: center; margin-top: 4rem; margin-bottom: 0%;">¿Olvidaste tu contraseña?</p>
    </form>
</div>

<div class="buttons-container" style="margin-top: 10rem;">
    <a href="?home"><button class="gradiente-morado">Atras</button></a>
</div>

<script src="script.js"></script>