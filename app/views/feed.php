<?php 
    $titulo_header = 'Game Lovers';
    require_once __DIR__ . '../../templates/header.php';
?>
<form action="" method="POST" class="form-todo">

<div class="buttons-container-center-feed">
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

<script src="script.js"></script>