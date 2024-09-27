<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class LocalMenu extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('LocalMenu_model');
        $this->load->helper('url'); // Carga el helper de URL para usar redirect() y base_url()
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }

   
    public function listar() {
        $this->hooks();
        $data = $this->LocalMenu_model->listar_menus();
        echo json_encode($data);
    }

    public function listarMenuLocal($LocalID) {
      
        $this->hooks();
        $data = $this->LocalMenu_model->listar_menus_local($LocalID);

        if (isset($data['error']) && $data['error']) {
            // Configura una respuesta con código de error HTTP 400 (Bad Request)
            $this->output
                ->set_status_header(400)
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
        } else {
            // Configura una respuesta con código HTTP 200 (OK)
            $this->output
                ->set_status_header(200)
                ->set_content_type('application/json')
                ->set_output(json_encode($data));
       }
    }


   
    public function obtener($LocalMenuID) {
        $this->hooks();
        $data = $this->LocalMenu_model->get_menu($LocalMenuID);
        echo json_encode($data);
    }

    
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->LocalMenu_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function actualizar($LocalMenuID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->LocalMenu_model->update($LocalMenuID, $data);
        echo json_encode(array('mensaje' => $result));
    }

   
    public function eliminar($LocalMenuID) {
        $this->hooks();
        $result = $this->LocalMenu_model->delete($LocalMenuID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>
