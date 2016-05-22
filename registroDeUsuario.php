<html>
<head>
	<title>Registro de usuario - El Argentino</title>
<?php include("php/incluiBootstrap.php");
	  include("bd/conexion.php");
	 ?>
	 <script type="text/javascript" src="jquery/validarFormulario.js"></script>

</head>
<body>
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
								<label class="alerta" for="usuario">Campo inv&aacute;lido</label>
							</div>
							<div class="form-group">
								<label for="clave1" class="label-largo">Ingrese contrase&ntilde;a</label>
								<input type="password" name="clave1" class="form-control input-largo" max-lenght="10"/>
								<label class="alerta" for="usuario">Campo inv&aacute;lido</label>
							</div>
							<div class="form-group">
								<label for="clave2" class="label-largo">Reingrese contrase&ntilde;a</label>
								<input type="password" name="clave2" class="form-control input-largo" max-lenght="10"/>
								<label class="alerta" for="usuario">Campo inv&aacute;lido</label>
							</div>
							<input type="submit" name="boton" value="Enviar" class="btn btn-primary btn-lg btn-block"/>
						</form>
						
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