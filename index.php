<?php
require_once 'conexion.php';



$datosxpagina = 10;


if (isset($_GET['pagina'])) {
  $pagina = $_GET['pagina'];
}
if (!($_GET['pagina'])) {
  header('location:index.php?pagina=1');
}

//calcular resultado de pagina
$iniciar = ($_GET['pagina'] - 1) * $datosxpagina;
//echo $iniciar;

$query1 = sprintf("SELECT * FROM tblemp LIMIT $iniciar, $datosxpagina");
$result = $con->query($query1);




$total_resultados = $con->query("SELECT COUNT(*) AS total FROM tblemp")->fetch_assoc()['total'];
$total_paginas = ceil($total_resultados / $datosxpagina);


$sql_djs100 = "SELECT COUNT(*) AS cantidad_DJS100 FROM tbldjs100";
$sql_fsu = "SELECT COUNT(*) AS cantidad_DJFSU FROM tblemp";


/* $queryresul_total = "SELECT (SELECT COUNT(*) FROM tbldjs100) + (SELECT COUNT(*) FROM tblemp AS total)";
$result_suma_total = $con->query($queryresul_total);
$row_suma_total = $result_suma_total->fetch_assoc();
$total = $row_suma_total['total']; */



include('fecha.php');




?>
<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>EM - 2024</title>
  <link rel="stylesheet" href="librerias/bootstrap/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">
  <script src="librerias/bootstrap/js/bootstrap.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>

