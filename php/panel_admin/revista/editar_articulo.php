 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");  

 
 $sql = "UPDATE articulo 
 SET titulo = '".$_POST["titulo"]."', subtitulo = '".$_POST["subtitulo"]."',texto = '".$_POST["texto"]."', id_seccion = '".$_POST["id_seccion"]."', id_publicacion = '".$_POST["id_publicacion"]."', id_edicion = '".$_POST["id_edicion"]."' WHERE id_articulo ='".$_POST["id_articulo"]."'";  
 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/panel-administrador-usuario.php'); 
 ?>  