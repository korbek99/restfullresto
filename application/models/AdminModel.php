<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function listar_admins() {
        $query = $this->db->get('Admins');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron admins');
        }
    }

    
    public function get_admin($adminID) {

       if (empty($adminID)) {
            return array('error' => 'ID es requerido');
       }

       if (!is_numeric($adminID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($adminID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('adminID', $adminID);
        $query = $this->db->get('Admins');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'Administrador no encontrado');
        }
    }

    
    public function insert($data) {
        if ($this->db->insert('Admins', $data)) {
            return array('mensaje' => 'Administrador creado con éxito');
        } else {
            return array('error' => 'Error al crear administrador: ' . $this->db->error()['message']);
        }
    }

    // Método para actualizar un administrador existente
    public function update($adminID, $data) {

      if (empty($adminID)) {
            return array('error' => 'ID es requerido');
      }

      if (!is_numeric($adminID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($adminID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('adminID', $adminID);
        if ($this->db->update('Admins', $data)) {
            return array('mensaje' => 'Administrador actualizado con éxito');
        } else {
            return array('error' => 'Error al actualizar administrador: ' . $this->db->error()['message']);
        }
    }

    // Método para eliminar un administrador
    public function delete($adminID) {

       if (empty($adminID)) {
            return array('error' => 'ID es requerido');
       }

      if (!is_numeric($adminID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($adminID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('adminID', $adminID);
        if ($this->db->delete('Admins')) {
            return array('mensaje' => 'Administrador eliminado con éxito');
        } else {
            return array('error' => 'Error al eliminar administrador: ' . $this->db->error()['message']);
        }
    }
}
?>
