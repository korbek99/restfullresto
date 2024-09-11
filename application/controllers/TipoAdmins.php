<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoAdmins extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TipoAdmins_model');
        $this->load->helper('url'); 
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }
    
    public function listar() {
        $this->hooks();
        $data = $this->TipoAdmins_model->listar_tipo_admins();
        echo json_encode($data);
    }

    
    public function obtener($tipoAdminID) {
        $this->hooks();
        $data = $this->TipoAdmins_model->get_tipo_admin($tipoAdminID);
        echo json_encode($data);
    }

    
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->TipoAdmins_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function actualizar($tipoAdminID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->TipoAdmins_model->update($tipoAdminID, $data);
        echo json_encode(array('mensaje' => $result));
    }

   
    public function eliminar($tipoAdminID) {
        $this->hooks();
        $result = $this->TipoAdmins_model->delete($tipoAdminID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>
