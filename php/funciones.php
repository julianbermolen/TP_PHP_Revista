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
          $tuplasHalladas=mysqli_fetch_array(mysqli_query($conexion,"select count(*) from publicacion where tipo_publicacion='$tipo';"));
          mysqli_set_charset($conexion,'utf8');
          
          //inicio paginado
          $cantidadDePaginas = $tuplasHalladas[0]/4;
          //$contarPaginas = 0

          if(($tuplasHalladas[0]%4)!=0){
            $cantidadDePaginas+=1;
          }

          echo"<ul class='pagination'>";
          echo"<li><a href='#'><span aria-hidden='true'>&laquo;</span></a></li>";

          for($i=1;$i<=$cantidadDePaginas;$i++){
            echo"<li><a href='#'>".$i."</a></li>";
          }
          echo"</ul>";
          mysqli_close($conexion);
          //finaliza el paginado
          include("bd/conexion.php");//inicia conexion
          
          $cantidadDeLineas=($tuplasHalladas[0])/2;

          if(($tuplasHalladas[0]%2)!=0)
            $cantidadDeLineas++;

          settype($cantidadDeLineas,"int");

          $respuesta=mysqli_query($conexion,"select * from publicacion where tipo_publicacion='$tipo';");

          while ($contarLineas<($cantidadDeLineas)) {
            $arrayRespuesta=mysqli_fetch_assoc($respuesta);
            echo "<div class='row'>";
            echo "<div class='col-xs-8 col-xs-push-2 col-md-4 col-md-push-2'>
                    <div class='col-lg-12 borderText contenedorDeArticulo'>
                       <a href='#$arrayRespuesta[id_publicacion]' class='dropdown-toggle' data-target='#$arrayRespuesta[id_publicacion]' data-toggle='modal' role='button'' >
                        <img src=".$arrayRespuesta['path']." class='portada' .alt=".$arrayRespuesta['nombre_publicacion']."/>
                        <div class='descripcion'>
                            <h4 class='nombreDePublicacion'>".$arrayRespuesta['nombre_publicacion']."</h4>
                             <p>".$arrayRespuesta['descripcion']."</p>
                        </div>
                      </a>
                    </div>
                  </div>";

                  // EL MODAL LO PONGO 2 VECES PORQUE ESTÁS IMPRIMIENDO 2 VECES EN UN WHILE. MODIFICAR MODAL

                   echo '<div id="'.$arrayRespuesta["id_publicacion"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modalPublicacion">
                        <div class="modal-content">
                            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4><strong>InfoNETE!</strong></h4></div> 
                            <div class="modal-body2">
                                <div class="mitadModal">
                                    <img src='.$arrayRespuesta["path"].' class="imgModal" .alt='.$arrayRespuesta["nombre_publicacion"].'/>
                                </div>
                                <div class="mitadModal">

                                    <span class="tituloModalPubli">'.$arrayRespuesta["nombre_publicacion"].'<span><br><br>
                                    <span class="descripcionModalPubli">'.$arrayRespuesta["descripcion"].'<span><br><br><br>
                                  <div class="derecha">
                                        <button type="button" href="" class="btn btn-danger">Suscribirse</button>
                                        <button type="button" class="btn btn-success">Comprar</button>
                                  </div>
                                </div>
                            </div>
                                         
                         </div>
                      </div>
                  </div>';

            if($arrayRespuesta=mysqli_fetch_assoc($respuesta)){
            echo "<div class='col-xs-8 col-xs-push-2 col-md-4 col-md-push-2'>
                    <div class='col-lg-12 borderText contenedorDeArticulo'>
                      <a href='#$arrayRespuesta[id_publicacion]' class='dropdown-toggle' data-target='#$arrayRespuesta[id_publicacion]' data-toggle='modal' role='button'' >
                        <img src=".$arrayRespuesta['path']." class='portada' .alt=".$arrayRespuesta['nombre_publicacion']."/>
                        <div class='descripcion'>
                            <h4 class='nombreDePublicacion'>".$arrayRespuesta['nombre_publicacion']."</h4>
                             <p>".$arrayRespuesta['descripcion']."</p>
                        </div>
                      </a>
                    </div>
                  </div>";

             }

                    echo '<div id="'.$arrayRespuesta["id_publicacion"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modalPublicacion">
                        <div class="modal-content">
                            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4><strong>InfoNETE!</strong></h4></div> 
                            <div class="modal-body2">
                                <div class="mitadModal">
                                    <img src='.$arrayRespuesta["path"].' class="imgModal" .alt='.$arrayRespuesta["nombre_publicacion"].'/>
                                </div>
                                <div class="mitadModal">

                                    <span class="tituloModalPubli">'.$arrayRespuesta["nombre_publicacion"].'<span><br><br>
                                    <span class="descripcionModalPubli">'.$arrayRespuesta["descripcion"].'<span><br><br><br>
                                  <div class="derecha">
                                        <button type="button" href="" class="btn btn-danger">Suscribirse</button>
                                        <button type="button" class="btn btn-success">Comprar</button>
                                  </div>
                                </div>
                            </div>
                                         
                         </div>
                      </div>
                  </div>';
            $contarLineas++;
            echo"</div>";//cierre de row


          }

          mysqli_close($conexion);
        }
    


      ?>