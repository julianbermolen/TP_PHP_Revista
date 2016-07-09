<?php
	
	session_start();

	if(!isset($_SESSION["log"])){
		
		session_destroy();
		
		header("location:http://localhost/TP_PHP_REVISTA/vistas/panel_admin/login/index.php");
	}

	if(!$_SESSION["log"]){
		
		session_destroy();
		
		header("location:http://localhost/TP_PHP_REVISTA/vistas/panel_admin/login/index.php");
	}

?>