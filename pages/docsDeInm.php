<?php
	session_start();

	if(!isset($_SESSION['usuario']))
		header('location: login.php');

	include('../librerias/conexion.php');
	include('../librerias/utiles.php');

	$conexion = conectar();

	$id_inm = $_REQUEST['id_inm'];
	$consulta = "select id_doc, cod_doc, tipo, dia, mes, anyo, datos_registro, abogado_redactor, descripcion from documento, se_refiere where (id_doc = id_docf) And (id_inmfff = $id_inm)";

	$registros = mysqli_query($conexion, $consulta) or die('errorr');

	while($fila = mysqli_fetch_array($registros))
	{
		$mes = obtMes($fila['mes']);
		echo	"<div class='col-lg-12'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'><span style='font-weight:bold'>Codigo del documento:</span> ".$fila['cod_doc']."</div>
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
                            <!-- Tab panes -->
                            <div class='tab-content'>
                                <div class='tab-pane fade in active' id='home-pills'>
                                    <h4>".$fila['dia']." de ".$mes." de ".$fila['anyo']."</h4>
									<p><span style='font-weight:bold'>Tipo:</span> ".$fila['tipo']."</p>
									<p><span style='font-weight:bold'>Datos de registro:</span> ".$fila['datos_registro']."</p>
									<p><span style='font-weight:bold'>Abogado redactor:</span> ".$fila['abogado_redactor']."</p>
									<p><span style='font-weight:bold'>Descripción:</span> ".$fila['descripcion']."</p>
                                </div>
								<button id='' data-doc='".$fila['id_doc']."' type='button' name='btnMas' class='btn btn-primary'>Ver PDF</button>
                            </div>
                        </div>
                        <!-- /.panel-body -->
                    </div>
                    <!-- /.panel -->
                </div>
				<!-- /.col-lg-6 -->";
	}
	echo 		"<script type='text/javascript'>
					$(\"button[name='btnMas']\").click(function (){
						var url = '../pdf/'+$(this).data('doc')+'.pdf';
						window.open(url, '', '');
					});
				</script>";
