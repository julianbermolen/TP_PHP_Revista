<?php             
                include("../../../bd/conexion.php");
                      
                    $output = '';  
                    $sql = "SELECT * FROM publicacion  ORDER BY id_publicacion DESC" ;  
                    $resultado = mysqli_query($conexion, $sql);

                    while($fila = mysqli_fetch_array($resultado)) {
                      echo "<tr>";
                      echo '<td>'.$fila["id_publicacion"].'</td>
                            <td>'.$fila["nombre_publicacion"].'</td>
                            <td>'.$fila["tipo_publicacion"].'</td>
                             <td style="text-align:center"><button type="button" style=" width:20%"  name="delete_btn" id="delete_btn" data-id1="'.$fila["id_publicacion"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
                            <td style="text-align:center"><a href="#'.$fila["id_publicacion"].'" id="mod_btn" class="dropdown-toggle btn btn-xs btn-warning glyphicon glyphicon-edit" data-target="#'.$fila["id_publicacion"].'" data-toggle="modal" role="button"></a></td>';

                      echo '<div id="'.$fila["id_publicacion"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog" style="width:80%">
                              <div class="modal-content">
                                  <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4>Modificar usuario</h4></div> 
                                  <div class="modal-body">
                                          <form class="cmxform" action="../../../php/panel_admin/revista/publicacion/editar_publicacion.php" method="POST" class="form-horizontal">
                                                <div class="form-group">
                                                  <label for="id_publicacion"  class="label-largo">Numero de id:</label>
                                                  <input type="text" id="id_publicacion" name="id_publicacion" class="form-control input-largo" value="'.$fila["id_publicacion"].'" readonly="readonly" />
                                                </div>
                                                <div class="form-group">
                                                  <label for="nombre_publicacion"  class="label-largo">Nombre Publicacion:</label>
                                                  <input type="text" id="nombre_publicacion" name="nombre_publicacion" class="form-control input-largo" value="'.$fila["nombre_publicacion"].'" />
                                                </div>
                                                 <div class="form-group">
                                                  <label for="descripcion">Ingrese Descripcion: </label>
                                                  <input type="text" class="form-control" name="descripcion" id="descripcion" value="'.$fila["descripcion"].'" placeholder="Ingrese descripcion">
                                                </div>                                              

                                                ';
                                                 
                                                echo '<div class="form-group">
                                                  <label for="tipo" class="label-largo">Tipo: </label>
                                                  <select  name="tipo" id="tipo" class="form-control input-largo">';
                                                  
                                                  if($fila["tipo_publicacion"]=="D"){
                                                   echo' <option  value="D">Diario</option>"
                                                    <option  value="R">Revista</option>"';
                                                    }else if($fila["tipo_publicacion"]=="R"){
                                                    echo '<option  value="R">Revista</option>"
                                                    <option  value="D">Diario</option>"';
                                                    }

                                                   echo '</select>
                                                   </div>

                                                <input type="submit" name="boton" id="boton" value="Enviar" data-id2="'.$fila["id_publicacion"].'" class="btn btn-primary btn-lg btn-block btn_mod"/>
                                            </form>
                                          <div id="ack"></div>
                                  </div>
                                  <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" >Cerrar</button></div>
                       
                            </div>
                            </div>
                        </div>';

                    } 


            ?>