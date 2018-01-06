<?php
session_start();

if(!isset($_SESSION['usuario']))
	header('location: login.php');

include('../librerias/utiles.php');
include('../librerias/conexion.php');

$_SESSION['ultima_consulta'] = "select id_doc, tipo, datos_registro, abogado_redactor from documento";
$_SESSION['ultima_pagina'] = 1;

?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Bootstrap Admin Theme</title>

    <!-- Bootstrap Core CSS -->
    <link href="../bower_components/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- MetisMenu CSS -->
    <link href="../bower_components/metisMenu/dist/metisMenu.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../dist/css/sb-admin-2.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="../bower_components/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
	
	<!--  Jquery-ui css  -->
    <link rel="stylesheet" href="../jquery-ui/jquery-ui.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php" style="color:#5d5d89">Documentos Curea de Valencia</a>
            </div>
            <!-- /.navbar-header -->

            <ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-user fa-fw"></i> User Profile</a>
						</li>
						<li><a href="#"><i class="fa fa-gear fa-fw"></i> Settings</a>
						</li>
						<li class="divider"></li>
						<li><a href="login.html"><i class="fa fa-sign-out fa-fw"></i> Logout</a>
						</li>
					</ul>
					<!-- /.dropdown-user -->
				</li>
				<!-- /.dropdown -->
			</ul>
            <!-- /.navbar-top-links -->

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="index.php"><i class="fa fa-search fa-fw"></i> Busqueda</a>
                        </li>
						<li>
                            <a href="inmuebles.php"><i class="fa fa-home fa-fw"></i> Cargar Datos</a>
                        </li>
						<li>
                            <a href="archi_parroq.php"><i class="fa fa-home fa-fw"></i> Archiprestazgos y Parroquias</a>
                        </li>
						<li>
                            <a href="fundaciones.php"><i class="fa fa-home fa-fw"></i> Fundaciones y Asociaciones Civiles</a>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <div style="margin-top:10px;"><img src="../search.jpg" /><h1 class="page-header" style="color:#5d5d89">Buscar Documentos</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-heading" style="color:#5CB85C;">
                            Seleccione sus parametros de busqueda
                        </div>
                        <div class="panel-body">
							<!-- Nav tabs -->
                            <ul class="nav nav-tabs">
                                <li class="active"><a href="#documentos" data-toggle="tab">Documentos</a>
                                </li>
                                <li><a href="#direcciones" data-toggle="tab">Direcciones</a>
                                </li>
                            </ul>
							
							<!-- Tab panes -->
                            <div class="tab-content">
                                <div class="tab-pane fade in active" id="documentos">
									<?php include('documentos.php'); ?>
                                </div>
                                <div class="tab-pane fade" id="direcciones">
                                    <h4>Profile Tab</h4>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
                <!-- /.col-lg-12 -->
            </div>
        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	<div id="dialog-form-document" enctype="multipart/form-data" title="Nuevo documento">
		<p class="validateTips">Todos los campos son requeridos.</p>
		<form role="form" id="form_doc_new">
			<div class="form-group">
				<label>Codigo</label>
				<input id="id_doc" name="id_doc" class="form-control" placeholder="Codigo">
			</div>
			<div class="form-group">
				<label>Tipo</label>
				<select id="tipo" name="tipo" class="form-control" >
					<option value="Compra-Venta">Compra-Venta</option>
					<option value="Sesion o traspaso">Sesion o traspaso</option>
					<option value="Donaciones">Donaciones</option>
					<option value="Permutas">Permutas</option>
					<option value="Titulo Supletorio">Titulo Supletorio</option>
					<option value="Notas Aclaratorias">Notas Aclaratorias</option>
					<option value="Testamento">Testamento</option>
					<option value="Liquidacion de Hipotecas">Liquidacion de Hipotecas</option>
					<option value="Adjudicacion">Adjudicacion</option>
					<option value="Liquidacion y parte de bienes">Liquidacion y parte de bienes</option>
					<option value="Otros">Otros</option>
				</select>
			</div>
			
			<div class="form-group">
				<label>Fecha</label>
				<input type="text" id="fechaPicker" name="fechaPicker">
				<input type="hidden" id="fecha" name="fecha">
			</div>
			<!-- / fecha -->
			
			<div class="form-group">
				<label>Datos de Registro</label>
				<input id="dat_reg" name="dat_reg" class="form-control" placeholder="Datos de Registro">
			</div>
			
			<div class="form-group">
				<label>Abogado Redactor</label>
				<input id="abog_redc" name="abog_redc" class="form-control" placeholder="Abogado Redactor">
			</div>
			<!-- ADD -->
			<div class="form-group">
				<label>Documento</label>
				<input type="file" id="archivo_doc" name="archivo_doc">
			</div>
			<button type="reset" class="btn btn-default">Borrar</button>
		</form>
	</div>
	
	<div id="dialog-edit-document">
		<p class="validateTips">Todos los campos son requeridos.</p>
		<form role="form" id="form_doc_edit">
			<div class="form-group">
				<label>Codigo</label>
				<span id='id_doc_edit'></span>
				<input type="hidden" name="id_doc" id="id_doc_hidden">
			</div>
			<div class="form-group">
				<label>Tipo</label>
				<select id="tipo_edit" name="tipo" class="form-control" >
					<option value="Compra-Venta">Compra-Venta</option>
					<option value="Sesion o traspaso">Sesion o traspaso</option>
					<option value="Donaciones">Donaciones</option>
					<option value="Permutas">Permutas</option>
					<option value="Titulo Supletorio">Titulo Supletorio</option>
					<option value="Notas Aclaratorias">Notas Aclaratorias</option>
					<option value="Testamento">Testamento</option>
					<option value="Liquidacion de Hipotecas">Liquidacion de Hipotecas</option>
					<option value="Adjudicacion">Adjudicacion</option>
					<option value="Liquidacion y parte de bienes">Liquidacion y parte de bienes</option>
					<option value="Otros">Otros</option>
				</select>
			</div>
			
			<div class="form-group">
				<label>Fecha</label>
				<input type="text" id="fecha_edit" name="fechaPicker">
				<input type="hidden" id="fecha_edit_hidden" name="fecha">
			</div>
			<!-- / fecha -->
			
			<div class="form-group">
				<label>Datos de Registro</label>
				<input id="dat_reg_edit" name="dat_reg" class="form-control" placeholder="Datos de Registro">
			</div>
			
			<div class="form-group">
				<label>Abogado Redactor</label>
				<input id="abog_redc_edit" name="abog_redc" class="form-control" placeholder="Abogado Redactor">
			</div>
			<!-- ADD -->
			<div class="form-group">
				<label>Documento</label>
				<input type="file" id="archivo_doc_edit" name="archivo_doc">
			</div>
			<button type="reset" class="btn btn-default">Borrar</button>
		</form>
	</div>
    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>
	
	<!-- Jquery-UI -->
	<script src="../jquery-ui/jquery-ui.js"></script>
	
    <!-- Archiprestazgos y parroquias -->
    <script src="../js/archiParro.js"></script>
	
	<!-- index.js -->
	<script src="../js/index.js"></script>
	
	<!-- modal-doc-new.js -->
	<script src="../js/modal-doc-new.js"></script>
	
	<!-- modal-doc-new.js -->
	<script src="../js/fechaDoc.js"></script>
	
	<!-- modal-doc-new.js -->
	<script src="../js/paginadorDoc.js"></script>
	
	<!-- modal-doc-new.js -->
	<script src="../js/cambiarFilasPPDoc.js"></script>
	
	<!-- edit_doc.js -->
	<script src="../js/edit_doc.js"></script>
</body>

</html>
