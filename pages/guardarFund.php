<?php
	session_start();
	
	if(!isset($_SESSION['usuario']))
		header('location: login.php');
	
	include('../librerias/conexion.php');
	$conexion = conectar();
	
	$nom_fund = $_REQUEST['nom_fund'];
	
	$consulta = "insert into fundacion (nom_fund) values ('$nom_fund')";
	
	mysqli_query($conexion, $consulta) or die("Error de insercion en la base de datos");
?>