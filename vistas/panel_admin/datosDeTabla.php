<?php
            $valor = $_GET["valor"];

            date_default_timezone_set ("America/Argentina/Buenos_Aires");//seteo la hora local
            //defino el intervalo de tiempo en el que voy a graficar
            $hoy=date("Y-m-d",time());
            $antes=date("Y-m-d",time()-((3600*24*30)*$valor));

            include("../../bd/conexion.php");
            echo"$hoy<br>$antes";

            $query="SELECT publicacion.nombre_publicacion,COUNT(compra.id_compra)
            FROM compra INNER JOIN edicion ON compra.cod_edicion=edicion.id_edicion
            INNER JOIN publicacion ON edicion.id_publicacion=publicacion.id_publicacion
            WHERE compra.fecha_compra BETWEEN $antes AND $hoy
            GROUP BY publicacion.id_publicacion,publicacion.nombre_publicacion";
            


            $resultado=mysqli_query($conexion,$query);
            
            $dataTable=array(array("producto","cantidad vendida"));

            while($item=mysqli_fetch_array($resultado)){
              $dataTable[] = array($item[0],(int)$item[1]);
            }

            mysqli_close($conexion);

            echo json_encode($dataTable);//imprimo la info como un json

?>