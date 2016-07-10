<!DOCTYPE html>
<html lang="es">
<head>
	<title>Editorial InfoNete</title>
	<?php
		include("php/incluiBootstrap.php");

	?>
  <script type="text/javascript" src="js/jquery-1.12.3.js"></script>
  <script src="js/jquery.validate.js"></script>
  <script src="js/validarFormulario.js"></script>

  <script type="text/javascript">
/*
    $(function() {



    });
*/
</script>

</head>

<body>
  <div id="wrapper">
  <div class="container">
    <?php include("php/menu.php"); ?>
      <?php
          include("bd/conexion.php");

          $query="SELECT * FROM cliente WHERE username_cliente='$_SESSION[nombre]'";

          $tabla = mysqli_query($conexion,$query);

         $datos = mysqli_fetch_assoc($tabla);
      ?>
    <div class="row">
      <div class="col-xs-12 col-sm-6 col-sm-push-3">
        <h1>Datos de Usuario</h1>
        <!--aca comienza el panel que contiene el form-->
        <div class="panel panel-default">
          <div class="panel-body">
            <form class="cmxform" id="validarForm" action="php/update-cliente.php" method="POST" class="form-horizontal">
              <div class="form-group">
                <label for="username" class="label-largo">Nombre de usuario:</label>
                <input type="text" id="username" name="username" class="form-control input-largo" value=<?php echo"$datos[username_cliente]"; ?> readonly="readonly" />
              </div>
              <div class="form-group">
                <label for="email" class="label-largo">Ingrese e-mail:</label>
                <input type="email" name="email" id="email" class="form-control input-largo" value=<?php echo"$datos[email_cliente]"; ?> />
              </div>
              <div class="form-group">
                <label for="nombre" class="label-largo">Ingrese nombre:</label>
                <input type="text" id="nombre" name="nombre" class="form-control input-largo" value=<?php echo"$datos[nombre_cliente]";?> />
              </div>
              <div class="form-group">
                <label for="apellido" class="label-largo">Ingrese Apellido:</label>
                <input type="text" id="apellido" name="apellido" class="form-control input-largo" value=<?php echo"$datos[apellido_cliente]"; ?> />
              </div>
              <div class="form-group">
                <label for="direccion" class="label-largo">Ingrese Dirección:</label>
                <input type="text" id="direccion" name="direccion" class="form-control input-largo" value= <?php echo"$datos[calle]"; ?> />
              </div>
              <div class="form-group">
                <label for="nro" class="label-largo">Nro:</label>
                <input type="text" id="nro" name="nro" class="form-control input-largo" value=<?php echo"$datos[numero_calle]"; ?> />
              </div>
              <div class="form-group ">
                <label for="prov" class="label-largo">Provincia:</label>
                                
                        <?php

                        $conexion = mysqli_connect("localhost","root","","sistema");
                        $sql = "SELECT * FROM provincia;";
                        $resultado = mysqli_query($conexion, $sql);
                        echo "<select id='prov' name='prov' class='form-control' value=$datos[cod_prov]>";
                        while($fila = mysqli_fetch_assoc($resultado)){
                          
                            if($fila['id_provincia'] == $datos['cod_prov']){
                              echo "<option value='"  . $fila["id_provincia"] . "' selected='selected'>" . $fila["provincia_nombre"] . "</option>";
                            }
                            else{
                              echo "<option value='"  . $fila["id_provincia"] . "'>" . $fila["provincia_nombre"] . "</option>";
                            }
                        }
                        echo "</select><br>";
                        echo "<label for='localidad' class='label-largo'>Localidad:</label>";
                        echo "<select id='localidad' name='localidad' class='form-control' value=$datos[cod_prov]></select><br>";
                        ?>
              </div>

              <input type="submit" name="boton" value="Cambiar datos" class="btn btn-primary btn-lg btn-block"/>
            </form>
            
          </div>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php 
    include("php/footer.php");
  ?>
  <script>
    $(function(){

            $("#prov").change(function() {
            var id = $(this).val();
            var parametro = 'prov='+ id;

            $.ajax ({
                type: "GET",
                url: "php/localidad1.php",
                data: parametro,
                cache: false,
                success:
                    function(html){
                        $("#localidad").html(html);
                    }
            });
        }).trigger("change");

    <?php echo"var localidadActual = $datos[cod_ciud];"; ?>

    var localidades = $("#localidad option").each(function(){
      if($(this).val() == localidadActual){
          $(this).attr("selected","true");
        }
      });
    });
  </script>

</body>
</html>