<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel de administracion | Inicio</title>
  <!-- Le dice al navegador para ser responsive en el ancho de la pantalla -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../../css/bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Css principal -->
  <link rel="stylesheet" href="../../../css/admin/AdminLTE.min.css">

  <link rel="stylesheet" href="../../../css/admin/skin-blue.min.css">
           <!-- DataTables -->
  <link rel="stylesheet" href="../../../js/datatables/dataTables.bootstrap.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <?php
  require_once("../../../php/seguro.php");
 

  ?>
<div class="wrapper">

  <!-- Header Principal -->
  <header class="main-header">

    <!-- Logo -->
    <a class="logo">
      <!-- mini logo para barra lateral mini 50x50 pixels -->
      <span class="logo-mini"><b>A</b>INF</span>
      <!-- logo para estado regular y dispositivos moviles -->
      <span class="logo-lg"><b>Admin</b>INFO</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Barra lateral Boton Biestado-->
      <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Menu de la derecha -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
             
          <!-- Menu de cuenta de usuario -->
          <li class="dropdown user user-menu">
            <!-- Menu Boton Biestado -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- Nombre del usuario -->
              <span><?php echo $_SESSION['nombre_usuario'] ?></span>
            </a>
            <ul class="dropdown-menu">
              
              <!-- Header usuario -->
              <li class="user-header">
              
                <p>
                  <?php echo $_SESSION['nombre_usuario'] ?> - <?php if($_SESSION['rol'] == 2){ echo "Contenedista"; }else{echo "Administrador"; } ?>
                  
                </p>
              </li>
              
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../../../php/panel_admin/login/logout.php" class="btn btn-default btn-flat">Sign out</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!--Columna del lado izquierdo, contiene el logotipo y la barra lateral izquierda -->
  <aside class="main-sidebar">

    
    <section class="sidebar">


      <!-- Sidebar Menu -->
      <ul class="sidebar-menu">
        <li class="header">HEADER</li>
        
        <li><a href="../panel-administrador.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        <li class="active"><a href=""><i class="fa fa-newspaper-o"></i> <span>Revista</span></a>
          <ul class="treeview-menu">
            <li><a href="panel-administrador-revista-publicacion.php"><i class="fa fa-circle-o"></i>Publicacion</a></li>
            <li class="active"><a href="panel-administrador-revista-edicion.php"><i class="fa fa-circle-o"></i>Edicion</a></li>
            <li><a href="panel-administrador-revista-seccion.php"><i class="fa fa-circle-o"></i>Seccion</a></li>
            <li><a href="panel-administrador-revista-articulo.php"><i class="fa fa-circle-o"></i>Articulo</a></li>
            <li><a href="panel-administrador-revista-finalizados.php"><i class="fa fa-circle-o"></i>Finalizados</a></li>            
          </ul>
        </li>
        <?php if($_SESSION['rol'] == 3){ ?>
        <li><a href="../panel-administrador-usuario.php"><i class="fa fa-user-secret"></i> <span>Usuario</span></a></li>
        <li><a href=""><i class="fa fa-user"></i> <span>Cliente</span></a>
          <ul class="treeview-menu">
            <li><a href="../panel-administrador-cliente.php"><i class="fa fa-circle-o"></i> ABM</a></li>
            <li><a href="../panel-administrador-cliente-suscripciones.php"><i class="fa fa-circle-o"></i> Suscripciones</a></li>
            <li><a href="../panel-administrador-cliente-compras.php"><i class="fa fa-circle-o"></i> Compras</a></li>
          </ul>
        </li>
        <?php }?>
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Contiene el contenido de la pagina -->
  <div class="content-wrapper">
    <!-- Encabezado de la pagina -->
    <section class="content-header">
      <h1>
        Revista - Edicion
        <small>Creacion, modificacion y borrado de una edicion</small>
      </h1>
    </section>

    <!-- Contenido Principal -->
    <section class="content">

      <button type="button" class="btn btn-success" href="#modalNuevo" data-target="#modalNuevo" data-toggle="modal" role="button">Agregar Nueva Edicion </button>


<br/>
<br/>

