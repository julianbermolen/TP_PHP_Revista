<?php             
                include("../../../bd/conexion.php");
                      
                    $output = '';  
                    $sql = "SELECT * FROM articulo INNER JOIN seccion ON articulo.id_seccion = seccion.id_seccion INNER JOIN edicion ON seccion.cod_edicion = edicion.id_edicion INNER JOIN publicacion ON publicacion.id_publicacion = edicion.id_publicacion WHERE publicacion.cod_estado = 1 ORDER BY id_articulo DESC" ;  
                    $resultado = mysqli_query($conexion, $sql);

                    while($fila = mysqli_fetch_array($resultado)) {
                      echo "<tr>";
                      echo '<td>'.$fila["id_articulo"].'</td>
                            <td>'.$fila["titulo"].'</td>
                            <td>'.$fila["subtitulo"].'</td>
                            <td>'.$fila["nombre_sec"].'</td>
                            <td>'.$fila["nombre_edicion"].'</td>
                            <td>'.$fila["nombre_publicacion"].'</td>
                            <td style="text-align:center"><button type="button" style=" width:20%"  name="delete_btn" id="delete_btn" data-id1="'.$fila["id_articulo"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
                            <td style="text-align:center"><a href="#'.$fila["id_articulo"].'" id="mod_btn" class="dropdown-toggle btn btn-xs btn-warning glyphicon glyphicon-edit" data-target="#'.$fila["id_articulo"].'" data-toggle="modal" role="button"></a></td>';

                      echo '<div id="'.$fila["id_articulo"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog" style="width:80%">
                              <div class="modal-content">
                                  <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4>Modificar usuario</h4></div> 
                                  <div class="modal-body">
                                          <form class="cmxform" action="../../../php/panel_admin/revista/editar_articulo.php" method="POST" class="form-horizontal">
                                                <div class="form-group">
                                                  <label for="id_articulo"  class="label-largo">Numero de id:</label>
                                                  <input type="text" id="id_articulo" name="id_articulo" class="form-control input-largo" value="'.$fila["id_articulo"].'" readonly="readonly" />
                                                </div>
                                                <div class="form-group">
                                                  <label for="titulo"  class="label-largo">Ingrese Titulo:</label>
                                                  <input type="text" id="titulo" name="titulo" class="form-control input-largo" value="'.$fila["titulo"].'" />
                                                </div>
                                                <div class="form-group">
                                                  <label for="subtitulo" class="label-largo">Ingrese subtitulo:</label>
                                                  <input type="text" name="subtitulo" id="subtitulo" class="form-control input-largo" value="'.$fila["subtitulo"].'" />
                                                </div>

                                                <div class="form-group">
                                                      <label for="pub" class="label-largo">Publicacion</label>
                                                      <input type="text" id="pub" name="pub" class="form-control input-largo" value="'.$fila["nombre_publicacion"].'"  readonly="readonly"/>
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="edic" class="label-largo">Edicion: </label>
                                                      <input type="text" id="edic" name="edic" class="form-control input-largo" value="'.$fila["nombre_edicion"].'" readonly="readonly" />
                                                    </div>

                                                <div class="form-group">
                                                      <label for="sec" class="label-largo">Seccion: </label>
                                                      <input type="text" id="sec" name="sec" class="form-control input-largo" value="'.$fila["nombre_sec"].'"  readonly="readonly"/>
                                                    </div>';

                                               echo '
                                                <input type="submit" name="boton" id="boton" value="Enviar" data-id2="'.$fila["id_articulo"].'" class="btn btn-primary btn-lg btn-block btn_mod"/>
                                            </form>
                                          <div id="ack"></div>
                                  </div>
                                  <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" >Cerrar</button></div>
                       
                            </div>
                            </div>
                        </div>';

                    } 


            ?>