<?php

header("Content-Type: text/html;charset=utf-8");
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
  //funcion para paginar las categorias de publicaciones
        function paginar($tipo,$qForPage,$indice){
          include("bd/conexion.php");//inicia conexion
          
          mysqli_set_charset($conexion,'utf8');
          $contarPaginas=0;

          $query = "select * 
          from edicion e INNER JOIN publicacion p ON e.id_publicacion=p.id_publicacion
          where p.cod_estado=2 and p.tipo_publicacion='$tipo'";

          $respuesta=mysqli_query($conexion,$query);
          $tuplasHalladas=mysqli_num_rows($respuesta);
          //inicio paginado
          $cantidadDePaginas = $tuplasHalladas/$qForPage;
          /*
          if(($tuplasHalladas%$qForPage)!=0){
            $cantidadDePaginas+=1;
          }
          */
          echo"<div class='row'><div class='col-xs-12'><ul class='pagination pagination-sm'>";

          if($indice>1)
            echo"<li><a href='index.php?indice=".($contarPaginas+1)."&tipo=$tipo'><span aria-hidden='true'>&laquo;</span></a></li>";

          while($contarPaginas<=($cantidadDePaginas)){
            if($contarPaginas==($indice-1)){
            echo"<li class='active'><a href='index.php?indice=".($contarPaginas+1)."&tipo=$tipo'>".($contarPaginas+1)."</a></li>";
            }
            else{
            echo"<li><a href='index.php?indice=".($contarPaginas+1)."&tipo=$tipo'>".($contarPaginas+1)."</a></li>";
            }
            $contarPaginas+=1; 
          }
          if($cantidadDePaginas<($indice-1))
            echo"<li><a href='index.php?indice=".($contarPaginas+1)."&tipo=$tipo'><span aria-hidden='true'>&raquo;</span></a></li>";

          echo"</ul></div></div>";
          mysqli_close($conexion);
          //finaliza el paginado
        }



  //funcion prara traer productos por su tipo
        function traerProductos($tipo,$qForPage,$indice){

          $limiteDeConsulta=$qForPage;
          $inicioDeConsulta=($indice-1)*$qForPage;
          $contarLineas=0;
          //primer paginado
          paginar($tipo,$qForPage,$indice);
          //inicia insercion de portadas
          include("bd/conexion.php");//inicia conexion
          mysqli_set_charset($conexion,'utf8');

          $query = "select * 
          from edicion e INNER JOIN publicacion p ON e.id_publicacion=p.id_publicacion
          where p.cod_estado=2 and p.tipo_publicacion='$tipo'
          limit $inicioDeConsulta,$qForPage";

          $respuesta=mysqli_query($conexion,$query);
          $tuplasHalladas=mysqli_num_rows($respuesta);
          $cantidadDeLineas=$tuplasHalladas/2;
          if($tuplasHalladas%2!=0)
            $cantidadDeLineas+=1;

          settype($cantidadDeLineas,"int");

          while ($contarLineas<($cantidadDeLineas)) {
            $arrayRespuesta=mysqli_fetch_assoc($respuesta);
            echo "<div class='row'>";
            echo "<div class='col-xs-8 col-xs-push-2 col-md-4 col-md-push-2'>
                    <div class='col-lg-12 borderText contenedorDeArticulo'>
                       <a href='#$arrayRespuesta[id_edicion]' class='dropdown-toggle' data-target='#$arrayRespuesta[id_edicion]' data-toggle='modal' role='button'' >
                       <h4 class='nombreDePublicacion'>".$arrayRespuesta['nombre_edicion']."</h4>
                        <img src=imagenes/".$arrayRespuesta['tapa']." class='portada' .alt=".$arrayRespuesta['nombre_edicion']."/>
                        <div class='descripcion'>
                             <p>Precio de compra: ".$arrayRespuesta['precio_compra']."</p>
                             <p>Precio de suscripcion: ".$arrayRespuesta['precio_suscripcion']."</p>
                        </div>
                      </a>
                    </div>
                  </div>";

                  // EL MODAL LO PONGO 2 VECES PORQUE ESTÁS IMPRIMIENDO 2 VECES EN UN WHILE. MODIFICAR MODAL

                   echo '<div id="'.$arrayRespuesta["id_edicion"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modalPublicacion">
                        <div class="modal-content">
                            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4><strong>InfoNETE!</strong></h4></div> 
                            <div class="modal-body2">
                                <div class="mitadModal">
                                    <img src=imagenes/'.$arrayRespuesta["tapa"].' class="imgModal" .alt='.$arrayRespuesta["nombre_edicion"].'/>
                                </div>
                                <div class="mitadModal">';

                                 echo ' <span class="tituloModalPubli">'.$arrayRespuesta["nombre_edicion"].'<span><br><br>
                                   <span class="descripcionModalPubli">Precio de compra: '.$arrayRespuesta['precio_compra'].'<span><br>
                                   <span class="descripcionModalPubli">Precio de suscripcion: '.$arrayRespuesta['precio_suscripcion'].'<span><br><br><br>
                                  <div class="derecha">';
                               if(isset($_SESSION['nombre'])){
                                   if(isset($_COOKIE['cod_cliente'])){
                                    $codCliente = $_COOKIE['cod_cliente'];
                                    // SI No ESTA LOGUEADO, LE MUESTRA UN BOTON PARA EL LOGIN. SI ESTÁ LOGUEADO PERO NO COMPRÓ MUESTRA LOS BOTONES DE COMPRA
                                      $queryCompra = "SELECT * FROM compra WHERE cod_cliente ='$codCliente' and cod_edicion = '$arrayRespuesta[id_edicion]'";
                                     $resultCompra = mysqli_query($conexion,$queryCompra);
                                        if(mysqli_num_rows($resultCompra)== 1){
                                              echo '<a type="button" class="btn btn-primary" href="articulo.php?id_publicacion='.$arrayRespuesta["id_edicion"].'">Leer</a>';
                                       }else{
                                     
                                        echo '<a href="suscripcion.php?precio='.$arrayRespuesta["precio_suscripcion"].'&id_edicion='.$arrayRespuesta["id_edicion"].'" type="button" class="btn btn-danger">Suscribite</a>
                                              <a href="compra.php?precio='.$arrayRespuesta["precio_compra"].'&id_edicion='.$arrayRespuesta["id_edicion"].'" type="button" class="btn btn-success">Comprar</a>';
                                   
                                     }
                                    }
                                   }else{
                                     echo "<a href='#modalid1' data-dismiss='modal' class='btn btn-default zindex' data-target='#modalid1' data-toggle='modal' role='button'>Inicie sesión</a>";
                                   }
                                       echo ' 
                                  </div>
                                </div>
                            </div>
                                         
                         </div>
                      </div>
                  </div>';

            if($arrayRespuesta=mysqli_fetch_assoc($respuesta)){
                        echo "<div class='col-xs-8 col-xs-push-2 col-md-4 col-md-push-2'>
                    <div class='col-lg-12 borderText contenedorDeArticulo'>
                       <a href='#$arrayRespuesta[id_edicion]' class='dropdown-toggle' data-target='#$arrayRespuesta[id_edicion]' data-toggle='modal' role='button'' >
                       <h4 class='nombreDePublicacion'>".$arrayRespuesta['nombre_edicion']."</h4>
                        <img src=imagenes/".$arrayRespuesta['tapa']." class='portada' .alt=".$arrayRespuesta['nombre_edicion']."/>
                        <div class='descripcion'>
                             <p>Precio de compra: ".$arrayRespuesta['precio_compra']."</p>
                             <p>Precio de suscripcion: ".$arrayRespuesta['precio_suscripcion']."</p>
                        </div>
                      </a>
                    </div>
                  </div>";

             }

                   echo '<div id="'.$arrayRespuesta["id_edicion"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modalPublicacion">
                        <div class="modal-content">
                            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4><strong>InfoNETE!</strong></h4></div> 
                            <div class="modal-body2">
                                <div class="mitadModal">
                                    <img src=imagenes/'.$arrayRespuesta["tapa"].' class="imgModal" .alt='.$arrayRespuesta["nombre_edicion"].'/>
                                </div>
                                <div class="mitadModal">';

                                 echo ' <span class="tituloModalPubli">'.$arrayRespuesta["nombre_edicion"].'<span><br><br>
                                   <span class="descripcionModalPubli">Precio de compra: '.$arrayRespuesta['precio_compra'].'<span><br>
                                   <span class="descripcionModalPubli">Precio de suscripcion: '.$arrayRespuesta['precio_suscripcion'].'<span><br><br><br>
                                  <div class="derecha">';
                               
                                   if(isset($_COOKIE['cod_cliente'])){
                                    $codCliente = $_COOKIE['cod_cliente'];
                                    // SI No ESTA LOGUEADO, LE MUESTRA UN BOTON PARA EL LOGIN. SI ESTÁ LOGUEADO PERO NO COMPRÓ MUESTRA LOS BOTONES DE COMPRA
                                      $queryCompra = "SELECT * FROM compra WHERE cod_cliente ='$codCliente' and cod_edicion = '$arrayRespuesta[id_edicion]'";
                                     $resultCompra = mysqli_query($conexion,$queryCompra);
                                        if(mysqli_num_rows($resultCompra)== 1){
                                              echo '<a type="button" class="btn btn-primary" href="articulo.php?id_publicacion='.$arrayRespuesta["id_edicion"].'">Leer</a>';
                                       }else{
                                     
                                        echo '<a href="suscripcion.php?precio='.$arrayRespuesta["precio_suscripcion"].'&id_edicion='.$arrayRespuesta["id_edicion"].'" type="button" class="btn btn-danger">Suscribite</a>
                                              <a href="compra.php?precio='.$arrayRespuesta["precio_compra"].'&id_edicion='.$arrayRespuesta["id_edicion"].'" type="button" class="btn btn-success">Comprar</a>';
                                   
                                     }
                                   }else{
                                     echo "<a href='#modalid1' class='dropdown-toggle' data-target='#modalid1' data-toggle='modal' role='button'>Inicie sesión</a>";
                                   }
                                       echo ' 
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
          //segundo paginado
          paginar($tipo,$qForPage,$indice);
        }

        //Funcion para traer las secciones y articulos de una publicacion

  function traerArticulo(){

    include("bd/conexion.php");
    $idPubli = $_GET['id_publicacion'];

    $query = "SELECT * FROM seccion WHERE cod_edicion = '$idPubli'";

    $result = mysqli_query($conexion,$query);

    while($tipo = mysqli_fetch_assoc($result)){
        $idSeccion = $tipo['id_seccion'];
          echo "<div class='col-lg-6'>";
          echo '<div class="panel panel-info">
          <div class="panel-heading"><h3 class="nombreSeccion">'.$tipo["nombre_sec"].'</h1></div>
            <div class="panel-body">            
            ';
          echo "<br>";
        $query_articulos = "SELECT * FROM articulo WHERE id_seccion = '$idSeccion'";

        $resultArt = mysqli_query($conexion,$query_articulos);

        while($art = mysqli_fetch_assoc($resultArt)){
          $idArticulo = $art['id_articulo'];
          echo "<h2 class='tituloArt'>".$art['titulo']."</h2>";
          echo "<h4 class='subTituloArt'>".$art['subtitulo']."</h4><br>";

        echo'<div class="col-lg-12"> 
           <div id="myCarousel" class="carousel slide" data-ride="carousel">
           <ol class="carousel-indicators">';
            $query_imagenes = "SELECT * FROM imagen WHERE id_articulo = '$idArticulo'";
             
            $resultIma = mysqli_query($conexion,$query_imagenes);

                for($i=0;$i<mysqli_num_rows($resultIma);$i++){
                  if($i ==0)
                  echo '<li data-target="#myCarousel" data-slide-to="'.$i.'" class="active"></li>';
                  else
                  echo '<li data-target="#myCarousel" data-slide-to="'.$i.'"></li>';
              }
                echo '</ol>';

            echo '<div class="carousel-inner" role="listbox">';
              $i = 0;// para decir q es la primer pasada
              
      
            while($filaIm = mysqli_fetch_assoc($resultIma)){
                $path=$filaIm['path'];
                if($i == 0){

                  echo '<div class="item active">
                    <img src="imagenes/'.$path.'" alt="Chania">
                       </div>';
                       $i++;
                     }else{
                  echo '<div class="item">
                    <img src="imagenes/'.$path.'" alt="Chania">
                       </div>';
                     }
                }
              
              echo '</div>';

              if(mysqli_num_rows($resultIma) > 1){
                echo '<a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
                  <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
                  <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
             </div></div>';
           }

         
          echo "<br><br><div class='textoArt'>".$art['texto']."</div><br><br><br>";;

          //echo "</div>";
        }

        echo "</div></div></div></div></div>";//Cierro panel heading y body Cierro contenedor de seccion
    }


  }

?>