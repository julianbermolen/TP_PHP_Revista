<?php

include("../../../bd/conexion.php");


$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$texto = $_POST['texto'];
$publicacion = $_POST['publicacion'];
$edicion = $_POST['edicion'];
$seccion = $_POST['seccion'];

	if(isset($_FILES['file']['name'])){
		$path1 = $_FILES['file']['name'];
		echo "llego algo";
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

$query = "INSERT INTO articulo VALUES('','$titulo','$subtitulo','$texto','$seccion','','$publicacion','$edicion')";

$result = mysqli_query($conexion,$query);

$queryConsultaArticulo = "SELECT id_articulo FROM articulo WHERE titulo = '$titulo' and subtitulo='$subtitulo'";
$resultadoConsulta = mysqli_query($conexion,$queryConsultaArticulo);
$tipo = mysqli_fetch_assoc($resultadoConsulta);
		if($result){
			if(isset($path1)){
				$queryImagen = "INSERT INTO imagen VALUES('','$tipo[id_articulo]','$path1')";
				$resultadoPath = mysqli_query($conexion,$queryImagen);
				$fichero1 = $dir.basename($_FILES['file']['name']);
				if (@move_uploaded_file($_FILES['file']['tmp_name'], $fichero1)) {
		    		echo "El fichero es válido y se subió con éxito.\n";
					} 
				}
				
				 if(isset($path2)){
				$fichero2 = $dir.basename($_FILES['file2']['name']);
				if (move_uploaded_file($_FILES['file2']['tmp_name'], $fichero2)) {
		    		echo "El fichero es válido y se subió con éxito.\n";
					} 
				}
				
				if(isset($path3)){
				$fichero3 = $dir.basename($_FILES['file2']['name']);
				if (move_uploaded_file($_FILES['file2']['tmp_name'], $fichero3)) {
		    		echo "El fichero es válido y se subió con éxito.\n";
					} 
				}
				
				if(isset($path4)){
				$fichero4 = $dir.basename($_FILES['imagen4']['name']);
				if (move_uploaded_file($_FILES['imagen4']['tmp_name'], $fichero4)) {
		    		echo "El fichero es válido y se subió con éxito.\n";
					} 
				}

				header("location:../../../vistas/panel_admin/revista/panel-administrador-revista-articulo.php");

		}


?>