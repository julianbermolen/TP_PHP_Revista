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
    if(!isset($_GET["indice"])||!isset($_GET["tipo"])){
      $indice=0;
      $tipo='R';
      }
    else{
      $indice=$_GET["indice"];
      $tipo=$_GET["tipo"];
      }
      
  ?>
  <div class="container"><!--contenedor de menu-->
	<?php include("php/menu.php"); ?>
    </div>
      <section id="contenedorDeRevistas">
        <div class="container">
          <?php paginar($tipo,4,$indice); ?>
          <?php traerProductos($tipo,4,$indice); ?>
        </div>
      </section>

      <section id="contenedorDeDiarios">
        <div class="container">
          <?php paginar($tipo,4,$indice); ?>
          <?php traerProductos($tipo,4,$indice); ?>
        </div>
      </section>
  <?php include("php/footer.php"); ?>
</body>
</html>