<?php  
 $connect = mysqli_connect("localhost", "root", "", "sistema");  
 $sql = "DELETE FROM seccion WHERE id_seccion = '".$_POST["id_seccion"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Seccion Borrada';  
 }  
 ?>  