$(function(){
	$("#mostrarArchiprestazgos").on("click", ".paginarArch", function(event){
		event.preventDefault();
		
		var page = $(this).data('numpage');
		
		$("#mostrarArchiprestazgos").load("procesarArch.php?numPage="+page);
	});
});