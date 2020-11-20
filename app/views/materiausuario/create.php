<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebar.php"; ?>
<!-- Asignar Materias Usuarios -->
<article class="MainMenu">
    <div class="row">
        <div class="col-12 text-center">
            <h4>En ésta sección vas Asignar Materias</h4>
            <h5>Nombre y Apellido: <?php echo $data['usuario']->nombre.', '.$data['usuario']->apellido.' D.N.I: '.$data['usuario']->dni ?></h5>
        </div>
    </div>
    <div class="container">
    
    </div>
</article>
<!-- Asignar Materias Usuarios -->
<?php require APP_ROOT . "/views/partial/footer.php"; ?>