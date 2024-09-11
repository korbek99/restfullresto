<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Usuarios_model');
        $this->load->helper('url'); 
    }

    private function hooks() {
        header('Access-Control-Allow-Origin: *');
        header('Access-Control-Allow-Methods: GET, POST, OPTIONS');
        header('Access-Control-Allow-Headers: Content-Type, Authorization');
    }
   
    public function listar() {
        $this->hooks();
        $data = $this->Usuarios_model->listar_usuarios();
        echo json_encode($data);
    }

   
    public function obtener($usuariosID) {
        $this->hooks();
        $data = $this->Usuarios_model->get_usuario($usuariosID);
        echo json_encode($data);
    }

   public function login() {
    $this->hooks(); 
    $usuario = $this->input->post('usuario');  
    $password = $this->input->post('password');

    if (empty($usuario) || empty($password)) {
        echo json_encode(array('status' => 'error', 'mensaje' => 'Usuario y contraseña son requeridos'));
        return;
    }

    $usuario_data = $this->Usuarios_model->verificar_credenciales($usuario, $password);
    
    if ($usuario_data) {
        echo json_encode(array('status' => 'success', 'mensaje' => 'Login exitoso', 'usuario' => $usuario_data));
    } else {
        echo json_encode(array('status' => 'error', 'mensaje' => 'Credenciales incorrectas'));
    }
}


  
    public function insertar() {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->Usuarios_model->insert($data);
        echo json_encode(array('mensaje' => $result));
    }

    
    public function actualizar($usuariosID) {
        $this->hooks();
        $data = $this->input->post(); 
        $result = $this->Usuarios_model->update($usuariosID, $data);
        echo json_encode(array('mensaje' => $result));
    }

   
    public function eliminar($usuariosID) {
        $this->hooks();
        $result = $this->Usuarios_model->delete($usuariosID);
        echo json_encode(array('mensaje' => $result));
    }
}
?>
