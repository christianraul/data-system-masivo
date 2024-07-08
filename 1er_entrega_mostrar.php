<?php

require_once 'conexion.php';

// Consulta SQL para mostrar todos los registros
$query = sprintf("SELECT idemp, dni, codigo, s100, fsu, fecha, paterno, materno, nombre FROM tblemp WHERE idemp BETWEEN 0 AND 210");
$resultado = $con->query($query);


while ($row = $resultado->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['idemp'] . "</td>";
    echo "<td>" . $row['dni'] . "</td>";
    echo "<td>" . $row['codigo'] . "</td>";
    echo "<td>" . $row['s100'] . "</td>";
    echo "<td>" . $row['fsu'] . "</td>";
    echo "<td>" . $row['fecha'] . "</td>";
    echo "<td>" . $row['paterno'] . "</td>";
    echo "<td>" . $row['materno'] . "</td>";
    echo "<td>" . $row['nombre'] . "</td>";
    // Agregar más columnas según tu tabla
    echo "</tr>";
}


?>