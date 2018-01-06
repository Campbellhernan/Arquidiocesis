<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
$conexion = conectar();

$archiprestazgo = $_REQUEST['archiprestazgo'];
$parroquia = $_REQUEST['parroquia'];

if ($archiprestazgo == 'ningun' || $parroquia == 'ningun') {
    echo '-';
    return;
}

$select = mysqli_query($conexion, "SELECT COUNT(`id_inm`) as total FROM `inmueble` WHERE `archiprestazgo` = $archiprestazgo AND `parroquia` = $parroquia") or die('Problemas con la consulta');
$total = mysqli_fetch_assoc($select);

$select = mysqli_query($conexion, "SELECT `cod_arch`, `cod_parro` FROM archiprestazgo, parroquia WHERE `id_arch` = $archiprestazgo AND `id_parro` = $parroquia") or die('Problemas con la consulta');
$codes = mysqli_fetch_assoc($select);

$next_code = str_pad($total["total"] + 1, 4, "0", STR_PAD_LEFT);

echo $codes["cod_arch"] . "-" . $codes["cod_parro"] . "-" . $next_code;
