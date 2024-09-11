<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class EventoTipo extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('EventoTipo_model');
        $this->load->helper('url'); // Carga el helper de URL para usar redirect() y base_url()
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }
   
    public function listar() {
        $this->hooks();
        $data = $this->EventoTipo_model->listar_evento_tipos();
        echo json_encode($data);
    }

    
    public function obtener($EventoTipoID) {
        $this->hooks();
        $data = $this->EventoTipo_model->get_evento_tipo($EventoTipoID);
        echo json_encode($data);
    }

   
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->EventoTipo_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

   
    public function actualizar($EventoTipoID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->EventoTipo_model->update($EventoTipoID, $data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function eliminar($EventoTipoID) {
        $this->hooks();
        $result = $this->EventoTipo_model->delete($EventoTipoID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>
