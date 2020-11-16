<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class UsuarioController extends Controller
{
    public function __construct()
    {
        /**Peticiones por POST necesario el csrf_token */
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (!verifyCsrf()) {

                return $this->view('error/index', ['error' => 'Token Invalido. No se Permite la Acción.']);
            }
        }
        /**Instancia del Modelo Usuario*/
        $this->usuarioModel = $this->model('Usuario');
        /**Instancia del Modelo Rol*/
        $this->rolModel = $this->model('Rol');
    }
    /**
     * Método Principal de la Entidad
     *Muestra la vista con el Listado de los Usuarios
     * @return void
     */
    public function index()
    {
        $data = [
            'titulo' => 'Administrador',
            'dataTables' => true
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
        /**Obtenemos Todos los Roles */
        $roles = $this->rolModel->getRoles();
        $data = [
            'titulo' => 'Alta Usuarios',
            'roles' => $roles
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
        /**Obtenemos Todos los Roles */
        $roles = $this->rolModel->getRoles();
        $data = [
            'titulo' => 'Alta Usuarios',
            'roles' => $roles
        ];
        /**Agregamos los Datos de la Validación */
        $data += $this->validate();
        /**Si no hubo errores hacemos el insert
         * caso contrario Retornamos la Vista con los errores.
         */
        if (!$data['error']) {
            //Hash Contraseña
            $data['clave'] = password_hash($data['clave'], PASSWORD_DEFAULT);
            /**Comprobamos que no hubo errores en el Insert y hacemos un redirect a 
             * usuarios/index con un mensaje
             * si hubo errores devolvemos la vista con un mensaje de error y
             * con todos los datos ingresados.
             */
            if ($this->usuarioModel->store($data)) {
                flash('usuario_index_mensaje', 'El Usuario se dio de Alta Correctamente.');
                redirect('usuario');
            } else {
                flash('usuario_create_mensaje', 'Ocurrió un Error al Intentar dar de Alta el Usuario.', 'danger');

                $this->view('usuario/create', $data);
            }
        } else {
            flash('usuario_create_mensaje', 'Surgieron Errores Por Favor Verifica, los Datos Ingresados.', 'warning');
            $this->view('usuario/create', $data);
        }
    }
    /**
     * Método por el cual se muestra la vista para 
     * con el formulario el editar un usuario
     * 
     * @return void
     */
    public function edit($id)
    {
        /**Obtenemos Todos los Roles */
        $roles = $this->rolModel->getRoles();
        /**Obtenemos Todos los Datos del Usuario */
        $usuario = $this->usuarioModel->getUsuarioById($id);
        $data = [
            'titulo' => 'Editar Usuarios',
            'roles' => $roles,
            'id' => $usuario->id,
            'nombre' => $usuario->nombre,
            'apellido' => $usuario->apellido,
            'dni' => $usuario->dni,
            'rol' => $usuario->rol_id,
            'email' => $usuario->email,
            'remail' => $usuario->email,
        ];
        return $this->view('usuario/edit', $data);
    }
    public function destroy()
    {
        /**Obtenemos el ID */
        $id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
        /**Obtenemos Todos los Datos del Usuario
         * Validación pendiente para cuanto este logueado
         */
        $usuario = $this->usuarioModel->getUsuarioById($id);
        /**Verificamos si el Usuario se elimino */
        if ($this->usuarioModel->destroy($id)) {
            flash('usuario_index_mensaje', 'El Usuario fue Eliminado Correctamente.');
            redirect('usuario');
        }else{
            flash('usuario_index_mensaje', 'Ocurrió un Error al Intentar Eliminar el Usuario.','danger');
            redirect('usuario');
        }
        
    }
    public function getUsuariosDataTables()
    {
        /**Array para el response */
        $dataResponse = [];
        /**Recibimos lo Valores de DataTable */
        $columnIndex = $_POST['order'][0]['column']; // Índice de columna
        $draw = $_POST['draw'];
        $data = [
            'row' => $_POST['start'], //Desde que registro para registro por pagina
            'rowPerPage' => $_POST['length'], //Hasta que registro para Registros por Pagina
            'columnName' => $_POST['columns'][$columnIndex]['data'], // Nombre de la Columna
            'columnSortOrder' => $_POST['order'][0]['dir'], // Orden ASC o DESC
            'searchValue' => filter_var($_POST['search']['value'], FILTER_SANITIZE_STRING) // Valor Buscado
        ];
        /** Número total de registros sin filtrar */
        $totalRegistros = $this->usuarioModel->countUsuarios();
        /**Número total de registros con filtro */
        $totalRegistrosFiltrado = $this->usuarioModel->countUsuarios($data['searchValue']);
        $usuarios = $this->usuarioModel->getUsuariosDataTables($data);
        /**Armamos el dataResponse */
        foreach ($usuarios as $key => $usuario) {
            $dataResponse[] = [
                'id' => $usuario->id,
                'key' => ($key + 1),
                'apellido' => $usuario->apellido,
                'nombre' => $usuario->nombre,
                'dni' => $usuario->dni,
                'email' => $usuario->email,
                'rol' => $usuario->rol,
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
    /**Valida todos los Datos de los Usuarios y los
     * Sanitiza, comprueba que no existan DNI duplicados y 
     * también los emails.
     *
     * @return [array] $data Un array con todos los datos.
     */
    public function validate()
    {
        /**Recepción de Campos */
        $data = [
            'nombre' => ucwords(strtolower(trim(filter_input(INPUT_POST, 'nombre', FILTER_SANITIZE_STRING)))),
            'apellido' => ucwords(strtolower(trim(filter_input(INPUT_POST, 'apellido', FILTER_SANITIZE_STRING)))),
            'dni' => filter_input(INPUT_POST, 'dni', FILTER_SANITIZE_NUMBER_INT),
            'rol' => filter_input(INPUT_POST, 'rol', FILTER_SANITIZE_NUMBER_INT),
            'email' => strtolower(filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)),
            'remail' => strtolower(filter_input(INPUT_POST, 'remail', FILTER_SANITIZE_EMAIL)),
            'clave' => filter_input(INPUT_POST, 'clave', FILTER_SANITIZE_STRING),
            'rclave' => filter_input(INPUT_POST, 'rclave', FILTER_SANITIZE_STRING),
            'nombre_err' => '',
            'apellido_err' => '',
            'dni_err' => '',
            'rol_err' => '',
            'email_err' => '',
            'remail_err' => '',
            'clave_err' => '',
            'rclave_err' => '',
            'error' => false
        ];
        /**Validaciones de Todos los Campos con las Distintas Reglas*/
        //Nombre
        if (empty($data['nombre'])) {
            $data['nombre_err'] = 'El Nombre es un Campo Obligatorio.';
            $data['error'] = true;
        } else if (strlen($data['nombre']) < 3) {
            $data['nombre_err'] = 'El Nombre debe Contener al Menos 3 Caracteres.';
            $data['error'] = true;
        }
        //Apellido
        if (empty($data['apellido'])) {
            $data['apellido_err'] = 'El Apellido es un Campo Obligatorio.';
            $data['error'] = true;
        } else if (strlen($data['apellido']) < 3) {
            $data['apellido_err'] = 'El Apellido debe Contener al Menos 3 Caracteres.';
            $data['error'] = true;
        }
        //DNI
        if (empty($data['dni'])) {
            $data['dni_err'] = 'El Número de Documento es un Campo Obligatorio.';
            $data['error'] = true;
        } else if (strlen($data['dni']) < 7 && filter_var($data['dni'], FILTER_VALIDATE_INT)) {
            $data['dni_err'] = 'El Número de Documento debe Contener al Menos 7 Números.';
            $data['error'] = true;
        } else {
            if ($this->usuarioModel->existsUsuarioByDocumento($data['dni'])) {
                $data['dni_err'] = 'El Número de Documento ya se Encuentra Dado de Alta.';
                $data['error'] = true;
            }
        }
        //Email
        if (empty($data['email']) && filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $data['email_err'] = 'El Email es un Campo Obligatorio y debe Ser Válido.';
            $data['error'] = true;
        } else {
            if ($this->usuarioModel->existsUsuarioByEmail($data['email'])) {
                $data['email_err'] = 'El Email ya se Encuentra Dado de Alta.';
                $data['error'] = true;
            }
        }
        //REmail
        if (empty($data['remail']) && filter_var($data['remail'], FILTER_VALIDATE_EMAIL)) {
            $data['remail_err'] = 'Confirmar Email es un Campo Obligatorio y debe Ser Válido.';
            $data['error'] = true;
        } else if ($data['email'] != $data['remail']) {
            $data['remail_err'] = 'Los Emails no Coinciden.';
            $data['error'] = true;
        }
        //Contraseña
        if (empty($data['clave'])) {
            $data['clave_err'] = 'La Contraseña es un Campo Obligatorio.';
            $data['error'] = true;
        } else if (strlen($data['clave']) < 6) {
            $data['clave_err'] = 'La Contraseña debe Contener al Menos 6 Caracteres.';
            $data['error'] = true;
        }
        //RContraseña
        if (empty($data['rclave'])) {
            $data['rclave_err'] = 'Confirmar Contraseña es un Campo Obligatorio.';
            $data['error'] = true;
        } else if ($data['clave'] != $data['rclave']) {
            $data['rclave_err'] = 'Las Contraseñas no Coinciden.';
            $data['error'] = true;
        }
        return $data;
    }
}
