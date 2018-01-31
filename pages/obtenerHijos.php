<?php
@include_once ('../librerias/conexion.php');
/*if(!@include_once ('../librerias/conexion.php')){
    include('../librerias/conexion.php');
}*/

$conexion = conectar();
$cod_inm_padre =
$registros = mysqli_query($conexion, "SELECT `DIN_HIJO` FROM `din_divisiones_inmuebles` WHERE 'DIN_PADRE' = '$cod_inm_padre' order by cod_inm") or die('Problemas con la consulta');

while($fila = mysqli_fetch_array($registros)) {
	$cod_inm_option = $fila['cod_inm'];
    $id_inm = $fila['id_inm'];
	echo "<option value='$id_inm'>$cod_inm_option</option>\n";
}
