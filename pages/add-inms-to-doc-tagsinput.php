<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
include('../librerias/utiles.php');

$conexion = conectar();

$id_doc = $_REQUEST['id_doc'];
$ids_inms = $_REQUEST['ids_inms'];

foreach($ids_inms as $id_inm) {
	$registros = mysqli_query($conexion, "select id_inm from inmueble where cod_inm = '$id_inm' limit 1");
	$filas = mysqli_fetch_array($registros);
	foreach($filas as $id_inm) {
		$consulta = "insert into se_refiere values ($id_doc, ".$id_inm['id_inm'].")";
		mysqli_query($conexion, $consulta) or die('error');
	}
}
