<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
include('../librerias/utiles.php');

$conexion = conectar();

$id_doc = $_REQUEST['id_doc'];
$cod_doc = $_REQUEST['cod_doc'];
$tipo = $_REQUEST['tipo'];
$fecha = $_REQUEST['fecha'];
$datos_registro = $_REQUEST['datos_registro'];
$abogado_redactor = $_REQUEST['abogado_redactor'];
$descripcion = $_REQUEST['descripcion'];

$query = "update documento set cod_doc = '$cod_doc', tipo = '$tipo', fecha = '$fecha', datos_registro = '$datos_registro', abogado_redactor = '$abogado_redactor', descripcion = '$descripcion' where id_doc = '$id_doc'";

mysqli_query($conexion, $query) or die("Error al actualizar la tabla documento");

$folder = "uploads/documentos/" . $id_doc;

if (!is_dir($folder)) {
	mkdir($folder);
}

foreach ($_FILES['archivo_doc']['error'] as $key => $error) {
	if ($error == UPLOAD_ERR_OK) {
		$name = sanitize_file_name(basename($_FILES['archivo_doc']['name'][$key]));
		move_uploaded_file($_FILES['archivo_doc']['tmp_name'][$key], $folder . "/" . $name);
	}
}
