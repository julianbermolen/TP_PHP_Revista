 <?php  
 $connect = mysqli_connect("localhost", "root", "", "sistema");  
 $sql = "DELETE FROM articulo WHERE id_articulo = '".$_POST["id_articulo"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Articulo borrado';  
 }  
 ?>  