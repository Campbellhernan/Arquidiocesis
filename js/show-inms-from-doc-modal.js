$(function () {
	
	var id_doc;
	$("#show-inms-from-doc-modal").dialog({
		autoOpen: false,
		modal: true,
		height: 500,
		width: 750
	});

	$("#mostrarDocumentos").on("click", ".ver_inms", function (event){
		event.preventDefault();
		//$("#show-inms-from-doc").attr("title", "Documentos del Inmueble: "+$(this).data('inm'));
		
		id_doc = $(this).data('doc');
		$("#show-inms-from-doc").load("show-inms-from-doc.php?id_doc="+id_doc);
		$("#show-inms-from-doc-modal").dialog("open");
	});
	
	$("#show-inms-from-doc").on("click", ".del-inm-from-doc", function(event){
		event.preventDefault();
		
		$.get("del-inm-from-doc.php?id_inm="+$(this).data('inm')+"&id_doc="+id_doc, function(){
			alert('Eliminacion Correcta');
			$("#show-inms-from-doc").load("show-inms-from-doc.php?id_doc="+id_doc);
		});
	});

});