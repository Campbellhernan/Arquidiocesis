<?php
@include_once ('../librerias/conexion.php');

$conexion = conectar();

$id_inm = $_REQUEST['id_inm'];

$registros = mysqli_query($conexion, "select inmueble.id_inm, inmueble.cod_inm, inmueble.zona from inmueble join din_divisiones_inmuebles on inmueble.id_inm = din_divisiones_inmuebles.din_hijo where din_divisiones_inmuebles.din_padre = $id_inm  order by inmueble.cod_inm") or die('Problemas con la consulta');
$resul=array();
while($fila = mysqli_fetch_array($registros)) {
	$desincorporacion['cod_inm'] = $fila['cod_inm'];
    $desincorporacion['id_inm']  = $fila['id_inm'];
    $desincorporacion['zona'] = "";
    if($fila['zona'] != null){
        $desincorporacion['zona'] = $fila['zona'];
    }
    array_push($resul,$desincorporacion);	
}
$jsondata['success'] = true;
$jsondata['desincorporaciones'] = $resul;
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
