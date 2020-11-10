<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class UserController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        $data = [
            'titulo' => 'Administrador'
        ];
        return $this->view('user/index', $data);
    }

}
