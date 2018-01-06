  $(function() {
    var dialog, form,

      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      //emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      tipo_edit = $( "#tipo_edit" ),
	  fecha_edit = $( "#fecha_edit" ),
	  datos_registro_edit	= $("#datos_registro_edit"),
	  abogado_redactor_edit	= $("#abogado_redactor_edit"),
      descripcion_edit	= $("#descripcion_edit"),

      allFields = $( [] ).add( tipo_edit ).add( fecha_edit ).add( datos_registro_edit ).add( abogado_redactor_edit ).add(descripcion_edit),
      tips = $( ".validateTips" );

    function updateTips( t ) {
      tips
        .text( t )
        .addClass( "ui-state-highlight" );
      setTimeout(function() {
        tips.removeClass( "ui-state-highlight", 1500 );
      }, 500 );
    }

    function checkLength( o, n, min, max ) {
      if ( o.val().length > max || o.val().length < min ) {
        o.addClass( "ui-state-error" );
        updateTips( "Longitud de " + n + " debe estar entre " +
          min + " y " + max + "." );
        return false;
      } else {
        return true;
      }
    }

    function checkRegexp( o, regexp, n ) {
      if ( !( regexp.test( o.val() ) ) ) {
        o.addClass( "ui-state-error" );
        updateTips( n );
        return false;
      } else {
        return true;
      }
    }

	function checkTipo(o){
		if(o.val() == "ningun"){
			o.addClass( "ui-state-error" );
			updateTips( "Debe seleccionar un tipo" );
			return false;
		}
		return true;
	}

	function checkFecha(o) {
		if(o.val().length == 0) {
			o.addClass( "ui-state-error" );
			updateTips( "Ingrese una fecha" );
			return false;
		}
		return true;
	}

    function updateDoc() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );

      valid = valid && checkTipo(tipo_edit);
	  valid = valid && checkFecha( fecha_edit );
      valid = valid && checkLength( datos_registro_edit, "Datos de Registro", 1, 300);
      valid = valid && checkLength( abogado_redactor_edit, "Abogado Redactor", 1, 300);

      if (valid) {

		//ADD
		//información del formulario
		var formData = new FormData(document.getElementById("form_doc_edit"));
        //hacemos la petición ajax
        $.ajax({
            url: 'actualizarDoc.php',
            type: 'POST',
            // Form data
            //datos del formulario
            data: formData,
            //necesario para subir archivos via ajax
            cache: false,
            contentType: false,
            processData: false,
            //mientras enviamos el archivo
            /*beforeSend: function(){
                //message = $("<span class='before'>Subiendo la imagen, por favor espere...</span>");
                //showMessage(message)
            },*/
            //una vez finalizado correctamente
            success: function(data){
				$("#mostrarDocumentos").empty();
				$("#mostrarDocumentos").load("procesar.php?edit_doc=1");
            },
            //si ha ocurrido un error
            error: function(){
                //message = $("<span class='error'>Ha ocurrido un error.</span>");
                //showMessage(message);
				alert('ocurrio un error');
            }
        });
		//FIN ADD

        dialogEditDoc.dialog( "close" );
      }
      return valid;
    }

    dialogEditDoc = $("#dialog-edit-document").dialog({
        autoOpen: false,
        height: 600,
        width: 1000,
        modal: true,
        buttons: {
            "Guardar cambios": updateDoc,
            Cancelar: function() {
                dialogEditDoc.dialog("close");
            }
        },
        close: function() {
            form[0].reset();
            allFields.removeClass("ui-state-error");
        }
    });

    form = dialogEditDoc.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      updateDoc();
    });

    $("#mostrarDocumentos").on("click", ".edit_doc", function(event) {
        event.preventDefault();
        tips.text('');
        $.getJSON("enviarDatosDeDoc.php?id_doc=" + $(this).data('doc'), function(data) {
            $("#id_doc").val(data.id_doc);
            $("#cod_doc_edit_show").text(data.cod_doc);
            $("#cod_edit_doc").val(data.cod_doc);
            $("#tipo_edit").val(data.tipo);

            //console.log('fecha recibida: '+data.fecha);
            var myMoment = moment(data.fecha, "YYYY-MM-DD");
            //console.log('fecha moment: '+myMoment);
            //console.log('mes moment: '+myMoment.year());

            //objDate = new Date(data.fecha+ ' 00:00:00 GMT');
            //$("#fecha_edit").val((objDate.getDate()+1)+"/"+(objDate.getMonth()+1)+"/"+objDate.getFullYear());
            $("#fecha_edit").val(myMoment.date() + "/" + (myMoment.month() + 1) + "/" + myMoment.year());
            $("#fecha_edit_hidden").val(data.fecha);
            $("#datos_registro_edit").val(data.datos_registro);
            $("#abogado_redactor_edit").val(data.abogado_redactor);
            $("#descripcion_edit").val(data.descripcion);

            $("#list_archivo_doc_edit").html('');

            data.archivos.forEach(function(archivo) {
                var item = $("<div>").addClass('btn-group')
                            .attr('id', 'btn-delete-' + data.id_doc)
                            .append(
                                $('<a>').addClass('btn btn-default btn-sm')
                                .attr('target', '_blank')
                                .attr('href', archivo.url)
                                .attr('title', 'Descargar ' + archivo.name)
                                .append($('<span>').html(archivo.short_name))
                                .append($('<span>').addClass('glyphicon glyphicon-save')))
                            .append(
                                $('<a>').addClass('btn btn-danger btn-sm')
                                .attr('href', '#')
                                .attr('title', 'Eliminar ' + archivo.name)
                                .attr('data-doc', data.id_doc)
                                .attr('data-name', archivo.name)
                                .append($('<span>').addClass('glyphicon glyphicon-trash')));
                $('#list_archivo_doc_edit').append(item);
            });
        });

        dialogEditDoc.dialog("open");
    });

    $("#tipo_edit").on("change", function () {
        var tipo = $("#tipo_edit").val();
        $.get("next_code_documento.php?tipo=" + tipo, function(data) {
            $("#cod_doc_edit_show").html(data);
            $("#cod_edit_doc").val(data);
        });
    });
    
});
