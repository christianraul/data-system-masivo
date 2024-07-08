<?php

require_once 'conexion.php';
require_once('librerias/TCPDF/tcpdf.php');

// Consulta SQL para obtener datos de la tabla
$sql = "SELECT * FROM tblemp";
$result = $con->query($sql);


/// Crear instancia de TCPDF
$pdf = new TCPDF('L', 'mm', 'A4', true, 'UTF-8', false);
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);
$pdf->AddPage();

// Agregar título a la tabla
$pdf->SetFont('helvetica', 'B', 16);
$pdf->Cell(0, 10, 'Lista de Empadronados', 0, 1, 'C');
$pdf->Ln(5);

// Ajustar tamaño de los bordes
$pdf->SetLineWidth(0.3); // Tamaño de los bordes en mm

// Crear la tabla
// Establecer fuente en negrita para la cabecera
$pdf->SetFont('helvetica', 'B', 8);
$pdf->SetFillColor(240, 240, 240);
$pdf->Cell(10, 8, 'ID', 1, 0, 'C', 1);
$pdf->Cell(30, 8, 'DNI', 1, 0, 'C', 1);
$pdf->Cell(30, 8, 'CODIGO', 1, 0, 'C', 1);
$pdf->Cell(30, 8, 'S100', 1, 0, 'C', 1);
$pdf->Cell(30, 8, 'FSU', 1, 0, 'C', 1);
$pdf->Cell(30, 8, 'FECHA', 1, 0, 'C', 1);
$pdf->Cell(30, 8, 'APELLIDO PATERNO', 1, 0, 'C', 1);
$pdf->Cell(40, 8, 'APELLIDO MATERNO', 1, 0, 'C', 1);
$pdf->Cell(50, 8, 'NOMBRES', 1, 0, 'C', 1);
$pdf->Ln();


$pdf->SetFont('helvetica', '', 8);
// Iterar sobre los registros y agregarlos a la tabla
while ($row = $result->fetch_assoc()) {
    $pdf->Cell(10, 7, $row['idemp'], 1,0,'C');
    $pdf->Cell(30, 7, $row['dni'], 1,0,'C');
    $pdf->Cell(30, 7, $row['codigo'], 1,0,'C');
    $pdf->Cell(30, 7, $row['s100'], 1,0,'C');
    $pdf->Cell(30, 7, $row['fsu'], 1,0,'C');
    $pdf->Cell(30, 7, $row['fecha'], 1,0,'C');
    $pdf->Cell(30, 7, $row['paterno'], 1,0,'C');
    $pdf->Cell(40, 7, $row['materno'], 1,0,'C');
    $pdf->Cell(50, 7, $row['nombre'], 1,0,'C');
    $pdf->Ln();
}




// Salida del PDF
$pdf->Output('reporte-empadronados.pdf', 'D');

// Cerrar la conexión a la base de datos
$con->close();
?>