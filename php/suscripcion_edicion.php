<?php
	session_start();
	include("../bd/conexion.php");

	
	$id_edicion = isset($_POST['id_edicion']);
	$cod_cliente = $_COOKIE['cod_cliente'];
	$fecha = date('y-m-d');
	$nuevafecha = strtotime ( '+30 day' , strtotime ( $fecha ) ) ;
	$nuevafecha = date ( 'y-m-d' , $nuevafecha );
	
	$query = "INSERT INTO suscripcion VALUES('','$id_edicion','$cod_cliente','$fecha','$nuevafecha')";

		$result = mysqli_query($conexion,$query);
		
?>