<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuArchivos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function listar_archivos() {
        $query = $this->db->get('Menu_Archivos');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron archivos de menús');
        }
    }

    
    public function get_archivo($MenuArchiID) {

        if (empty($MenuArchiID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($MenuArchiID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($MenuArchiID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('MenuArchiID', $MenuArchiID);
        $query = $this->db->get('Menu_Archivos');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'Archivo de menú no encontrado');
        }
    }

    public function insert($data) {
        if ($this->db->insert('Menu_Archivos', $data)) {
            return array('mensaje' => 'Archivo de menú creado con éxito');
        } else {
            return array('error' => 'Error al crear archivo de menú: ' . $this->db->error()['message']);
        }
    }

    
    public function update($MenuArchiID, $data) {

        if (empty($MenuArchiID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($MenuArchiID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($MenuArchiID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('MenuArchiID', $MenuArchiID);
        if ($this->db->update('Menu_Archivos', $data)) {
            return array('mensaje' => 'Archivo de menú actualizado con éxito');
        } else {
            return array('error' => 'Error al actualizar archivo de menú: ' . $this->db->error()['message']);
        }
    }

    
    public function delete($MenuArchiID) {

        if (empty($MenuArchiID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($MenuArchiID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($MenuArchiID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('MenuArchiID', $MenuArchiID);
        if ($this->db->delete('Menu_Archivos')) {
            return array('mensaje' => 'Archivo de menú eliminado con éxito');
        } else {
            return array('error' => 'Error al eliminar archivo de menú: ' . $this->db->error()['message']);
        }
    }
}
?>
