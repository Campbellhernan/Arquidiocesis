<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
$conexion = conectar();

$id_parro = $_REQUEST['id_parro'];

mysqli_query($conexion, "delete from parroquia where id_parro = $id_parro");
