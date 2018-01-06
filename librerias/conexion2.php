<?php
	function conectar()
	{
		$conexion=mysqli_connect("localhost","root","toor","basesc") or die("Problemas con la conexión");
		
		return($conexion);
	}
?>