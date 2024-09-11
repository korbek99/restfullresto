<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function listar_usuarios() {
        $query = $this->db->get('Usuarios');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron usuarios');
        }
    }

   
    public function get_usuario($usuariosID) {

        if (empty($usuariosID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($usuariosID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($usuariosID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('usuariosID', $usuariosID);
        $query = $this->db->get('Usuarios');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'Usuario no encontrado');
        }
    }

     public function verificar_credenciales($usuario, $password) {

        if (empty($usuario)) {
            return array('error' => 'usuario es requerido');
        }
        
        if (empty($password)) {
            return array('error' => 'password es requerido');
        }

        $this->db->where('usuario', $usuario);  
        $this->db->where('password', md5($password));  // Encriptación de contraseña con md5 (por seguridad, considera usar una función más segura como password_hash)
        $query = $this->db->get('Usuarios');
        
        if ($query->num_rows() == 1) {
            return $query->row_array(); 
        } else {
            return false; 
        }
    }

    
    public function insert($data) {
        if ($this->db->insert('Usuarios', $data)) {
            return array('mensaje' => 'Usuario creado con éxito');
        } else {
            return array('error' => 'Error al crear usuario: ' . $this->db->error()['message']);
        }
    }

   
    public function update($usuariosID, $data) {

        if (empty($usuariosID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($usuariosID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($usuariosID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }
       
        $this->db->where('usuariosID', $usuariosID);
        if ($this->db->update('Usuarios', $data)) {
            return array('mensaje' => 'Usuario actualizado con éxito');
        } else {
            return array('error' => 'Error al actualizar usuario: ' . $this->db->error()['message']);
        }
    }

   
    public function delete($usuariosID) {

        if (empty($usuariosID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($usuariosID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($usuariosID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('usuariosID', $usuariosID);
        if ($this->db->delete('Usuarios')) {
            return array('mensaje' => 'Usuario eliminado con éxito');
        } else {
            return array('error' => 'Error al eliminar usuario: ' . $this->db->error()['message']);
        }
    }
}
?>
