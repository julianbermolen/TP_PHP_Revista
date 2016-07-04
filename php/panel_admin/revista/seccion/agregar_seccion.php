 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");

 
 $sql = "INSERT INTO seccion VALUES('','".$_POST["publicacion"]."','".$_POST["seccion"]."')";

 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/revista/panel-administrador-revista-seccion.php'); 
 ?>  