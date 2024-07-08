<?php
require('conexion.php');
$tipo       = $_FILES['dataCliente']['type'];
$tamanio    = $_FILES['dataCliente']['size'];
$archivotmp = $_FILES['dataCliente']['tmp_name'];
$lineas     = file($archivotmp);

$i = 0;

foreach ($lineas as $linea) {
    $cantidad_registros = count($lineas);
    $cantidad_regist_agregados =  ($cantidad_registros - 1);

    if ($i != 0) {

        $datos = explode(";", $linea);
       
        $idemp=!empty($datos[0])  ? ($datos[0]) : '';
        $dni=!empty($datos[1])  ? ($datos[1]) : '';
        $codigo=!empty($datos[2])  ? ($datos[2]) : '';
        $s100=!empty($datos[3])  ? ($datos[3]) : '';
        $fsu=!empty($datos[4])  ? ($datos[4]) : '';
        $fecha=!empty($datos[5])  ? ($datos[5]) : '';
        $paterno=!empty($datos[6])  ? ($datos[6]) : '';
        $materno=!empty($datos[7])  ? ($datos[7]) : '';
        $nombre=!empty($datos[8])  ? ($datos[8]) : '';
       
if( !empty($dni) ){
    $checkemail_duplicidad = ("SELECT dni FROM tblemp WHERE dni='".($dni)."' ");
            $ca_dupli = mysqli_query($con, $checkemail_duplicidad);
            $cant_duplicidad = mysqli_num_rows($ca_dupli);
        }   

//No existe Registros Duplicados
if ( $cant_duplicidad == 0 ) { 

$insertarData = "INSERT INTO tblemp( 
            idemp,
			dni,
            codigo,
            s100,
            fsu,
            fecha,
            paterno,
            materno,
            nombre
) VALUES(
            '$idemp',
            '$dni',
			'$codigo',
            '$s100',
            '$fsu',
            '$fecha',
            '$paterno',
            '$materno',
            '$nombre'
)";
mysqli_query($con, $insertarData);
        
} 
/**Caso Contrario actualizo el o los Registros ya existentes*/
else{
    $updateData =  ("UPDATE tblemp SET 
        idemp='" .$idemp. "',
		dni='" .$dni. "',
        codigo='" .$codigo. "',
        s100='" .$s100. "',
        fsu='" .$fsu. "',
        fecha='" .$fecha. "',
        paterno='" .$paterno. "',
        materno='" .$materno. "',
        nombre='" .$nombre. "' 
        WHERE dni='".$dni."'
    ");
    $result_update = mysqli_query($con, $updateData);
    } 
  }

 $i++;
}

?>

<div class="container">

    <h2 class="text-uppercase text-center mt-3 mb-3">SE ACTUALIZO LA BASE DE DATOS EXISTOSAMENTE</h2>

</div>

<script>
        // Temporizador de 5 segundos
        setTimeout(function() {
            // Redireccionar al index
            window.location.href = 'index.php';
        }, 3000); // 5000 milisegundos = 5 segundos
    </script>
<a href="index.php">Atras</a>