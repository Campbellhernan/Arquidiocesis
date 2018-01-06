$(function(){
	$("#mostrarUsuarios").on("click", ".paginarUsuario", function(event){
		event.preventDefault();
		
		var page = $(this).data('numpage');
		
		$("#mostrarUsuarios").load("procesarUsuario.php?numPage="+page);
	});
});