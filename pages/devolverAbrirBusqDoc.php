<?php
	session_start();
	if(!isset($_SESSION['usuario']))
		header('location: login.php');
	
	require_once('../librerias/conexion.php');
	$conexion = conectar();
	
	$registros = mysqli_query($conexion, "select abrirBusqDoc from usuario where login = '".$_SESSION['usuario']."'");
	$fila = mysqli_fetch_array($registros);
	
	if($fila['abrirBusqDoc'] == 1)
	{
		$obj['mantAb'] = true;
	}
	else
	{
		$obj['mantAb'] = false;
	}
	
	echo json_encode($obj);
	//echo 0;
?>