<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LocalArchivos_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }

    
    public function listar_archivos() {
        $query = $this->db->get('Local_Archivos');
        if ($query->num_rows() > 0) {
            return $query->result_array();
        } else {
            return array('error' => 'No se encontraron archivos de local');
        }
    }

    
    public function get_archivo($LocalArchivosID) {

        if (empty($LocalArchivosID)) {
            return array('error' => 'ID es requerido');
        }


        if (empty($LocalArchivosID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($LocalArchivosID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($LocalArchivosID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('LocalArchivosID', $LocalArchivosID);
        $query = $this->db->get('Local_Archivos');
        if ($query->num_rows() > 0) {
            return $query->row_array();
        } else {
            return array('error' => 'Archivo de local no encontrado');
        }
    }

   
    public function insert($data) {
        if ($this->db->insert('Local_Archivos', $data)) {
            return array('mensaje' => 'Archivo de local creado con éxito');
        } else {
            return array('error' => 'Error al crear archivo de local: ' . $this->db->error()['message']);
        }
    }

    
    public function update($LocalArchivosID, $data) {

         if (empty($LocalArchivosID)) {
            return array('error' => 'ID es requerido');
        }


        if (empty($LocalArchivosID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($LocalArchivosID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($LocalArchivosID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('LocalArchivosID', $LocalArchivosID);
        if ($this->db->update('Local_Archivos', $data)) {
            return array('mensaje' => 'Archivo de local actualizado con éxito');
        } else {
            return array('error' => 'Error al actualizar archivo de local: ' . $this->db->error()['message']);
        }
    }

    // Método para eliminar un archivo de local
    public function delete($LocalArchivosID) {

        if (empty($LocalArchivosID)) {
            return array('error' => 'ID es requerido');
        }


        if (empty($LocalArchivosID)) {
            return array('error' => 'ID es requerido');
        }

        if (!is_numeric($LocalArchivosID)) {
         $response = array(
           array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
         );
         return $response;
       }

       if ($LocalArchivosID < 0  ) {
         $response = array('error' => 'id invalido');
         return $response;
       }

        $this->db->where('LocalArchivosID', $LocalArchivosID);
        if ($this->db->delete('Local_Archivos')) {
            return array('mensaje' => 'Archivo de local eliminado con éxito');
        } else {
            return array('error' => 'Error al eliminar archivo de local: ' . $this->db->error()['message']);
        }
    }
}
?>
