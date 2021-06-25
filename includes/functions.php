<?php


function asDollars($value) { // devuelve el dinero en formato $ 0,000,000.000
  if ($value<0) return "-".asDollars(-$value);
  return '$' . number_format($value, 2);
}
function fechag($fecha){ // devuelve la fecha en formato dd/mm/aaaa
  $fechag = date("d-m-Y", strtotime($fecha));
  return $fechag;
}

function bgColor($valor){  // devuelve el color de la fila dependiendo del resultado
  if ($valor >49999){
    return "bg-warning";}
    else {
    return "bg-success";
    }
    if ($valor >149000){
    return "bg-warning";} 
}

function bgFormaPago($valor){  //return the color value depends of result
  if ($valor == "CONTADO"){
    return "bg-success";}
    else {
    return "bg-info";
    }
}

function int2string($aConvertir){   //convierte "1" a "UNO" INT TO STRING
  $formatterES = new NumberFormatter("es", NumberFormatter::SPELLOUT);
  return $formatterES->format($aConvertir);
}


?>