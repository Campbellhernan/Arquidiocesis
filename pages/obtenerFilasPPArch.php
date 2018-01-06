<?php
	session_start();
	
	if(!isset($_SESSION['usuario']))
		header('location: login.php');
	
	require_once('../librerias/conexion.php');
	$conexion = conectar();
	$consultaFilasPP = mysqli_query($conexion, "select filasPPArch from usuario where login = '".$_SESSION['usuario']."'");
	$getFilasPP = mysqli_fetch_array($consultaFilasPP);
			
	$filasPP = $getFilasPP['filasPPArch'];
	
	echo "$filasPP";
?>