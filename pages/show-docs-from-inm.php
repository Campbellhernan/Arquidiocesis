<?php
	session_start();

	if(!isset($_SESSION['usuario']))
		header('location: login.php');

	include('../librerias/conexion.php');
	include('../librerias/utiles.php');

	$conexion = conectar();

	$id_inm = $_REQUEST['id_inm'];
	$consulta = "select id_doc, cod_doc, tipo, datos_registro, abogado_redactor, descripcion from documento, se_refiere where (id_inmfff = '$id_inm') And (id_doc = id_docf)";

	$registros = mysqli_query($conexion, $consulta) or die('errorr');

	if(mysqli_num_rows($registros) > 0)
	{
		echo "<div class='row'>
				<div class='col-lg-12'>";
		while($fila = mysqli_fetch_array($registros))
		{
			echo	"<div class='panel panel-primary'>
						<div class='panel-heading'>
						<span style='font-weight:bold'>Codigo del documento:</span> ".$fila['cod_doc'];
			if($_SESSION['rol']=='Administrador'){
				echo	"<a class='del-doc-from-inm' data-doc='".$fila['id_doc']."' href='#' style='margin-left:15px;'><img src='../papelera.jpg' width='24px' height='24px' alt='Eliminar documento de este Inmueble'></a>";
			}
			echo		"</div>
						<!-- /.panel-heading -->
						<div class='panel-body'>
							<!-- Tab panes -->
							<div class='tab-content'>
								<div class='tab-pane fade in active'>
									<p><span style='font-weight:bold'>Tipo:</span> ".$fila['tipo']."</p>
									<p><span style='font-weight:bold'>Datos de registro:</span> ".$fila['datos_registro']."</p>
									<p><span style='font-weight:bold'>Abogado redactor:</span> ".$fila['abogado_redactor']."</p>
									<p><span style='font-weight:bold'>Descripción:</span> ".$fila['descripcion']."</p>
								</div>
							</div>
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->";
		}
		echo	"</div>
				 </div>";

		//echo	"<script src='../js/del-inm-from-doc.js'></script>";
		/*echo 		"<script type='text/javascript'>
						$(\"button[name='btnMas']\").click(function (){
							var url = '../pdf/'+$(this).data('doc')+'.pdf';
							window.open(url, '', '');
						});
					</script>";*/
	}
	else
	{
		echo	"<div>
					Este inmueble no posee documentos
				 </div>";
	}
?>
