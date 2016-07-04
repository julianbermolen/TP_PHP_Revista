 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");

 
 $sql = "INSERT INTO publicacion VALUES('','".$_POST["publicacion"]."','".$_POST["tipo"]."','','".$_POST["descripcion"]."')";

 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/revista/panel-administrador-revista-publicacion.php'); 
 ?>  