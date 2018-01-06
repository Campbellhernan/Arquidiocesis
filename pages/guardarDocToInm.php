<?php
	session_start();
	
	if(!isset($_SESSION['usuario']))
		header('location: login.php');
	
	include('../librerias/conexion.php');
	$conexion = conectar();
	
	$cod_doc 	= $_REQUEST['cod_doc'];	
	$tipo 		= $_REQUEST['tipo'];
	$dia 		= $_REQUEST['dia'];
	$mes 		= $_REQUEST['mes'];
	$anyo 		= $_REQUEST['anyo'];
	$dat_reg 	= $_REQUEST['dat_reg'];
	$abog_redc 	= $_REQUEST['abog_redc'];
	$id_inm		= $_REQUEST['id_inm'];

	$consulta = "insert into documento (id_doc, tipo, dia, mes, anyo, datos_registro, abogado_redactor)
				values ('$cod_doc', '$tipo', '$dia', '$mes', '$anyo', '$dat_reg', '$abog_redc')";
	
	//ADD	
 
    //comprobamos si existe un directorio para subir el archivo
    //si no es así, lo creamos
     
    move_uploaded_file($_FILES['archivo_doc']['tmp_name'],"C:/wamp/www/sc/pdf/".$cod_doc.".pdf");
	//FIN ADD
	
	mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
	
	 	
	$consulta = "insert into se_refiere (id_docf, id_inmfff) values ('$cod_doc', $id_inm)";
	mysqli_query($conexion, $consulta) or die(mysqli_error($conexion));
?>