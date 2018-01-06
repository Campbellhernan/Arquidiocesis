$(function() {
    var id_inm;
	var name;

	//  Eliminar un documento adjuntado
	$("#list_archivo_inmueble_edit").on("click", "a.btn-danger", function(event) {
        event.preventDefault();

        //var band = confirm("esta seguro de eliminar?");
        id_inm = $(this).data('inm');
        name  = $(this).data('name');
        $("#dialog-confirm-delete-inm-adjunto").dialog("open");
    });

    $("#dialog-confirm-delete-inm-adjunto").dialog({
        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            "Aceptar": function() {
                $.get("del_inm_adjuntado.php?id_inm=" + id_inm + "&name=" + name, function(data) {
					$("#mostrarInmuebles").empty();
                    $("#mostrarInmuebles").load("procesarInm.php?edit_inm=1", function() {
            	  		initMap();
            		});
                    $("#btn-delete-inmueble-" + id_inm).remove();
                });
                $(this).dialog("close");
            },
            Cancelar: function() {
                $(this).dialog("close");
            }
        }
    });

    $("#mostrarInmuebles").on("click", ".del_inm", function(event) {
        event.preventDefault();

        //var band = confirm("esta seguro de eliminar?");
        id_inm = $(this).data('inm');
        $("#dialog-confirm-delete-inm").dialog("open");
    });

    $("#dialog-confirm-delete-inm").dialog({
        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            "Aceptar": function() {
                $.get("del_inm.php?id_inm=" + id_inm, function(data) {
                    $("#mostrarInmuebles").empty();
                    $("#mostrarInmuebles").load("procesarInm.php?edit_inm=1", function() {
            	  		initMap();
            		});
                });
                $(this).dialog("close");
            },
            Cancelar: function() {
                $(this).dialog("close");
            }
        }
    });
});
