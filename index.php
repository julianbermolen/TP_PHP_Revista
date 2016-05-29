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