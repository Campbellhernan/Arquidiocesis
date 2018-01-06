<?php
	session_start();

	if(!isset($_SESSION['usuario']))
		header('location: login.php');

	include('../librerias/conexion.php');
	include('../librerias/utiles.php');

	$conexion = conectar();

	$id_doc = $_REQUEST['id_doc'];
	$consulta = "select id_inm, cod_inm, descripcion, modo_adq, direccion, metraje, tipo_inm, linderos from inmueble, se_refiere where (id_docf = '$id_doc') And (id_inm = id_inmfff) ";

	$registros = mysqli_query($conexion, $consulta) or die('errorr');

	if(mysqli_num_rows($registros) > 0)
	{
		echo "<div class='row'>
				<div class='col-lg-12'>";
		while($fila = mysqli_fetch_array($registros))
		{
			echo	"<div class='panel panel-primary'>
						<div class='panel-heading'>
						<span style='font-weight:bold'>Codigo del inmueble:</span> ".$fila['cod_inm'];
			if($_SESSION['rol']=='Administrador'){
				echo	"<a class='del-inm-from-doc' data-inm='".$fila['id_inm']."' href='#' style='margin-left:15px;'><img src='../papelera.jpg' width='24px' height='24px' alt='Eliminar Inmueble de este documento'></a>";
			}
			echo		"</div>
						<!-- /.panel-heading -->
						<div class='panel-body'>
							<!-- Tab panes -->
							<div class='tab-content'>
								<div class='tab-pane fade in active'>
									<p><span style='font-weight:bold'>Descripcion:</span> ".$fila['descripcion']."</p>
									<p><span style='font-weight:bold'>Modo de adquisicion:</span> ".$fila['modo_adq']."</p>
									<p><span style='font-weight:bold'>Direccion:</span> ".$fila['direccion']."</p>
									<p><span style='font-weight:bold'>Metraje:</span> ".$fila['metraje']."</p>
									<p><span style='font-weight:bold'>Tipo:</span> ".$fila['tipo_inm']."</p>
									<p><span style='font-weight:bold'>Linderos:</span> ".$fila['linderos']."</p>
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
					Este documento no posee inmuebles
				 </div>";
	}
?>
