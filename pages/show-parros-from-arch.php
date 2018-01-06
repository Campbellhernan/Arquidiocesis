<?php
	session_start();

	if(!isset($_SESSION['usuario']))
		header('location: login.php');

	include('../librerias/conexion.php');
	include('../librerias/utiles.php');

	$conexion = conectar();

	$id_arch = $_REQUEST['id_arch'];
	$consulta = "select * from parroquia where (id_archif = $id_arch) order by cod_parro";

	$registros = mysqli_query($conexion, $consulta) or die('errorr');

	if(mysqli_num_rows($registros) > 0)
	{
		echo "<div class='row'>
				<div class='col-lg-12'>";
		while($fila = mysqli_fetch_array($registros))
		{
			echo	"<div class='panel panel-primary'>
						<div class='panel-heading'>
						<span style='font-weight:bold'>Codigo de la parroquia:</span> ".$fila['cod_parro'];
			if(1==1) {
				echo	"<a class='del-parro-from-arch' data-parro='".$fila['id_parro']."' data-arch='".$fila['id_archif']."' href='#' style='margin-left:15px;'><img src='../papelera.jpg' width='24px' height='24px' alt='Eliminar parroquia de este archiprestazgo'></a>";
			}
			echo		"</div>
						<!-- /.panel-heading -->
						<div class='panel-body'>
							<!-- Tab panes -->
							<div class='tab-content'>
								<div class='tab-pane fade in active'>
									<p><span style='font-weight:bold'>Nombre:</span> ".$fila['nom_parro']."</p>
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
					Este Archiprestazgo no posee parroquias
				 </div>";
	}
