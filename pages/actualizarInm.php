<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
include('../librerias/utiles.php');

$conexion = conectar();

$id_inm = $_REQUEST['id_inm'];
$cod_inm = $_REQUEST['cod_inm_edit'];
$archiprestazgo = $_REQUEST['archiprestazgo'];
$parroquia = $_REQUEST['parroquia'];
$direccion = $_REQUEST['direccion'];
$modo_adq = $_REQUEST['modo_adq'];
$metraje = $_REQUEST['metraje'];
$tipo_inm = $_REQUEST['tipo_inm'];
$linderos = $_REQUEST['linderos'];
$descripcion = $_REQUEST['descripcion'];
$fecha 			= $_REQUEST['fecha'];
$datos_registro = $_REQUEST['datos_registro_doc'];
$abogado_redactor = $_REQUEST['abogado_redactor_doc'];
$estatus = $_REQUEST['estatus'];
$map_position = $_REQUEST['map_position'];

if ($fecha) {
    $fecha = date_create_from_format("d-m-Y", $fecha);
    if ($fecha) {
        $fecha = $fecha->format('Y-m-d');
    }
}

$query = "update inmueble set cod_inm = '$cod_inm', direccion = '$direccion', modo_adq = '$modo_adq', metraje = '$metraje', tipo_inm = '$tipo_inm', linderos = '$linderos', descripcion = '$descripcion', archiprestazgo = '$archiprestazgo', parroquia = '$parroquia', fecha = '$fecha', datos_registro = '$datos_registro', abogado_redactor = '$abogado_redactor', estatus = '$estatus', map_position = '$map_position' where id_inm = $id_inm";

mysqli_query($conexion, $query);


$folder = "uploads/inmuebles/" . $id_inm;

if (!is_dir($folder)) {
	mkdir($folder);
}

foreach ($_FILES['archivo_inmueble']['error'] as $key => $error) {
	if ($error == UPLOAD_ERR_OK) {
		$name = sanitize_file_name(basename($_FILES['archivo_inmueble']['name'][$key]));
		move_uploaded_file($_FILES['archivo_inmueble']['tmp_name'][$key], $folder . "/" . $name);
	}
}
