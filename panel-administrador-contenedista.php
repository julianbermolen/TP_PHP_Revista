<!DOCTYPE html>

<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Panel de administracion | Inicio</title>
  <!-- Le dice al navegador para ser responsive en el ancho de la pantalla -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="css/bootstrap-3.3.6-dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Css principal -->
  <link rel="stylesheet" href="css/admin/AdminLTE.min.css">

  <link rel="stylesheet" href="css/admin/skin-blue.min.css">
     <!-- DataTables -->
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">


  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Header Principal -->
  <header class="main-header">

    <!-- Logo -->
    <a href="index2.html" class="logo">
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
              <span>Carlos Saul</span>
            </a>
            <ul class="dropdown-menu">
              
              <!-- Header usuario -->
              <li class="user-header">
              
                <p>
                  Carlos Saul - Web Developer
                  <small>Member since Nov. 2012</small>
                </p>
              </li>
              
                <!-- /.row -->
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-right">
                  <a href="#" class="btn btn-default btn-flat">Sign out</a>
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
        
        <li><a href="panel-administrador.php"><i class="fa fa-home"></i> <span>Inicio</span></a></li>
        <li><a href="panel-administrador-revista.php"><i class="fa fa-newspaper-o"></i> <span>Revista</span></a></li>
        <li class="active"><a href="panel-administrador-contenedista.php"><i class="fa fa-user-secret"></i> <span>Contenedista</span></a></li>
        <li><a href="panel-administrador-usuario.php"><i class="fa fa-user"></i> <span>Usuario</span></a></li>
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
    <section class="content">

    <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-body">
             <table id="tabla1" class="table table-bordered table-hover">
                 <thead>
                    <tr>  
                         <th width="10%">Id</th>  
                         <th width="20%">email</th>  
                         <th width="20%">clave</th>  
                         <th width="20%">nombre</th>
                         <th width="10%">rol</th>
                         <th width="2%">borrar</th>
                         <th width="2%">modificar</th>

                    </tr>
                  </thead>

                  <tbody>
                  <?php
                    $connect = mysqli_connect("localhost", "root", "", "sistema");  
                    $output = '';  
                    $sql = "SELECT * FROM usuario ORDER BY id_usuario DESC" ;  
                    $resultado = mysqli_query($connect, $sql);

                    while($fila = mysqli_fetch_array($resultado)) {
                      echo "<tr>";
                      echo '<td>'.$fila["id_usuario"].'</td>
                            <td>'.$fila["email"].'</td>
                            <td>'.$fila["clave"].'</td>
                            <td>'.$fila["nombre"].'</td>
                            <td>'.$fila["cod_rol"].'</td>
                            <td><button type="button" name="delete_btn" data-id1="'.$fila["id_usuario"].'" class="btn btn-xs btn-danger btn_delete">x</button></td>
                            <td><button type="button" name="mod_btn" data-id2="'.$fila["id_usuario"].'" class="btn btn-xs btn-warning glyphicon glyphicon-edit"></button></td>';

                    } 

                   ?>
                   </tbody>


              </table>
            </div>
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
<script src="js/jQuery/jQuery-2.2.0.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="js/bootstrap.min.js"></script>
<!-- AdminLTE App -->
<script src="js/app.min.js"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
<script src="js/datatables/dataTables.bootstrap.min.js"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. Slimscroll is required when using the
     fixed layout. -->
<script>
  $(function () {
    $("#tabla1").DataTable();
  
  });

$(document).ready(function(){
        $(document).on('click', '.btn_delete', function(){  
           var id_usuario=$(this).data("id1");  
           if(confirm("Estas seguro de borrar esto?"))  
           {  
                $.ajax({  
                     url:"php/borrar_usuario.php",  
                     method:"POST",  
                     data:{id_usuario:id_usuario},  
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
