<?php 
    $titulo_header = 'Game Lovers';
    require_once __DIR__ . '../../templates/header.php';
?>
<form action="" method="POST" class="form-todo">

    <div class="container-center">
        <div class="container-profile">
            <div class="container-center"  style="margin-top: 0;">
                <div class="container-indicate-img">
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                    <div class="indicate-img"></div>
                </div>
            </div>

            <div class="container-center" style="margin-top: 306px;">
                <div class="container-info-profile">
                    <div class="container-info">
                        <img src="media/iconPerson.svg" alt="" style="margin-right: 8px; margin-left: -10%;">
                        <p class="Subtitulos">Nombre Apellido</p>
                    </div>
                    <div class="container-info">
                        <p class="Subtitulos-gris">A x.KM</p>
                    </div>
                </div>
            </div>
            <div class="container-info" style="margin-top: 0;">
                <p class="Subtitulos-gris">EL nickname del tipo</p>
            </div>
            <div class="container-info">
                <div class="container-tags">
                    <div class="tags">
                        <p class="texto-general">Mandibuleo</p>
                    </div>
                    <div class="tags">
                        <p class="texto-general">Mandibuleo</p>
                    </div>
                    <div class="tags">
                        <p class="texto-general">Mandibuleo</p>
                    </div>   
                    <div class="tags">
                        <p class="texto-general">Mandibuleo</p>
                    </div>
                    <div class="tags">
                        <p class="texto-general">Ver Mas</p>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container-center">
        <div class="container-feed-buttons">
            <button class="btn-feed-x">
                <img src="media/rechazo.svg" alt="">
            </button>

            <button class="btn-feed-next">
                <img src="media/siguiente.svg" alt="">
            </button>

            <button class="btn-feed-like">
                <img src="media/like.svg" alt="">
            </button>
        </div>
    </div>

</form>

<?php 
    $pagina = '1';
    require_once __DIR__ . '../../templates/footer.php';
?>
