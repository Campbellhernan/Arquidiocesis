  $(function() {
    var dialogNewDoc, form,

      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      //emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      id_doc = $("#id_doc");
      cod_doc = $("#cod_doc");
	  tipo = $( "#tipo" ),
	  fechaPicker = $("#fechaPicker"),
	  datos_registro	= $("#datos_registro"),
	  abogado_redactor	= $("#abogado_redactor"),
      descripcion	= $("#descripcion"),

      allFields = $( [] ).add(id_doc).add( tipo ).add( fechaPicker ).add( datos_registro ).add( abogado_redactor ).add(descripcion),
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

	function campoRepetido(url, elem){
		var rep;
		var json = {
			"elem" : elem
		};

		$.ajax({
			dataType : "json",
			url : url,
			data : json,
			async : false,
			success : function(data) {
				rep = data.rep;
			}
		});
		return rep;
	}

	function checkId_doc(o, n, min, max){
		if(!checkLength(o, n, min, max)){
			return false;
		} else {
			if(campoRepetido("estaId_docRepetido.php", o.val())){
				o.addClass( "ui-state-error" );
				updateTips( n + " se encuentra repetido" );
				return false;
			}
		}
		return true;
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

    function createDoc() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );

	  valid = valid && checkLength(cod_doc, "Codigo", 1, 10);
	  valid = valid && checkTipo(tipo);
	  valid = valid && checkFecha( fechaPicker );
      valid = valid && checkLength( datos_registro, "Datos de Registro", 1, 100 );
      valid = valid && checkLength( abogado_redactor, "Abogado Redactor", 1, 100 );

      if (valid) {

		//ADD
		//información del formulario
		var formData = new FormData(document.getElementById("form_doc_new"));
        //hacemos la petición ajax
        $.ajax({
            url: 'guardarDoc.php',
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
				$("#mostrarDocumentos").load("procesar.php");
            },
            //si ha ocurrido un error
            error: function(){
                //message = $("<span class='error'>Ha ocurrido un error.</span>");
                //showMessage(message);
				alert('ocurrio un error');
            }
        });
		//FIN ADD

        dialogNewDoc.dialog( "close" );
      }
      return valid;
    }

    dialogNewDoc = $("#dialog-new-document").dialog({
        autoOpen: false,
        height: 600,
        width: 1000,
        modal: true,
        buttons: {
            "Guardar cambios": createDoc,
            Cancelar: function() {
                dialogNewDoc.dialog("close");
            }
        },
        close: function() {
            form[0].reset();
            allFields.removeClass("ui-state-error");
        }
    });

    form = dialogNewDoc.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      createDoc();
    });

    $("#create-doc").button().on( "click", function(event) {
	  event.preventDefault();
	  tips.text('');
      dialogNewDoc.dialog( "open" );
    });

    $("#tipo").on("change", function () {
        var tipo = $("#tipo").val();
        $.get("next_code_documento.php?tipo=" + tipo, function(data) {
            $("#cod_doc_show").html(data);
            $("#cod_doc").val(data);
        });
    });

});
