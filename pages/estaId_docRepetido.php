<?php
	session_start();
	if(!isset($_SESSION['usuario']))
		header('location: login.php');
	
	require_once('../librerias/conexion.php');
	$conexion = conectar();
	
	$id_doc = $_REQUEST['elem'];
	
	$registros = mysqli_query($conexion, "select id_doc from documento where id_doc = '$id_doc'");
	
	
	if(mysqli_num_rows($registros) > 0) {
		$obj['rep'] = true;
	}
	else {
		$obj['rep'] = false;
	}
	
	echo json_encode($obj);
	//echo 0;
?>