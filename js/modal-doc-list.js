$(function () {
	$("#mostrarDocs").dialog({
		autoOpen: false,
		modal: true,
		height: 500,
		width: 750
	});

	$("a[name='ver_docs']").click(function (event) {
		event.preventDefault();
		$("#mostrarDocs").attr("title", "Documentos del Inmueble: "+$(this).data('inm'));
		$("#mostrarDocs").load("docsDeInm.php?id_inm="+$(this).data('inm'));
		$("#mostrarDocs").dialog("open");
	});

});