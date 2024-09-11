<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoMenu_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    // Método para listar todos los tipos de menú
    public function listar_tipo_menu() {
        $query = $this->db->get('TipoMenu');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron tipos de menú');
        }
    }

    // Método para obtener un tipo de menú por ID
    public function get_tipo_menu($TipoMenuID) {

        if (empty($TipoMenuID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($TipoMenuID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($TipoMenuID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('TipoMenuID', $TipoMenuID);
        $query = $this->db->get('TipoMenu');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'Tipo de menú no encontrado');
        }
    }

    // Método para insertar un nuevo tipo de menú
    public function insert($data) {
        if ($this->db->insert('TipoMenu', $data)) {
            return array('mensaje' => 'Tipo de menú creado con éxito');
        } else {
            return array('error' => 'Error al crear tipo de menú: ' . $this->db->error()['message']);
        }
    }

    // Método para actualizar un tipo de menú existente
    public function update($TipoMenuID, $data) {
        
        if (empty($TipoMenuID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($TipoMenuID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($TipoMenuID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }
        
        $this->db->where('TipoMenuID', $TipoMenuID);
        if ($this->db->update('TipoMenu', $data)) {
            return array('mensaje' => 'Tipo de menú actualizado con éxito');
        } else {
            return array('error' => 'Error al actualizar tipo de menú: ' . $this->db->error()['message']);
        }
    }

    // Método para eliminar un tipo de menú
    public function delete($TipoMenuID) {

        if (empty($TipoMenuID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($TipoMenuID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($TipoMenuID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('TipoMenuID', $TipoMenuID);
        if ($this->db->delete('TipoMenu')) {
            return array('mensaje' => 'Tipo de menú eliminado con éxito');
        } else {
            return array('error' => 'Error al eliminar tipo de menú: ' . $this->db->error()['message']);
        }
    }
}
?>
