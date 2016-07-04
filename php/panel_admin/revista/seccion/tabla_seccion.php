<?php             
                include("../../../bd/conexion.php");
                      
                    $output = '';  
                    $sql = "SELECT * FROM seccion INNER JOIN publicacion ON seccion.id_publicacion = publicacion.id_publicacion ORDER BY id_seccion DESC" ;  
                    $resultado = mysqli_query($conexion, $sql);

                    while($fila = mysqli_fetch_array($resultado)) {
                      echo "<tr>";
                      echo '<td>'.$fila["id_seccion"].'</td>
                            <td>'.$fila["nombre_sec"].'</td>
                            <td>'.$fila["nombre_publicacion"].'</td>
                             <td style="text-align:center"><button type="button" style=" width:25%"  name="delete_btn" id="delete_btn" data-id1="'.$fila["id_seccion"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
                            <td style="text-align:center"><a href="#'.$fila["id_seccion"].'" id="mod_btn" class="dropdown-toggle btn btn-xs btn-warning glyphicon glyphicon-edit" data-target="#'.$fila["id_seccion"].'" data-toggle="modal" role="button"></a></td>';

                      echo '<div id="'.$fila["id_seccion"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog" style="width:80%">
                              <div class="modal-content">
                                  <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4>Modificar usuario</h4></div> 
                                  <div class="modal-body">
                                          <form class="cmxform" action="../../../php/panel_admin/revista/seccion/editar_seccion.php" method="POST" class="form-horizontal">
                                                <div class="form-group">
                                                  <label for="id_seccion"  class="label-largo">Numero de id:</label>
                                                  <input type="text" id="id_seccion" name="id_seccion" class="form-control input-largo" value="'.$fila["id_seccion"].'" readonly="readonly" />
                                                </div>
                                                <div class="form-group">
                                                  <label for="seccion"  class="label-largo">Nombre seccion:</label>
                                                  <input type="text" id="seccion" name="seccion" class="form-control input-largo" value="'.$fila["nombre_sec"].'" />
                                                </div>';
                                                 echo '
                                                  <div class="col-lg-12">
                                                    <label for="publicacion">Publicación</label>
                                                    <select id="publicacion "name="publicacion" class="form-control">
                                                    '; 
                                                          $query = "SELECT * FROM publicacion";
                                                          $result = mysqli_query($conexion,$query);
                                                      
                                                          while($fila = mysqli_fetch_assoc($result)){
                                                      echo '<option value="'.$fila['id_publicacion'].'">'.$fila['nombre_publicacion'].'</option>';

                                                         }

                                                        echo '
                                                    </select><br>

                                                  </div>';

                            

                                               echo '
                                                <input type="submit" name="boton" id="boton" value="Enviar" data-id2="'.$fila["id_seccion"].'" class="btn btn-primary btn-lg btn-block btn_mod"/>
                                            </form>
                                          <div id="ack"></div>
                                  </div>
                                  <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" >Cerrar</button></div>
                       
                            </div>
                            </div>
                        </div>';

                    } 


            ?>