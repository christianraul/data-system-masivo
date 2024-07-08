<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Subir S100</title>
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
        <div class="row">
            <div class="col-12">
                <h3 class="text-center m-3">Subir datos a la base de datos DJ S100</h3>
            </div>
        </div>
        <div class="col-12">

            <div class="row d-grid gap-2 col-5 mx-auto">
                <form action="recibir_datos_validando.php" method="post" enctype="multipart/form-data">
                    <div class="input-group mt-1 mb-2 ml-2 ">
                        <input type="file" name="dataCliente" class="form-control" id="file-input" class="file-input__input">
                        <input type="submit" name="subir" class="btn-enviar btn btn-danger" value="Subir" />
                    </div>
                </form>
                <a href="index.php" class="d-grid gap-2 d-md-flex justify-content-md-end" style="text-decoration: none;"><button class="btn btn-success"  type="button">Regresar</button></a>
            </div>
            

        </div>
    </div>



</body>






</html>