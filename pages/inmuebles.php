<?php
	session_start();

	if(!isset($_SESSION['usuario']))
		header('location: login.php');

	include('../librerias/utiles.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Buscador de documentos de Curea Arquidiocesana</title>

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
                    <div style="margin-top:10px;"><img src="../inmueble.png" /><h1 class="page-header" style="color:#5d5d89">Inmuebles</h1></div>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->

            <div class="row">
                <div class="col-lg-12" id="lista">
                    <?php include 'listaInmuebles.php'; ?>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
		</div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

	<div id="dialog-form" title="Nuevo Inmueble">
		<p class="validateTips">Todos los campos son requeridos.</p>
		<form role="form" id="form1">
			<div id="ubicacion" style="margin-bottom:30px;">
				<div style="display:inline-table; width:49%;">
					<p><label>Administrador</label></p>
					<select name="archiprestazgo" id="archiprestazgo" class="form-control">
						<option value="ningun">Seleccionar</option>
						<?php include 'selectArchiprestazgos.php'; ?>
					</select>
				</div>
				<div style="display:inline-table; width:49%;">
					<p><label>Parroquia</label></p>
					<select name="parroquia" id="parroquia" class="form-control">
						<option value="ningun">Seleccionar...</option>
					</select>
				</div>
			</div>
			<!-- / ubiacion -->
			<div class="form-group">
				<label>Direccion</label>
				<input id="direccion" name="direccion" placeholder="Direccion" class="form-control">
			</div>
			<div class="form-group">
				<p><label>Modo de Adquisicion</label></p>
				<input id="mod_adq" name="mod_adq" class="form-control" placeholder="Modo de Adquisicion">
			</div>
			<div class="form-group">
				<label>Metraje</label>
				<input id="metraje" name="metraje" class="form-control" placeholder="Metraje">
			</div>
			<div class="form-group">
				<label>Tipo de inmueble</label>
				<input id="tipo_inm" name="tipo_inm" class="form-control" placeholder="Tipo de Inmueble">
			</div>
			<div class="form-group">
				<label>Linderos</label>
				<textarea id="linderos" name="linderos" class="form-control" rows="3"></textarea>
			</div>
			<div class="form-group">
				<label>Descripcion</label>
				<textarea id="descripcion" name="descripcion" class="form-control" rows="3"></textarea>
			</div>
			<button type="reset" class="btn btn-default">Borrar</button>
		</form>
	</div>

	<div id="dialog-form-document" enctype="multipart/form-data" title="Nuevo documento">
		<p class="validateTips">Todos los campos son requeridos.</p>
		<form role="form" id="form_doc">
			<div class="form-group">
				<label>Codigo</label>
				<input id="cod_doc" name="cod_doc" class="form-control" placeholder="Codigo">
			</div>
			<div class="form-group">
				<label>Tipo</label>
				<select id="tipo" name="tipo" class="form-control" >
					<?php obtTiposDocs(); ?>
				</select>
			</div>

			<div id="fecha" style="margin-bottom:30px;">
				<div style="display: inline-block; width:32%;">
					<p><label>Dia</label></p>
					<select name="dia" id="dia" class="form-control">
						<option value="ningun">Todos</option>
						<?php
							for($i = 1; $i <= 31; $i++)
							{
								echo "<option value='$i'>$i</option>\n";
							}
						?>
					</select>
				</div>
				<div style="display: inline-block; width:32%;">
					<p><label>Mes</label></p>
					<select name="mes" id="mes" class="form-control">
						<option value="ningun">Todos</option>
						<?php
							$Arraymeses = obtArrayMeses();

							for($i = 0; $i < 12; $i++)
							{
								echo "<option value='".($i+1)."'>".$Arraymeses[$i]."</option>\n";
							}
						?>
					</select>
				</div>
				<div style="display: inline-block; width:32%;">
					<p><label>Año</label></p>
					<select name="anyo" id="anyo" class="form-control">
						<option value="ningun">Todos</option>
						<?php
							$anyoActual = obtAnyoAct();

							for($i = 1900; $i <= $anyoActual; $i++)
							{
								echo "<option value='$i'>$i</option>\n";
							}
						?>
					</select>
				</div>
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

	<div id="mostrarDocs" title="Documentos">

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

	<!-- Borrar Inmueble -->
    <script src="../js/del_inm.js"></script>

	<!-- Modal ver documentos -->
	<script src="../js/modal-doc-list.js"></script>

	<!-- Modal nuevo documento -->
	<script src='../js/modal-doc-new-to-inm.js'></script>

	<!-- Modal nuevo inmueble -->
	<script src='../js/modal-inm-new.js'></script>

	<!--Paginadorr -->
	<script src='../js/paginador.js'></script>

</body>

</html>
