<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cliente_model extends CI_Model {
 public $id;
 public $nombre;
 public $correo;

 public function get_cliente($id) {

   if (!is_numeric($id)) {
     $response = array(
       array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
     );
     return $response;
   }

   if ($id < 0  ) {
     $response = array('error' => 'id invalido');
     return $response;
   }

   $this->id = intval($id);
   $this->nombre = "Aylen bustos";
   $this->correo = "aylencita2015@gmail.com";
   return $this;
 }
     public function insert(){ return "insertado"; }
     public function update(){ return "actualizado";  }
     public function delete(){ return "borrado"; }
}
