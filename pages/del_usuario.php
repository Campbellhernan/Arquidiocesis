<?php
	session_start();
	
	if(!isset($_SESSION['usuario']))
		header('location: login.php');

	include('../librerias/conexion.php');
	$conexion = conectar();
	
	$login = $_REQUEST['login'];
	
	mysqli_query($conexion, "delete from usuario where login = '$login'");
?>