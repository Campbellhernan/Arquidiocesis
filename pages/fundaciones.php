<?php
	session_start();
	
	if(!isset($_SESSION['usuario']))
		header('location: login.php');

	include('../librerias/mensajes.php');
	include('../librerias/utiles.php');
	include('../librerias/conexion.php');
	
	$_SESSION['ultima_consulta_fundacion'] = "select * from fundacion";
	$_SESSION['ultima_pagina_fundacion'] = 1;
?>
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo TITULO; ?></title>

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
                <a class="navbar-brand" href="index.php" style="color:#5d5d89"><?php echo TITULO_INNER; ?></a>
            </div>
            <!-- /.navbar-header -->
			<ul class="nav navbar-top-links navbar-right">
				<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="fa fa-user fa-fw"></i>  <i class="fa fa-caret-down"></i>
					</a>
					<ul class="dropdown-menu dropdown-user">
						<li><a href="#"><i class="fa fa-user fa-fw"></i> Perfil</a>
						</li>
						<li><a href="#"><i class="fa fa-gear fa-fw"></i> Configuraciones</a>
						</li>
						<li class="divider"></li>
						<li><a href="cerrarSesion.php"><i class="fa fa-sign-out fa-fw"></i> Cerrar Sesion</a>
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
                            <a href="index.php"><i class="fa fa-search fa-fw"></i> Documentos e Inmuebles</a>
                        </li>
						<li>
                            <a href="archi_parroq.php"><i class="fa fa-university fa-fw"></i> Archiprestazgos y Parroquias</a>
                        </li>
						<li>
                            <a href="fundaciones.php"><i class="fa fa-users fa-fw"></i> Fundaciones y Asociaciones Civiles</a>
                        </li>
						<li>
                            <a href="#"><i class="fa fa-bar-chart-o fa-fw"></i> Administración<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <?php if($_SESSION['rol']=='Administrador'){//tiene permiso para agregar Inmueble
								?>
								<li>
                                    <a href="usuarios.php">Usuarios</a>
                                </li>
								<?php } ?>
								<li>
                                    <a href="cambContra.php">Cambiar Contraseña</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
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
                    <div style="margin-top:10px;"><img src="../fundacion.jpg" /><h1 class="page-header" style="color:#5d5d89">Fundaciones y Asociaciones Civiles</h1></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

			<div class="row">
                <div class="col-lg-12">
					<div class="panel panel-success" style="border-left:none; border-right:none;">
						<div class="panel-heading" style="border-left:1px #DDD solid; border-right:1px #DDD solid;">
							<?php if($_SESSION['rol']=='Administrador'){//tiene permiso para agregar fundacion
							?>
							<button id='create-fund' style='color:black' class='btn btn-primary'>Crear Nuevo</button>
							<?php } ?>
							<select name="filasPPFund" id="filasPPFund" style="width:80px">
								<option value="5">5</option>
								<option value="10">10</option>
								<option value="20">20</option>
								<option value="50">50</option>
								<option value="100">100</option>
								<!--<option value="0">Todos</option>-->
							</select>
						</div>
						<div class="panel-body">
							<div class="row">
								<div class="col-lg-12" id="mostrarFundaciones">
									<?php require_once('listarFundaciones.php'); ?>
								</div>
							</div>
						</div>
					</div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->
	
	<div id="dialog-new-fundacion" title="Nueva Fundacion">
		<p class="validateTips">Todos los campos son requeridos.</p>
		<form role="form" id="form_fund_new">
			<div class="form-group">
				<p><label>Nombre</label></p>
				<input id="nom_fund" name="nom_fund" class="form-control" placeholder="Nombre">
			</div>
			<button type="reset" class="btn btn-default">Borrar</button>
		</form>
	</div>
	
	<div id="dialog-edit-fundacion" title="Editar Fundacion">
		<p class="validateTips">Todos los campos son requeridos.</p>
		<form role="form" id="form_fund_edit">
			<div class="form-group">
				<label>Codigo</label>
				<span id='id_fund_edit'></span>
				<input type="hidden" name="id_fund" id="id_fund_hidden">
			</div>
			<div class="form-group">
				<label>Nombre</label>
				<input id="nom_fund_edit" name="nom_fund" class="form-control">
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
	
	<!-- modal-doc-new.js -->
	<script src="../js/modal-fund-new.js"></script>
	
	<!-- modal-doc-new.js -->
	<script src="../js/paginadorFund.js"></script>
	
	<!-- modal-doc-new.js -->
	<script src="../js/cambiarFilasPPFund.js"></script>
	
	<!-- edit_doc.js -->
	<script src="../js/edit_fund.js"></script>
	
</body>

</html>
