<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebarAdministrador.php"; ?>
<article class="MainMenu">
    <div class="row">
        <div class="col-12 text-center">
            <h4>En ésta sección usted podrá dar de alta Usuarios</h4>
        </div>
    </div>
    <div class="container">
        <form action="<?php echo URL_ROOT; ?>/user/store" method="post">
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="nombre">Nombre <sup>*</sup></label>
                    <input type="text" class="form-control <?php echo (!empty($data['nombre_err'])) ? 'is-invalid' : ''; ?>" id="nombre" name="nombre" value="<?php echo (!empty($data['nombre'])) ? $data['nombre'] : ''; ?>" required>
                    <div class="valid-feedback"><?php echo (!empty($data['nombre_err'])) ?  $data['nombre_err'] : '' ; ?></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="apellido">Apellido <sup>*</sup></label>
                    <input type="text" class="form-control <?php echo (!empty($data['apellido_err'])) ? 'is-invalid' : ''; ?>" id="apellido" name="apellido" value="<?php echo (!empty($data['apellido'])) ? $data['apellido'] : ''; ?>" required>
                    <div class="valid-feedback"><?php (!empty($data['apellido_err'])) ?  $data['apellido_err'] : '' ; ; ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="dni">Documento <sup>*</sup></label>
                    <input type="text" class="form-control <?php echo (!empty($data['dni_err'])) ? 'is-invalid' : ''; ?>" id="dni" name="dni" value="<?php echo (!empty($data['dni'])) ? $data['dni'] : ''; ?>" required>
                    <div class="valid-feedback"><?php echo (!empty($data['dni_err'])) ?  $data['dni_err'] : ''; ?></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="dni">Rol <sup>*</sup></label>
                    <select name="rol" id="rol" class="form-control" required>
                        <option selected disabled value="">Seleccione</option>
                        <option value="1">Administrador</option>
                        <option value="2">Profesor</option>
                        <option value="3">Alumno</option>
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="email">Email <sup>*</sup></label>
                    <input type="email" class="form-control <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" id="email" name="email" value="<?php echo (!empty($data['email'])) ? $data['email'] : ''; ?>" required>
                    <div class="valid-feedback"><?php echo (!empty($data['email_err'])) ?  $data['email_err'] : '' ;  ?></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="remail">Repetir Email <sup>*</sup></label>
                    <input type="remail" class="form-control <?php echo (!empty($data['remail_err'])) ? 'is-invalid' : ''; ?>" id="remail" name="remail" value="<?php echo (!empty($data['remail'])) ? $data['remail'] : ''; ?>" required>
                    <div class="valid-feedback"><?php echo (!empty($data['remail_err'])) ?  $data['remail_err'] : '' ;  ?></div>
                </div>
            </div>
            <div class="form-row">
                <div class="col-md-6 mb-3">
                    <label for="clave">Contraseña <sup>*</sup></label>
                    <input type="password" class="form-control <?php echo (!empty($data['clave_err'])) ? 'is-invalid' : ''; ?>" id="clave" name="clave" value="<?php echo (!empty($data['clave'])) ? $data['clave'] : ''; ?>" required>
                    <div class="valid-feedback"><?php echo (!empty($data['clave_err'])) ?  $data['clave_err'] : '' ;  ?></div>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="rclave">Repetir Contraseña <sup>*</sup></label>
                    <input type="password" class="form-control <?php echo (!empty($data['rclave_err'])) ? 'is-invalid' : ''; ?>" id="rclave" name="rclave" value="<?php echo (!empty($data['rclave'])) ? $data['rclave'] : ''; ?>" required>
                    <div class="valid-feedback"><?php echo (!empty($data['rclave_err'])) ?  $data['rclave_err'] : '' ;  ?></div>
                </div>
            </div>
            <?php generateCsrf(); ?>
            <div class="form-row">
                <button type="submit" class="btn btn-success btn-lg">Dar de alta</button>
            </div>
        </form>
    </div>
</article>