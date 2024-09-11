<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

   
    public function listar_paises() {
        $query = $this->db->get('Pais');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron países');
        }
    }

    
    public function get_pais($paisID) {

        if (empty($paisID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($paisID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($paisID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('paisID', $paisID);
        $query = $this->db->get('Pais');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'País no encontrado');
        }
    }

    
    public function insert($data) {
        if ($this->db->insert('Pais', $data)) {
            return array('mensaje' => 'País creado con éxito');
        } else {
            return array('error' => 'Error al crear país: ' . $this->db->error()['message']);
        }
    }

   
    public function update($paisID, $data) {

        if (empty($paisID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($paisID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($paisID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('paisID', $paisID);
        if ($this->db->update('Pais', $data)) {
            return array('mensaje' => 'País actualizado con éxito');
        } else {
            return array('error' => 'Error al actualizar país: ' . $this->db->error()['message']);
        }
    }

   
    public function delete($paisID) {

        if (empty($paisID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($paisID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($paisID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }
        
        $this->db->where('paisID', $paisID);
        if ($this->db->delete('Pais')) {
            return array('mensaje' => 'País eliminado con éxito');
        } else {
            return array('error' => 'Error al eliminar país: ' . $this->db->error()['message']);
        }
    }
}
?>
