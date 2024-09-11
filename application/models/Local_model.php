<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Local_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function listar_locales() {
        $query = $this->db->get('Local');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron locales');
        }
    }

   
    public function get_local($LocalID) {

        if (empty($LocalID)) {
            return array('error' => 'ID es requerido');
        }

        if (empty($LocalID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($LocalID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($LocalID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('LocalID', $LocalID);
        $query = $this->db->get('Local');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'Local no encontrado');
        }
    }

   
    public function insert($data) {
        if ($this->db->insert('Local', $data)) {
            return array('mensaje' => 'Local creado con éxito');
        } else {
            return array('error' => 'Error al crear local: ' . $this->db->error()['message']);
        }
    }

    public function update($LocalID, $data) {

         if (empty($LocalID)) {
            return array('error' => 'ID es requerido');
        }

        if (empty($LocalID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($LocalID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($LocalID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('LocalID', $LocalID);
        if ($this->db->update('Local', $data)) {
            return array('mensaje' => 'Local actualizado con éxito');
        } else {
            return array('error' => 'Error al actualizar local: ' . $this->db->error()['message']);
        }
    }

   
    public function delete($LocalID) {

         if (empty($LocalID)) {
            return array('error' => 'ID es requerido');
        }

        if (empty($LocalID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($LocalID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($LocalID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('LocalID', $LocalID);
        if ($this->db->delete('Local')) {
            return array('mensaje' => 'Local eliminado con éxito');
        } else {
            return array('error' => 'Error al eliminar local: ' . $this->db->error()['message']);
        }
    }
}
?>
