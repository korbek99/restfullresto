<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudad_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

   
    public function listar_ciudades() {
        $query = $this->db->get('Ciudad');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron ciudades');
        }
    }

    
    public function get_ciudad($ciudadID) {

        if (empty($ciudadID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($ciudadID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($ciudadID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('ciudadID', $ciudadID);
        $query = $this->db->get('Ciudad');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'Ciudad no encontrada');
        }
    }

   
    public function insert($data) {
        if ($this->db->insert('Ciudad', $data)) {
            return array('mensaje' => 'Ciudad creada con éxito');
        } else {
            return array('error' => 'Error al crear ciudad: ' . $this->db->error()['message']);
        }
    }

   
    public function update($ciudadID, $data) {

        if (!is_numeric($ciudadID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($ciudadID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('ciudadID', $ciudadID);
        if ($this->db->update('Ciudad', $data)) {
            return array('mensaje' => 'Ciudad actualizada con éxito');
        } else {
            return array('error' => 'Error al actualizar ciudad: ' . $this->db->error()['message']);
        }
    }

    
    public function delete($ciudadID) {

        if (empty($ciudadID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($ciudadID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($ciudadID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('ciudadID', $ciudadID);
        if ($this->db->delete('Ciudad')) {
            return array('mensaje' => 'Ciudad eliminada con éxito');
        } else {
            return array('error' => 'Error al eliminar ciudad: ' . $this->db->error()['message']);
        }
    }
}
?>
