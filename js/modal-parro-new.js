  $(function() {
    var dialog, form, id_arch,

      nom_parro = $( "#nom_parro" ),

      allFields = $( [] ).add( nom_parro ),
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

      valid = valid && checkLength( nom_parro, "Nombre", 1, 100 );

      if ( valid ) {
		$.get("guardarParro.php?"+$("#form_parro").serialize()+"&id_archif="+id_arch, function(data){
			$("#mostrarArchiprestazgos").empty();
			$("#mostrarArchiprestazgos").load("procesarArch.php");
		});

        dialog.dialog( "close" );
      }
      return valid;
    }

    dialog = $("#dialog-form-parroquia").dialog({
      autoOpen: false,
      height: 500,
      width: 700,
      modal: true,
      buttons: {
        "Crear nueva parroquia": addUser,
        Cancelar: function() {
          dialog.dialog("close");
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass("ui-state-error");
      }
    });

    form = dialog.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      addUser();
    });

	$("#mostrarArchiprestazgos").on("click", ".new_parro", function(event) {
        event.preventDefault();
        id_arch = $(this).data('arch');

        $.get("next_code_parroq.php?archiprestazgo=" + id_arch, function(data) {
            $("#cod_parro_show").html(data);
            $("#cod_parro").val(data);
        });

        dialog.dialog("open");
    });

  });
