<?php
	session_start();
	
	if(!isset($_SESSION['usuario']))
		header('location: login.php');
	
	include('../librerias/conexion.php');
	$conexion = conectar();
	
	
	$registros = mysqli_query($conexion, "select * from fundacion") or die('Problemas con la consulta');
	
	while($fila = mysqli_fetch_array($registros))
    {
		$id_fund = $fila['id_fund'];
		$nom_fund = $fila['nom_fund'];
		
		echo "<option value='$id_fund'>$nom_fund</option>\n";
	}

?>