$(function() {
	var id_arch;
	$("#mostrarArchiprestazgos").on("click", ".del_arch", function(event) {
  		event.preventDefault();

	  	//var band = confirm("esta seguro de eliminar?");
	  	id_arch = $(this).data('arch');
		$("#dialog-confirm-delete-arch").dialog("open");
	});

	$("#dialog-confirm-delete-arch").dialog({
	  	autoOpen: false,
      	resizable: false,
      	height: "auto",
      	width: 400,
      	modal: true,
      	buttons: {
        	"Aceptar": function() {
				$.get("del_arch.php?id_arch=" + id_arch, function(data) {
					$("#mostrarArchiprestazgos").empty();
					$("#mostrarArchiprestazgos").load("procesarArch.php?edit_arch=1");
				});
				$(this).dialog("close");
        	},
        	Cancelar: function() {
          		$(this).dialog("close");
        	}
      	}
	});
});
