<?php
@include_once ('../librerias/conexion.php');
/*if(!@include_once ('../librerias/conexion.php')){
    include('../librerias/conexion.php');
}*/

$conexion = conectar();

$registros = mysqli_query($conexion, "select id_inm, cod_inm  from inmueble order by cod_inm") or die('Problemas con la consulta');

while($fila = mysqli_fetch_array($registros)) {
	$cod_inm_option = $fila['cod_inm'];
    $id_inm = $fila['id_inm'];
	echo "<option value='$id_inm'>$cod_inm_option</option>\n";
}
