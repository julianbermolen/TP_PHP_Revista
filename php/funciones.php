<?php
  //funcion para restringir el acceso
    //valores: contenidista = 1; Lector = 2 ; Administrador = 3; contenidista y lector = 4; todos = 5;
        function acceso($tipo){
            include("bd/conexion.php");//conexion
            //para usar la funcion acceso se debe indicar el tipo de usuario indicado arriba.
            if($tipo == 1 || $tipo == 2 || $tipo == 3){

                if($_COOKIE['tipoUsuario'] != $tipo){
                  header("location:index.php");
                }

          }else{
                if($tipo == 4){
                  if($_COOKIE['tipoUsuario'] != 2 || $_COOKIE['tipoUsuario'] != 3){
                    header("location:index.php");
                  }
                }
          }


        }



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