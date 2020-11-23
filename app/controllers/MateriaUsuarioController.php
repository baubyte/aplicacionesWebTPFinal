<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class MateriaUsuarioController extends Controller
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
        /**Instancia del Modelo Materia Usuario*/
        //$this->materiaUsuarioModel = $this->model('MateriaUsuario');
        /**Instancia del Modelo Carrera*/
        $this->carreraModel = $this->model('Carrera');
    }
    public function create($dni = null)
    {
        /**Comprobamos que se Administrador */
        isAdmin();
        /**Si el Parámetro que Necesitamos es Null lo Redirigimos al Index de Usuario */
        if (is_null($dni)) {
            redirect('usuario');
            exit();
        }
        /**Obtenemos los Datos del Usuario */
        $usuario = $this->usuarioModel->getUsuarioByDni($dni);
        /**Obtenemos las Carreras */
        $carreras = $this->carreraModel->getCarreras();
        $data =         $data = [
            'titulo' => 'Asignar Materias',
            'id' => $usuario->id,
            'nombre' => $usuario->nombre,
            'apellido' => $usuario->apellido,
            'dni' => $usuario->dni,
            'carreras' => $carreras,
        ];
        return $this->view('materiausuario/create', $data);
    }
    public function store()
    {
        echo $_POST['carrera'] . '<br>';
        foreach ($_POST['materias'] as $materia) {
            echo $materia . '<br>';
        }
    }
    public function getMateriaUsuarioByCarrera($idCarrera)
    {
        echo $idCarrera;
    }
}
