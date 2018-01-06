$(function(){
	
	$.get("obtenerFilasPPArch.php", function(data){
		$('#filasPPArch').val(data);
	});
	
	
	$('#filasPPArch').change(function(){
		$("#mostrarArchiprestazgos").load("procesarArch.php?filasPPArch="+$(this).val());
	});
	
	
});