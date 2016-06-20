 <?php  
 $connect = mysqli_connect("localhost", "root", "", "sistema");  
 $sql = "DELETE FROM cliente WHERE id_cliente = '".$_POST["id_cliente"]."'";  
 if(mysqli_query($connect, $sql))  
 {  
      echo 'Cliente borrado';  
 }  
 ?>  