<?php
$publicacion = $_GET["edicion1"];
$conexion = mysqli_connect("127.0.0.1","root","","sistema");
$sql = "SELECT id_seccion,nombre_sec FROM seccion WHERE cod_edicion = " . $publicacion;
$resultado = mysqli_query($conexion, $sql);
while($fila = mysqli_fetch_assoc($resultado)){
    echo "<option value='" . $fila["id_seccion"] . "'>" . $fila["nombre_sec"] . "</option>";
}
?>
