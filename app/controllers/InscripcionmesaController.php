<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class InscripcionmesaController extends Controller
{
   public function __construct()
   {
      /**Peticiones por POST necesario el csrf_token */
      if (verifyCsrf()) {
         redirect('error/show/csrf');
         exit();
      }
      /**Instancia del Modelo Usuario*/
      $this->usuarioModel = $this->model('Usuario');
      /**Instancia del Modelo Mesas Finales*/
      $this->mesaFinalModel = $this->model('MesaFinal');
      /**Instancia del Modelo Inscripciones Finales*/
      $this->inscripcionFinalModel = $this->model('InscripcionMesa');
   }
    /**
     * Método Principal de la Entidad
     * Muestra la vista con el Listado de las Mesas
     * disponibles.
     * 
     * @return void
     */
   public function index()
   {
      /**Comprobamos que sea un Alumno */
      isAlumno();
      $data = [
         'titulo' => 'Mesas Finales',
         'dataTables' => 'InscripcionMesas',
      ];
      return $this->view('inscripcionmesa/index', $data);
   }
   /**
    * Se obtiene todos las Mesas de Finales Habilitadas
    * En Formato JSON para ser Usado en DataTables
    *
    * @return json
    */
   public function getMesasFinalesHasUserDt()
   {
      /**Array para el response */
      $dataResponse = [];
      /**Recibimos lo Valores de DataTable */
      $columnIndex = $_GET['order'][0]['column']; // Índice de columna
      $draw = $_GET['draw'];
      $data = [
         'row' => $_GET['start'], //Desde que registro para registro por pagina
         'rowPerPage' => $_GET['length'], //Hasta que registro para Registros por Pagina
         'columnName' => $_GET['columns'][$columnIndex]['data'], // Nombre de la Columna
         'columnSortOrder' => $_GET['order'][0]['dir'], // Orden ASC o DESC
         'searchValue' => filter_var($_GET['search']['value'], FILTER_SANITIZE_STRING), // Valor Buscado
         'usuario_id' => $_SESSION['usuario_id'],
      ];
      /** Número total de registros sin filtrar */
      $totalRegistros = $this->mesaFinalModel->countMesasFinalHasUserDt(null, $_SESSION['usuario_id']);
      /**Número total de registros con filtro */
      $totalRegistrosFiltrado = $this->mesaFinalModel->countMesasFinalHasUserDt($data['searchValue'], $_SESSION['usuario_id']);
      $mesasFinales = $this->mesaFinalModel->getMesasFinalesHasUserDt($data);
      /**Armamos el dataResponse */
      foreach ($mesasFinales as $key => $mesaFinal) {
         $dataResponse[] = [
            'id' => $mesaFinal->id,
            'key' => ($key + 1),
            'materia' => $mesaFinal->materia,
            'aula' => $mesaFinal->aula,
            'fecha' => $mesaFinal->fecha,
         ];
      }
      /**Armamos el response para el Ajax */
      $response = [
         "draw" => intval($draw),
         "iTotalRecords" => $totalRegistros,
         "iTotalDisplayRecords" => $totalRegistrosFiltrado,
         "aaData" => $dataResponse
      ];
      /**Mostramos el resultado en JSON */
      echo json_encode($response);
   }

   /**
    * Método por el cual se registra o asignas 
    * materias al usuario y son registradas
    * en la base de datos.
    * 
    * @return void
    */
   public function store()
   {
      /**Comprobamos que sea un Alumno */
      isAlumno();
      $data = [
         'titulo' => 'Mesas Finales',
         'dataTables' => 'InscripcionMesas',
      ];
      /**Comprobamos que no hubo errores en el Insert y hacemos un redirect a 
       * inscripcionmesa/index con un mensaje
       * si hubo errores devolvemos la vista con un mensaje de error y
       * con todos los datos ingresados.
       */
      $mesaId = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
      if ($this->inscripcionFinalModel->store($_SESSION['usuario_id'], $mesaId)) {
         flash('inscripcionmesa_index_mensaje', 'La Inscripción se Realizo Correctamente.');
         redirect('inscripcionmesa');
      } else {
         flash('inscripcionmesa_index_mensaje', 'Ocurrió un Error al Intentar Realizar la Incripción.', 'danger');
         return $this->view('inscripcionmesa', $data);
      }
   }
}
