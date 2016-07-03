 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");  

 $pass=md5($_POST["password"]);

 $sql = "UPDATE cliente
 SET username_cliente = '".$_POST["username"]."', email_cliente = '".$_POST["email"]."',clave_cliente = '".$pass."', nombre_cliente = '".$_POST["nombre"]."', apellido_cliente = '".$_POST["apellido"]."', calle = '".$_POST["direccion"]."', numero_calle = '".$_POST["nro"]."' WHERE id_cliente ='".$_POST["id_cliente"]."'";  
 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/panel-administrador-cliente.php'); 
 ?>  