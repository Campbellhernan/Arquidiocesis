<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
include('../librerias/utiles.php');

$conexion = conectar();

$id_inm = $_REQUEST['id_inm'];
$ids_docs = $_REQUEST['ids_docs'];

foreach($ids_docs as $ids_doc) {
	$registros = mysqli_query($conexion, "select id_doc from documento where cod_doc = '$ids_doc' limit 1");
	$filas = mysqli_fetch_array($registros);
	foreach($filas as $id_doc) {
		$consulta = "insert into se_refiere values (".$id_doc['id_doc'].", $id_inm)";
		mysqli_query($conexion, $consulta) or die('error');
	}
}
