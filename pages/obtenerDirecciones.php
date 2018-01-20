<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
$conexion = conectar();
$jsondata = array();
$result = mysqli_query($conexion, "select direccion from inmueble") or die('Problemas con la consulta');
while($row = mysqli_fetch_array($result)){
    $direcciones[] = $row['direccion'];
}
$jsondata['success'] = true;
$jsondata['direcciones'] = $direcciones;
header('Content-type: application/json; charset=utf-8');
echo json_encode($jsondata);
exit();
?>