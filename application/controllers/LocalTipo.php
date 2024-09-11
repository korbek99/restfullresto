<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LocalTipo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LocalTipo_model');
        $this->load->helper('url'); // Carga el helper de URL para usar redirect() y base_url()
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }
    
    public function listar() {
        $this->hooks();
        $data = $this->LocalTipo_model->listar_locales_tipos();
        echo json_encode($data);
    }

    
    public function obtener($LocalTipoID) {
        $this->hooks();
        $data = $this->LocalTipo_model->get_local_tipo($LocalTipoID);
        echo json_encode($data);
    }

    
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->LocalTipo_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function actualizar($LocalTipoID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->LocalTipo_model->update($LocalTipoID, $data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function eliminar($LocalTipoID) {
        $result = $this->LocalTipo_model->delete($LocalTipoID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>
