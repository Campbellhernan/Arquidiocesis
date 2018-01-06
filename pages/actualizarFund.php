<?php
	require_once('../librerias/conexion.php');
	
	$conexion = conectar();
	
	$id_fund = $_REQUEST['id_fund'];
	$nom_fund = $_REQUEST['nom_fund'];
	
	$query = "update fundacion set nom_fund = '$nom_fund' where id_fund = $id_fund";
	mysqli_query($conexion, $query);
?>