<html>
<head></head>

<body>
<?php
	require_once '../librerias/conexion.php';
        $conexion = conectar();
	$consulta_base = "select * from documento";
	$registros = mysqli_query($conexion, $consulta_base);
	
	echo "<p>Tabla documento</p>\n\n";
	echo "<table border='1'>\n<tr>\n<th>cod_doc</th><th>cod_inmf</th><th>tipo</th><th>dia</th><th>mes</th><th>anyo</th>
	<th>datos_registro</th><th>abogado_redactor</th>\n</tr>";
	while($fila = mysqli_fetch_array($registros))
	{
		echo "\n<tr>\n";
		echo "<td>".$fila['cod_doc']."</td>";
		echo "<td>".$fila['cod_inmf']."</td>";
		echo "<td>".$fila['tipo']."</td>";
		echo "<td>".$fila['dia']."</td>";
		echo "<td>".$fila['mes']."</td>";
		echo "<td>".$fila['anyo']."</td>";
		echo "<td>".$fila['datos_registro']."</td>";
		echo "<td>".$fila['abogado_redactor']."</td>\n</tr>\n";
	}
	echo "</table>\n\n";
	
	$consulta_base = "select * from inmueble";
	$registros = mysqli_query($conexion, $consulta_base);
	
	echo "<p>Tabla Inmueble</p>\n\n";
	echo "<table border='1'>\n<tr>\n<th>cod_inm</th><th>nom_arch</th><th>nom_parro</th><th>descripcion</th><th>modo_adq</th><th>direccion</th>
	<th>metraje</th><th>tipo_inm</th>\n</tr>\n";
	while($fila = mysqli_fetch_array($registros))
	{
		echo "\n<tr>\n";
		echo "<td>".$fila['cod_inm']."</td>";
		echo "<td>".$fila['nom_arch']."</td>";
		echo "<td>".$fila['nom_parro']."</td>";
		echo "<td>".$fila['descripcion']."</td>";
		echo "<td>".$fila['modo_adq']."</td>";
		echo "<td>".$fila['direccion']."</td>";
		echo "<td>".$fila['metraje']."</td>";
		echo "<td>".$fila['tipo_inm']."</td>\n</tr>";
	}
	echo "\n</table>";
?>
</body>
</html>