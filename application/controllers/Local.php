<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Local extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Local_model');
        $this->load->helper('url'); 
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }
    
    public function listar() {
        $this->hooks();
        $data = $this->Local_model->listar_locales();
        echo json_encode($data);
    }

    
    public function obtener($LocalID) {
        $this->hooks();
        $data = $this->Local_model->get_local($LocalID);
        echo json_encode($data);
    }

  
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->Local_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function actualizar($LocalID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->Local_model->update($LocalID, $data);
        echo json_encode(array('mensaje' => $result));
    }

    // Método para eliminar un local
    public function eliminar($LocalID) {
        $this->hooks();
        $result = $this->Local_model->delete($LocalID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>
