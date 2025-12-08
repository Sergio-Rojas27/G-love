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


</form>

<?php 
    $pagina = '4';
    require_once __DIR__ . '../../templates/footer.php';
?>
<script src="fotos.js"></script>