$(function(){
	$("#mostrarFundaciones").on("click", ".paginarFund", function(event){
		event.preventDefault();
		
		var page = $(this).data('numpage');
		
		$("#mostrarFundaciones").load("procesarFund.php?numPage="+page);
	});
});