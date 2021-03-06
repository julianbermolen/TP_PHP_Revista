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
 <style type="text/css">
  html, body { height: 100%; margin: 0; padding: 0; }
      #map { height: 100%; }
    </style>


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
      <span class="logo-mini"><b>A</b>LT</span>
      <!-- logo para estado regular y dispositivos moviles -->
      <span class="logo-lg"><b>Admin</b>LTE</span>
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
                  <?php echo $_SESSION['nombre_usuario'] ?> - Web Developer
                  <small>Member since Nov. 2012</small>
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
        Revista - Articulo
        <small>Crear articulo</small>
      </h1>
    </section>

    <!-- Contenido Principal -->
    <section class="content">

        <form method="POST" action="../../../php/panel_admin/revista/crearArticulo.php" enctype="multipart/form-data">
        

                  <div class="form-group">
                    <label for="publicacion1" class="label-largo">Seleccione Publicacion: </label>
                     <select  name="publicacion1" id="publicacion1" class="form-control input-largo">
                            
                       <?php

                         $conexion = mysqli_connect("127.0.0.1","root","","sistema");
                         $sql = "SELECT * FROM publicacion";
                         $resultado = mysqli_query($conexion, $sql);
                           while($fila = mysqli_fetch_assoc($resultado)){
                               echo "<option value='"  . $fila["id_publicacion"] . "'>" . $fila["nombre_publicacion"] . "</option>";
                              }
                              echo '</select> <br>';
                              echo "<label for='edicion1' class='label-largo'>Edicion:</label>";
                              echo "<select id='edicion1' name='edicion1' class='form-control input-largo'></select>";
                              echo "<label for='seccion1' class='label-largo'>Seccion:</label>";
                              echo "<select id='seccion1' name='seccion1' class='form-control input-largo'></select>";                           
                              ?>


                           
                   </div>          

          <div class="col-lg-12">  
          
            <input type="text" id="titulo" name="titulo" style="width:90%;" class="form-control input-articulo" placeholder="Agregue un titulo"/><br>
          
          </div>
         
          
          <div class="col-lg-12">
          
            <input type="text" id="subtitulo" name="subtitulo" style="width:90%;" class="form-control" placeholder="Agregue un subtitulo"/><br><br>
          
          </div>

          <div class="col-lg-12">
              <div class="col-lg-4">
                  <div class="form-group">
                      <label for="ejemplo_archivo_1">Añada una imagen</label>
                      <input type="file" id="imagen1" name="file"/>
                      <p class="help-block">La imagen tiene que ser jpg o png.</p>
                  </div>
                </div>
                  <div class="col-lg-4">
                     <div class="form-group">
                          <label for="ejemplo_archivo_1">Añada una imagen</label>
                          <input type="file" id="imagen2" name="file2"/>
                          <p class="help-block">La imagen tiene que ser jpg o png.</p>
                     </div>
                  </div>
                  <div class="col-lg-4">
                      <div class="form-group">
                         <label for="ejemplo_archivo_1">Añada una imagen</label>
                         <input type="file" id="imagen3" name="file3"/>
                         <p class="help-block">La imagen tiene que ser jpg o png.</p>
                      </div>
                  </div>
          </div> 
    <div id="map"></div>
          <div class="col-lg-12">
              <textarea id="text_edit" name="texto"></textarea><br>
          </div>
           
            <input type="submit" class="btn btn-success" style="float:right;" value="Enviar"/>

            
          </form>



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
<link rel="stylesheet" href="../../../js/CLEditor1_4_5/jquery.cleditor.css" />

<script type="text/javascript">

var map;
function initMap() {
  map = new google.maps.Map(document.getElementById('map'), {
    center: {lat: -34.397, lng: 150.644},
    zoom: 8
  });
}

    </script>
    <script async defer
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD3vR1uAGauAv3wBu-cReTOnGMBLVxDKNI&callback=initMap">
    </script>
  <script src="../../../js/CLEditor1_4_5/jquery.cleditor.min.js"></script>
  <script>
        $(document).ready(function() {
            $("#text_edit").cleditor({
                width: 1000, // width not including margins, borders or padding
                height: 250, // height not including margins, borders or padding
                controls: // controls to add to the toolbar
                    "bold italic underline strikethrough subscript superscript | font size " +
                    "style | color highlight removeformat | bullets numbering | outdent " +
                    "indent | alignleft center alignright justify | undo redo | " +
                    "rule image link unlink | cut copy paste pastetext | print source",
                colors: // colors in the color popup
                    "FFF FCC FC9 FF9 FFC 9F9 9FF CFF CCF FCF " +
                    "CCC F66 F96 FF6 FF3 6F9 3FF 6FF 99F F9F " +
                    "BBB F00 F90 FC6 FF0 3F3 6CC 3CF 66C C6C " +
                    "999 C00 F60 FC3 FC0 3C0 0CC 36F 63F C3C " +
                    "666 900 C60 C93 990 090 399 33F 60C 939 " +
                    "333 600 930 963 660 060 366 009 339 636 " +
                    "000 300 630 633 330 030 033 006 309 303",
                fonts: // font names in the font popup
                    "Arial,Arial Black,Comic Sans MS,Courier New,Narrow,Garamond," +
                    "Georgia,Impact,Sans Serif,Serif,Tahoma,Trebuchet MS,Verdana",
                sizes: // sizes in the font size popup
                    "1,2,3,4,5,6,7",
                styles: // styles in the style popup
                    [["Paragraph", "<p>"], ["Header 1", "<h1>"], ["Header 2", "<h2>"],
                    ["Header 3", "<h3>"],  ["Header 4","<h4>"],  ["Header 5","<h5>"],
                    ["Header 6","<h6>"]],
                useCSS: false, // use CSS to style HTML when possible (not supported in ie)
                docType: // Document type contained within the editor
                    '<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">',
                docCSSFile: // CSS file used to style the document contained within the editor
                    "",
                bodyStyle: // style to assign to document body contained within the editor
                    "margin:4px; font:10pt Arial,Verdana; cursor:text"
            });
        });
    </script>
</body>
</html>
