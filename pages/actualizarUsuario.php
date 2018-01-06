<?php
	require_once('../librerias/conexion.php');
	
	$conexion = conectar();
	
	$login = $_REQUEST['login'];
	$rol = $_REQUEST['rol'];
	
	$query = "update usuario set rol = '$rol' where login = '$login'";
	mysqli_query($conexion, $query);
?>