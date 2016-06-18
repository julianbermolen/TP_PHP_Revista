   <?php             
                include("../../bd/conexion.php");
                      
                    $output = '';  
                    $sql = "SELECT * FROM usuario INNER JOIN rol ON usuario.cod_rol = rol.id_rol ORDER BY id_usuario DESC" ;  
                    $resultado = mysqli_query($conexion, $sql);

                    while($fila = mysqli_fetch_array($resultado)) {
                      echo "<tr>";
                      echo '<td>'.$fila["id_usuario"].'</td>
                            <td>'.$fila["email"].'</td>
                            <td>'.$fila["nombre"].'</td>
                            <td>'.$fila["descripcion"].'</td>
                            <td style="text-align:center"><button type="button" style=" width:20%"  name="delete_btn" id="delete_btn" data-id1="'.$fila["id_usuario"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
                            <td style="text-align:center"><a href="#'.$fila["id_usuario"].'" id="mod_btn" class="dropdown-toggle btn btn-xs btn-warning glyphicon glyphicon-edit" data-target="#'.$fila["id_usuario"].'" data-toggle="modal" role="button"></a></td>';

                      echo '<div id="'.$fila["id_usuario"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4>Modificar usuario</h4></div> 
                                  <div class="modal-body">
                                          <form class="cmxform" action="../../php/editar_usuario.php" method="POST" class="form-horizontal">
                                                <div class="form-group">
                                                  <label for="id_usuario"  class="label-largo">Numero de id:</label>
                                                  <input type="text" id="id_usuario" name="id_usuario" class="form-control input-largo" value="'.$fila["id_usuario"].'" readonly="readonly" />
                                                </div>
                                                <div class="form-group">
                                                  <label for="username"  class="label-largo">Ingrese nombre de usuario:</label>
                                                  <input type="text" id="username" name="username" class="form-control input-largo" value="'.$fila["nombre"].'" />
                                                </div>
                                                <div class="form-group">
                                                  <label for="email" class="label-largo">Ingrese e-mail:</label>
                                                  <input type="email" name="email" id="email" class="form-control input-largo" value="'.$fila["email"].'" />
                                                </div>
                                                <div class="form-group">
                                                  <label for="password" class="label-largo">Ingrese contrase&ntilde;a</label>
                                                  <input type="password" name="password" id="password" class="form-control input-largo" value="'.$fila["clave"].'" />
                                                </div>
                                                <div class="form-group">
                                                  <label for="confirm_password" class="label-largo">Reingrese contrase&ntilde;a</label>
                                                  <input type="password" name="confirm_password" id="confirm_password" class="form-control input-largo" value="'.$fila["clave"].'" />
                                                </div>';

                                                echo '<div class="form-group">
                                                  <label for="rol" class="label-largo">Rol</label>
                                                  <select type="rol" name="rol" id="rol" class="form-control input-largo">';
                                                  
                                                  if($fila["id_rol"]=="1"){
                                                   echo' <option  value="1">'.$fila["descripcion"].'</option>"
                                                    <option  value="2">Contenidista</option>"
                                                    <option  value="3">Administrador</option>"';
                                                    }else if($fila["id_rol"]=="2"){
                                                    echo '<option  value="2">'.$fila["descripcion"].'</option>"
                                                    <option  value="1">Lector</option>"
                                                    <option  value="3">Administrador</option>"';
                                                    }else if($fila["id_rol"]=="3"){
                                                    echo '<option  value="3">'.$fila["descripcion"].'</option>"
                                                    <option  value="1">Lector</option>"
                                                    <option  value="2">Contenidista</option>"';
                                                    }
                                                   echo '</select>
                                                </div>
                                                <input type="submit" name="boton" id="boton" value="Enviar" data-id2="'.$fila["id_usuario"].'" class="btn btn-primary btn-lg btn-block btn_mod"/>
                                            </form>
                                          <div id="ack"></div>
                                  </div>
                                  <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" >Cerrar</button></div>
                       
                            </div>
                            </div>
                        </div>';

                    } 


            ?>