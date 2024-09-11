<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventoTipo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

   
    public function listar_evento_tipos() {
        $query = $this->db->get('EventoTipo');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron tipos de eventos');
        }
    }

   
    public function get_evento_tipo($EventoTipoID) {

        if (empty($EventoTipoID)) {
            return array('error' => 'ID es requerido');
        }

       if (!is_numeric($EventoTipoID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($EventoTipoID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('EventoTipoID', $EventoTipoID);
        $query = $this->db->get('EventoTipo');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'Tipo de evento no encontrado');
        }
    }

    
    public function insert($data) {
        if ($this->db->insert('EventoTipo', $data)) {
            return array('mensaje' => 'Tipo de evento creado con éxito');
        } else {
            return array('error' => 'Error al crear tipo de evento: ' . $this->db->error()['message']);
        }
    }

   
    public function update($EventoTipoID, $data) {
       if (empty($EventoTipoID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($EventoTipoID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($EventoTipoID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('EventoTipoID', $EventoTipoID);
        if ($this->db->update('EventoTipo', $data)) {
            return array('mensaje' => 'Tipo de evento actualizado con éxito');
        } else {
            return array('error' => 'Error al actualizar tipo de evento: ' . $this->db->error()['message']);
        }
    }

   
    public function delete($EventoTipoID) {

        if (empty($EventoTipoID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($EventoTipoID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($EventoTipoID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('EventoTipoID', $EventoTipoID);
        if ($this->db->delete('EventoTipo')) {
            return array('mensaje' => 'Tipo de evento eliminado con éxito');
        } else {
            return array('error' => 'Error al eliminar tipo de evento: ' . $this->db->error()['message']);
        }
    }
}
?>
