<!DOCTYPE html>
<html lang="es">
<head>
	<title>Editorial InfoNete</title>
	<?php
		include("php/incluiBootstrap.php");
	?>
  <script>
        function loadMap(){
          var mapOptions ={
          center:new google.maps.LatLng(-34.6686986,-58.5614947),
          zoom:12,
          mapTypeId:google.maps.MapTypeId.ROADMAP

        };

        var map = new google.maps.Map(document.getElementById("mapa"),mapOptions);
      }
    </script>
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

   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3vR1uAGauAv3wBu-cReTOnGMBLVxDKNI&callback=initMap"
        async defer></script>

     <script>

            var map;
            function initMap() {
              map = new google.maps.Map(document.getElementById('map'), {
                center:new google.maps.LatLng(-34.6686986,-58.5614947),
                zoom:12,
                mapTypeId:google.maps.MapTypeId.ROADMAP
              });
            }
          </script>
</body>
</html>
