$(function () {
	$("#mostrarParros").dialog({
		autoOpen: false,
		modal: true,
		height: 500,
		width: 750
	});
	
	$("#mostrarArchiprestazgos").on("click", ".ver_parros", function (event){
		event.preventDefault();
		
		id_arch = $(this).data('arch');
		$("#mostrarParros").load("parrosDeArch.php?id_arch="+id_arch);
		$("#mostrarParros").dialog("open");
	});
	
	/*$("#show-docs-from-inm").on("click", ".del-doc-from-inm", function(event){
		event.preventDefault();
		
		$.get("del-doc-from-inm.php?id_doc="+$(this).data('doc')+"&id_inm="+id_inm, function(){
			alert('Eliminacion Correcta');
			$("#show-docs-from-inm").load("show-docs-from-inm.php?id_inm="+id_inm);
		});
	});*/

});