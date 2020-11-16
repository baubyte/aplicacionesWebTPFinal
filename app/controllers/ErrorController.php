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
            case 'csrf':
                $data = ['error' => 'Token Invalido o Expiro, regrese e Intente de Nuevo.'];
                break;
            case 'view':
                $data = ['error' => 'No encontramos lo que Busacabas, regrese e Intente de Nuevo.'];
                break;
            default:
                $data = ['error' => 'Surgio un Error. Intente de Nuevo.'];
                break;
        }
        return $this->view('error/index', $data);
    }
}
