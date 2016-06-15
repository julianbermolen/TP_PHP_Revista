 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");  

 $pass=md5($_POST["password"]);

 $sql = "UPDATE usuario 
 SET nombre = '".$_POST["username"]."', email = '".$_POST["email"]."',clave = '".$pass."', cod_rol = '".$_POST["rol"]."' WHERE id_usuario ='".$_POST["id_usuario"]."'";  
 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/panel-administrador-usuario.php'); 
 ?>  