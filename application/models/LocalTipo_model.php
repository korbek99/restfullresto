<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LocalTipo_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

   
    public function listar_locales_tipos() {
        $query = $this->db->get('LocalTipo');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron tipos de locales');
        }
    }

    
    public function get_local_tipo($LocalTipoID) {

        if (empty($LocalTipoID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($LocalTipoID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($LocalTipoID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('LocalTipoID', $LocalTipoID);
        $query = $this->db->get('LocalTipo');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'Tipo de local no encontrado');
        }
    }

   
    public function insert($data) {
        if ($this->db->insert('LocalTipo', $data)) {
            return array('mensaje' => 'Tipo de local creado con éxito');
        } else {
            return array('error' => 'Error al crear tipo de local: ' . $this->db->error()['message']);
        }
    }

    
    public function update($LocalTipoID, $data) {

        if (empty($LocalTipoID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($LocalTipoID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($LocalTipoID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('LocalTipoID', $LocalTipoID);
        if ($this->db->update('LocalTipo', $data)) {
            return array('mensaje' => 'Tipo de local actualizado con éxito');
        } else {
            return array('error' => 'Error al actualizar tipo de local: ' . $this->db->error()['message']);
        }
    }

   
    public function delete($LocalTipoID) {

        if (empty($LocalTipoID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($LocalTipoID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($LocalTipoID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('LocalTipoID', $LocalTipoID);
        if ($this->db->delete('LocalTipo')) {
            return array('mensaje' => 'Tipo de local eliminado con éxito');
        } else {
            return array('error' => 'Error al eliminar tipo de local: ' . $this->db->error()['message']);
        }
    }
}
?>
