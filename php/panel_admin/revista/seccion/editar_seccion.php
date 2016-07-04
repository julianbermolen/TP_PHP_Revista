 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");  


 $sql = "UPDATE seccion
 SET id_publicacion = '".$_POST["publicacion"]."', nombre_sec = '".$_POST["seccion"]."' WHERE id_seccion ='".$_POST["id_seccion"]."'";  
 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/revista/panel-administrador-revista-seccion.php'); 
 ?>  