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
      $indice=!isset($_GET["indice"])?1:$_GET["indice"];
      $tipo=!isset($_GET["tipo"])?'R':$_GET["tipo"];
  ?>
  <div class="container"><!--contenedor de menu-->
	<?php include("php/menu.php"); ?>
    </div>
      <section id="contenedorDeRevistas">
        <div class="container">
          <?php
            traerProductos($tipo,6,$indice);
           ?>
        </div>
      </section>
  <?php include("php/footer.php"); ?>
</body>
</html>