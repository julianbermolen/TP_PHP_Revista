 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");  
 $sql = "INSERT INTO usuario VALUES('','".$_POST["email"]."','".$_POST["password"]."','".$_POST["username"]."','".$_POST["rol"]."')";

 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/panel-administrador-usuario.php'); 
 ?>  