  $(function() {
	  alert('hola');
    /*var dialogNewDoc, form,

      id_doc = $( "#id_doc" ),
      tipo = $( "#tipo" ),
      fechaPicker = $( "#fechaPicker" ),
	  datos_registro	= $("#datos_registro"),
	  abogado_redactor	= $("#abogado_redactor"),

      allFields = $( [] ).add( id_doc ).add( tipo ).add( fechaPicker ).add( datos_registro ).add( abogado_redactor ),
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
          min + " and " + max + "." );
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

    function createNewDoc() {
      /*var valid = true;
      allFields.removeClass( "ui-state-error" );

      valid = valid && checkLength( id_doc, "Codigo del documento", 1, 16 );
      valid = valid && checkLength( tipo, "Tipo", 1, 60 );
	  //valid = valid && checkLength( fechaPicker, "Fecha", 1, 10 );
      valid = valid && checkLength( datos_registro, "Datos de Registro", 1, 100 );
      valid = valid && checkLength( abogado_redactor, "Abogado Redactor", 1, 100 );

      if ( valid ) {
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
            //success: function(data){
                //message = $("<span class='success'>La imagen ha subido correctamente.</span>");
                //showMessage(message);
                /*if(isImage(fileExtension))
                {
                    $(".showImage").html("<img src='files/"+data+"' />");
                }*/
				//$("#mostrarDocumentos").empty();
				//$("#mostrarDocumentos").load("procesar.php");
            //}//,
            //si ha ocurrido un error
            /*error: function(){
                //message = $("<span class='error'>Ha ocurrido un error.</span>");
                //showMessage(message);
            }*/
        //});
		//FIN ADD

        //dialogNewDoc.dialog( "close" );
      //}
      //return valid;
	  //dialogNewDoc.dialog( "close" );
    //}

    /*dialogNewDoc = $( "#dialog-new-document" ).dialog({
      autoOpen: false,
      height: 500,
      width: 700,
      modal: true,
      buttons: {
        "Crear nuevo documento": createNewDoc,
        Cancelar: function() {
          dialogNewDoc.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });

    form = dialogNewDoc.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      createNewDoc();
    });

    $( "#create-doc" ).button().on( "click", function() {
		alert("entro");
      dialogNewDoc.dialog( "open" );
    });*/

  });
