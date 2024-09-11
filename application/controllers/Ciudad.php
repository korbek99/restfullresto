<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Ciudad extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Ciudad_model');
        $this->load->helper('url'); 
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }
    
    public function listar() {
        $this->hooks();
        $data = $this->Ciudad_model->listar_ciudades();
        echo json_encode($data);
    }

    
    public function obtener($ciudadID) {
        $this->hooks();
        $data = $this->Ciudad_model->get_ciudad($ciudadID);
        echo json_encode($data);
    }

    
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->Ciudad_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

   
    public function actualizar($ciudadID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->Ciudad_model->update($ciudadID, $data);
        echo json_encode(array('mensaje' => $result));
    }

   
    public function eliminar($ciudadID) {
        $this->hooks();
        $result = $this->Ciudad_model->delete($ciudadID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>
