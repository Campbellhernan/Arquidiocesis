<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
$conexion = conectar();

$id_arch = $_REQUEST['id_arch'];

mysqli_query($conexion, "delete from archiprestazgo where id_arch = $id_arch");
