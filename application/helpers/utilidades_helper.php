<?php

function capitalizar_arreglo($data_crudo,$campos_capitalizar){
 $data_lista = $data_crudo;
  foreach ($data_crudo as $nombre_campo => $valor_campo) {
     if(in_array( $nombre_campo ,array_values($campos_capitalizar)){
       $data_lista[$nombre_campo] = strtoupper($valor_campo);
     }
  }
 return $data_lista;
}

function obtener_mes($mes){
  if (!is_numeric($mes)) {
    $response = array(
      array('err' => true, 'mensaje' => "El id siempre debe ser numerico"),
    );
    return $response;
  }

  $mes -= 1; // Restamos 1 para que el índice empiece en 0.
  $meses = array(
    'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
    'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
  );

  // Validamos que el mes esté en el rango correcto.
  if ($mes >= 0 && $mes < count($meses)) {
    $response = array('mes' => $meses[$mes]);
  } else {
    $response = array('error' => 'Mes inválido');
  }
  return $response;
}

function obtener_mes_all(){
  $meses = array(
    'enero', 'febrero', 'marzo', 'abril', 'mayo', 'junio',
    'julio', 'agosto', 'septiembre', 'octubre', 'noviembre', 'diciembre'
  );
  return $meses;
}

function obtener_anio(){

}

/**
    * Formatea una fecha al formato YYYY/MM/DD
    *
    * @param string $fecha La fecha a formatear
    * @return string La fecha formateada
    */
   function formato_fecha($fecha) {
       $timestamp = strtotime($fecha);
       return date('Y/m/d', $timestamp);
   }

  function obtener_ano($fecha) {
      $timestamp = strtotime($fecha);
      return date('Y', $timestamp);
  }

  function formatear_clp($numero) {
        return number_format($numero, 2, ',', '.');
  }
?>
