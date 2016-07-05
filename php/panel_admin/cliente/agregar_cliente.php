 <?php  

 $connect = mysqli_connect("localhost", "root", "", "sistema");

			if(isset($_POST['username'])){
				$user = $_POST['username'];
			}
			if(isset($_POST['email'])){
				$email = $_POST['email'];
			}

			 if(isset($_POST['password_new']) == isset($_POST['confirm_password'])){
			 	$pass = md5($_POST['password_new']);
			 }
			 if(isset($_POST['nombre'])){
				$nombre = $_POST['nombre'];
			}
			if(isset($_POST['apellido'])){
				$apellido = $_POST['apellido'];
			}
			if(isset($_POST['direccion'])){
				$direccion = $_POST['direccion'];
			}
			if(isset($_POST['nro'])){
				$nro = $_POST['nro'];
			}
			if(isset($_POST['prov'])){
				$prov = $_POST['prov'];
			}
			if(isset($_POST['localidad'])){
				$localidad = $_POST['localidad'];
			}
			$rol = 1;

			$sql = "INSERT INTO cliente VALUES('','$email','$pass','$user','$rol','$nombre','$apellido','$direccion','$nro','$prov','$localidad')";

 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/panel-administrador-cliente.php'); 
 ?>  