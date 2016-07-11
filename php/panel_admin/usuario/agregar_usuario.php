 <?php  

 
 $connect = mysqli_connect("localhost", "root", "", "sistema");

$consulta="SELECT * FROM usuario";

 $query=mysqli_query($connect, $consulta);

 while($fila=mysqli_fetch_array($query)){

 		if($_POST['username'] == $fila["nombre"]){

 			$username=$fila["nombre"];
 			echo "Usuario repetido";
 			header('refresh:2; url=/TP_PHP_Revista/vistas/panel_admin/panel-administrador-usuario.php');
 		}

 }

if($username != $_POST['username']){
 $pass=md5($_POST["password_nuevo"]);
 $sql = "INSERT INTO usuario VALUES('','".$_POST["email"]."','".$pass."','".$_POST["username"]."','".$_POST["rol"]."')";

 

 if(mysqli_query($connect, $sql))  
 {  
      echo 'Data Updated';  
 } 

	header('location:/TP_PHP_Revista/vistas/panel_admin/panel-administrador-usuario.php'); 

}
 ?>  