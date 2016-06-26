<?php
$nombre = $_POST['user'];
$clave = md5($_POST['pass']);

include('../bd/conexion.php');

$query = "SELECT * FROM cliente WHERE 	username_cliente='$nombre' AND clave_cliente = '$clave'";

$result = mysqli_query($conexion,$query);

	$tipo = mysqli_fetch_assoc($result);

if($tipo['username_cliente'] == $nombre && $tipo['clave_cliente'] == $clave){
	$rol = $tipo['cod_rol'];
	$id_usuario = $tipo['id_cliente'];
	session_start();
	$_SESSION['nombre'] = $nombre;
	setcookie('tipoUsuario',$rol,time()+(86400*20), "/");
	setcookie('cod_cliente',$id_usuario,time()+(86400*20), "/");
	header("location:../index.php");

}else{
	echo '<script type="text/javascript">alert("Tu contraseña o Nombre de usuario es incorecto")
	  window.location.href="../index.php";</script>';
}
?>