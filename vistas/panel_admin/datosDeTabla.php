<?php
            header('Content-Type=text/html; charset=utf-8');
            include("../../bd/conexion.php");
            mysqli_set_charset($conexion,'utf8');
            $valor = $_GET["valor"];
            $tipo = $_GET["tipo"];
            date_default_timezone_set ("America/Argentina/Buenos_Aires");//seteo la hora local
            //defino el intervalo de tiempo en el que voy a graficar
            $hoy=date("Y-m-d",time());
            $antes=date("Y-m-d",time()-((3600*24*30)*$valor));

            

            switch($tipo){
            
            case "productos":
                  $dataTable=array(array("producto","cantidad vendida"));
                  $query="SELECT publicacion.nombre_publicacion,COUNT(compra.id_compra)
                  FROM compra INNER JOIN edicion ON compra.cod_edicion=edicion.id_edicion
                  INNER JOIN publicacion ON edicion.id_publicacion=publicacion.id_publicacion
                  WHERE compra.fecha_compra BETWEEN '".$antes."' AND '".$hoy."'
                  GROUP BY publicacion.id_publicacion,publicacion.nombre_publicacion";
                  $resultado=mysqli_query($conexion,$query);

                  while($item=mysqli_fetch_array($resultado)){
                        $dataTable[] = array($item[0],(int)$item[1]);
                  }

                  break;

            case "suscripciones":
                  $dataTable=array(array("periodo","cantidad de suscripciones"));
                  $query="SELECT suscripcion.inicio,COUNT(suscripcion.id_suscripcion)
                  FROM suscripcion INNER JOIN edicion ON suscripcion.cod_edicion=edicion.id_edicion
                   WHERE suscripcion.inicio BETWEEN '".$antes."' AND '".$hoy."' 
                   GROUP BY suscripcion.inicio";

                   $resultado=mysqli_query($conexion,$query);

                  while($item=mysqli_fetch_array($resultado)){
                        $dataTable[] = array($item[0],(int)$item[1]);
                  }
                  
                  break;
            }

            mysqli_close($conexion);

            echo json_encode($dataTable);//imprimo la info como un json

?>