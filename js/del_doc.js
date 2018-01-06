$(function() {
    var id_doc;
    var name;

    //  Eliminar un documento adjuntado
    $("#list_archivo_doc_edit").on("click", "a.btn-danger", function(event) {
        event.preventDefault();

        //var band = confirm("esta seguro de eliminar?");
        id_doc = $(this).data('doc');
        name  = $(this).data('name');
        $("#dialog-confirm-delete-documento-adjuntado").dialog("open");
    });

    $("#dialog-confirm-delete-documento-adjuntado").dialog({
        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            "Aceptar": function() {
                $.get("del_doc_adjuntado.php?id_doc=" + id_doc + "&name=" + name, function(data) {
                    $("#mostrarDocumentos").empty();
                    $("#mostrarDocumentos").load("procesar.php?edit_doc=1");
                    $("#btn-delete-" + id_doc).remove();
                });
                $(this).dialog("close");
            },
            Cancelar: function() {
                $(this).dialog("close");
            }
        }
    });

    $("#mostrarDocumentos").on("click", ".del_doc", function(event) {
        event.preventDefault();

        //var band = confirm("esta seguro de eliminar?");
        id_doc = $(this).data('doc');
        $("#dialog-confirm-delete-doc").dialog("open");
    });

    $("#dialog-confirm-delete-doc").dialog({
        autoOpen: false,
        resizable: false,
        height: "auto",
        width: 400,
        modal: true,
        buttons: {
            "Aceptar": function() {
                $.get("del_doc.php?id_doc=" + id_doc, function(data) {
                    $("#mostrarDocumentos").empty();
                    $("#mostrarDocumentos").load("procesar.php?edit_doc=1");
                });
                $(this).dialog("close");
            },
            Cancelar: function() {
                $(this).dialog("close");
            }
        }
    });
});
