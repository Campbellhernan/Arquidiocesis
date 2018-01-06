<?php
	session_start();
	
	if(!isset($_SESSION['usuario']))
		header('location: login.php');

	include('../librerias/conexion.php');
	$conexion = conectar();
	
	$id_fund = $_REQUEST['id_fund'];
	
	mysqli_query($conexion, "delete from fundacion where id_fund = $id_fund");
?>