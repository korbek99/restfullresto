<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LocalMenu_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function listar_menus() {
        $query = $this->db->get('Local_Menu');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron menús de locales');
        }
    }

    public function listar_menus_local($LocalID) {

    
    if (empty($LocalID)) {
        return array('error' => true, 'mensaje' => 'ID es requerido');
    }

    
    if (!is_numeric($LocalID)) {
        return array('error' => true, 'mensaje' => 'El ID debe ser numérico');
    }

    
    if ($LocalID < 0) {
        return array('error' => true, 'mensaje' => 'ID inválido');
    }

    $this->db->where('LocalID', $LocalID);
    $query = $this->db->get('Local_Menu');

    
    if ($query->num_rows() > 0) {
        return $query->result_array();
    } else {
        return array('error' => true, 'mensaje' => 'No se encontraron menús para el local especificado');
    }
}


    
    public function get_menu($LocalMenuID) {

        if (empty($LocalMenuID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($LocalMenuID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($LocalMenuID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('LocalMenuID', $LocalMenuID);
        $query = $this->db->get('Local_Menu');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'Menú de local no encontrado');
        }
    }

    
    public function insert($data) {
        if ($this->db->insert('Local_Menu', $data)) {
            return array('mensaje' => 'Menú de local creado con éxito');
        } else {
            return array('error' => 'Error al crear menú de local: ' . $this->db->error()['message']);
        }
    }

    
    public function update($LocalMenuID, $data) {

         if (empty($LocalMenuID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($LocalMenuID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($LocalMenuID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('LocalMenuID', $LocalMenuID);
        if ($this->db->update('Local_Menu', $data)) {
            return array('mensaje' => 'Menú de local actualizado con éxito');
        } else {
            return array('error' => 'Error al actualizar menú de local: ' . $this->db->error()['message']);
        }
    }

  
    public function delete($LocalMenuID) {

        if (empty($LocalMenuID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($LocalMenuID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($LocalMenuID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('LocalMenuID', $LocalMenuID);
        if ($this->db->delete('Local_Menu')) {
            return array('mensaje' => 'Menú de local eliminado con éxito');
        } else {
            return array('error' => 'Error al eliminar menú de local: ' . $this->db->error()['message']);
        }
    }
}
?>
