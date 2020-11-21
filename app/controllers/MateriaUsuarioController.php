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
        $this->materiaUsuarioModel = $this->model('MateriaUsuario');
    }
    public function create($dni)
    {
        $usuario = $this->usuarioModel->getUsuarioByDni($dni);
        isAdmin();
        $data =         $data = [
            'titulo' => 'Asignar Materias',
            'usuario' => $usuario,
        ];
        return $this->view('materiausuario/create',$data);
    }

}
