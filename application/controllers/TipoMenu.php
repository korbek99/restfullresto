<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class TipoMenu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('TipoMenu_model');
        $this->load->helper('url'); // Carga el helper de URL para usar redirect() y base_url()
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }
    
    public function listar() {
        $this->hooks();
        $data = $this->TipoMenu_model->listar_tipo_menu();
        echo json_encode($data);
    }

    
    public function obtener($TipoMenuID) {
        $this->hooks();
        $data = $this->TipoMenu_model->get_tipo_menu($TipoMenuID);
        echo json_encode($data);
    }

    
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->TipoMenu_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function actualizar($TipoMenuID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->TipoMenu_model->update($TipoMenuID, $data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function eliminar($TipoMenuID) {
        $this->hooks();
        $result = $this->TipoMenu_model->delete($TipoMenuID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>
