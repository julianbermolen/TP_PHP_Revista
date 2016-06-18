<?php
session_start();
session_destroy();

	setcookie('tipoUsuario',$rol,time()-(86400*20), "/");
	setcookie('cod_cliente',$id_usuario,time()-(86400*20), "/");

header("location:../index.php");
?>