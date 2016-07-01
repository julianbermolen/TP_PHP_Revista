<?php
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$texto = $_POST['texto'];
$publicacion = $_POST['publicacion'];
$edicion = $_POST['edicion'];
$seccion = $_POST['seccion'];

	if(isset($_POST['path1']['name'])){
		$path1 = $_POST['path1']['name'];
		} 
	if(isset($_POST['path2']['name'])){
		$path1 = $_POST['path2']['name'];
		} 
	if(isset($_POST['path3']['name'])){
		$path1 = $_POST['path3']['name'];
		} 
	if(isset($_POST['path4']['name'])){
		$path1 = $_POST['path4']['name'];
		} 
		$dir = '../../../imagenes/';
// $latitud = ;
// $longitud = ;
include("../../../bd/conexion.php");
$query = "INSERT INTO articulo VALUES('','$titulo','$subtitulo','$texto','$seccion','','$publicacion','$edicion')";

$result = mysqli_query($conexion,$query);
$queryImagen = "INSERT INTO imagen VALUES('','','')";
		if($result){
			if(isset($path1)){
				$fichero1 = $dir.basename($_POST['path1']['name']);
				if (move_uploaded_file($_FILES['path1']['tmp_name'], $fichero_subido)) {
		    		echo "El fichero es válido y se subió con éxito.\n";
					} 
				}
				
				 if(isset($path2)){
				$fichero1 = $dir.basename($_POST['path2']['name']);
				if (move_uploaded_file($_FILES['path2']['tmp_name'], $fichero_subido)) {
		    		echo "El fichero es válido y se subió con éxito.\n";
					} 
				}
				
				if(isset($path3)){
				$fichero1 = $dir.basename($_POST['path3']['name']);
				if (move_uploaded_file($_FILES['path3']['tmp_name'], $fichero_subido)) {
		    		echo "El fichero es válido y se subió con éxito.\n";
					} 
				}
				
				if(isset($path4)){
				$fichero1 = $dir.basename($_POST['path4']['name']);
				if (move_uploaded_file($_FILES['path4']['tmp_name'], $fichero_subido)) {
		    		echo "El fichero es válido y se subió con éxito.\n";
					} 
				}



		}


?>