<?php             
                include("../../bd/conexion.php");
                      
                    $output = '';  
                    $sql = "SELECT * FROM compra INNER JOIN cliente ON cliente.id_cliente = compra.cod_cliente INNER JOIN edicion ON edicion.id_edicion = compra.cod_edicion INNER JOIN publicacion ON edicion.id_publicacion = publicacion.id_publicacion" ;  
                    $resultado = mysqli_query($conexion, $sql);

                    while($fila = mysqli_fetch_array($resultado)) {
                      echo "<tr>";
                      echo '<td>'.$fila["id_compra"].'</td>
                            <td>'.$fila["username_cliente"].'</td>
                            <td>'.$fila["nombre_edicion"].'</td>
                            <td>'.$fila["nombre_publicacion"].'</td>';
                        }

?>