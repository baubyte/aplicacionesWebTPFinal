<?php require APP_ROOT ."/views/partial/navbar.php"; ?>
<?php require APP_ROOT ."/views/partial/sidebarAdministrador.php"; ?>
<article>
  <div class="container-fluid">
  <?php flash('usuario_index_mensaje'); ?>
  <div class="row">
        <div class="col-12 text-center">
            <h4>En ésta sección usted podrá Ver Todos Los Usuarios.</h4>
        </div>
    </div>
  <table id="tablaUsuarios" class="table table-bordered table-sm table-hover table-striped dt-responsive nowrap" style="width:100%">
        <thead class="thead-dark">
            <tr>
                <th scope="col">#</th>
                <th scope="col">Apellido</th>
                <th scope="col">Nombre</th>
                <th scope="col">Número de Documento</th>
                <th scope="col">Email</th>
                <th scope="col">Rol</th>
                <th scope="col">Acciones</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
        </tbody>
    </table>
  </div>
</article>