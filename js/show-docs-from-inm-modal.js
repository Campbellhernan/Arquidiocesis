$(function () {
	
	var id_doc;
	$("#show-docs-from-inm-modal").dialog({
		autoOpen: false,
		modal: true,
		height: 500,
		width: 750
	});

	$("#mostrarInmuebles").on("click", ".ver_docs", function (event){
		event.preventDefault();
		//$("#show-inms-from-doc").attr("title", "Documentos del Inmueble: "+$(this).data('inm'));
		
		id_inm = $(this).data('inm');
		$("#show-docs-from-inm").load("show-docs-from-inm.php?id_inm="+id_inm);
		$("#show-docs-from-inm-modal").dialog("open");
	});
	
	$("#show-docs-from-inm").on("click", ".del-doc-from-inm", function(event){
		event.preventDefault();
		
		$.get("del-doc-from-inm.php?id_doc="+$(this).data('doc')+"&id_inm="+id_inm, function(){
			alert('Eliminacion Correcta');
			$("#show-docs-from-inm").load("show-docs-from-inm.php?id_inm="+id_inm);
		});
	});

});