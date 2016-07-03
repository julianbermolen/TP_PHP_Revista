<?php
$provincia = $_GET["prov"];
$conexion = mysqli_connect("127.0.0.1","root","","sistema");
$sql = "SELECT id_ciudad,ciudad_nombre FROM ciudad WHERE cod_provincia = " . $provincia;
$resultado = mysqli_query($conexion, $sql);
while($fila = mysqli_fetch_assoc($resultado)){
    echo "<option value='" . $fila["id_ciudad"] . "'>" . $fila["ciudad_nombre"] . "</option>";
}
?>