<body style="background-color: #fff;">
  <div class="container">
    <div class="row">
      <div class="col-12" style="background-color: #E82A2A; margin:10px;">
        <h5 class="text-center" style="color: #FFFFFF; margin:15px;">Seguimiento Físico <br> Empadronamiento Masivo 2024 - Chilca</h5>
      </div>
    </div>
    <div class="row m-2">
      <div class="col-3">
        <div class="card bg-danger">
          <div class="card-body text-center text-light">
            <?php
            $query_resultado = mysqli_query($con, "SELECT (SELECT COUNT(*) FROM tbldjs100) + (SELECT COUNT(*) FROM tblemp) AS total;");
            $resultado_total = mysqli_num_rows($query_resultado);
            $data = array();
            foreach ($query_resultado as $row) {
              $data[] = $row;
            }
            ?>
            <h3 class="card-title fw-bold"> <?php echo $row['total'] ?></h3>
            <p class="card-text">TOTAL DE EMPADRONADOS</p>
          </div>
        </div>
      </div>
      <div class="col-1">
        <div class="card border border-0">
          <div class="card-body text-center">
            <h3 class="card-title fw-bold mt-3">=</h3>
          </div>
        </div>
      </div>
      <div class="col-2">
        <a href="djfsu.php" style="text-decoration: none;">
          <div class="card bg-success">
            <div class="card-body text-center text-light">
              <?php
              $query_resultado = mysqli_query($con, "SELECT COUNT(*) AS cantidad_DJFSU FROM tblemp;");
              $resultado_total = mysqli_num_rows($query_resultado);
              $data = array();
              foreach ($query_resultado as $row) {
                $data[] = $row;
              }
              ?>
              <h3 class="card-title fw-bold"> <?php echo $row['cantidad_DJFSU'] ?></h3>
              <p class="card-text">DJ FSU</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-1">
        <div class="card border border-0">
          <div class="card-body text-center">
            <h3 class="card-title fw-bold mt-3">+</h3>
          </div>
        </div>
      </div>
      <div class="col-2">
        <a href="djs100.php" style="text-decoration: none;">
          <div type="button" class="card bg-primary">
            <div class="card-body text-center text-light">
              <?php
              $query_resultado = mysqli_query($con, "SELECT COUNT(*) AS cantidad_DJS100 FROM tbldjs100;");
              $resultado_total = mysqli_num_rows($query_resultado);
              $data = array();
              foreach ($query_resultado as $row) {
                $data[] = $row;
              }
              ?>
              <h3 class="card-title fw-bold"><?php echo $row['cantidad_DJS100'] ?></h3>
              <p class="card-text">DJ S100</p>
            </div>
          </div>
        </a>
      </div>
      <div class="col-1">
        <div class="card border border-0">
          <div class="card-body text-center">
            <h3 class="card-title fw-bold mt-3">|</h3>
          </div>
        </div>
      </div>
      <div class="col-2">
        <a href="incon.php" style="text-decoration: none;">
          <div class="card bg-dark">
            <div class="card-body text-center text-light">
              <?php
              $query_resultado = mysqli_query($con, "SELECT COUNT(*) AS cantidad_bajas FROM tblincon;");
              $resultado_total = mysqli_num_rows($query_resultado);
              $data = array();
              foreach ($query_resultado as $row) {
                $data[] = $row;
              }
              ?>
              <h3 class="card-title fw-bold"><?php echo $row['cantidad_bajas'] ?></h3>
              <p class="card-text">INCONSISTENTES</p>
            </div>
          </div>
        </a>
      </div>
    </div>
    <br>
      <h6 class="text-end mt-1 mb-2"><?php echo fechaC(); ?></h6>
    <div class="row">
      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <form action="1er_entrega_filtro.php" method="GET">
          <button type="submit" class="btn btn-primary mt-1 mb-3 ml-3">Entrega N°01</button>
        </form>
        <form action="2da_entrega_filtro.php" method="GET">
          <button type="submit" class="btn btn-danger mt-1 mb-3 ml-3">Entrega N°02</button>
        </form>
        <form action="#" method="GET">
          <button type="submit" class="btn btn-success mt-1 mb-3 ml-3">Entrega N°03</button>
        </form>
      </div>
      <div class="col-8">
        <form action="reportePDF_1er.php" method="GET">
          <button type="submit" class="btn btn-warning mt-1 mb-3 ml-3"><i class="fa-solid fa-file-pdf"></i></button></button>
          <button type="button" class="btn btn-success mt-1 mb-3 ml-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            <i class="fa-solid fa-magnifying-glass"></i>
          </button>
        </form>

      </div>
      <div class="col-4">

        <div class="row">
          <form action="recibir_datos_validando.php" method="post" enctype="multipart/form-data">
            <div class="input-group mt-1 mb-2 ml-2 ">
              <input type="file" name="dataCliente" class="form-control" id="file-input" class="file-input__input">
              <input type="submit" name="subir" class="btn-enviar btn btn-danger" value="Subir" />
            </div>
          </form>


        </div>


      </div>
      <div class="col-6">


      </div>
    </div>

    <?php

    if ($result->num_rows > 0) {
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
                   <th></th>
               </tr>";

      while ($row = $result->fetch_assoc()) {
        echo "<tr>
                       <td>" . $row["idemp"] . "</td>
                       <td>" . $row["dni"] . "</td>
                       <td>" . $row["codigo"] . "</td>
                       <td>" . $row["s100"] . "</td>
                       <td>" . $row["fsu"] . "</td>
                       <td>" . $row["fechasistema"] . "</td>
                       <td>" . $row["paterno"] . "</td>
                       <td>" . $row["materno"] . "</td>
                       <td>" . $row["nombre"] . "</td>
                       <td>
                       <a href='#'><button type='button' class='btn btn-primary'><i class='fa-solid fa-pen'></i></button></a>
                       <a href='#'><button type='button' class='btn btn-danger'><i class='fa-solid fa-trash'></i></button></a>
                       </td>
                       
                   </tr>";
      }

      echo "</table>";
    } else {
      echo "No se encontraron resultados.";
    }


    ?>



    <nav aria-label="Page navigation example">
      <ul class="pagination justify-content-end">
        <li class="page-item <?php echo $_GET['pagina'] <= $total_paginas ? 'disabled' : '' ?>">
          <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] - 1 ?>">Anterior</a>
        </li>
        <?php
        $rango = 5;
        $inicio_rango = max(0, $pagina - floor($rango / 2));
        $fin_rango = min($total_paginas, $inicio_rango + $rango - 1);

        for ($i = $inicio_rango; $i <= $fin_rango; $i++) : ?>
          <li class="page-item <?php echo $_GET['pagina'] == $i + 1 ? 'active' : '' ?>">
            <a class="page-link" href="index.php?pagina=<?php echo $i + 1 ?>"><?php echo $i + 1 ?>
            </a>
          </li>
        <?php endfor ?>
        <li class="page-item <?php echo $_GET['pagina'] >= $total_paginas ? 'disabled' : '' ?> ">
          <a class="page-link" href="index.php?pagina=<?php echo $_GET['pagina'] + 1 ?>">Siguiente</a>
        </li>
      </ul>
    </nav>


  </div>



  <!-- Modal -->
  <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Buscar Fichas</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">

          <form id="formBusqueda">

            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label">Seleccionar tipo de Documento</label>
              <select class="form-select" name="documento" id="documento">
                <option selected>Seleccionar documento</option>
                <option value="s100">S100</option>
                <option value="fsu">FSU</option>
              </select>
              <br>
              <label for="" class="form-label">Ingrese Numero de Documento</label>
              <input type="text" class="form-control" name="codigo" id="codigo">

              <br>
              <button type="submit" class="btn btn-primary">Buscar</button>
              <br> <br>
            </div>

          </form>

          <div class="card text-center">
            <div class="card-header">
              Resultado
            </div>
            <div class="card-body">
              <div id="resultadoBusqueda"></div>

            </div>

          </div>


        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>


</body>


<script>
  $(document).ready(function() {
    $('#formBusqueda').submit(function(e) {
      e.preventDefault(); // Evitar que se recargue la página

      // Obtener los datos del formulario
      var formData = $(this).serialize();

      // Enviar la solicitud AJAX
      $.ajax({
        type: 'GET',
        url: 'buscar_usuario.php',
        data: formData,
        success: function(response) {
          // Mostrar el resultado en el label dentro de la modal
          $('#resultadoBusqueda').html(response);
        },
        error: function() {
          alert('Error al realizar la búsqueda.');
        }
      });
    });
  });
</script>
<?php
// Cerrar la conexión
$con->close();
?>



</html>