<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Meses extends CI_Controller {

  public function mes($mes) {
    $this->load->helper("utilidades");
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(obtener_mes($mes)));
  }

  public function mesesAll() {
   $this->load->helper("utilidades");
    // Enviamos la respuesta JSON.
    $this->output
      ->set_content_type('application/json')
      ->set_output(json_encode(obtener_mes_all()));
  }

  public function formatearFecha($fecha) {
    $this->load->helper("utilidades");
   $formateada = formato_fecha($fecha);
   $this->output
     ->set_content_type('application/json')
     ->set_output(json_encode(array('fecha_formateada' => $formateada)));
  }

  public function obtenerAno($fecha) {
    $this->load->helper("utilidades");
   $ano = obtener_ano($fecha);
   $this->output
     ->set_content_type('application/json')
     ->set_output(json_encode(array('ano' => $ano)));
  }

  public function formatearMonto($monto) {
    $this->load->helper("utilidades");
   $montoFormateado = formatear_clp($monto);
   $this->output
     ->set_content_type('application/json')
     ->set_output(json_encode(array('monto_formateado' => $montoFormateado)));
 }

}
