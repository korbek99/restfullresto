<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class MenuArchivos extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('MenuArchivos_model');
        $this->load->helper('url'); // Carga el helper de URL para usar redirect() y base_url()
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }
   
    public function listar() {
        $this->hooks();
        $data = $this->MenuArchivos_model->listar_archivos();
        echo json_encode($data);
    }

    public function obtener($MenuArchiID) {
        $this->hooks();
        $data = $this->MenuArchivos_model->get_archivo($MenuArchiID);
        echo json_encode($data);
    }

    
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->MenuArchivos_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

   
    public function actualizar($MenuArchiID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->MenuArchivos_model->update($MenuArchiID, $data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function eliminar($MenuArchiID) {
        $this->hooks();
        $result = $this->MenuArchivos_model->delete($MenuArchiID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>
