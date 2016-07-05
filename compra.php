<?php

require_once ('php/mercadopago.php');
$precio = floatval($_GET['precio']);
$id_edicion = $_GET['id_edicion'];
$mp = new MP ("1956930901745715", "lBcRbdHzCbjL22BUGnPP3Di5K0akzE7Z");

$preference_data = array(
	"items" => array(
		array(
			"title" => "Multicolor kite",
			"quantity" => 1,
			"currency_id" => "ARS", // Available currencies at: https://api.mercadopago.com/currencies
			"unit_price" => $precio
		)
	)
);

$preference = $mp->create_preference($preference_data);


?>

<!DOCTYPE html>
<html lang="es">
<head>
	<title>Editorial InfoNete</title>
	<?php
		include("php/incluiBootstrap.php");
		include("bd/conexion.php");

	?>
  <script src="js/script-index.js"></script>


</head>
<body>
   <div class="container"><!--contenedor de menu-->
	<?php include("php/menu.php"); 
		$query = "SELECT * FROM edicion WHERE id_edicion = '$id_edicion'";
		$result = mysqli_query($conexion,$query);
		$fila = mysqli_fetch_assoc($result);
		$tapa = $fila['tapa'];
	echo '<div class="col-lg-6">
		     <img class="img-responsive" src="imagenes/'.$tapa.'"/>
		  </div>';


    echo '
      	<div class="col-lg-6">
      	<b>Nombre de la edicion: </b><input class="form-control" id="campoDeshabilitado" type="text" value="'.$fila['nombre_edicion'].'" disabled>
      	<b>Precio de la compra : </b><input class="form-control" id="campoDeshabilitado" type="text" value="'.$precio.'" disabled><br><br><br>';
        ?>
        <?php
        $variable = $preference['response']['sandbox_init_point'];
        echo '<img src="php/ejemploQr.php?qr='.$variable.'"/>';
        ?>
        <a class="btn btn-default btn-lg btn-block" data-id2="<?php echo $id_edicion?>"id="compra" href="<?php echo $preference['response']['sandbox_init_point']; ?>">Pagar</a>
        </div>
       </div>
      </section>
  <?php include("php/footer.php");
  	ob_end_flush();
   ?>

     <script>
  		$(document).ready(function(){
        $(document).on('click', '#compra', function(){  
           var id_edicion=$(this).data("id2");             
           if(confirm("Estas seguro de comprar esto?"))  
           {  
                $.ajax({  
                     url:"php/comprar_edicion.php",  
                     method:"POST",  
                     data:{id_edicion:id_edicion},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          window.location.reload();  
                     }  
                });  
           }  

      
       });
        });
  </script>
</body>
</html>