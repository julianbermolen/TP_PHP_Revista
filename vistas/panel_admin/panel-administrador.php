<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel de administracion | Inicio</title>
  <!-- Le dice al navegador para ser responsive en el ancho de la pantalla -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../../css/bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Css principal -->
  <link rel="stylesheet" href="../../css/admin/AdminLTE.min.css">

  <link rel="stylesheet" href="../../css/admin/skin-blue.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
  <?php
    include("../../bd/conexion.php");
    ?>
</head>
<body class="hold-transition skin-blue sidebar-mini">
  <?php
  require_once("../../php/seguro.php");
 

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
                  <?php echo $_SESSION['nombre_usuario'] ?> - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="../../php/panel_admin/login/logout.php" class="btn btn-default btn-flat">Sign out</a>
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
        
        <li class="active"><a href="panel-administrador.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        <li><a href=""><i class="fa fa-newspaper-o"></i> <span>Revista</span></a>
          <ul class="treeview-menu">
            <li><a href="revista/panel-administrador-revista-publicacion.php"><i class="fa fa-circle-o"></i>Publicacion</a></li>
            <li><a href="revista/panel-administrador-revista-edicion.php"><i class="fa fa-circle-o"></i>Edicion</a></li>
            <li><a href="revista/panel-administrador-revista-seccion.php"><i class="fa fa-circle-o"></i>Seccion</a></li>
            <li><a href="revista/panel-administrador-revista-articulo.php"><i class="fa fa-circle-o"></i>Articulo</a></li>
            <li><a href="revista/panel-administrador-revista-finalizados.php"><i class="fa fa-circle-o"></i>Finalizados</a></li>              
          </ul>
        </li>
        <?php if($_SESSION['rol'] == 3){ ?>
        <li><a href="panel-administrador-usuario.php"><i class="fa fa-user-secret"></i> <span>Usuario</span></a></li>
        <li><a href=""><i class="fa fa-user"></i> <span>Cliente</span></a>
          <ul class="treeview-menu">
            <li><a href="panel-administrador-cliente.php"><i class="fa fa-circle-o"></i> ABM</a></li>
            <li><a href="panel-administrador-cliente-suscripciones.php"><i class="fa fa-circle-o"></i> Suscripciones</a></li>
            <li><a href="panel-administrador-cliente-compras.php"><i class="fa fa-circle-o"></i> Compras</a></li>
          </ul>
        </li>
        <?php } ?>
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
        Pagina de Inicio
        <small>Cantidad de productos vendidos y supricripciones</small>
      </h1>
    </section>

    <!-- Contenido Principal -->
        <section class="content" id="graficos">
      <!-- Your Page Content Here -->
      <div class="row">
        <div class="col-xs-12">
          <h4>Productos vendidos</h4>
          <form>
            <div class="col-xs-4">
              <label for="periodo-ventas">Seleccione periodo de tiempo</label>
              <select id="periodo-ventas" name="periodo-ventas" class="form-control">
                <option selected="true">Seleccione</option>
                <option value="1">1 mes</option>
                <option value="6">6 meses</option>
                <option value="12">12 meses</option>
              </select>
            </div>
          </form>
        </div>
      </div>
      
        <div id="pie-chart-div">
        </div>
        <div class="row">
          <div class="col-xs-12">
            <h4>Suscripciones realizadas</h4>
            <form>
                <div class="col-xs-4">
                  <label for="periodo-suscripciones">Seleccione periodo de tiempo</label>
                  <select id="periodo-suscripciones" name="periodo-suscripciones" class="form-control">
                    <option selected="true">Seleccione</option>
                    <option value="1">1 mes</option>
                    <option value="6">6 meses</option>
                    <option value="12">12 meses</option>
                  </select>
                </div>
            </form>
          </div>
        </div>
        <div id="bar-chart-div">
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
<script src="../../js/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../../js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="../../js/app.min.js"></script>

<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script src="../../js/generadorDeGraficos.js"></script>

</body>
</html>
