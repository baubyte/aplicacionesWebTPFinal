<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class UsuarioController extends Controller
{
    public function __construct()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!verifyCsrf()) {
                
                return $this->view('error/index', ['error' => 'Token Invalido. No se Permite la Acción.']);
            } 
        }
    }
    /**
     * Método Principal de la Entidad
     *Muestra la vista con el Listado de los Usuarios
     * @return void
     */
    public function index()
    {
        $data = [
            'titulo' => 'Administrador'
        ];
        return $this->view('usuario/index', $data);
    }
    /**
     * Método por el cual se muestra la vista para 
     * con el formulario el alta de los usuarios
     * @return void
     */
    public function create()
    {
        $data = [
            'titulo' => 'Alta Usuarios'
        ];
        return $this->view('usuario/create', $data);
    }
    /**
     * Método por el cual se registra el usuario
     * en la base de datos.
     * @return void
     */
    public function store()
    {
    }
}
