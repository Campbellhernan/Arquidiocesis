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
		if($paridad)
			$color = "#01FFE2";
		else
			$color = "#F8FBD3";
		echo "<div style='background-color: $color'>\n";
		echo "<p><span style='font-weight:bold'>Codigo del documento:</span> ".$fila['cod_doc']."</p>\n";
		echo "<p><span style='font-weight:bold'>Cod_inm:</span> ".$fila['cod_inmf']."</p>\n";
		echo "<p><span style='font-weight:bold'>Tipo:</span> ".$fila['tipo']."</p>\n";
		echo "<p><span style='font-weight:bold'>Dia:</span> ".$fila['dia']."</p>\n";
		echo "<p><span style='font-weight:bold'>Mes:</span> ".$fila['mes']."</p>\n";
		echo "<p><span style='font-weight:bold'>Año:</span> ".$fila['anyo']."</p>\n";
		echo "</div>\n";
		
		$paridad = ($paridad xor true);
	}
	
?>