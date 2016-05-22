	<?php
		if(isset($_POST['boton'])){
		include("bd/conexion.php");
			if(isset($_POST['usuario'])){
				$user = $_POST['usuario'];
			}
			if(isset($_POST['email'])){
				$email = $_POST['email'];
			}

			 if(isset($_POST['clave1']) == isset($_POST['clave2'])){
			 	$pass = $_POST['clave1'];
			 }
			$rol = 2;

			$query = "INSERT INTO usuario VALUES('','$email','$pass','$user','$rol')";
			$resultado = mysqli_query($conexion,$query);

			if($resultado){
				echo "Usuario creado con exito";
			}else{
				echo "Hubo un error, intente más tarde";
			  }
			}
	?>
<html>
<head>
	<title>Registro de usuario - El Argentino</title>
	<?php 
	  include("php/incluiBootstrap.php");
	 ?>
	 <script type="text/javascript" src="jquery/validarFormulario.js"></script>

</head>
<body>
	<div id="wrapper">
	<div class="container">
		<?php include("php/menu.php"); ?>

		<div class="row">

			<h1> Formulario de registro </h1>
			<div class="col-xs-12 col-sm-6">
				<!--aca comienza el panel que contiene el form-->
				<div class="panel panel-default">
					<div class="panel-body">
						<form action="registroDeUsuario.php" method="POST" class="form-horizontal">
							<div class="form-group">
								<label for="usuario" class="label-largo">Ingrese nombre de usuario:</label>
								<input type="text" name="usuario" class="form-control input-largo" max-lenght="60"/>
								<label class="alerta" for="usuario">Campo inv&aacute;lido</label>
							</div>
							<div class="form-group">
								<label for="email" class="label-largo">Ingrese e-mail:</label>
								<input type="email" name="email" class="form-control input-largo"/>
								<label class="alerta" for="email">Campo inv&aacute;lido</label>
							</div>
							<div class="form-group">
								<label for="clave1" class="label-largo">Ingrese contrase&ntilde;a</label>
								<input type="password" name="clave1" class="form-control input-largo" max-lenght="10"/>
								<label class="alerta" for="clave1">Campo inv&aacute;lido</label>
							</div>
							<div class="form-group">
								<label for="clave2" class="label-largo">Reingrese contrase&ntilde;a</label>
								<input type="password" name="clave2" class="form-control input-largo" max-lenght="10"/>
								<label class="alerta" for="clave2">Campo inv&aacute;lido</label>
							</div>
							<input type="submit" name="boton" value="Enviar" class="btn btn-primary btn-lg btn-block"/>
						</form>
						
					</div>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6">
				<div class="panel panel-default">
					<div class="panel-body">
						<h2>¿Sabias que tenes 1 revista gratis para probar el sistema?</h2>
						<div class="">Es cierto! con tu formulario de registro, creamos tu usuario con 1 suscripción gratis por 5 días de tal forma que puedas probar el servicio y dar a conocer nuestros beneficios!<br> Apurate, inicia sesión y conoce todo acerca de <b>InfoNete<b>!</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<?php 
		include("php/footer.php");
	?>
</body>
</html>