 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");

 
 $sql = "INSERT INTO edicion VALUES('','".$_POST["publicacion"]."','".$_POST["edicion"]."','','".$_POST["precio_compra"]."','".$_POST["precio_suscripcion"]."','')";

 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/revista/panel-administrador-revista-edicion.php'); 
 ?>  