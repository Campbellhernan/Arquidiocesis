<?php
	session_start();
	if(!isset($_SESSION['usuario']))
		header('location: login.php');
	
	require_once('../librerias/conexion.php');
	$conexion = conectar();
	
	$id_inm = $_REQUEST['elem'];
	
	$registros = mysqli_query($conexion, "select id_inm from inmueble where id_inm = $id_inm");
	
	
	if(mysqli_num_rows($registros) > 0) {
		$obj['rep'] = true;
	}
	else {
		$obj['rep'] = false;
	}
	
	echo json_encode($obj);
	//echo 0;
?>