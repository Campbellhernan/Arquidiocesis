<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/utiles.php');

$id_inm = $_REQUEST['id_inm'];
$name = $_REQUEST['name'];

$file = "uploads/inmuebles/" . $id_inm . "/" . $name;

if (is_file($file)) {
	unlink($file);
}
