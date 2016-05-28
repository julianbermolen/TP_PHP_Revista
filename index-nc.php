<!DOCTYPE html>
<html lang="es">
<head>
	<title>Editorial InfoNete</title>
	<?php
		include("php/incluiBootstrap.php");
	?>
  <script src="js/script-index.js"></script>
</head>
<body>
  <?php
  //funcion prara traer productos por su tipo
        function traerProductos($tipo){
          include("bd/conexion.php");//inicia conexion
          $contarLineas=0;
          $respuesta=mysqli_query($conexion,"select * from publicacion where tipo_publicacion='$tipo';");
          $tuplasHalladas=mysqli_fetch_array(mysqli_query($conexion,"select count(*) from publicacion where tipo_publicacion='$tipo';"));
          $cantidadDeLineas=($tuplasHalladas[0])/2;

          if(($tuplasHalladas[0]%2)!=0)
            $cantidadDeLineas++;

          settype($cantidadDeLineas,"int");

          while ($contarLineas<($cantidadDeLineas)) {
            $arrayRespuesta=mysqli_fetch_assoc($respuesta);
            echo "<div class='row'>";
            echo "<div class='col-xs-10 col-xs-push-1 col-md-4 col-md-push-2'>
                    <a href='#'>
                      <img src=".$arrayRespuesta['path']." class='portada' .alt=".$arrayRespuesta['nombre_publicacion']."/>
                    </a>
                    <h4 class='nombreDePublicacion'>".$arrayRespuesta['nombre_publicacion']."</h4>
                  </div>";

            if($arrayRespuesta=mysqli_fetch_assoc($respuesta)){
            echo " <div class='col-xs-10 col-xs-push-1 col-md-4 col-md-push-2'>
                      <a href='#'>
                        <img src=".$arrayRespuesta['path']." class='portada' .alt=".$arrayRespuesta['nombre_publicacion']."/>
                    </a>
                    <h4 class='nombreDePublicacion'>".$arrayRespuesta['nombre_publicacion']."</h4>
                  </div>";
            
            }
            $contarLineas++;
            echo"</div>";//cierre de row
          }

          mysqli_close($conexion);
        }
      ?>
  <div class="container"><!--contenedor de menu-->
	<?php include("php/menu.php"); ?>
    </div>
      <section id="contenedorDeRevistas">
        <div class="container">
          <?php traerProductos('R'); ?>
        </div>
      </section>

      <section id="contenedorDeDiarios">
        <div class="container">
          <?php traerProductos('D'); ?>
        </div>
      </section>
  <?php include("php/footer.php"); ?>
</body>
</html>