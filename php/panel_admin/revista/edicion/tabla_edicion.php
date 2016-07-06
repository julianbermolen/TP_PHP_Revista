<?php             
                include("../../../bd/conexion.php");
                      
                    $output = '';  
                    $sql = "SELECT * FROM edicion INNER JOIN publicacion ON publicacion.id_publicacion = edicion.id_publicacion WHERE publicacion.cod_estado = 1 ORDER BY id_edicion DESC" ;  
                    $resultado = mysqli_query($conexion, $sql);

                    while($fila = mysqli_fetch_array($resultado)) {
                      echo "<tr>";
                      echo '<td>'.$fila["id_edicion"].'</td>
                            <td>'.$fila["nombre_edicion"].'</td>
                            <td>'.$fila["nombre_publicacion"].'</td>
                            <td>'.$fila["precio_compra"].'</td>
                            <td>'.$fila["precio_suscripcion"].'</td>

                             <td style="text-align:center"><button type="button" style=" width:20%"  name="delete_btn" id="delete_btn" data-id1="'.$fila["id_edicion"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
                            <td style="text-align:center"><a href="#'.$fila["id_edicion"].'" id="mod_btn" class="dropdown-toggle btn btn-xs btn-warning glyphicon glyphicon-edit" data-target="#'.$fila["id_edicion"].'" data-toggle="modal" role="button"></a></td>';

                      echo '<div id="'.$fila["id_edicion"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog" style="width:80%">
                              <div class="modal-content">
                                  <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4>Modificar usuario</h4></div> 
                                  <div class="modal-body">
                                          <form class="cmxform" action="../../../php/panel_admin/revista/edicion/editar_edicion.php" method="POST" class="form-horizontal">
                                                <div class="form-group">
                                                  <label for="id_edicion"  class="label-largo">Numero de id:</label>
                                                  <input type="text" id="id_edicion" name="id_edicion" class="form-control input-largo" value="'.$fila["id_edicion"].'" readonly="readonly" />
                                                </div>
                                                <div class="form-group">
                                                  <label for="edicion"  class="label-largo">Nombre edicion:</label>
                                                  <input type="text" id="edicion" name="edicion" class="form-control input-largo" value="'.$fila["nombre_edicion"].'" />
                                                </div>
                                                 
                                                <div class="form-group">
                                                      <label for="pub" class="label-largo">Publicacion</label>
                                                      <input type="text" id="pub" name="pub" class="form-control input-largo" value="'.$fila["nombre_publicacion"].'" readonly="readonly"  />
                                                    </div>
                                             
                                                 <div class="form-group">
                                                      <label for="precio_compra" class="label-largo">Precio compra: </label>
                                                      <input  id="precio_compra" name="precio_compra" class="form-control input-largo" value="'.$fila["precio_compra"].'"  />
                                                    </div>


                                                    <div class="form-group">
                                                      <label for="precio_sus" class="label-largo">Precio suscripcion: </label>
                                                      <input id="precio_sus" name="precio_sus" class="form-control input-largo" value="'.$fila["precio_suscripcion"].'" />
                                                    </div>';

                            

                                               echo '
                                                <input type="submit" name="boton" id="boton" value="Enviar" data-id2="'.$fila["id_edicion"].'" class="btn btn-primary btn-lg btn-block btn_mod"/>
                                            </form>
                                          <div id="ack"></div>
                                  </div>
                                  <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" >Cerrar</button></div>
                       
                            </div>
                            </div>
                        </div>';

                    } 


            ?>