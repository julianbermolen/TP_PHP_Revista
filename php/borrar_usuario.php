 <?php  
 $connect = mysqli_connect("localhost", "root", "", "sistema");  
 $sql = "DELETE FROM usuario WHERE id_usuario = '".$_POST["id_usuario"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Cliente borrado';  
 }  
 ?>  