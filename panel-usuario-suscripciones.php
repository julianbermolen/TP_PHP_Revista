<!DOCTYPE html>
<html lang="es">
<head>
	<title>Editorial InfoNete</title>
	<?php
		include("php/incluiBootstrap.php");
	?>
  
</head>
<body>
  <?php
    include("php/funciones-cliente.php");
  ?>
  <div class="container"><!--contenedor de menu-->
	<?php include("php/menu.php"); ?>
    </div>
      <section id="tabla-suscripciones">
        <div class="container">
          <div class="row">
            <div class="col-xs-12">
              <?php
                if(isset($_SESSION['nombre'])){
                  echo'<table class="table table-responsive table-striped">
                    <tr>
                      <th>Código de suscripción</th>
                      <th>Nombre de la edición</th>
                      <th>Fecha de inicio</th>
                    </tr>';
              
                    traerSuscripciones($_SESSION["nombre"]);

                  echo"</table>";
                }
                else{
                  echo"<p><strong>Usted debe iniciar sesión para acceder a esta página</strong></p>";
                }
              ?>              
            </div>
          </div>
        </div>
      </section>
  <?php include("php/footer.php"); ?>
</body>
</html>