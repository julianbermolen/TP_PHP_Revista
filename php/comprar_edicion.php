<?php
	session_start();
	include("../bd/conexion.php");

	
	$id_edicion = $_POST['id_edicion'];
	$cod_cliente = $_COOKIE['cod_cliente'];
	$fecha = date('y-m-d');
	
	$query = "INSERT INTO compra VALUES('','$id_edicion','$cod_cliente','$fecha')";

		$result = mysqli_query($conexion,$query);
		
?>