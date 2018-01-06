<?php
require_once '../librerias/conexion.php';
$conexion = conectar();

$login = $_REQUEST['login'];

$registros = mysqli_query($conexion, "select * from usuario where login = '$login'");
$fila = mysqli_fetch_array($registros);

echo json_encode($fila);
?>