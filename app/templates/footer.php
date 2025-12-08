<div class="footer">
    <div class="container-navbar">
        <?php 
        // Definimos la variable de la ruta de la imagen basada en la condición
        $ruta_imagen1 = ""; 
        $ruta_imagen2 = ""; 
        $ruta_imagen3 = ""; 
        $ruta_imagen4 = ""; 

        if (($pagina) === '1') {
            $ruta_imagen1 = "media/FeedM.svg";
        }
        else {
            $ruta_imagen1 = "media/Feed.svg";
        }
        if (($pagina) === '2') {
            $ruta_imagen2 = "media/ChatsM.svg";
        }
        else {
            $ruta_imagen2 = "media/Chats.svg";
        }
        if (($pagina) === '3') {
            $ruta_imagen3 = "media/MatchesM.svg";
        }
        else {
            $ruta_imagen3 = "media/Matches.svg";
        }
        if (($pagina) === '4') {
            $ruta_imagen4 = "media/PerfilM.svg";
        }
        else {
            $ruta_imagen4 = "media/Perfil.svg";
        }
        ?>

    <!-- Esto es retroactivo y funciona con la cuestion, ya tu ves (Moguel, como hacemos pa que redireccione) -->
        <img src="<?php echo htmlspecialchars($ruta_imagen1)?>" alt="" class="icono-navbar" id="1">
        <img src="<?php echo htmlspecialchars($ruta_imagen2)?>" alt="" class="icono-navbar" id="2">
        <img src="<?php echo htmlspecialchars($ruta_imagen3)?>" alt="" class="icono-navbar" id="3">
        <img src="<?php echo htmlspecialchars($ruta_imagen4)?>" alt="" class="icono-navbar" id="4">
    </div>
</div>