<?php
		require_once("../../seguro.php");

	
	
		session_destroy();
		
		header('refresh:2; url=http://localhost/TP_PHP_REVISTA/vistas/panel_admin/login/index.php'); 
		echo "Redireccionando al login...";
		
		echo "<br>";

	
?>