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
    <div class="col-lg-12">
      
     <?php traerArticulo(); ?>
    </div>
   
  <?php include("php/footer.php"); ?>
</body>
</html>
