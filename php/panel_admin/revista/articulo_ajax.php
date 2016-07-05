<?php
$publicacion = $_GET["publicacion1"];
$conexion = mysqli_connect("127.0.0.1","root","","sistema");
$sql = "SELECT id_edicion,nombre_edicion FROM edicion WHERE id_publicacion = " . $publicacion;
$resultado = mysqli_query($conexion, $sql);
while($fila = mysqli_fetch_assoc($resultado)){
    echo "<option value='" . $fila["id_edicion"] . "'>" . $fila["nombre_edicion"] . "</option>";
}
?>
