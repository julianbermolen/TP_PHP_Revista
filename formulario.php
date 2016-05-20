<!DOCTYPE html>
<html lang="es-AR">
<head>
	<title>Formulario con JQuery y Bootstrap</title>
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
	<style>
		.alerta{
			display:block;
			visibility:hidden;
			color:rgb(255,0,0);
		}
	</style>
	<script>
	//validacion de formulario
		$(function(){
			var campos=$("input");
			alertas=$(".alerta");
			function reconstituir(){
				campos.end();
				alertas.end();				
			}

			$("form").submit(function(){
					var validar=true;
					alertas.css("visibility","hidden");
					if(campos.eq(0).val()==""){
						alertas.eq(0).css("visibility","visible");
						validar=false;
					}

					reconstituir();

					if(campos.eq(1).val()==""){
						alertas.eq(1).css("visibility","visible");
						validar=false;
					}

					reconstituir();

					if(campos.eq(2).val().length<4){
						alertas.eq(2).css("visibility","visible");
						validar=false;
					}

					if(campos.eq(3).val()!==campos.eq(2).val()){
						alertas.eq(3).css("visibility","visible");
						validar=false;
					}

					reconstituir();
					return validar;	
				});

		});


	</script>

</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-xs-12 col-sm-6 col-sm-push-3 col-md-4 col-md-push-4">
				<!--aca comienza el panel que contiene el form-->
				<div class="panel panel-default">
					<div class="panel-heading"><h4>FORMULARIO DE REGISTRO</h4></div>
					<div class="panel-body">
						<form action="formulario.php" method="POST" class="form-horizontal">
							<div class="form-group">
								<label for="usuario">ingrese nombre de usuario:</label>
								<input type="text" name="usuario" class="form-control" max-lenght="60"/>
								<label class="alerta" for="usuario">Campo inv&aacute;lido</label>
							</div>
							<div class="form-group">
								<label for="email">ingrese e-mail:</label>
								<input type="email" name="email" class="form-control"/>
								<label class="alerta" for="usuario">Campo inv&aacute;lido</label>
							</div>
							<div class="form-group">
								<label for="clave1">ingrese contrase&ntilde;a</label>
								<input type="password" name="clave1" class="form-control" max-lenght="10"/>
								<label class="alerta" for="usuario">Campo inv&aacute;lido</label>
							</div>
							<div class="form-group">
								<label for="clave2">reingrese contrase&ntilde;a</label>
								<input type="password" name="clave2" class="form-control" max-lenght="10"/>
								<label class="alerta" for="usuario">Campo inv&aacute;lido</label>
							</div>
							<input type="submit" name="boton" value="enviar" class="btn btn-default"/>
						</form>
							<?php
							/*este es un script de prueba, puede ir en cualquier lado del codigo html
							Queda editarlo de manera que pueda emplearse para los diferentes casos de uso.*/
							if(isset($_POST["boton"])){
								if(isset($_POST["usuario"]))
									$usuario=$_POST["usuario"];
								if(isset($_POST["email"]))
									$email=$_POST["email"];
								if(isset($_POST["clave1"]))
									$clave1=$_POST["clave1"];
							echo "<p>$usuario</p>
									<p>$email</p>
									<p>$clave1</p>";
							}
							?>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>














</body>