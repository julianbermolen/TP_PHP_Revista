<?php             
                include("../../../bd/conexion.php");
                      
                    $output = '';  
                    $sql = "SELECT * FROM publicacion INNER JOIN edicion ON publicacion.id_publicacion  = edicion.id_publicacion INNER JOIN seccion ON edicion.id_edicion = seccion.cod_edicion  INNER JOIN estado ON publicacion.cod_estado = estado.id_estado INNER JOIN articulo ON seccion.id_seccion = articulo.id_seccion WHERE cod_estado = 2" ;  
                    $resultado = mysqli_query($conexion, $sql);

                    while($fila = mysqli_fetch_array($resultado)) {
                      echo "<tr>";
                      echo '<td>'.$fila["id_publicacion"].'</td>
                            <td>'.$fila["nombre_publicacion"].'</td>
                            <td>'.$fila["nombre_edicion"].'</td>
                            <td>'.$fila["nombre_sec"].'</td>
                            <td>'.$fila["titulo"].'</td>
                            </tr>';

                      

                    } 


            ?>