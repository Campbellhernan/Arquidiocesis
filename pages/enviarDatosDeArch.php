<?php
require_once '../librerias/conexion.php';
$conexion = conectar();

$id_arch = $_REQUEST['id_arch'];

$registros = mysqli_query($conexion, "select * from archiprestazgo where id_arch = $id_arch");
$fila = mysqli_fetch_array($registros);

echo json_encode($fila);
