<?php
	require_once("../librerias/conexion.php");
	$conexion = conectar();
	$login = $_REQUEST['usuario'];
	
	$registros = mysqli_query($conexion, "select * from usuario where login = '$login'");
	
	if(mysqli_num_rows($registros) > 0)
	{
		$fila = mysqli_fetch_array($registros);
		
		if($fila['password'] == $_REQUEST['pass'])
		{
			session_start();
			//$_SESSION['usuario'] = $login;
			$_SESSION['usuario'] = $login;
			$_SESSION['rol'] = $fila['rol'];
			header('location: index.php');
		}
		else
		{
			header('location: login.php?error=1');
		}
	}
	else
	{
		header('location: login.php?error=1');
	}
	
	session_start();
	
?>