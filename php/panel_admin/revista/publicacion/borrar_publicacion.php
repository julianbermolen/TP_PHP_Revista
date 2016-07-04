<?php  
 $connect = mysqli_connect("localhost", "root", "", "sistema");  
 $sql = "DELETE FROM publicacion WHERE id_publicacion = '".$_POST["id_publicacion"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Publicacion Borrada';  
 }  
 ?>  