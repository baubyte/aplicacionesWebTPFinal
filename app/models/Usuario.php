<?php
defined('BASEPATH') or exit('No se permite acceso directo');
class Usuario
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    public function store($data)
    {
        $this->db->query('INSERT INTO 
                            usuarios (rol_id, email, password, nombre, apellido, dni) 
                        VALUES 
                        (:rol_id, :email, :password, :nombre, :apellido, :dni)
                        ');
        $this->db->bind(':rol_id', $data['rol']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':nombre', $data['nombre']);
        $this->db->bind(':apellido', $data['apellido']);
        $this->db->bind(':dni', $data['dni']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function delete($id)
    {
        $this->db->query('UPDATE usuarios SET deleted = 1 WHERE id = :id');
        $this->db->bind(':id', $id);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function login($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();

        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function checkPassword($email, $password)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $row = $this->db->single();
        $hashed_password = $row->password;
        if (password_verify($password, $hashed_password)) {
            return $row;
        } else {
            return false;
        }
    }

    public function getUserByEmail($email)
    {
        $this->db->query('SELECT * FROM users WHERE email = :email');
        $this->db->bind(':email', $email);
        $this->db->single();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }
    }

    public function getUserById($id)
    {
        $this->db->query('SELECT * FROM users WHERE id = :id');
        $this->db->bind(':id', $id);
        return $this->db->single();
    }

    public function updatePassword($data)
    {
        $this->db->query('UPDATE users SET password = :password WHERE email = :email');
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':email', $data['email']);
        if ($this->db->execute()) {
            return true;
        } else {
            return false;
        }
    }

    public function getUsers()
    {
        $this->db->query('SELECT * FROM users');
        return $this->db->resultSet();
    }
}
