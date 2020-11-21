Mat<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class MateriaUsuario{

    /**Atributo de Conexión */
    private $db;
    public function __construct()
    {
        /**Conexión a la Base de Datos */
        $this->db = Database::getInstance();
    }

}