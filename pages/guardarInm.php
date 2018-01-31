<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
include('../librerias/utiles.php');

$conexion = conectar();

$cod_inm		= $_REQUEST['cod_inm'];
$archiprestazgo = $_REQUEST['archiprestazgo'];
$parroquia 		= $_REQUEST['parroquia'];
$direccion 		= $_REQUEST['direccion'];
$modo_adq 		= $_REQUEST['modo_adq'];
$metraje 		= $_REQUEST['metraje'];
$tipo_inm 		= $_REQUEST['tipo_inm'];
$linderos 		= $_REQUEST['linderos'];
$descripcion 	= $_REQUEST['descripcion'];
$fecha 			= $_REQUEST['fecha'];
$datos_registro = $_REQUEST['datos_registro_doc'];
$abogado_redactor = $_REQUEST['abogado_redactor_doc'];
$map_position = $_REQUEST['map_position'];
$sub_inmuebles = $_REQUEST['sub_inmueble_select'];

echo $sub_inmuebles;

$estatus = $_REQUEST['estatus'];

$consulta = "insert into inmueble (cod_inm, direccion, modo_adq, metraje, tipo_inm, descripcion, linderos, archiprestazgo, parroquia, fecha, datos_registro, abogado_redactor, estatus, map_position)
			values ('$cod_inm', '$direccion', '$modo_adq', '$metraje', '$tipo_inm', '$descripcion', '$linderos', '$archiprestazgo', '$parroquia', '$fecha', '$datos_registro', '$abogado_redactor', '$estatus', '$map_position')";

mysqli_query($conexion, $consulta) or die("Error en la insercion de inmueble");

$id = mysqli_insert_id($conexion);
$folder = "uploads/inmuebles/" . $id;

if (!is_dir($folder)) {
	mkdir($folder);
}

foreach ($_FILES['archivo_inmueble']['error'] as $key => $error) {
	if ($error == UPLOAD_ERR_OK) {
		$name = sanitize_file_name(basename($_FILES['archivo_inmueble']['name'][$key]));
		move_uploaded_file($_FILES['archivo_inmueble']['tmp_name'][$key], $folder . "/" . $name);
	}
}
$get_id = "SELECT `id_inm` FROM `inmueble` WHERE cod_inm = '$cod_inm'";
$resultado_inmueble = mysqli_query($conexion, $get_id) or die("Error consultando id del inmueble");
$fila = mysqli_fetch_array($resultado_inmueble);
$id_inmueble= $fila[id_inm];

//ahora añado a la tabla
//necesito el id del inmueble, no el codigo
foreach ($sub_inmuebles as $inmueble_temporal){
    $insercion = "INSERT INTO `din_divisiones_inmuebles` (`DIN_PADRE`, `DIN_HIJO`) VALUES ('$id_inmueble', '$inmueble_temporal')";
    mysqli_query($conexion, $insercion) or die("Error en la insercion de la relacion");
}