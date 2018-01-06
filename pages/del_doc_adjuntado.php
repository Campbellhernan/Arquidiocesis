<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/utiles.php');

$id_doc = $_REQUEST['id_doc'];
$name = $_REQUEST['name'];

$file = "uploads/documentos/" . $id_doc . "/" . $name;

if (is_file($file)) {
	unlink($file);
}
