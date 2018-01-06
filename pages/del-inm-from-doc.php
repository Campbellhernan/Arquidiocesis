<?php
	session_start();
	
	if(!isset($_SESSION['usuario']))
		header('location: login.php');

	include('../librerias/conexion.php');
	include('../librerias/utiles.php');

	$conexion = conectar();
	
	$id_doc = $_REQUEST['id_doc'];
	$id_inm = $_REQUEST['id_inm'];
	
	$consulta = "delete from se_refiere where (id_docf = '$id_doc') And (id_inmfff = $id_inm)"; 
	
	mysqli_query($conexion, $consulta) or die('error');
	
?>