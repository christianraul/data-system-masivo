<?php
date_default_timezone_set('America/Lima');
function fechaC(){
    $lugar="Huancayo, ";
    $a="fecha de actualizacion, ";
    $mes=array("","Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio",
    "Agosto","Septiembre","Octubre","Noviembre","Diciembre");
    return $a." ".date('d')." de ".$mes[date('n')]." de ".date('Y');
}

?>