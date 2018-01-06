  $(function() {
    var dialogEditArch, form,

      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      //emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      nom_arch_edit = $( "#nom_arch_edit" ),

      allFields = $( [] ).add( nom_arch_edit ),
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

    $("#show-parros-from-arch").on("click", ".del-parro-from-arch", function (event) {
        event.preventDefault();
        var id_parro = $(this).data('parro');
        var id_arch = $(this).data('arch');
        $.ajax({
            url: "del_parro.php?id_parro="+id_parro,
            success: function(data){
                $("#show-parros-from-arch").load("show-parros-from-arch.php?id_arch="+id_arch);
            },
            //si ha ocurrido un error
            error: function(){
                //message = $("<span class='error'>Ha ocurrido un error.</span>");
                //showMessage(message);
				alert('Ocurrio un error');
            }
        });
    });

    function updateArch() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );

		valid = valid && checkLength( nom_arch_edit, "Nombre", 1, 200 );

      if ( valid ) {
        //hacemos la petición ajax
		var enlace = "actualizarArch.php?"+$("#form_arch_edit").serialize();
        $.ajax({
            url: enlace,
            success: function(data){
				$("#mostrarArchiprestazgos").empty();
				$("#mostrarArchiprestazgos").load("procesarArch.php?edit_arch=1");
            },
            //si ha ocurrido un error
            error: function(){
                //message = $("<span class='error'>Ha ocurrido un error.</span>");
                //showMessage(message);
				alert('Ocurrio un error');
            }
        });
		//FIN ADD

        dialogEditArch.dialog( "close" );
      }
      return valid;
    }

    dialogEditArch = $("#dialog-edit-archiprestazgo").dialog({
        autoOpen: false,
        height: 500,
        width: 700,
        modal: true,
        buttons: {
            "Guardar cambios": updateArch,
            Cancelar: function() {
                dialogEditArch.dialog( "close" );
            }
        },
        close: function() {
            form[ 0 ].reset();
            allFields.removeClass( "ui-state-error" );
        }
    });

    form = dialogEditArch.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      updateArch();
    });

    $("#mostrarArchiprestazgos").on("click", ".edit_arch", function(event) {
	  event.preventDefault();

	  $.getJSON("enviarDatosDeArch.php?id_arch="+$(this).data('arch'), function(data){
		  $("#cod_arch_edit").text(data.cod_arch);
		  $("#id_arch_hidden").val(data.id_arch);
		  $("#nom_arch_edit").val(data.nom_arch);
	  });

      dialogEditArch.dialog( "open" );
    });
  });
