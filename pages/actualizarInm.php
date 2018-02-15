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
$contador_hijos_edit = $_REQUEST['contador_hijos_edit'];

$hijos = array();
for($i=0; $i <= $contador_hijos_edit; $i++){
    $hijos[] = $_REQUEST['sub_inmueble_select_edit_'.$i];
}

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

$get_ids = "SELECT `DIN_ID` FROM `din_divisiones_inmuebles` WHERE DIN_PADRE = '$id_inm'";
$resultado_hijos = mysqli_query($conexion, $get_ids) or die("Error consultando id del inmueble");
//$fila_para_hijos = mysqli_fetch_array($resultado_hijos);
$ids_relaciones_inmuebles = array();
while($id_relacion_inmueble_temporal = mysqli_fetch_array($resultado_hijos)){
    $ids_relaciones_inmuebles[] = $id_relacion_inmueble_temporal['DIN_ID'];
}
//ahora a�ado a la tabla
//necesito el id dmysqli_query($conexion, $get_ids)el inmueble, no el codigo
$indice = 0;
foreach ($hijos as $inmueble_temporal){
    if($ids_relaciones_inmuebles[$indice]!=null) {
        $actualizacion = "UPDATE `din_divisiones_inmuebles` SET DIN_PADRE = $id_inm, DIN_HIJO = $inmueble_temporal WHERE DIN_ID = $ids_relaciones_inmuebles[$indice]";
    }else{
        $actualizacion = "INSERT INTO `din_divisiones_inmuebles` (`DIN_PADRE`, `DIN_HIJO`) VALUES ('$id_inm', '$inmueble_temporal')";
    }
    $new_cod_inm = $cod_inm."-".str_pad($indice + 1, 3, "0", STR_PAD_LEFT);
    $UptCode = "UPDATE INMUEBLE SET COD_INM = '$new_cod_inm' WHERE ID_INM = '$inmueble_temporal' ";
    echo json_encode($inmueble_temporal);
    mysqli_query($conexion, $actualizacion) or die("Error en la insercion de la relacion");
    mysqli_query($conexion, $UptCode) or die(mysqli_error($conexion));
    $indice++;
}
//tengo que verificar si el hijo esta en el array