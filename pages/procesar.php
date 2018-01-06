<?php
	session_start();

	if(!isset($_SESSION['usuario']))
		header('location: login.php');

	require_once('../librerias/conexion.php');
	require_once('../librerias/utiles.php');

	ob_start();

	$conexion = conectar();
	$esBusqueda = false;

	if(isset($_REQUEST['numPage']) or isset($_REQUEST['filasPP']) or isset($_REQUEST['edit_doc']))
	{
		if(isset($_REQUEST['numPage']))
		{
			$pagActual = $_REQUEST['numPage'];
			$_SESSION['ultima_pagina'] = $pagActual;
		}
		else
		{
			if(isset($_REQUEST['filasPP']))
			{
				$consultaFilasPP = mysqli_query($conexion, "select filasPP from usuario where login = '".$_SESSION['usuario']."'");
				$getFilasPP = mysqli_fetch_array($consultaFilasPP);

				$filasPPAnt = $getFilasPP['filasPP'];

				$filasPP = $_REQUEST['filasPP'];

				mysqli_query($conexion, "update usuario set filasPP = $filasPP where login = '".$_SESSION['usuario']."'");

				$primera_fila_de_ultima_pagina = ( ($_SESSION['ultima_pagina'] - 1) * $filasPPAnt ) + 1;

				$pagActual = ceil($primera_fila_de_ultima_pagina / $filasPP);

				$_SESSION['ultima_pagina'] = $pagActual;
			}
			else
			{
				$pagActual = $_SESSION['ultima_pagina'];
			}

		}

		$consulta_ejecutar = $_SESSION['ultima_consulta'];


	}
	else
	{
		$esBusqueda = true;
		$consulta_base = "select id_doc, cod_doc, tipo, datos_registro, abogado_redactor, descripcion from documento";
		$entro_inm = false;
		$where = "";

		//comprueba si ya se ha enviado el formulario
		if(isset($_REQUEST['tipo_documento']))
		{

			if($_REQUEST['tipo_documento'] != 'ningun')
			{
				$tipo = $_REQUEST['tipo_documento'];
				$where .= "(tipo = '$tipo')";
			}

			if($_REQUEST['desde'] != '' or $_REQUEST['hasta'] != '')
			{
				if($_REQUEST['desde'] == $_REQUEST['hasta'])
				{
					$desde = $_REQUEST['desde'];
					if($where != "")
					{
						$where .= " And ";
					}
					//$date = date_create_from_format("d-m-Y", "$desde");
					//$stringDate = date_format($date, 'Y-m-d');

					$where .= "(fecha = '$desde')";
				}
				else
				{
					if($_REQUEST['desde'] != '')
					{
						$desde = $_REQUEST['desde'];
						if($where != "")
						{
							$where .= " And ";
						}
						//$date = date_create_from_format("d-m-Y", $_REQUEST['desde']);
						//$stringDate = date_format($date, 'Y-m-d');

						$where .= "(fecha >= '$desde')";
					}

					if($_REQUEST['hasta'] != '')
					{
						$hasta = $_REQUEST['hasta'];
						if($where != "")
						{
							$where .= " And ";
						}
						//$date = date_create_from_format("d-m-Y", $_REQUEST['hasta']);
						//$stringDate = date_format($date, 'Y-m-d');

						$where .= "(fecha <= '$hasta')";
					}
				}
			}

			/*if($_REQUEST['archiprestazgo']!= "ningun")
			{
				$archiprestazgo = $_REQUEST['archiprestazgo'];

				$consulta_base .= ", se_refiere, inmueble";
				if($where != "")
				{
					$where .= " And ";
				}
				$where .= "(id_doc = id_docf) And (id_inm = id_inmfff)";
				$entro_inm = true;

				//Arquidiocesis
				if($archiprestazgo == -1)
				{
					$consulta_base .= ", inm_pert_arqui";
					$where .= " And (id_inm = id_inmffff)";
				}
				else
				{
					$parroquia = $_REQUEST['parroquia'];

					//Fundaciones
					if($archiprestazgo == 0)
					{
						$consulta_base .= ", inm_pert_fund";
						$where .= " And (id_inm = id_inmff) And (id_fundff = $parroquia)";
					}
					else
					{
						$consulta_base .= ", inm_pert_parro";
						$where .= " And (id_inm = id_inmf) And (id_parrof = $parroquia)";
					}
				}
			}

			if($_REQUEST['direccion'] != "")
			{
				$direccion = $_REQUEST['direccion'];
				if(!$entro_inm)
				{
					$consulta_base .= ", se_refiere, inmueble";
					if($where != "")
					{
						$where .= " And ";
					}
					$where .= "(id_doc = id_docf) And (id_inm = id_inmfff)";
				}

				$where .= " And (direccion like '%$direccion%')";
			}*/

			if($where != '')
				$consulta_base .= " where ".$where;
		}

		$consulta_ejecutar = $consulta_base;
		$consulta_ejecutar .= " order by fecha_add_doc DESC";
		$_SESSION['ultima_consulta'] = $consulta_ejecutar;
		$pagActual = 1;
		$_SESSION['ultima_pagina'] = $pagActual;
	}

	/*echo	"<div class='row'>
				<div class='col-lg-12'>
					<p>consulta ejecutada: $consulta_ejecutar</p>
				</div>
			</div>";*/

	$registros = mysqli_query($conexion, $consulta_ejecutar) or die('Problemas con la consulta');
	$num_total_registros = mysqli_num_rows($registros);

	echo	"<div class='row'>
				<div class='col-lg-12'>
					<p>Elementos encontrados: $num_total_registros</p>
				</div>
			</div>";

	if($num_total_registros > 0)
	{
		if(!isset($filasPP))
		{
			$consultaFilasPP = mysqli_query($conexion, "select filasPP from usuario where login = '".$_SESSION['usuario']."'");
			$getFilasPP = mysqli_fetch_array($consultaFilasPP);

			$filasPP = $getFilasPP['filasPP'];
		}

		//contando el desplazamiento
		$offset = ($pagActual - 1) * $filasPP;
		$total_paginas = ceil($num_total_registros / $filasPP);

		$registros = mysqli_query($conexion, "$consulta_ejecutar LIMIT $offset, $filasPP") or die(mysqli_error($conexion));

        echo 		"<div class='row'>
                        <div class='col-lg-12'>";

        while($fila = mysqli_fetch_array($registros))
        {
			echo	"<div class='panel panel-primary'>
						<div class='panel-heading'><span style='font-weight:bold'>Codigo del documento: </span> ".$fila['cod_doc'];
			if($_SESSION['rol']=='Administrador')//Tiene permiso para borrar un documento
			{
				echo
					"<a class='del_doc' data-doc='".$fila['id_doc']."' href='#' style='margin-left:15px;'><img src='../papelera.jpg' width='24px' height='24px' alt='Eliminar Documento'></a>";
			}
			if($_SESSION['rol']=='Administrador')//Tiene permiso para editar un documento
			{
				echo
					"<a class='edit_doc' data-doc='".$fila['id_doc']."' href='#' style='margin-left:5px;'><img src='../icon-edit.png' width='24px' height='24px' alt='Editar Documento'></a>";
			}
			if($_SESSION['rol']=='Administrador') {
				echo "<!--<div style='float:right; border:1px solid blue;'><a data-doc='".$fila['id_doc']."' class='new-inm-to-doc' href='#'><img src='../inm_add.png' width='48px' height='51px' alt='Crear nuevo Inmueble'></a></div>-->";
			}

			$tipos = mysqli_query($conexion, "select nombre from tipo_documento where id = " . $fila['tipo']) or die(mysqli_error($conexion));
			$tipo = mysqli_fetch_assoc($tipos);
			$fila['tipo'] = $tipo['nombre'];

			//	Archivos
			$archivos = [];
			$folder = "uploads/documentos/" . $fila['id_doc'];
			if (is_dir($folder)) {
				$archivos  = array_diff(scandir($folder), array('.', '..'));
			}

			echo		"<!--<div style='float:right; margin-right:15px; border:1px solid blue;'><a data-doc='".$fila['id_doc']."' class='ver_inms' href='#'><img src='../inm-list.jpg' width='48px' height='51px' alt='Ver Inmuebles'></a></div>-->
						</div>
						<!-- /.panel-heading -->
						<div class='panel-body'>
							<!-- Tab panes -->
							<div class='tab-content'>
								<div class='tab-pane fade in active' id='home-pills'>
									<p><span style='font-weight:bold'>Tipo:</span> ".$fila['tipo']."</p>
									<p><span style='font-weight:bold'>Datos de registro:</span> ".$fila['datos_registro']."</p>
									<p><span style='font-weight:bold'>Abogado redactor:</span> ".$fila['abogado_redactor']."</p>
									<p><span style='font-weight:bold'>Descripción:</span> ".$fila['descripcion']."</p>
								</div>";

			foreach ($archivos as $archivo) {
				$short_name = $archivo;
				$extension = pathinfo($archivo, PATHINFO_EXTENSION);

				if (strlen($short_name) > 20) {
					$short_name = substr($archivo, 0, 17) . '...';
				}
				echo " <a class='btn btn-default btn-sm' target='_blank' href='" . $folder . '/' . urlencode($archivo) ."' title='Descargar " . $archivo . "'>
					 		" . $short_name . "   <span class='glyphicon glyphicon-save' aria-hidden='true'></span>
						</a>";
			}

			echo "
							</div>
						</div>
						<!-- /.panel-body -->
					</div>
					<!-- /.panel -->";
        }

        echo 		"</div>
        			 </div>";



		if($total_paginas > 1)
		{
			echo 		"<div class='row''>
							<div class='col-lg-12'>";

			if ($pagActual != 1)
				echo "<a href='#' class='paginarDoc' style='margin-right:10px' data-numpage='".($pagActual-1)."'>Anterior</a>";

			if( ($pagActual >= 1) And ($pagActual <= 6) )
			{
				$lim_inf = 1;

				if($total_paginas < 10)
					$lim_sup = $total_paginas;
				else
					$lim_sup = 10;
			}
			else
			{
				if(($pagActual+4) > $total_paginas)
				{
					$lim_sup = $total_paginas;
					if($lim_sup >= 10)
					{
						$lim_inf = $lim_sup - 9;
					}
					else
					{
						$lim_inf = 1;
					}
				}
				else
				{
					$lim_sup = $pagActual + 4;
					$lim_inf = $lim_sup - 9;
				}
			}

			for($i = $lim_inf; $i <= $lim_sup; $i++)
			{
				if($i == $pagActual)
					echo "<span style='margin-right:10px'>$i</span>";
				else
					echo "<a class='paginarDoc' href='#' style='margin-right:10px' data-numpage='$i'>$i</a>";
			}

			if($pagActual != $total_paginas)
				echo "<a class='paginarDoc' href='#' style='margin-right:10px' data-numpage='".($pagActual+1)."'>Siguiente</a>";
			echo "</div>";
			echo "</div>";
		}

	}
	else
	{
		if(!$esBusqueda){
			echo 	"<div class='row'>
                        <div class='col-lg-12'>
                            <p style='color:green'>Presione Crear Nuevo para agregar un nuevo Documento</p>
                        </div>
                    </div>";
		}

	}
?>
