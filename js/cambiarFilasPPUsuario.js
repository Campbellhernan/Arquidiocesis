$(function(){
	
	$.get("obtenerFilasPPUsuario.php", function(data){
		$('#filasPPUsuario').val(data);
	});
	
	
	$('#filasPPUsuario').change(function(){
		$("#mostrarUsuarios").load("procesarUsuario.php?filasPPUsuario="+$(this).val());
	});
	
	
});