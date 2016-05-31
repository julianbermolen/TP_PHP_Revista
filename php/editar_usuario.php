 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");  

 $sql = "UPDATE usuario 
 SET nombre = '".$_POST["username"]."', email = '".$_POST["email"]."',clave = '".$_POST["password"]."', cod_rol = '".$_POST["rol"]."' WHERE id_usuario ='".$_POST["id_usuario"]."'";  
 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/panel-administrador-usuario.php'); 
 ?>  