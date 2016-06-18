 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");

 $pass=md5($_POST["password_nuevo"]);
 $sql = "INSERT INTO usuario VALUES('','".$_POST["email"]."','".$pass."','".$_POST["username"]."','".$_POST["rol"]."')";

 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/panel-administrador-usuario.php'); 
 ?>  