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

<?php
  function traerArticulo(){
    include("bd/conexion.php");
    $idPubli = $_GET['id_publicacion'];

    $query = "SELECT * FROM seccion WHERE id_publicacion = '$idPubli'";

    $result = mysqli_query($conexion,$query);

    while($tipo = mysqli_fetch_assoc($result)){
        $idSeccion = $tipo['id_seccion'];
          echo "<div class='col-lg-6'>";
          echo '<div class="panel panel-default">
          <div class="panel-heading"><h3 class="nombreSeccion">'.$tipo["nombre"].'</h1></div>
            <div class="panel-body">            
            ';
          echo "<br>";
        $query_articulos = "SELECT * FROM articulo WHERE id_seccion = '$idSeccion'";

        $resultArt = mysqli_query($conexion,$query_articulos);

        while($art = mysqli_fetch_assoc($resultArt)){

          echo "<h2 class='tituloArt'>".$art['titulo']."</h2>";
          echo "<h4 class='subTituloArt'>".$art['subtitulo']."</h4><br><br><br>";
          echo "<div class='texto'>".$art['texto']."</div><br><br><br>";;


        }

        echo "</div></div></div>";//Cierro panel heading y body Cierro contenedor de seccion
    }


  }
?>