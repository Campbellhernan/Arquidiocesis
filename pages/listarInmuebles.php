<?php
	//session_start();

	if(!isset($_SESSION['usuario']))
		header('location: login.php');

	require_once('../librerias/conexion.php');
	require_once('../librerias/utiles.php');

	$conexion = conectar();
	$consulta_ejecutar = "select id_inm, cod_inm, descripcion, modo_adq as id_adq, direccion, metraje, tipo_inm, linderos, fecha, datos_registro, abogado_redactor, estatus, map_position, ".
						 	"(select archi.nom_arch from archiprestazgo as archi where archi.id_arch = archiprestazgo) as nom_arch, ".
							"(select parr.nom_parro from parroquia as parr where parr.id_parro = parroquia) as nom_parro, ".
							"(select nombre from tipo_documento as tipo where tipo.id = id_adq) as modo_adq ".
							"from inmueble order by fecha_add_inm DESC";

	$registros = mysqli_query($conexion, $consulta_ejecutar) or die('Problemas con la consulta');
	$num_total_registros = mysqli_num_rows($registros);

	echo	"<div class='row'>
				<div class='col-lg-12'>
					<p>Elementos encontrados: $num_total_registros</p>
				</div>
			</div>";

	if($num_total_registros > 0)
	{
		$pagActual = 1;

		$consultaFilasPP = mysqli_query($conexion, "select filasPPInm from usuario where login = '".$_SESSION['usuario']."'");
		$getFilasPP = mysqli_fetch_array($consultaFilasPP);
		$filasPPInm = $getFilasPP['filasPPInm'];

		//contando el desplazamiento
		$offset = ($pagActual - 1) * $filasPPInm;
		$total_paginas = ceil($num_total_registros / $filasPPInm);

		$registros = mysqli_query($conexion, "$consulta_ejecutar LIMIT $offset, $filasPPInm") or die(mysqli_error($conexion));

        echo 		"<div class='row'>
                        <div class='col-lg-12'>";

		while($fila = mysqli_fetch_array($registros))
        {
			echo	"<div class='panel panel-primary'>
						<div class='panel-heading'><span style='font-weight:bold'>Codigo del Inmueble:</span> ".$fila['cod_inm'];
			if($_SESSION['rol']=='Administrador')//Tiene permiso para borrar un inmueble
			{
				echo
					"<a class='del_inm' data-inm='".$fila['id_inm']."' href='#' style='margin-left:15px;'><img src='../papelera.jpg' width='24px' height='24px' alt='Eliminar Inmueble'></a>";
			}
			if($_SESSION['rol']=='Administrador')//Tiene permiso para editar un inmueble
			{
				echo
					"<a class='edit_inm' data-inm='".$fila['id_inm']."' href='#' style='margin-left:5px;'><img src='../icon-edit.png' width='24px' height='24px' alt='Editar Inmueble'></a>";
			}
			if($_SESSION['rol']=='Administrador')//Tiene permiso para editar un inmueble
			{
				echo
					"<!--<div style='float:right; border:1px solid blue;'><a data-inm='".$fila['id_inm']."' class='new-doc-to-inm' href='#'><img src='../document_new.png' width='48px' height='51px' alt='Crear nuevo Documento'></a></div>-->";
			}

			//	Archivos
			$archivos = [];
			$folder = "uploads/inmuebles/" . $fila['id_inm'];
			if (is_dir($folder)) {
				$archivos  = array_diff(scandir($folder), array('.', '..'));
			}

			echo		"<!--<div style='float:right; margin-right:15px; border:1px solid blue;'><a data-inm='".$fila['id_inm']."' class='ver_docs' href='#'><img src='../documents2.png' width='48px' height='51px' alt='Ver Documentos'></a></div>-->
						</div>
						<!-- /.panel-heading -->
						<div class='panel-body'>
							<!-- Tab panes -->
							<div class='tab-content'>
								<div class='tab-pane fade in active row' id='home-pills'>
									<div class='col-lg-7'>
										<p><span style='font-weight:bold'>Archiprestazgo:</span> " . $fila['nom_arch'] . "</p>
										<p><span style='font-weight:bold'>Parroquia:</span> " . $fila['nom_parro'] . "</p>
										<p><span style='font-weight:bold'>Direccion:</span> ".$fila['direccion']."</p>
										<p><span style='font-weight:bold'>Tipo:</span> ".$fila['tipo_inm']."</p>
										<p><span style='font-weight:bold'>Modo de adquisicion:</span> ".$fila['modo_adq']."</p>
										<p><span style='font-weight:bold'>Metraje:</span> ".$fila['metraje']."</p>
										<p><span style='font-weight:bold'>Tipo de inmueble:</span> ".$fila['tipo_inm']."</p>
										<p><span style='font-weight:bold'>Estatus:</span> " . (($fila['estatus'] == 1) ? 'Activo' : 'Desincorporado') . "</p>
										<p><span style='font-weight:bold'>Linderos:</span> ".$fila['linderos']."</p>
										<p><span style='font-weight:bold'>Descripcion:</span> ".$fila['descripcion']."</p>
									</div>
									<div class='col-lg-5 mini_map' id='mini_map".$fila['id_inm']."' data-id='".$fila['id_inm']."' data-map='".$fila['map_position']."'>
									</div>
									<div class='col-lg-12'>
										<hr/>
										<h4>Informacion del documento</h4>
										<p><span style='font-weight:bold'>Fecha:</span> ".$fila['fecha']."</p>
										<p><span style='font-weight:bold'>Datos de Registro:</span> ".$fila['datos_registro']."</p>
										<p><span style='font-weight:bold'>Abogado Redactor:</span> ".$fila['abogado_redactor']."</p>
									</div>";

			echo "<div class='col-lg-12 btn-group'>";

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
			echo "</div>";
			echo "</div>";
            
            //agregado para sub-inmuebles**************************
            echo "<br>";

            //consulta de los hijos
            $consulta_subinmuebles = "SELECT `DIN_HIJO` FROM `din_divisiones_inmuebles` WHERE DIN_PADRE = ".$fila['id_inm'];
            //echo "Consulta: ".$consulta_subinmuebles;
            $inmuebles_hijos = mysqli_query($conexion, $consulta_subinmuebles) or die('Problemas con la consulta');
            $num_total_inmuebles_hijos= mysqli_num_rows($inmuebles_hijos);
            if($num_total_inmuebles_hijos > 0){
                echo "<div class='col-lg-12'>";
                echo "<h4>Sub-Inmuebles</h4>";
                echo "<div class='row'>
                  <div class='col-md-12'>
                    <ul class='list-group'>";
            }
            while ($hijo = $inmuebles_hijos->fetch_array())
            {
                //echo $hijo["DIN_HIJO"];
                //ya tengo el id del hijo, obtengo el nombre y lo imprimo
                $consulta_codigo_hijo = "SELECT `cod_inm` FROM `inmueble` WHERE id_inm = ".$hijo["DIN_HIJO"];
                $cod_inm_temp = mysqli_query($conexion, $consulta_codigo_hijo) or die('Problemas con la consulta');
                $row_cod_inm = $cod_inm_temp->fetch_array();
//                echo "Codigo del inmueble: ";
                echo "<li class='list-group-item'>".$row_cod_inm["cod_inm"]."</li>";
            }
            if($num_total_inmuebles_hijos > 0){
                        echo "</ul>
                      </div>
                    </div>";
                echo "</div>";
            }


            //fin de subinmuebles***********************************************
            

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
			echo 		"<div class='row text-center'>
							<ul class='pagination pagination-sm'>";

			if ($pagActual != 1)
				echo "<li><a href='#' class='paginarInm' data-numpage='".($pagActual-1)."'>Anterior</a></li>";

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

			for($i = $lim_inf; $i <= $lim_sup; $i++) {
				if($i == $pagActual) {
					echo "<li class='active'><a href='#'>$i</a></li>";
				} else {
					echo "<li><a class='paginarInm' href='#' data-numpage='$i'>$i</a></li>";
				}
			}

			if($pagActual != $total_paginas) {
				echo "<li><a class='paginarInm' href='#' data-numpage='".($pagActual+1)."'>Siguiente</a></li>";
			}
			echo "</ul>";
			echo "</div>";
		}
	}
	else
	{
		echo 		"<div class='row'>
                        <div class='col-lg-12'>
                            <p style='color:green'>Presione Crear Nuevo para agregar un nuevo Inmueble</p>
                        </div>
                    </div>";
	}
