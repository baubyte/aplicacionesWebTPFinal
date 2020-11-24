<?php require APP_ROOT . "/views/partial/header.php"; ?>
<?php require APP_ROOT . "/views/partial/navbar.php"; ?>
<?php require APP_ROOT . "/views/partial/sidebar.php"; ?>

<article class="MainMenu">
  <br>
    <div class="container">
    <ul class="nav nav-tabs" id="myTab" role="tablist">
  <li class="nav-item" role="presentation">
    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Nueva mesa</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Modificar mesa</a>
  </li>
  <li class="nav-item" role="presentation">
    <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">Eliminar mesa</a>
  </li>
</ul>
<div class="tab-content" id="myTabContent">
  <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                        <!----------------Primera pestaña----------------------------->
  <div class="card text-center">
  <div class="card-body">
    <h5 class="card-title">Ingrese los datos del docente</h5>
    <div class="card">
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <form class="needs-validation" novalidate>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationCustom01">Nombre</label>
                    <input type="text" class="form-control" id="validationCustom01" required name="nombreMesaprofesor">
                      <div class="valid-feedback"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationCustom02">Apellido</label>
                  <input type="text" class="form-control" id="validationCustom02" required name="apellidoMesaProfesor">
                    <div class="valid-feedback"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationCustom03">Asignar fecha</label>
                    <input type="date" class="form-control" id="validationCustom03" required name="fechaMesaProfesor">
                      <div class="valid-feedback"></div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="validationCustom04">Materia</label>
                  <select class="custom-select" id="validationCustom04" required name="materiaMesaProfesor">
                    <option selected disabled value="">...</option>
                    <option>...</option>
                    <option>...</option>
                    <option>...</option>
                  </select>
                    <div class="invalid-feedback">
                      Por favor, seleccione la materia.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="validationCustom05">Cuatrimestre</label>
                    <select class="custom-select" id="validationCustom05" required name="cuatrimestreMesaProfesor">
                      <option selected disabled value="">...</option>
                      <option>...</option>
                      <option>...</option>
                      <option>...</option>
                    </select>
                      <div class="invalid-feedback">
                        Por favor, seleccione el cuatrimestre.
                      </div>
      </div>
    </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck">
            Confirmo que los datos están correctos.
          </label>
            <div class="invalid-feedback">
              Debe tildar el recuadro confirmando que los datos son correctos.
            </div>
        </div>
      </div>
        <button class="btn btn-success" type="submit">Crear mesa de inscripciones</button>
  </form>
    </blockquote>
  </div>
</div>
  </div>
</div>
            <!---------------------------Primera pestaña---------------------------------->
  </div>
  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
            <!---------------------------Segunda Pestaña-------------------------------->
            <article>
  <!-- Listado de Mesas Finales Inscripción -->
  <div class="container">
    <?php flash('inscripcionmesa_index_mensaje'); ?>
    <div class="row">
      <div class="col-12 text-center">
        <h4>En ésta sección podrás Ver las Mesas Habilitas.</h4>
      </div>
    </div>
    <table id="tablaInscripcionMesas" class="table table-bordered table-sm table-hover table-striped nowrap" style="width:100%">
      <thead class="thead-dark">
        <tr>
          <th scope="col" class="col-1">#</th>
          <th scope="col">Materia</th>
          <th scope="col">Aula</th>
          <th scope="col">Fecha</th>
          <th scope="col" class="col-1">Acciones</th>
          <th></th>
        </tr>
      </thead>
      <tbody>
      </tbody>
    </table>
    <!--/Listado de Mesas Finales Inscripción -->
    <!-- Modal Inscribir -->
    <div class="modal fade" id="modalInscribir" tabindex="-1" role="dialog" aria-labelledby="modalInscribirTitle" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h4 class="modal-title" id="modalInscribirLongTitle">Inscribirme</h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <h5 class="text-bold">¿Estas seguro que te Quieres Inscribir?</h5>
            <h6 id="fecha"></h6>
            <h6 id="materia"></h6>
            <form action="<?php echo URL_ROOT; ?>/inscripcionmesa/store" method="post">
              <input type="hidden" name="id" id="id" value="">
              <?php generateInputCsrf(); ?>
          </div>
          <div class="modal-footer">
            <button type="submit" class="btn btn-success">Inscribirme</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
          </div>
          </form>
        </div>
      </div>
    </div>
    <!--/Modal Eliminar -->
  </div>
</article>
                  <!------------------------Segunda pestaña-------------------------->
  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                  <!------------------------Tercera pestaña-------------------------->
                  <div class="card text-center">
  <div class="card-body">
    <h5 class="card-title">Ingrese los datos del docente</h5>
    <div class="card">
        <div class="card-body">
          <blockquote class="blockquote mb-0">
            <form class="needs-validation" novalidate>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationCustom01">Nombre</label>
                    <input type="text" class="form-control" id="validationCustom01" required name="nombreMesaprofesor">
                      <div class="valid-feedback"></div>
                </div>
                <div class="col-md-6 mb-3">
                  <label for="validationCustom02">Apellido</label>
                  <input type="text" class="form-control" id="validationCustom02" required name="apellidoMesaProfesor">
                    <div class="valid-feedback"></div>
                </div>
              </div>
              <div class="form-row">
                <div class="col-md-6 mb-3">
                  <label for="validationCustom03">Asignar nueva fecha fecha</label>
                    <input type="date" class="form-control" id="validationCustom03" required name="fechaMesaProfesor">
                      <div class="valid-feedback"></div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="validationCustom04">Materia</label>
                  <select class="custom-select" id="validationCustom04" required name="materiaMesaProfesor">
                    <option selected disabled value="">...</option>
                    <option>...</option>
                    <option>...</option>
                    <option>...</option>
                  </select>
                    <div class="invalid-feedback">
                      Por favor, seleccione la materia.
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                  <label for="validationCustom05">Cuatrimestre</label>
                    <select class="custom-select" id="validationCustom05" required name="cuatrimestreMesaProfesor">
                      <option selected disabled value="">...</option>
                      <option>...</option>
                      <option>...</option>
                      <option>...</option>
                    </select>
                      <div class="invalid-feedback">
                        Por favor, seleccione el cuatrimestre.
                      </div>
      </div>
    </div>
      <div class="form-group">
        <div class="form-check">
          <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
          <label class="form-check-label" for="invalidCheck">
            Confirmo que deseo eliminar la mesa.
          </label>
            <div class="invalid-feedback">
              Debe tildar el recuadro confirmando la anulación de la mesa.
            </div>
        </div>
      </div>
        <button class="btn btn-danger" type="submit">Eliminar mesa de inscripciones</button>
  </form>
    </blockquote>
  </div>
</div>
  </div>
</div>
  </div>
              <!--------------------Tercera pestaña--------------------------->
  </div>
</div>
<script>
// Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  'use strict';
  window.addEventListener('load', function() {
    // Fetch all the forms we want to apply custom Bootstrap validation styles to
    var forms = document.getElementsByClassName('needs-validation');
    // Loop over them and prevent submission
    var validation = Array.prototype.filter.call(forms, function(form) {
      form.addEventListener('submit', function(event) {
        if (form.checkValidity() === false) {
          event.preventDefault();
          event.stopPropagation();
        }
        form.classList.add('was-validated');
      }, false);
    });
  }, false);
})();
</script>
    </div>
</article>
<?php require APP_ROOT . "/views/partial/footer.php"; ?>