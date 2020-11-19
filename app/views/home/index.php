<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebar.php"; ?>
<!-- Alta de Usuarios -->
<article class="MainMenu">
    <div class="row">
        <div class="col-12 text-center">
            <h4>Inicio</h4>
        </div>
    </div>
    <div class="container">
    <?php 
echo $_SESSION['usuario_rol'];
    ?>

    </div>
</article>
<!-- Alta de Usuarios -->
<?php require APP_ROOT . "/views/partial/footer.php"; ?>