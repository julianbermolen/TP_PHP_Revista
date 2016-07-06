<?php
            $valor = $_GET["valor"];
            date_default_timezone_set ("America/Argentina/Buenos_Aires");
            $ahora=getdate(time());
            
            $mes=$ahora["mon"];
            $anio=$ahora["year"];
            $dia=$ahora["mday"];

            include("../../bd/conexion.php");

            $query="SELECT publicacion.nombre_publicacion,COUNT(*)
            FROM compra INNER JOIN edicion ON compra.cod_edicion=edicion.id_edicion
            INNER JOIN publicacion ON edicion.id_publicacion=publicacion.id_publicacion";

            if(($mes-$valor)>0){
              $query.="where fecha_compra BETWEEN '".$anio."-".($mes-$valor)."-".$dia."' AND '".$anio."-".$mes."-".$dia."'
              GROUP BY publicacion.id_publicacion,publicacion.nombre_publicacion";
            }
            else{
              //corregir esta linea            $mesAnterior=(12-$periodo);
              $query.="where fecha_compra BETWEEN '".($anio-1)."-".($mes+(12-$valor))."-".$dia."' AND '".$anio."-".$mes."-".$dia."'
              GROUP BY publicacion.id_publicacion,publicacion.nombre_publicacion";  
            }

            $resultado=mysqli_query($conexion,$query);
            
            $dataTable=array("producto","cantidad vendida");
            while($item=mysqli_fetch_array($resultado)){
              $dataTable[] = array($item[0],(int)$item[1]);
            }

            mysqli_close($conexion);

            echo json_encode($dataTable);

?>