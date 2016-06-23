<?php             
                include("../../bd/conexion.php");
                      
                    $output = '';  
                    $sql = "SELECT * FROM suscripcion INNER JOIN cliente ON cliente.id_cliente = suscripcion.cod_cliente INNER JOIN edicion ON edicion.id_edicion = suscripcion.cod_edicion INNER JOIN publicacion ON edicion.id_publicacion = publicacion.id_publicacion" ;  
                    $resultado = mysqli_query($conexion, $sql);

                    while($fila = mysqli_fetch_array($resultado)) {
                      echo "<tr>";
                      echo '<td>'.$fila["id_suscripcion"].'</td>
                            <td>'.$fila["username_cliente"].'</td>
                            <td>'.$fila["nombre_edicion"].'</td>
                            <td>'.$fila["nombre_publicacion"].'</td>
                            <td>'.$fila["inicio"].'</td>
                            <td>'.$fila["fin"].'</td>';
                        }

?>