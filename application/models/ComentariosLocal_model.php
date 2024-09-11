<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComentariosLocal_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

   
    public function listar_comentarios() {
        $query = $this->db->get('ComentariosLocal');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron comentarios locales');
        }
    }

    public function listar_comentarios_local($LocalID) {
   
        if (empty($LocalID)) {
            return array('error' => 'LocalID es requerido');
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
        $query = $this->db->get('ComentariosLocal');

        if ($query->num_rows() > 0) {
            return $query->result_array();  
        } else {
            return array();  
        }
    }


    public function get_comentario($ComentariosLocalID) {

        if (empty($ComentariosLocalID)) {
            return array('error' => 'ID es requerido');
        }

           if (!is_numeric($ComentariosLocalID)) {
             $response = array(
               array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
             );
             return $response;
           }

           if ($ComentariosLocalID < 0  ) {
             $response = array('error' => 'id invalido');
             return $response;
           }

        $this->db->where('ComentariosLocalID', $ComentariosLocalID);
        $query = $this->db->get('ComentariosLocal');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'Comentario local no encontrado');
        }
    }

    
    public function insert($data) {
        if ($this->db->insert('ComentariosLocal', $data)) {
            return array('mensaje' => 'Comentario creado con éxito');
        } else {
            return array('error' => 'Error al crear comentario: ' . $this->db->error()['message']);
        }
    }

    public function update($ComentariosLocalID, $data) {

          if (empty($ComentariosLocalID)) {
             return array('error' => 'ID es requerido');
           }

           if (!is_numeric($ComentariosLocalID)) {
             $response = array(
               array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
             );
             return $response;
           }

           if ($ComentariosLocalID < 0  ) {
             $response = array('error' => 'id invalido');
             return $response;
           }

        $this->db->where('ComentariosLocalID', $ComentariosLocalID);
        if ($this->db->update('ComentariosLocal', $data)) {
            return array('mensaje' => 'Comentario actualizado con éxito');
        } else {
            return array('error' => 'Error al actualizar comentario: ' . $this->db->error()['message']);
        }
    }

    
    public function delete($ComentariosLocalID) {

        if (empty($ComentariosLocalID)) {
            return array('error' => 'ID es requerido');
        }

       if (!is_numeric($ComentariosLocalID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($ComentariosLocalID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('ComentariosLocalID', $ComentariosLocalID);
        if ($this->db->delete('ComentariosLocal')) {
            return array('mensaje' => 'Comentario eliminado con éxito');
        } else {
            return array('error' => 'Error al eliminar comentario: ' . $this->db->error()['message']);
        }
    }
}
?>
