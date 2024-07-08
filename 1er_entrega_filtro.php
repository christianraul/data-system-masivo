<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultados de la 1ra Entrega</title>
    <link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
</head>

<body>
    <div class="container">
    
        <h3 class="text-center mt-5 mb-3">Lista de Empadronados de la 1ra Entrega</h3>

        <a href="#"><button type="button" class="btn btn-warning mt-1 mb-3 ml-3"><i class="fa-solid fa-file-pdf"></i></button></a>
        <a href="index.php"><button type="button" class="btn btn-danger mt-1 mb-3 ml-3">Regresar</button></a>
        <?php

        require_once 'conexion.php';



        // Consulta SQL para filtrar los registros
        $query = sprintf("SELECT idemp, dni, codigo, s100, fsu, fecha, paterno, materno, nombre FROM tblemp WHERE idemp BETWEEN 0 AND 210");
        $resultado = $con->query($query);


        if ($resultado->num_rows > 0) {
            echo "<table  class='table table-striped'>
             <tr>
                 <th>ID</th>
                 <th>DNI</th>
                 <th>CÓDIGO</th>
                 <th>N° S100</th>
                 <th>N° FSU</th>
                 <th>FECHA</th>
                 <th>APELLIDO PATERNO</th>
                 <th>APELLIDO MATERNO</th>
                 <th>NOMBRES</th>
             </tr>";
        }
        // Mostrar los resultados en una tabla
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>";
            echo "<td>" . $fila['idemp'] . "</td>";
            echo "<td>" . $fila['dni'] . "</td>";
            echo "<td>" . $fila['codigo'] . "</td>";
            echo "<td>" . $fila['s100'] . "</td>";
            echo "<td>" . $fila['fsu'] . "</td>";
            echo "<td>" . $fila['fecha'] . "</td>";
            echo "<td>" . $fila['paterno'] . "</td>";
            echo "<td>" . $fila['materno'] . "</td>";
            echo "<td>" . $fila['nombre'] . "</td>";
            // Agregar más columnas según tu tabla
            echo "</tr>";
        }


        ?>
    </div>
</body>

</html>