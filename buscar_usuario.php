<?php
require_once 'conexion.php';



// Obtener término de búsqueda desde el formulario
$documento = $_GET['documento'];
$busqueda = $_GET['codigo'];


// Consulta SQL para buscar productos
$sql = "SELECT * FROM tblemp WHERE $documento LIKE '%$busqueda%'";

$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Si se encuentran resultados, mostrarlos en una tabla
    while($row = $result->fetch_assoc()) {
        echo "<h6 class='card-title'>DNI</h6>";
        echo "<p class='card-text'>".$row["dni"]."</p>";
        echo "<h6 class='card-title'>Nombres</h6>";
        echo "<p class='card-text'>".$row["nombre"]."</p>";
        echo "<h6 class='card-title'>Apellido Paterno</h6>";
        echo "<p class='card-text'>".$row["paterno"]."</p>";
        echo "<h6 class='card-title'>Apellido Materno</h6>";
        echo "<p class='card-text'>".$row["materno"]."</p>";
        echo "<h6 class='card-title'>Fecha en Sistema</h6>";
        echo "<p class='card-text'>".$row["fechasistema"]."</p>";
        echo "<h6 class='card-title'>S100</h6>";
        echo "<p class='card-text'>".$row["s100"]."</p>";
        echo "<h6 class='card-title'>FSU</h6>";
        echo "<p class='card-text'>".$row["fsu"]."</p>";
    }
   
} else {
    // Si no se encuentran resultados, mostrar un mensaje
    echo "No se encontraron resultados para '$documento'.";
}

$con->close();
?>