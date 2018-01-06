$(function(){
	
	$.get("obtenerFilasPPFund.php", function(data){
		$('#filasPPFund').val(data);
	});
	
	
	$('#filasPPFund').change(function(){
		$("#mostrarFundaciones").load("procesarFund.php?filasPPFund="+$(this).val());
	});
	
	
});