<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class Carrera{

    /**Atributo de Conexión */
    private $db;
    public function __construct()
    {
        /**Conexión a la Base de Datos */
        $this->db = Database::getInstance();
    }
    /**Se Obtiene todos las Carreras Disponibles
     *
     * @return [objet] Filas como Objeto
     */
    public function getCarreras()
    {
        $this->db->query('SELECT * FROM carreras WHERE deleted IS FALSE');
        return $this->db->resultSet();
    }

}