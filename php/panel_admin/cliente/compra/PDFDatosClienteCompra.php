<?php

require('../../../../lib/fpdf/fpdf.php');



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
$pdf->Cell(100, 8, 'LISTADO DE COMPRAS', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 8, 'ID COMPRA', 0);
$pdf->Cell(20, 8, 'ID CLIENTE', 0);
$pdf->Cell(40, 8, 'CLIENTE', 0);
$pdf->Cell(60, 8, 'EDICION', 0);
$pdf->Cell(60, 8, 'PUBLICACION', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);

	
	$conexion = mysqli_connect("localhost", "root", "", "sistema");  
	$sql = "SELECT * FROM compra INNER JOIN cliente ON cliente.id_cliente = compra.cod_cliente INNER JOIN edicion ON edicion.id_edicion = compra.cod_edicion INNER JOIN publicacion ON edicion.id_publicacion = publicacion.id_publicacion";
	$resultado = mysqli_query($conexion, $sql);

	while($fila = mysqli_fetch_array($resultado)) {
	
	
	$pdf->Cell(20, 8, $fila['id_compra'], 0);
	$pdf->Cell(20, 8, $fila['id_cliente'], 0);
	$pdf->Cell(40, 8, $fila['username_cliente'], 0);
	$pdf->Cell(60, 8, $fila['nombre_edicion'], 0);
	$pdf->Cell(60, 8, $fila['nombre_publicacion'], 0);

	$pdf->Ln(8);
    }

    $pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(114,8,'',0);
	$pdf->Output();


	?>