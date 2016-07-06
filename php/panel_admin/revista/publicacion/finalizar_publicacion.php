<?php  
 $connect = mysqli_connect("localhost", "root", "", "sistema");  
 $sql = "UPDATE publicacion SET cod_estado = 2 WHERE id_publicacion = '".$_POST["id_publicacion"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Publicacion Finalizada';  
 }  
 ?>  