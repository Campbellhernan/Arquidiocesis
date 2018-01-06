<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
$conexion = conectar();

$tipo = $_REQUEST['tipo'];

if ($tipo == 'ningun') {
    echo '-';
    return;
}

$select = mysqli_query($conexion, "SELECT COUNT(`id_doc`) as total FROM `documento` WHERE `tipo` = $tipo") or die('Problemas con la consulta');
$total = mysqli_fetch_assoc($select);

$select = mysqli_query($conexion, "SELECT `codigo` FROM tipo_documento WHERE `id` = $tipo") or die('Problemas con la consulta');
$codes = mysqli_fetch_assoc($select);

$next_code = str_pad($total["total"] + 1, 4, "0", STR_PAD_LEFT);

echo $codes["codigo"] . "-" . $next_code;
