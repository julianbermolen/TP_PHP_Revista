 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");  


 $sql = "UPDATE publicacion
 SET nombre_publicacion = '".$_POST["nombre_publicacion"]."', tipo_publicacion = '".$_POST["tipo"]."', descripcion = '".$_POST["descripcion"]."'  WHERE id_publicacion ='".$_POST["id_publicacion"]."'";  
  

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/revista/panel-administrador-revista-publicacion.php'); 
 ?>  