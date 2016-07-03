<?php             
                include("../../../bd/conexion.php");
                      
                    $output = '';  
                    $sql = "SELECT * FROM articulo ORDER BY id_articulo DESC" ;  
                    $resultado = mysqli_query($conexion, $sql);

                    while($fila = mysqli_fetch_array($resultado)) {
                      echo "<tr>";
                      echo '<td>'.$fila["id_articulo"].'</td>
                            <td>'.$fila["titulo"].'</td>
                            <td>'.$fila["subtitulo"].'</td>
                            <td>'.$fila["id_seccion"].'</td>
                            <td style="text-align:center"><button type="button" style=" width:20%"  name="delete_btn" id="delete_btn" data-id1="'.$fila["id_articulo"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
                            <td style="text-align:center"><a href="#'.$fila["id_articulo"].'" id="mod_btn" class="dropdown-toggle btn btn-xs btn-warning glyphicon glyphicon-edit" data-target="#'.$fila["id_articulo"].'" data-toggle="modal" role="button"></a></td>';

                      echo '<div id="'.$fila["id_articulo"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog" style="width:80%">
                              <div class="modal-content">
                                  <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4>Modificar usuario</h4></div> 
                                  <div class="modal-body">
                                          <form class="cmxform" action="../../php/panel_admin/revista/editar_articulo.php" method="POST" class="form-horizontal">
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
                                                </div>';
                                                echo '
                                                    <div class="col-lg-12">
                                                    <label for="edicion">Edición</label>
                                                    <select id="edicion" name="edicion" class="form-control">';
                                                    include("../../../bd/conexion.php");
                                                          $query = "SELECT * FROM edicion";
                                                          $result = mysqli_query($conexion,$query);
                                                      
                                                    while($fila = mysqli_fetch_assoc($result)){
                                                      echo '<option value="'.$fila["id_edicion"].'">'.$fila["nombre_edicion"].'</option>';
                                                            }
                                                        
                                                      echo '</select><br>
                                                      </div>';

                                                echo '<div class="col-lg-12">
                                                    <label for="edicion">Sección</label>
                                                    <select id="seccion" name="seccion" class="form-control">
                                                             ';                                            
                                                          $query = "SELECT * FROM seccion";
                                                          $result = mysqli_query($conexion,$query);
                                                      
                                                          while($fila = mysqli_fetch_assoc($result)){
                                                            echo '<option value="'.$fila['id_seccion'].'">'.$fila['nombre_sec'].'</option>';

                                                          }

                                                        echo '
                                                    </select><br>
                                                  </div>

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

                                                  echo '  <div class="col-lg-12">
                                                              <textarea id="input" name="texto" value="'.$fila["texto"].'""></textarea><br>
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