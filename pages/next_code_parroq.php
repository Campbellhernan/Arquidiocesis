<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
$conexion = conectar();

$archiprestazgo = $_REQUEST['archiprestazgo'];

if (!$archiprestazgo) {
    echo '-';
    return;
}

$select = mysqli_query($conexion, "SELECT COUNT(`id_parro`) as total FROM `parroquia` WHERE `id_archif` = $archiprestazgo") or die('Problemas con la consulta');
$total = mysqli_fetch_assoc($select);

echo $next_code = str_pad($total["total"] + 1, 2, "0", STR_PAD_LEFT);
