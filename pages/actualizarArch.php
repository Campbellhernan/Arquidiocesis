<?php
require_once('../librerias/conexion.php');

$conexion = conectar();

$id_arch = $_REQUEST['id_arch'];
$nom_arch = $_REQUEST['nom_arch'];

$query = "update archiprestazgo set nom_arch = '$nom_arch' where id_arch = $id_arch";
mysqli_query($conexion, $query);
