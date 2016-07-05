 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");  


 $sql = "UPDATE edicion
 SET nombre_edicion = '".$_POST["edicion"]."', precio_compra = '".$_POST["precio_compra"]."', precio_suscripcion = '".$_POST["precio_sus"]."'  WHERE id_edicion ='".$_POST["id_edicion"]."'";   
 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/revista/panel-administrador-revista-edicion.php'); 
 ?>  