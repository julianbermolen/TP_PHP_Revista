<?php
$nombre = $_POST['user'];
$clave = md5($_POST['pass']);

include('../bd/conexion.php');

$query = "SELECT * FROM usuario WHERE nombre='$nombre' AND clave = '$clave'";

$result = mysqli_query($conexion,$query);

if($result){
	$tipo = mysqli_fetch_array($result);

	$rol = $tipo['cod_rol'];

	session_start();
	$_SESSION['nombre'] = $nombre;
	setcookie('tipoUsuario',$rol,time()+(86400*20), "/");
	header("location:../index.php");
}else{
	echo "error";
}
?>