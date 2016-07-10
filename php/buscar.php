<?php
  ;
      $buscar = $_POST['b'];
       
      if(!empty($buscar)) {
            buscar($buscar);
      }
       
      function buscar($b) {
        include("../bd/conexion.php");
           
       $query = "SELECT * FROM edicion WHERE nombre_edicion LIKE '%$b%'";
            $sql = mysqli_query($conexion,$query);
             
            $contar = mysqli_num_rows($sql);
             
            if($contar == 0){
                  echo "No se han encontrado resultados para '<b>".$b."</b>'.";
            }else{
                  while($row=mysqli_fetch_array($sql)){
                        $nombre = $row['nombre_edicion'];
                        $id = $row['id_edicion'];                      
                        echo "<li><a data-target='#$id' data-toggle='modal' href='#$id' >".$nombre."</a><li>";    
                  }
            }
      }
       
?>