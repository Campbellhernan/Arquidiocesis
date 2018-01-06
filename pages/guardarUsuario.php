<?php
	session_start();
	
	if(!isset($_SESSION['usuario']))
		header('location: login.php');
	
	include('../librerias/conexion.php');
	$conexion = conectar();
	
	$login = $_REQUEST['login'];
	$password = $_REQUEST['password'];
	$rol = $_REQUEST['rol'];

	$consulta = "insert into usuario (login, password, rol, filasPP, abrirBusqDoc, filasPPInm, filasPPArch, filasPPFund, filasPPUsuario, abrirBusqInm) 
					values ('$login', '$password', '$rol', 10, 1, 10, 10, 10, 10, 1)";
	
	mysqli_query($conexion, $consulta) or die("Error de insercion en la base de datos");
?>