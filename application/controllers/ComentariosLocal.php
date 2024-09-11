<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class ComentariosLocal extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('ComentariosLocal_model');
        $this->load->helper('url'); // Carga el helper de URL para usar redirect() y base_url()
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }
    
    public function listar() {
        $this->hooks();
        $data = $this->ComentariosLocal_model->listar_comentarios();
        echo json_encode($data);
    }

    public function obtener($ComentariosLocalID) {
        $this->hooks();
        $data = $this->ComentariosLocal_model->get_comentario($ComentariosLocalID);
        echo json_encode($data);
    }

    
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->ComentariosLocal_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function actualizar($ComentariosLocalID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->ComentariosLocal_model->update($ComentariosLocalID, $data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function eliminar($ComentariosLocalID) {
        $this->hooks();
        $result = $this->ComentariosLocal_model->delete($ComentariosLocalID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>