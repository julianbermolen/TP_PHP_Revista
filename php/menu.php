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
        <li class="active"><a href="#">Revistas <span class="sr-only">(current)</span></a></li>
        <li><a href="#">Diarios</a></li>
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
        <li><a href="registroDeUsuario.php">Registrarse</a></li>
        <li>
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Inicie sesión<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li>
              <form class="form-Horizontal" action="#" id="form-login">
                
                  <input type="text" class="form-control" placeholder="usuario"/>
                  <input type="password" class="form-control" placeholder="contraseña"/>
                  <input type="submit" name="ingresar" value="Ingresar" class="btn btn-primary"/>
              </form>
            </li>
          </ul>
        </li>
      </ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>