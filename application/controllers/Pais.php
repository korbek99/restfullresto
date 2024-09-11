<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pais extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Pais_model');
        $this->load->helper('url'); // Carga el helper de URL para usar redirect() y base_url()
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }

   
    public function listar() {
        $this->hooks();
        $data = $this->Pais_model->listar_paises();
        echo json_encode($data);
    }

    public function obtener($paisID) {
        $this->hooks();
        $data = $this->Pais_model->get_pais($paisID);
        echo json_encode($data);
    }

    
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->Pais_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

   
    public function actualizar($paisID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->Pais_model->update($paisID, $data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function eliminar($paisID) {
        $this->hooks();
        $result = $this->Pais_model->delete($paisID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>
