<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
$conexion = conectar();

$nom_arch = $_REQUEST['nom_arch'];
$cod_arch = $_REQUEST['cod_arch'];

$consulta = "insert into archiprestazgo (cod_arch, nom_arch) values ('$cod_arch', '$nom_arch')";

mysqli_query($conexion, $consulta) or die("Error de insercion en la base de datos");
