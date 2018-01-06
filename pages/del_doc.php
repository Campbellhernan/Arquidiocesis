<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/conexion.php');
include('../librerias/utiles.php');

$conexion = conectar();

$id_doc = $_REQUEST['id_doc'];

mysqli_query($conexion, "delete from documento where id_doc = '$id_doc'");

$folder = "uploads/documentos/" . $id_doc;

if (is_dir($folder)) {
	delete_folder($folder);
}
