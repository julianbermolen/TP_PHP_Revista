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
$pdf->Cell(100, 8, 'LISTADO DE CLIENTES', 0);
$pdf->Ln(23);
$pdf->SetFont('Arial', 'B', 8);
$pdf->Cell(20, 8, 'ID', 0);
$pdf->Cell(40, 8, 'USERNAME', 0);
$pdf->Cell(40, 8, 'NOMBRE', 0);
$pdf->Cell(40, 8, 'APELLIDO', 0);
$pdf->Cell(60, 8, 'EMAIL', 0);
$pdf->Ln(8);
$pdf->SetFont('Arial', '', 8);

	
	$conexion = mysqli_connect("localhost", "root", "", "sistema");  
	$sql = "SELECT * FROM cliente INNER JOIN provincia ON cliente.cod_prov = provincia.id_provincia INNER JOIN ciudad ON cliente.cod_ciud = ciudad.id_ciudad ";
	$resultado = mysqli_query($conexion, $sql);

	while($fila = mysqli_fetch_array($resultado)) {
	
	
	$pdf->Cell(20, 8, $fila['id_cliente'], 0);
	$pdf->Cell(40, 8, $fila['username_cliente'], 0);
	$pdf->Cell(40, 8, $fila['nombre_cliente'], 0);
	$pdf->Cell(40, 8, $fila['apellido_cliente'], 0);
	$pdf->Cell(60, 8, $fila['email_cliente'], 0);
	$pdf->Ln(8);
    }

    $pdf->SetFont('Arial', 'B', 8);
	$pdf->Cell(114,8,'',0);
	$pdf->Output();


	?>