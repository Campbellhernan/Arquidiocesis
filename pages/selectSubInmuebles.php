<?php
@include_once ('../librerias/conexion.php');
/*if(!@include_once ('../librerias/conexion.php')){
    include('../librerias/conexion.php');
}*/

$conexion = conectar();

$registros = mysqli_query($conexion, "select inmueble.id_inm, inmueble.cod_inm, inmueble.zona from inmueble left join din_divisiones_inmuebles on inmueble.id_inm = din_divisiones_inmuebles.din_hijo where din_divisiones_inmuebles.din_hijo is null order by inmueble.cod_inm") or die('Problemas con la consulta');

while($fila = mysqli_fetch_array($registros)) {
	$cod_inm_option = $fila['cod_inm'];
    $id_inm = $fila['id_inm'];
    $zona = "";
    if($fila['zona'] != null){
        $zona = $fila['zona'];
    }
	echo "<option value='$id_inm'>$cod_inm_option $zona</option>\n";
}
