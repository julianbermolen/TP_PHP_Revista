 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");  

 
 $sql = "UPDATE articulo 
 SET titulo = '".$_POST["titulo"]."', subtitulo = '".$_POST["subtitulo"]."' WHERE id_articulo ='".$_POST["id_articulo"]."'";  
 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/revista/panel-administrador-revista-articulo.php'); 
 ?>  