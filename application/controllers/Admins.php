<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admins extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Admins_model');
        $this->load->helper('url'); 
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }

   public function listar() {
     $this->hooks(); 
     $data = $this->Admins_model->listar_admins();
     echo json_encode($data);
   }


    public function obtener($adminID) {
        $this->hooks();
        $data = $this->Admins_model->get_admin($adminID);
        echo json_encode($data);
    }

    
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->Admins_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function actualizar($adminID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->Admins_model->update($adminID, $data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function eliminar($adminID) {
        $this->hooks(); 
        $result = $this->Admins_model->delete($adminID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>
