$(function(){
	$("#mostrarDocumentos").on("click", ".paginarDoc", function(event){
		event.preventDefault();
		
		var page = $(this).data('numpage');
		
		$("#mostrarDocumentos").load("procesar.php?numPage="+page);
	});
});