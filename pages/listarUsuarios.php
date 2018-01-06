<?php
	//session_start();
	
	if(!isset($_SESSION['usuario']))
		header('location: login.php');
	
	require_once('../librerias/conexion.php');
	require_once('../librerias/utiles.php');

	$conexion = conectar();
	$consulta_ejecutar = "select * from usuario";
	
		
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
		
		$consultaFilasPP = mysqli_query($conexion, "select filasPPUsuario from usuario where login = '".$_SESSION['usuario']."'");
		$getFilasPP = mysqli_fetch_array($consultaFilasPP);
		$filasPPUsuario = $getFilasPP['filasPPUsuario'];
		
		//contando el desplazamiento
		$offset = ($pagActual - 1) * $filasPPUsuario;
		$total_paginas = ceil($num_total_registros / $filasPPUsuario);
		
		$registros = mysqli_query($conexion, "$consulta_ejecutar LIMIT $offset, $filasPPUsuario") or die(mysqli_error($conexion));

        echo 		"<div class='row'>
                        <div class='col-lg-12'>";

		while($fila = mysqli_fetch_array($registros))
        {
			echo	"<div class='panel panel-primary'>
						<div class='panel-heading'><span style='font-weight:bold'>Usuario: </span> ".$fila['login'];
			if(1==1)//Tiene permiso para borrar un documento
			{
				echo
					"<a class='del_usuario' data-usuario='".$fila['login']."' href='#' style='margin-left:15px;'><img src='../papelera.jpg' width='24px' height='24px' alt='Eliminar Usuario'></a>";
			}
			if(1==1)//Tiene permiso para editar un documento
			{
				echo
					"<a class='edit_usuario' data-usuario='".$fila['login']."' href='#' style='margin-left:5px;'><img src='../icon-edit.png' width='24px' height='24px' alt='Editar Usuario'></a>";
			}
			echo		"</div>
						<!-- /.panel-heading -->
						<div class='panel-body'>
							<!-- Tab panes -->
							<div class='tab-content'>
								<div class='tab-pane fade in active' id='home-pills'>
                                    <p><span style='font-weight:bold'>Rol:</span> ".$fila['rol']."</p>
                                </div>
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
				echo "<a href='#' class='paginarUsuario' style='margin-right:10px' data-numpage='".($pagActual-1)."'>Anterior</a>";
			
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
					echo "<a class='paginarUsuario' href='#' style='margin-right:10px' data-numpage='$i'>$i</a>";
			}
			
			if($pagActual != $total_paginas)
				echo "<a class='paginarUsuario' href='#' style='margin-right:10px' data-numpage='".($pagActual+1)."'>Siguiente</a>";
			echo "</div>";
			echo "</div>";
		}
	}
	else
	{
		echo 		"<div class='row'>
                        <div class='col-lg-12'>
                            <p style='color:green'>Presione Crear Nuevo para agregar un nuevo Usuario</p>
                        </div>
                    </div>";
	}
?>