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
        $data =         $data = [
            'titulo' => 'Asignar Materias',
            'usuario' => $usuario,
        ];
        return $this->view('materiausuario/create', $data);
    }
}
