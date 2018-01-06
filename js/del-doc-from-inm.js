$("#show-docs-from-inm").on("click", ".del-doc-from-inm", function(event){
		event.preventDefault();
		
		$.get("del-doc-from-inm.php?id_doc="+$(this).data('doc')+"&id_inm="+id_inm, function(){
			alert('Eliminacion Correcta');
			$("#show-docs-from-inm").load("show-docs-from-inm.php?id_inm="+id_inm);
		});
	});