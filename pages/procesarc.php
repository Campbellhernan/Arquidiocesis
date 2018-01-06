<?php
    require_once '../librerias/conexion.php';
    $conexion = conectar();

	$consulta_base = "select * from documento, inmueble where (cod_inm = cod_inmf)";
	//comprueba si ya se ha enviado el formulario
	if(isset($_REQUEST['anyo']))
	{
		if($_REQUEST['anyo'] != 'ningun')
		{
			$anyo = $_REQUEST['anyo'];
			$consulta_base .= " And (anyo = $anyo)";
		}

		if($_REQUEST['mes'] != 'ningun')
		{
			$mes = $_REQUEST['mes'];
			$consulta_base .= " And (mes = $mes)";
		}

		if($_REQUEST['dia'] != 'ningun')
		{
			$dia = $_REQUEST['dia'];
			$consulta_base .= " And (dia = $dia)";
		}

		if($_REQUEST['archiprestazgo']!= "ningun")
		{
			$archiprestazgo = $_REQUEST['archiprestazgo'];
			$consulta_base .= " And (nom_arch = '$archiprestazgo')";

			if($_REQUEST['parroquia'] != "ningun")
			{
				$parroquia = $_REQUEST['parroquia'];
				$consulta_base .= " And (nom_parro = '$parroquia')";
			}
		}

		if(isset($_REQUEST['tipo_documento']))
		{
			$i = 1;
			$consulta_base .= " And (";
			foreach ($_REQUEST['tipo_documento'] as $tipo)
			{
				if($i > 1)
				{
					$consulta_base .= " Or ";
				}
				$consulta_base .= "tipo = '$tipo'";
				$i++;
			}
			$consulta_base .= ")";
		}
	}
	echo "<p>consulta ejecutada: $consulta_base</p>";

	$registros = mysqli_query($conexion, $consulta_base) or die('errorr');
	$paridad = true;

	echo "<P>Resultados encontrados ".mysqli_num_rows($registros)."</p>";
	while($fila = mysqli_fetch_array($registros))
	{

		echo	"<div class='col-lg-6'>
                    <div class='panel panel-primary'>
                        <div class='panel-heading'><span style='font-weight:bold'>Codigo del documento:</span> ".$fila['cod_doc']."</div>
                        <!-- /.panel-heading -->
                        <div class='panel-body'>
                            <!-- Tab panes -->
                            <div class='tab-content'>
                                <div class='tab-pane fade in active' id='home-pills'>
                                    <h4>".$fila['dia']." de ".$fila['mes']." del ".$fila['anyo']."</h4>
                                    <p><span style='font-weight:bold'>CodInm:</span> ".$fila['cod_inmf']."</p>
									<p><span style='font-weight:bold'>Tipo:</span> ".$fila['tipo']."</p>
                                    <p><span style='font-weight:bold'>Descripción:</span> ".$fila['descripcion']."</p>
                                </div>
								<button id='' data-state='0' type='button' name='btnMas' class='btn btn-primary'>Ver mas</button>
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
						if($(this).data('state') == '0')
						{
							$(this).empty().html('ver menos');
							$(this).parent().append('<p>hola</p>');
							$(this).data('state', '1');
						}
						else
						{
							$(this).empty().html('Ver mas');
							$(this).parent().children('p').remove();
							$(this).data('state', '0');
						}
					});
				</script>";
?>
