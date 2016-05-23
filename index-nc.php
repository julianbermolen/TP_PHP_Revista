<!DOCTYPE html>
<html lang="es">
<head>
	<title>Editorial InfoNete</title>
	<?php
		include("php/incluiBootstrap.php");
	?>
</head>
<body>
  <div class="container">
	<?php include("php/menu.php"); ?>
    <div class="row">
      <section id="contenedorDeProductos" class="col-xs-12 col-md-9">
        <!--traemos con un script de php en varias rows la portada de los productos-->
        <div class="row">
          <div class="col-xs-4 col-xs-offset-1" style="height: 300px; background-color: red">
            <a href="#">
              <img src="#" alt="portada" title="revista"/>
            </a>
          </div>
          <div class="col-xs-4 col-xs-offset-1" style="height: 300px; background-color: blue">
            <a href="#">
              <img src="#" alt="portada" title="revista"/>
            </a>
          </div>
        </div>
      </section>
      <aside id="barraDePublicidad" class="visible-md col-md-3">
        PUBLICIDAD
      </aside>
   </div>
  </div>
<?php include("php/footer.php"); ?>
</body>
</html>