<?php  
 $connect = mysqli_connect("localhost", "root", "", "sistema");  
 $sql = "DELETE FROM edicion WHERE id_edicion = '".$_POST["id_edicion"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Edicion Borrada';  
 }  
 ?>  