<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Blog extends CI_Controller {

	public function index()
	{
		echo "Hello World";
	}

  public function comentarios($id)
	{
      if (!is_numeric($id)) {
        $comentarios = array(
          array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
        );
        echo json_encode($comentarios);
        return;
      }

      $comentarios = array(
        array('id' => 1, 'comentario' => "Lorem ipsum dolor sit amet, Aylen."),
        array('id' => 2, 'comentario' => "Lorem ipsum dolor sit amet, Catita."),
        array('id' => 3, 'comentario' => "Lorem ipsum dolor sit amet, consectetur."),
        array('id' => 4, 'comentario' => "Lorem ipsum dolor sit amet, Aylen."),
        array('id' => 5, 'comentario' => "Lorem ipsum dolor sit amet, Catita."),
        array('id' => 6, 'comentario' => "Lorem ipsum dolor sit amet, consectetur.")
      );

      if ($id >= count($comentarios) or $id < 0) {
        $comentarios = array(
          array('err' => true, 'mensaje' => "El id no existe o esta fuera de rango"),
        );
        echo json_encode($comentarios);
        return;
      }

		echo json_encode($comentarios[$id]);
	}
}
