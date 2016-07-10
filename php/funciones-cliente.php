<?php
	
	function traerSuscripciones($nombre){

		include("bd/conexion.php");

		$query="SELECT s.id_suscripcion, e.nombre_edicion, s.inicio,e.id_edicion
				FROM cliente c INNER JOIN suscripcion s ON c.id_cliente=s.cod_cliente
				INNER JOIN edicion e ON s.cod_edicion=e.id_edicion
				WHERE c.username_cliente='$nombre'
				ORDER BY s.inicio DESC";

		$tabla = mysqli_query($conexion,$query);

		while($fila = mysqli_fetch_array($tabla)){
			echo"<tr>
					<td>$fila[0]</td>
					<td><a href='articulo.php?id_edicion=$fila[3]'>$fila[1]</a></td>
					<td>$fila[2]</td>
				</tr>";

		}

		mysqli_close($conexion);
	}

	function traerCompras($nombre){

		include("bd/conexion.php");

		$query="SELECT co.id_compra,e.nombre_edicion,e.precio_compra,co.fecha_compra,e.id_edicion
				FROM cliente c INNER JOIN compra co ON c.id_cliente=co.cod_cliente
				INNER JOIN edicion e ON co.cod_edicion=e.id_edicion
				WHERE c.username_cliente='$nombre'";

		$tabla = mysqli_query($conexion,$query);

		while($fila = mysqli_fetch_array($tabla)){
			echo"<tr>
					<td>$fila[0]</td>
					<td><a href='articulo.php?id_edicion=$fila[4]'>$fila[1]</a></td>
					<td>$fila[2]</td>
					<td>$fila[3]</td>
				</tr>";

		}

		mysqli_close($conexion);


	}
?>