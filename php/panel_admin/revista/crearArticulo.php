<?php
$titulo = $_POST['titulo'];
$subtitulo = $_POST['subtitulo'];
$texto = $_POST['texto'];
$seccion = $_POST['seccion'];
// $latitud = ;
// $longitud = ;
include("../../../bd/conexion.php");
$query = "INSERT INTO articulo VALUES('','$titulo','$subtitulo','$texto','$seccion')";

$result = mysqli_query($conexion,$query);

header("location:../../../vistas/panel_admin/panel-admin-revista.php");


?>