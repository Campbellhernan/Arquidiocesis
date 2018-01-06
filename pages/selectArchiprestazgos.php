<?php
$conexion = conectar();

$registros = mysqli_query($conexion, "select * from archiprestazgo order by cod_arch") or die('Problemas con la consulta');

while($fila = mysqli_fetch_array($registros)) {
	$id_arch = $fila['id_arch'];
	$nom_arch = $fila['nom_arch'];
	$cod_arch = $fila['cod_arch'];

	echo "<option value='$id_arch'>$cod_arch - $nom_arch</option>\n";
}
