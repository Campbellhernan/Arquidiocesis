<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
$conexion = conectar();

$registros = mysqli_query($conexion, "select * from parroquia where id_archif = ".$_REQUEST['id_archif'] ." order by cod_parro") or die('Problemas con la consulta');

while($fila = mysqli_fetch_array($registros)) {
	$id_parro = $fila['id_parro'];
	$nom_parro = $fila['nom_parro'];
	$cod_parro = $fila['cod_parro'];

	echo "<option value='$id_parro'>$cod_parro - $nom_parro</option>\n";
}
