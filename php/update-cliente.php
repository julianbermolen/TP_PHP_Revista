<?php 
	include("../bd/conexion.php");
		
	session_start();

	$query = "SELECT id_cliente FROM cliente WHERE username_cliente='$_SESSION[nombre]'";
	$resultado = mysqli_query($conexion,$query);
	$datos_viejos = mysqli_fetch_array($resultado);

			if(isset($_POST['username'])){
				$user = $_POST['username'];
			}
			if(isset($_POST['email'])){
				$email = $_POST['email'];
			}

			 if(isset($_POST['nombre'])){
				$nombre = $_POST['nombre'];
			}
			if(isset($_POST['apellido'])){
				$apellido = $_POST['apellido'];
			}
			if(isset($_POST['direccion'])){
				$direccion = $_POST['direccion'];
			}
			if(isset($_POST['nro'])){
				$nro = $_POST['nro'];
			}
			if(isset($_POST['prov'])){
				$prov = $_POST['prov'];
			}
			if(isset($_POST['localidad'])){
				$localidad = $_POST['localidad'];
			}

			$query = "UPDATE cliente 
						SET username_cliente='$user',
						email_cliente='$email',
						nombre_cliente='$nombre',
						apellido_cliente='$apellido',
						calle='$direccion',
						numero_calle='$nro',
						cod_prov='$prov',
						cod_ciud='$localidad',
						WHERE id_cliente=$datos_viejos[0]";
			$resultado = mysqli_query($conexion,$query);

			header("location:../panel-usuario-datos.php");



?>