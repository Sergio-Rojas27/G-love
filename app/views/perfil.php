<?php 
    $titulo_header = 'Game Lovers';
    require_once __DIR__ . '../../templates/header.php';
    require_once __DIR__ . '../../controllers/interacciones.php';
    // Obtener nombre y nick
    global $mysqli;
    $stmt = $mysqli->prepare("select username, first_name from users where id_user = ?");
    $stmt->bind_param("i", $_SESSION['usuario_id']);
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        if ($result) {
            while ($row = $result->fetch_assoc()) {
                $user = $row;
            }
            $result->free();
        } 
    }
    $stmt->close();
    $interacciones_controller = new InteraccionesController();
    $photos = $interacciones_controller->getPictures($_SESSION['usuario_id']);
    $profile_photo = $interacciones_controller->getProfilePic($_SESSION['usuario_id']);
?>
<form action="" method="POST" class="form-todo">
    <div class="container-left">
        <img src="../app/user_pictures/<?php echo $profile_photo?>" alt=""  class="img-perfil-p">
        <div id="container-names">
            <p class="Subtitulos" id="NombrePerfil"><?php echo htmlspecialchars($user['first_name']);?></p>
            <p class="Subtitulos-gris"><?php echo htmlspecialchars($user['username']);?></p>
        </div>
        <!--
        <div class="compartir">
            <img src="media/share.svg" alt="">
        </div>
        -->
    </div>

    <div class="container-center">
        <div class="btns-perfil">
            <p class="texto-general">Fotos</p>
        </div>
        <div class="btns-perfil">
            <p class="texto-general">Información</p>
        </div>
        <div class="btns-perfil">
            <p class="texto-general">Estadísticas</p>
        </div>
    </div>

    <p class="Subtitulos" style="text-align: center; margin-top: 1.5rem;">Fotos</p>

    <div class="container-form" style="padding-left: 0;">
                <div class="container-img">
            <label for="im1">
                <input required type="file" class="upload-button-styled" name="fotos[]" id="im1" accept="image/*" required>
                <img src="<?php echo(($photos[0]['photo_route'] <> null) ? '../app/user_pictures/'.$photos[0]['photo_route']: 'media/NewImg.svg')?>"  alt="foto" id="img1" class="img-general">
            </label>
            <label for="im2">
                <input required type="file" class="upload-button-styled" name="fotos[]" id="im2" accept="image/*" required>
                <img src="<?php echo((sizeof($photos) >= 2) ? '../app/user_pictures/'.$photos[1]['photo_route']: 'media/NewImg.svg')?>"  alt="foto" id="img2" class="img-general">
            </label>
            <label for="im3">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im3" accept="image/*">
                <img src="<?php echo((sizeof($photos) >= 3) ? '../app/user_pictures/'.$photos[2]['photo_route']: 'media/NewImg.svg')?>" alt="foto" id="img3" class="img-general">
            </label>
        </div>
        <div class="container-img">
            <label for="im4">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im4" accept="image/*">
                <img src="<?php echo((sizeof($photos) >= 4) ? '../app/user_pictures/'.$photos[3]['photo_route']: 'media/NewImg.svg')?>"  alt="foto" id="img4" class="img-general">
            </label>
            <label for="im5">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im5" accept="image/*">
                <img src="<?php echo((sizeof($photos) >= 5) ? '../app/user_pictures/'.$photos[4]['photo_route']: 'media/NewImg.svg')?>"  alt="foto" id="img5" class="img-general">
            </label>
            <label for="im6">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im6" accept="image/*">
                <img src="<?php echo((sizeof($photos) >= 6) ? '../app/user_pictures/'.$photos[5]['photo_route']: 'media/NewImg.svg')?>"  alt="foto" id="img6" class="img-general">
            </label>
        </div>

        <div class="container-img">
            <label for="im7">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im7" accept="image/*">
                <img src="<?php echo((sizeof($photos) >= 7) ? '../app/user_pictures/'.$photos[6]['photo_route']: 'media/NewImg.svg')?>"  alt="foto" id="img7" class="img-general">
            </label>
            <label for="im8">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im8" accept="image/*">
                <img src="<?php echo((sizeof($photos) >= 8) ? '../app/user_pictures/'.$photos[7]['photo_route']: 'media/NewImg.svg')?>"  alt="foto" id="img8" class="img-general">
            </label>
            <label for="im9">
                <input type="file" class="upload-button-styled" name="fotos[]" id="im9" accept="image/*">
                <img src="<?php echo((sizeof($photos) >= 9) ? '../app/user_pictures/'.$photos[8]['photo_route']: 'media/NewImg.svg')?>"  alt="foto" id="img9" class="img-general">
            </label>
        </div>
    </div>

</form>

<?php 
    $pagina = '4';
    require_once __DIR__ . '../../templates/footer.php';
?>
<script src="fotos.js"></script>
