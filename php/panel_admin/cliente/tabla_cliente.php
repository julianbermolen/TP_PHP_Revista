 <?php             
                include("../../bd/conexion.php");
                      
                    $output = '';  
                    $sql = "SELECT * FROM cliente INNER JOIN provincia ON cliente.cod_prov = provincia.id_provincia INNER JOIN ciudad ON cliente.cod_ciud = ciudad.id_ciudad ORDER BY id_cliente DESC" ;  
                    $resultado = mysqli_query($conexion, $sql);

                    while($fila = mysqli_fetch_array($resultado)) {
                      echo "<tr>";
                      echo '<td>'.$fila["id_cliente"].'</td>
                            <td>'.$fila["email_cliente"].'</td>
                            <td>'.$fila["username_cliente"].'</td>
                            <td>'.$fila["nombre_cliente"].'</td>
                            <td>'.$fila["apellido_cliente"].'</td>
                            <td style="text-align:center"><button type="button" style=" width:25%"  name="delete_btn" id="delete_btn" data-id1="'.$fila["id_cliente"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
                            <td style="text-align:center"><a href="#'.$fila["id_cliente"].'" id="mod_btn" class="dropdown-toggle btn btn-xs btn-warning glyphicon glyphicon-edit" data-target="#'.$fila["id_cliente"].'" data-toggle="modal" role="button"></a></td>';

                      echo '<div id="'.$fila["id_cliente"].'" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                          <div class="modal-dialog">
                              <div class="modal-content">
                                  <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4>Modificar usuario</h4></div> 
                                  <div class="modal-body">
                                          <form class="cmxform" action="../../php/panel_admin/cliente/editar_cliente.php" method="POST" class="form-horizontal">
                                                    
                                                <div class="form-group">
                                                  <label for="id_usuario"  class="label-largo">Numero de id:</label>
                                                  <input type="text" id="id_cliente" name="id_cliente" class="form-control input-largo" value="'.$fila["id_cliente"].'" readonly="readonly" />
                                                </div>
                                                <div>
                                                    <div class="form-group">
                                                      <label for="username" class="label-largo">Ingrese nombre de usuario:</label>
                                                      <input type="text" id="username" name="username" class="form-control input-largo" value="'.$fila["username_cliente"].'" />
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="email" class="label-largo">Ingrese e-mail:</label>
                                                      <input type="email" name="email" id="email" class="form-control input-largo" value="'.$fila["email_cliente"].'"/>
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="password" class="label-largo">Ingrese contrase&ntilde;a</label>
                                                      <input type="password" name="password" id="password_new" class="form-control input-largo" value="'.$fila["clave_cliente"].'"/>
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="confirm_password" class="label-largo">Reingrese contrase&ntilde;a</label>
                                                      <input type="password" name="confirm_password" id="confirm_password" class="form-control input-largo" value="'.$fila["clave_cliente"].'"/>
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="nombre" class="label-largo">Ingrese nombre:</label>
                                                      <input type="text" id="nombre" name="nombre" class="form-control input-largo" value="'.$fila["nombre_cliente"].'" />
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="apellido" class="label-largo">Ingrese Apellido:</label>
                                                      <input type="text" id="apellido" name="apellido" class="form-control input-largo" value="'.$fila["apellido_cliente"].'" />
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="direccion" class="label-largo">Ingrese Dirección:</label>
                                                      <input type="text" id="direccion" name="direccion" class="form-control input-largo" value="'.$fila["calle"].'" />
                                                    </div>
                                                    <div class="form-group">
                                                      <label for="nro" class="label-largo">Nro:</label>
                                                      <input type="text" id="nro" name="nro" class="form-control input-largo" value="'.$fila["numero_calle"].'" />
                                                    </div>
                                                     <div class="form-group">
                                                      <label for="provincia" class="label-largo">Provincia:</label>
                                                      <input type="text" id="provincia" name="provincia" class="form-control input-largo" value="'.$fila["provincia_nombre"].'"  readonly="readonly"/>
                                                    </div>

                                                    <div class="form-group">
                                                      <label for="ciu" class="label-largo">Localidad:</label>
                                                      <input type="text" id="ciu" name="ciu" class="form-control input-largo" value="'.$fila["ciudad_nombre"].'" readonly="readonly" />
                                                    </div>


                                                
                                                <input type="submit" name="boton" id="boton" value="Enviar" data-id2="'.$fila["id_cliente"].'" class="btn btn-primary btn-lg btn-block btn_mod"/>
                                            </form>
                                          <div id="ack"></div>
                                  </div>
                                  <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal" >Cerrar</button></div>
                       
                            </div>
                            </div>
                        </div>';

                    } 


            ?>