$(function(){
	
	$.get("obtenerFilasPP.php", function(data){
		$('#filasPPDoc').val(data);
	});
	
	
	$('#filasPPDoc').change(function(){
		$("#mostrarDocumentos").load("procesar.php?filasPP="+$(this).val());
	});
	
	
});