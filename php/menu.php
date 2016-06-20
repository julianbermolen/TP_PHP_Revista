<?php
  session_start();
?>
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">InfoNete</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <?php
          if(isset($tipo)){
            if($tipo=='R')
              echo"<li class='active'>";
            else
              echo"<li>";
          }
            echo"<a href='index.php?indice=".isset($indice)."&tipo=R'>Revistas <span class='sr-only'>(current)</span>";
        ?>
        </a></li>
          <?php
            if(isset($tipo)){
              if($tipo=='D')
                echo"<li class='active'>";
              else
                echo"<li>";
            }
              echo"<a href='index.php?indice=".isset($indice)."&tipo=D'>Diarios";
          ?>
        </a></li>
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Categoría <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="#">Deportes</a></li>
            <li><a href="#">Mas leídas</a></li>
            <li><a href="#">Moda</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#">Policial</a></li>
            <li role="separator" class="divider"></li>
            <li><a href="#"></a></li>
          </ul>
        </li>
      </ul>
      <form class="navbar-form navbar-left" role="search">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Buscar articulos">
        </div>
        <button type="submit" class="btn btn-default">Buscar</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <?php if(!isset($_SESSION['nombre'])){
                   echo "<li><a href='registroDeUsuario.php'>Registrarse</a></li>
                         <li><a href='#modalid1' class='dropdown-toggle' data-target='#modalid1' data-toggle='modal' role='button'>Inicie sesión</a></li>";
          }else{
            echo "<li class='dropdown'><a href='#' class='dropdown-toggle' data-toggle='dropdown' role='button' aria-haspopup='true' aria-expanded='false'>".$_SESSION['nombre']." <span class='caret'></span></a>";
            echo "<ul class='dropdown-menu'>
                      <li><a href='#'>Mis suscripciones</a></li>
                      <li><a href='#'>Mis facturas</a></li>
                      <li role='separator' class='divider'></li>
                      <li><a href='#'>Mi cuenta</a></li>
                      <li><a href='php/logout.php'>Cerrar sesión</a></li>
                    </ul>
                  </li>";
          }?>
          
        
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>

<div id="modalid1" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button><h4>Inicie sesión</h4></div> 
            <div class="modal-body">
                    <form action="php/login.php" method="POST"id="myForm">
                          <div class="form-group">
                            <label for="exampleInputText1">Usuario</label>
                            <input type="text" class="form-control" name="user" id="exampleInputText1" placeholder="Usuario"required data-validation-required-message="Por favor, ingrese su usuario.">
                          <p class="help-block text-danger"></p>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" name="pass" id="exampleInputPassword1" placeholder="Contraseña"required data-validation-required-message="Por favor, ingrese su Contraseña.">
                            <p class="help-block text-danger"></p>                          
                          </div>                          
                         <button id="submitLog" name="login" class="btn btn-primary" style="width:100%;text-align:center;">Enviar</button>
                    </form>
                    <div id="ack"></div>
            </div>
            <div class="modal-footer"><a href='OlviContra.php' style='float:left;color:#286090;'>¿Olvidaste tu contraseña?</a><button type="button" class="btn btn-primary" data-dismiss="modal">Cerrar</button></div>
 
      </div>
      </div>
  </div>

