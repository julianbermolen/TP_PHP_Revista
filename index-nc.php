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
          while ($contarLineas<$cantidadDeLineas) {
            $arrayRespuesta=mysqli_fetch_assoc($respuesta);
            echo "<div class='row'>";
            echo "<div class='col-xs-11 col-xs-push-1 col-md-5 col-md-push-1'>
                  <a href='#'><img src=".$arrayRespuesta['path']." class='portada' .alt=".$arrayRespuesta['nombre_publicacion']."/></a>
                  </div>";
            $contarLineas++;
            if($arrayRespuesta=mysqli_fetch_assoc($respuesta)){
            echo "<div class='row'>";
            echo " <div class='col-xs-11 col-xs-push-1 col-md-5 col-md-push-1'>
                    <a href='#'><img src=".$arrayRespuesta['path']." class='portada' .alt=".$arrayRespuesta['nombre_publicacion']."/></a>
                  </div>";
            $contarLineas++;
            }

            echo"</div>";//cierre de row
          }

          mysqli_close($conexion);
        }
      ?>
  <div class="container"><!--contenedor de menu-->
	<?php include("php/menu.php"); ?>
    </div>
      <section class="container" id="contenedorDeRevistas">
        <?php traerProductos('R'); ?>
      </section>

      <section class="container" id="contenedorDeDiarios">
        <?php traerProductos('D'); ?>
      </section>
<?php include("php/footer.php"); ?>
</body>
</html>