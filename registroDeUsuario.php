	<?php
		if(isset($_POST['boton'])){
		include("bd/conexion.php");
			if(isset($_POST['username'])){
				$user = $_POST['username'];
			}
			if(isset($_POST['email'])){
				$email = $_POST['email'];
			}

			 if(isset($_POST['password']) == isset($_POST['confirm_password'])){
			 	$pass = md5($_POST['password']);
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
			$rol = 2;

			$query = "INSERT INTO cliente VALUES('','$email','$pass','$user','$rol','$nombre','$apellido','$direccion','$nro','$prov')";
			$resultado = mysqli_query($conexion,$query);

			if($resultado){
				$exito = 1;
			}else{
				$exito = 0;
			  }
			}
	?>
<html>
<head>
	<title>Registro de usuario - El Argentino</title>
	<?php 
	  include("php/incluiBootstrap.php");
	  include("bd/conexion.php");
	 ?>


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
						<form class="cmxform" id="validarForm" action="registroDeUsuario.php" method="POST" class="form-horizontal">
							<div class="form-group">
								<label for="username" class="label-largo">Ingrese nombre de usuario:</label>
								<input type="text" id="username" name="username" class="form-control input-largo" />
							</div>
							<div class="form-group">
								<label for="email" class="label-largo">Ingrese e-mail:</label>
								<input type="email" name="email" id="email" class="form-control input-largo"/>
							</div>
							<div class="form-group">
								<label for="password" class="label-largo">Ingrese contrase&ntilde;a</label>
								<input type="password" name="password" id="password" class="form-control input-largo"/>
							</div>
							<div class="form-group">
								<label for="confirm_password" class="label-largo">Reingrese contrase&ntilde;a</label>
								<input type="password" name="confirm_password" id="confirm_password" class="form-control input-largo"/>
							</div>
							<div class="form-group">
								<label for="nombre" class="label-largo">Ingrese nombre:</label>
								<input type="text" id="nombre" name="nombre" class="form-control input-largo" />
							</div>
							<div class="form-group">
								<label for="apellido" class="label-largo">Ingrese Apellido:</label>
								<input type="text" id="apellido" name="apellido" class="form-control input-largo" />
							</div>
							<div class="form-group">
								<label for="direccion" class="label-largo">Ingrese Dirección:</label>
								<input type="text" id="direccion" name="direccion" class="form-control input-largo" />
							</div>
							<div class="form-group">
								<label for="nro" class="label-largo">Nro:</label>
								<input type="text" id="nro" name="nro" class="form-control input-largo" />
							</div>
							<div class="form-group">
								<label for="prov" class="label-largo">Provincia:</label>
								<Select name='prov' id='prov' class="form-control input-largo">
									<?php $query = 'SELECT id_provincia,provincia_nombre FROM provincia';
										  $result= mysqli_query($conexion,$query);
										  while($fila = mysqli_fetch_assoc($result)){
									echo "<option value='".$fila['id_provincia']."'>".$fila['provincia_nombre']."</option>";
								}?>
								</select>
							</div>
							<input type="submit" name="boton" value="Enviar" class="btn btn-primary btn-lg btn-block"/>
						</form>
						<?php 
							if(isset($exito)){
								if($exito == 1){
									echo "<div class='alert alert-success'><strong>¡Bien hecho!</strong> Usuario registrado con exito!</div>";
								}else{
									echo "<div class='alert alert-danger'><strong>¡Ups!</strong> Usuario no registrado, intente en otro momento</div>";
								}

							}
						?>
						
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
	<script src="js/jquery.validate.js"></script>
	<script src="js/validarFormulario.js"></script>

</body>
</html>