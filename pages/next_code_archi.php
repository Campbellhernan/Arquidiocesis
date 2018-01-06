<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
$conexion = conectar();

$select = mysqli_query($conexion, "SELECT COUNT(`id_arch`) as total FROM `archiprestazgo`") or die('Problemas con la consulta');
$total = mysqli_fetch_assoc($select);

echo str_pad($total["total"] + 1, 2, "0", STR_PAD_LEFT);
