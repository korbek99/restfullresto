<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LocalArchivos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LocalArchivos_model');
        $this->load->helper('url'); // Carga el helper de URL para usar redirect() y base_url()
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }
    
    public function listar() {
        $this->hooks();
        $data = $this->LocalArchivos_model->listar_archivos();
        echo json_encode($data);
    }

   
    public function obtener($LocalArchivosID) {
        $this->hooks();
        $data = $this->LocalArchivos_model->get_archivo($LocalArchivosID);
        echo json_encode($data);
    }

   
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->LocalArchivos_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function actualizar($LocalArchivosID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->LocalArchivos_model->update($LocalArchivosID, $data);
        echo json_encode(array('mensaje' => $result));
    }

   
    public function eliminar($LocalArchivosID) {
        $this->hooks();
        $result = $this->LocalArchivos_model->delete($LocalArchivosID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>
