<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebar.php"; ?>
<!-- Asignar Materias Usuarios -->
<article class="MainMenu">
    <div class="row">
        <div class="col-12 text-center">
            <h4>En ésta sección vas Asignar Materias</h4>
            <h5>Nombre y Apellido: <?php echo $data['usuario']->nombre . ', ' . $data['usuario']->apellido . ' D.N.I: ' . $data['usuario']->dni ?></h5>
        </div>
    </div>
    <div class="container">
        <?php flash('umateria_create_mensaje'); ?>
        <form action="<?php echo URL_ROOT; ?>/materiausuario/store" method="post">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="carrera">Carrera <sup>*</sup></label>
                    <select name="carrera" class="form-control" data-placeholder="Elija una Carrera" data-allow-clear="1">
                        <option>Java</option>
                        <option>Javascript</option>
                        <option>PHP</option>
                        <option>Visual Basic</option>
                    </select>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="materias">Materia <sup>*</sup></label>
                    <select multiple name="materias[]" class="form-control" data-placeholder="Elija una Carrera" data-allow-clear="1">
                        <option selected>Materia 1</option>
                        <option>Materia 2</option>
                        <option>Materia 3</option>
                        <option>Materia 4</option>
                    </select>
                </div>
            </div>
            <?php generateInputCsrf(); ?>
            <div class="form-row text-md-center">
                <div class="col-md-6 mb-3">
                    <button type="submit" class="btn btn-success btn-lg">Asignar Materias</button>
                </div>
                <div class="col-md-6 mb-3">
                    <a href="<?php echo URL_ROOT; ?>/usuario" class="btn btn-danger btn-lg">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</article>
<!-- Asignar Materias Usuarios -->
<?php require APP_ROOT . "/views/partial/footer.php"; ?>