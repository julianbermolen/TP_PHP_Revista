<?php

include("../../../bd/conexion.php");


$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$texto = $_POST['texto'];
$publicacion = $_POST['publicacion1'];
$edicion = $_POST['edicion1'];
$seccion = $_POST['seccion1'];
if(isset($_POST['coordenada'])){
	$coordenada = $_POST['coordenada'];
}
	if(isset($_FILES['file']['name'])){
		$path1 = $_FILES['file']['name'];
		
		} 
	if(isset($_FILES['file2']['name'])){
		$path2 = $_FILES['file2']['name'];
		} 
	if(isset($_FILES['file3']['name'])){
		$path3 = $_FILES['file3']['name'];
		} 
	if(isset($_FILES['imagen4']['name'])){
		$path4 = $_FILES['imagen4']['name'];
		} 
		$dir = '../../../imagenes/';
// $latitud = ;
// $longitud = ;

$query = "INSERT INTO articulo VALUES('','$titulo','$subtitulo','$texto','$seccion','$coordenada','$publicacion','$edicion')";

$result = mysqli_query($conexion,$query);

$queryConsultaArticulo = "SELECT id_articulo FROM articulo WHERE id_seccion = '$seccion' AND cod_edicion='$edicion' AND cod_publicacion='$publicacion' AND coordenadas='$coordenada'";
$resultadoConsulta = mysqli_query($conexion,$queryConsultaArticulo);
$tipo = mysqli_fetch_assoc($resultadoConsulta);
		if($result){
			if(isset($path1)){
				$queryImagen1 = "INSERT INTO imagen VALUES('','$tipo[id_articulo]','$path1')";
				$resultadoPath1 = mysqli_query($conexion,$queryImagen1);
				$fichero1 = $dir.basename($_FILES['file']['name']);
				if (@move_uploaded_file($_FILES['file']['tmp_name'], $fichero1)) {
		    		echo "El fichero es válido y se subió con éxito.\n";
					} 
					}else{
					$queryImagenNula = "INSERT INTO imagen VALUES('','$tipo[id_articulo]','sinimagen.jpg')";
					$resultadoPath = mysqli_query($conexion,$queryImagen);
				}
				
				 if(isset($path2)){
				$queryImagen2 = "INSERT INTO imagen VALUES('','$tipo[id_articulo]','$path2')";
				$resultadoPath2 = mysqli_query($conexion,$queryImagen2);
				$fichero2 = $dir.basename($_FILES['file2']['name']);
				if (move_uploaded_file($_FILES['file2']['tmp_name'], $fichero2)) {
		    		echo "El fichero es válido y se subió con éxito.\n";
					} 
				}
				
				if(isset($path3)){
				$queryImagen3 = "INSERT INTO imagen VALUES('','$tipo[id_articulo]','$path3')";
				$resultadoPath3 = mysqli_query($conexion,$queryImagen3);
				$fichero3 = $dir.basename($_FILES['file2']['name']);
				if (move_uploaded_file($_FILES['file2']['tmp_name'], $fichero3)) {
		    		echo "El fichero es válido y se subió con éxito.\n";
					} 
				}
				
				if(isset($path4)){
				$queryImagen4 = "INSERT INTO imagen VALUES('','$tipo[id_articulo]','$path4')";
				$resultadoPath4 = mysqli_query($conexion,$queryImagen4);
				$fichero4 = $dir.basename($_FILES['imagen4']['name']);
				if (move_uploaded_file($_FILES['imagen4']['tmp_name'], $fichero4)) {
		    		echo "El fichero es válido y se subió con éxito.\n";
					} 
				}

				header("location:../../../vistas/panel_admin/revista/panel-administrador-revista-articulo.php");

		}


?>