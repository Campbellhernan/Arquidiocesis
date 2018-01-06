$(function () {

	var id_doc;
	$("#show-parros-from-arch-modal").dialog({
		autoOpen: false,
		modal: true,
		height: 500,
		width: 750
	});

	$("#mostrarArchiprestazgos").on("click", ".ver_parros", function (event){
		event.preventDefault();

		id_arch = $(this).data('arch');
		$("#show-parros-from-arch").load("show-parros-from-arch.php?id_arch="+id_arch);
		$("#show-parros-from-arch-modal").dialog("open");
	});

	/*$("#show-parros-from-arch").on("click", ".del-doc-from-inm", function(event){
		event.preventDefault();

		$.get("del-doc-from-inm.php?id_doc="+$(this).data('doc')+"&id_inm="+id_inm, function(){
			alert('Eliminacion Correcta');
			$("#show-docs-from-inm").load("show-docs-from-inm.php?id_inm="+id_inm);
		});
	});*/

});
