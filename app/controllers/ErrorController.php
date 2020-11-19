<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class ErrorController extends Controller
{
    /**
     * Método Principal de la Entidad
     *Muestra la vista con los errores.
     * @return void
     */
    public function show($error)
    {
        switch ($error) {
            case 'view':
                $data = ['error' => 'No encontramos lo que Buscabas, regrese e Intente de Nuevo.'];
                break;
            default:
                $data = ['error' => 'Surgió un Error. Intente de Nuevo.'];
                break;
        }
        return $this->view('error/index', $data);
    }
}
