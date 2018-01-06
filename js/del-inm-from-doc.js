$("#show-inms-from-doc").on("click", ".del-inm-from-doc", function(event){
	event.preventDefault();
	
	$.get("del-inm-from-doc.php?id_inm="+$(this).data('inm')+"&id_doc="+id_doc, function(){
		alert('Eliminacion Correcta');
		$("#show-inms-from-doc").load("show-inms-from-doc.php?id_doc="+id_doc);
	});
});