<html>
<head>
  <?php
  include("bd/conexion.php");
    if(isset($_POST['login'])){
        if(isset($_POST['user'])){
          $user = $_POST['user'];
        }
        if(isset($_POST['pass'])){
          $pass = $_POST['pass'];
        }
        $query = "SELECT * FROM usuario WHERE nombre = $user and clave = $pass";
        $resultado = mysqli_query($conexion,$query);

        if($resultado){
          session_start();
          $datos = mysqli_fetch_array($resultado);
          
        }
    }
  ?>
	<title>InfoNete -</title>
	<?php
		include("php/incluiBootstrap.php");
    include("bd/conexion.php");
	?>
</head>
<body>
  <?php
    include("php/menu.php");
    
  ?>
</body>
</html>

