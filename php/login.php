<?php
$nombre = $_POST['user'];
$clave = md5($_POST['pass']);

include('../bd/conexion.php');

$query = "SELECT * FROM usuario WHERE nombre='$nombre' AND clave = '$clave'";

$result = mysqli_query($conexion,$query);

	$tipo = mysqli_fetch_assoc($result);

if($tipo['nombre'] == $nombre && $tipo['clave'] == $clave){
	$rol = $tipo['cod_rol'];
	session_start();
	$_SESSION['nombre'] = $nombre;
	setcookie('tipoUsuario',$rol,time()+(86400*20), "/");
	header("location:../index.php");

}else{
	echo '<script type="text/javascript">alert("Tu contraseña o Nombre de usuario es incorecto")
	  window.location.href="../index.php";</script>';
}
?>