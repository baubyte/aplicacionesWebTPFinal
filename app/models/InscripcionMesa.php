<?php
defined('BASEPATH') or exit('No se permite acceso directo');

class InscripcionMesa
{

    /**Atributo de Conexión */
    private $db;
    public function __construct()
    {
        /**Conexión a la Base de Datos */
        $this->db = Database::getInstance();
    }
    /**Realiza un INSERT de las Materias Asignadas al Usuario 
     * con todos los datos de la materia.
     *
     * @param [int] $id ID del Usuario
     * @param [int] $id ID de la Materia
     * @return [boolean] TRUE si se hizo el INSERT sino FALSE
     */
    public function store($usuarioId,$mesaId)
    {
        $this->db->query('INSERT INTO 
                            inscripciones_mesas (usuario_id, mesa_final_id) 
                        VALUES 
                        (:usuario_id, :mesa_final_id)
                        ');
        $this->db->bind(':usuario_id', $usuarioId);
        $this->db->bind(':mesa_final_id', $mesaId);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }
}
