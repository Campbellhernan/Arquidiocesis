  $(function() {
    var dialog, form, id_inm,

      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      cod_doc = $( "#cod_doc" ),
      tipo = $( "#tipo" ),
      dia = $( "#dia" ),
	  mes	= $("#mes"),
	  anyo	= $("#anyo"),
	  dat_reg	= $("#dat_reg"),
	  abog_redc	= $("#abog_redc"),

      allFields = $( [] ).add( cod_doc ).add( tipo ).add( dia ).add( mes ).add( anyo ).add( dat_reg ).add( abog_redc ),
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

    function addUser() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );

      valid = valid && checkLength( cod_doc, "Codigo del documento", 3, 16 );
      valid = valid && checkLength( tipo, "Tipo", 6, 80 );
      valid = valid && checkLength( dat_reg, "Datos de Registro", 5, 300);
      valid = valid && checkLength( abog_redc, "Abogado Redactor", 5, 300);

      /*valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
      valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
	  */
      if ( valid ) {
		/*$.get("guardarDoc.php?"+$("#form_doc").serialize()+"&cod_inmf="+cod_inm, function(data){
			$("#lista").empty();
			$("#lista").load("listaInmuebles.php");
		});*/

		//ADD
		//información del formulario
        //var formData = new FormData($("#dialog-form-document"));
		var formData = new FormData(document.getElementById("form_doc"));
		formData.append("id_inm", id_inm);

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
                //message = $("<span class='success'>La imagen ha subido correctamente.</span>");
                //showMessage(message);
                /*if(isImage(fileExtension))
                {
                    $(".showImage").html("<img src='files/"+data+"' />");
                }*/
				$("#lista").empty();
				$("#lista").load("listaInmuebles.php");
            }//,
            //si ha ocurrido un error
            /*error: function(){
                //message = $("<span class='error'>Ha ocurrido un error.</span>");
                //showMessage(message);
            }*/
        });
		//FIN ADD

        dialog.dialog( "close" );
      }
      return valid;
    }

    dialog = $( "#dialog-form-document" ).dialog({
      autoOpen: false,
      height: 500,
      width: 700,
      modal: true,
      buttons: {
        "Crear nuevo documento": addUser,
        Cancelar: function() {
          dialog.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });

    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });

    $( "a[name='new_doc']" ).on( "click", function(event) {
	  event.preventDefault();
	  id_inm = $(this).data('inm');
      dialog.dialog( "open" );
    });
  });