<!-- Creacion de la tabla -->
    <div class="row" >
        <div class="col-xs-12" >
          <div class="box" >
            <div class="box-body">
            <div class="table-responsive">
             <table id="tabla1" class="table table-bordered table-hover">
             

                 <thead>
                    <tr>  
                         <th width="2%">Id</th>  
                         <th width="15%">Nombre Edicion</th>    
                         <th width="10%">Nombre Publi</th>
                         <th width="10%">Prec Comp</th>
                         <th width="10%">Prec Susc</th>
                         <th width="4%">Borrar</th>
                         <th width="1%">Modificar</th>

                    </tr>
                  </thead>

                  <tbody>
                  <!-- Trae los datos de la tabla -->
                  <?php include("../../../php/panel_admin/revista/edicion/tabla_edicion.php"); ?>
                   </tbody>


              </table>
            </div>
          </div>          
        </div>
    </div>
  </div> 

  <!-- Modal de crear nueva seccion  -->
<div id="modalNuevo" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4>Nueva Edicion</h4></div> 
            <div class="modal-body">
                    <form id="validarForm2" action="../../../php/panel_admin/revista/edicion/agregar_edicion.php" method="POST" enctype="multipart/form-data" >
                          <div class="form-group">
                            <label for="seccion">Ingrese Edicion: </label>
                            <input type="text" class="form-control" name="edicion" id="edicion" placeholder="Ingrese edicion">
                          </div>
                          <div class="form-group">
                           <label for="publicacion" class="label-largo">Seleccione Publicacion: </label>
                           <select  name="publicacion" id="publicacion" class="form-control input-largo">
                            
                            <?php

                              $conexion = mysqli_connect("127.0.0.1","root","","sistema");
                              $sql = "SELECT * FROM publicacion WHERE cod_estado = 1";
                              $resultado = mysqli_query($conexion, $sql);
                              while($fila = mysqli_fetch_assoc($resultado)){
                                  echo "<option value='"  . $fila["id_publicacion"] . "'>" . $fila["nombre_publicacion"] . "</option>";
                              }
                              echo '</select> <br>';
                            
                              ?>

                          <div class="form-group">
                            <label for="precio_compra">Ingrese Precio de Compra: </label>
                            <input type="text" class="form-control" name="precio_compra" id="precio_compra" placeholder="Ingrese Precio de Compra">
                          </div>

                          <div class="form-group">
                            <label for="precio_suscripcion">Ingrese Precio de Suscripcion: </label>
                            <input type="text" class="form-control" name="precio_suscripcion" id="precio_suscripcion" placeholder="Ingrese Precio de Suscripcion">
                          </div>

                          <div class="form-group">
                              <label for="file">Añada una imagen</label>
                              <input type="file" id="file" name="file"/>
                              <p class="help-block">La imagen tiene que ser jpg o png.</p>
                          </div>                          

                           
                          

                            <button id="submitLog" name="login" class="btn btn-primary" style="width:100%;text-align:center;">Enviar</button>
                    </form>
                    <div id="ack"></div>
            </div>
            <div class="modal-footer"><button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button></div>
 
      </div>
      </div>
  </div> 

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  <footer class="main-footer">
    
    <!-- Por defecto a la izquierda -->
    <strong>Copyright &copy; 2016 <a href="#">Company</a>.</strong> All rights reserved.
  </footer>


<!-- ./wrapper -->

<!-- Sripts JS Requeridos -->

<!-- jQuery 2.2.0 -->
<script src="../../../js/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../../js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../../js/app.min.js"></script>
<!-- DataTables -->
<script src="../../../js/datatables/jquery.dataTables.min.js"></script>
<script src="../../../js/datatables/dataTables.bootstrap.min.js"></script>

<script>

  $(function () {
    $("#tabla1").DataTable();
  
  });



  $(document).ready(function(){
        $(document).on('click', '.btn_delete', function(){  
           var id_edicion=$(this).data("id1");  
           if(confirm("Estas seguro de borrar esto?"))  
           {  
                $.ajax({  
                     url:"../../../php/panel_admin/revista/edicion/borrar_edicion.php",  
                     method:"POST",  
                     data:{id_edicion:id_edicion},  
                     dataType:"text",  
                     success:function(data){  
                          alert(data);  
                          window.location.reload();  
                     }  
                });  
           }    
          });

});

</script>
</body>
</html>
