<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoAdmins_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function listar_tipo_admins() {
        $query = $this->db->get('TipoAdmins');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron tipos de administradores');
        }
    }

    public function get_tipo_admin($tipoAdminID) {

        if (empty($tipoAdminID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($tipoAdminID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($tipoAdminID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('tipoAdminID', $tipoAdminID);
        $query = $this->db->get('TipoAdmins');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'Tipo de administrador no encontrado');
        }
    }

    public function insert($data) {
        if ($this->db->insert('TipoAdmins', $data)) {
            return array('mensaje' => 'Tipo de administrador creado con éxito');
        } else {
            return array('error' => 'Error al crear tipo de administrador: ' . $this->db->error()['message']);
        }
    }

    
    public function update($tipoAdminID, $data) {

        if (empty($tipoAdminID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($tipoAdminID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($tipoAdminID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('tipoAdminID', $tipoAdminID);
        if ($this->db->update('TipoAdmins', $data)) {
            return array('mensaje' => 'Tipo de administrador actualizado con éxito');
        } else {
            return array('error' => 'Error al actualizar tipo de administrador: ' . $this->db->error()['message']);
        }
    }

   
    public function delete($tipoAdminID) {

        if (empty($tipoAdminID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($tipoAdminID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
        }

       if ($tipoAdminID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('tipoAdminID', $tipoAdminID);
        if ($this->db->delete('TipoAdmins')) {
            return array('mensaje' => 'Tipo de administrador eliminado con éxito');
        } else {
            return array('error' => 'Error al eliminar tipo de administrador: ' . $this->db->error()['message']);
        }
    }
}
?>
