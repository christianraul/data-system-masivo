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
       
    $insertar = "INSERT INTO tblemp( 
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
        mysqli_query($con, $insertar);
    }

      echo '<div>'. $i. "). " .$linea.'</div>';
    $i++;
}


  echo '<p style="text-aling:center; color:#333;">Total de Registros: '. $cantidad_regist_agregados .'</p>';

?>

<a href="index.php">Atras</a>