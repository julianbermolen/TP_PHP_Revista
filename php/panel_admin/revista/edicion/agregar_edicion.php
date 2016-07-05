 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");


		$path1 = $_FILES['file']['name'];
	
	
		$dir = '../../../../imagenes/';



				
	
		
 
 $sql = "INSERT INTO edicion VALUES('','".$_POST["publicacion"]."','".$_POST["edicion"]."','','".$_POST["precio_compra"]."','".$_POST["precio_suscripcion"]."','".$path1."')";

		$fichero1 = $dir.basename($_FILES['file']['name']);
			if (@move_uploaded_file($_FILES['file']['tmp_name'], $fichero1)) {
		  	echo "El fichero es válido y se subió con éxito.\n";
			} 

 if(mysqli_query($connect, $sql))  
 {  


      echo 'Data Updated';
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/revista/panel-administrador-revista-edicion.php'); 
 ?>  