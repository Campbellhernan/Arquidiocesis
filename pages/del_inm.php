<?php
	session_start();
	
	if(!isset($_SESSION['usuario']))
		header('location: login.php');

	include('../librerias/conexion.php');
	$conexion = conectar();
	
	$id_inm = $_REQUEST['id_inm'];
	
	mysqli_query($conexion, "delete from inmueble where id_inm = $id_inm");
	mysqli_query($conexion, "delete from se_refiere where id_inmfff = $id_inm");
?>