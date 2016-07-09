<!DOCTYPE html>
<html >
  <head>
    <meta charset="UTF-8">
    <title>Login</title>
    
    
    
    
        <link rel="stylesheet" href="../../../css/admin/styleLoginAdmin.css">

    
    
    
  </head>

  <body>

  <?php
    $caract_validos=null;
    $vacio=null;
    $incorrecto=null;




    if(isset($_POST["enviar"])){

          $nombre = $_POST['usuario'];
          $clave = md5($_POST['pass']);

          include('../../../bd/conexion.php');

          $query = "SELECT * FROM usuario WHERE nombre='$nombre' AND clave = '$clave'";

          $result = mysqli_query($conexion,$query);

          $tipo = mysqli_fetch_assoc($result);



      if (isset($nombre) && isset($clave)) {
          if (validarUsuario($_POST["usuario"])) {
            if ($tipo['nombre'] == $nombre && $tipo['clave'] == $clave){

              session_start();
              $_SESSION['nombre_usuario'] = $nombre;
              $_SESSION['rol'] = $tipo['cod_rol'];
              $_SESSION["log"]=true;

                setcookie('rol',$tipo['cod_rol'],time()+(86400*20), "/");

              

                 

              
              header("location:../panel-administrador.php");

            }else{
              $incorrecto="Usuario y/o password incorrectos";
             }
          }else{
            $caract_validos="Use caracteres validos";
 
           }
        }else{
           $vacio="Ingrese usuario y/o password";
        }  


    }



    //Funcion validar usuario
    function validarUsuario($nombre = NULL) {
      $validos="abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ0123456789";
        $validez=1;
        for ($i=0;$i<=strlen($nombre)-1;$i++) {
            if (strpos($validos,substr($nombre,$i,1))===false) {
              $validez=0;
            }
        }
        return $validez;
    } 


  ?>



    <div class="login-page">
  <div class="form" >
   
   <form class="register-form" action="index.php" method="post">
      <input type="text" placeholder="nombre" name="usuario" class="text"/>
      <input type="password" placeholder="password" name="pass" class="text"/>
      <input type="submit" name="enviar" value="registrar" class="enviar"/>      
      <p class="message">Ya estas registrado? <a href="#">Sign In</a></p>
    </form>


    <form class="login-form" action="index.php" method="post">
      <?php 
        if(isset($_POST["enviar"]) && $caract_validos !== null) {
          echo $caract_validos."<br>";
          echo "<br>";
        }
        
          ?>
      
      <?php 
        if(isset($_POST["enviar"]) && $vacio !== null) {
          
          echo $vacio."<br>";
          echo "<br>";
        }
      
          ?>

      <?php 
        if(isset($_POST["enviar"]) && $incorrecto !== null) {
          
          echo $incorrecto."<br>";
          echo "<br>";
        }
      
          ?>
      
      <input type="text" placeholder="usuario" name="usuario" class="text"/>
      <input type="password" placeholder="password" name="pass" class="text"/>
      <input type="submit" name="enviar" value="login" class="enviar"/>
    
     


    </form>
  </div>
</div>

        

        <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>

        
    
    
    
  </body>
</html>
