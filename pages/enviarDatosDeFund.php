<?php
require_once '../librerias/conexion.php';
$conexion = conectar();

$id_fund = $_REQUEST['id_fund'];

$registros = mysqli_query($conexion, "select * from fundacion where id_fund = $id_fund");
$fila = mysqli_fetch_array($registros);

echo json_encode($fila);
?>