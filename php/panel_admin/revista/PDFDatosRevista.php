<?php

require('../../../lib/fpdf/fpdf.php');



$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(18, 10, '', 0);
$pdf->Cell(150, 10, '', 0);
$pdf->SetFont('Arial', '', 9);
$pdf->Cell(50, 10, 'Fecha: '.date('d-m-Y').'', 0);
$pdf->Ln(15);
$pdf->SetFont('Arial', 'B', 11);
$pdf->Cell(70, 8, '', 0);
$pdf->Cell(100, 8, 'LISTADO DE ARTICULOSS', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 8, 'ID', 0);
$pdf->Cell(60, 8, 'Titulo', 0);
$pdf->Cell(80, 8, 'Subtitulo', 0);
$pdf->Cell(25, 8, 'Texto', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);

	
	$conexion = mysqli_connect("localhost", "root", "", "sistema");  
	$sql = "SELECT * FROM articulo ";
	$resultado = mysqli_query($conexion, $sql);

	while($fila = mysqli_fetch_array($resultado)) {
	
	
	$pdf->Cell(20, 8, $fila['id_articulo'], 0);
	$pdf->Cell(60, 8, $fila['titulo'], 0);
	$pdf->Cell(80, 8, $fila['subtitulo'], 0);
	$pdf->Cell(25, 8, $fila['texto'], 0);
	$pdf->Ln(8);
    }

    $pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(114,8,'',0);
	$pdf->Output();


	?>