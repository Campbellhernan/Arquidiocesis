  $(function() {
    var dialogNewArch, form,

      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      //emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      nom_arch = $("#nom_arch"),
      cod_arch = $("#cod_arch"),

      allFields = $([]).add(nom_arch).add(cod_arch),
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

    function createArch() {
        var valid = true;
        allFields.removeClass("ui-state-error");

        valid = valid && checkLength(nom_arch, "Nombre", 1, 200);
        valid = valid && checkLength(cod_arch, "Codigo", 1, 2);

        if (valid) {
            $.get("guardarArch.php?" + $("#form_arch_new").serialize(), function() {
                $("#mostrarArchiprestazgos").empty();
                $("#mostrarArchiprestazgos").load("procesarArch.php");
            });
            dialogNewArch.dialog("close");
        }
        return valid;
    }

    dialogNewArch = $("#dialog-new-archiprestazgo").dialog({
        autoOpen: false,
        height: 500,
        width: 700,
        modal: true,
        buttons: {
            "Guardar cambios": createArch,
            Cancelar: function() {
                dialogNewArch.dialog("close");
            }
        },
        close: function() {
            form[ 0 ].reset();
            allFields.removeClass("ui-state-error");
        }
    });

    form = dialogNewArch.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      createArch();
    });

    $("#create-arch").button().on("click", function(event) {
        event.preventDefault();

        $.get("next_code_archi.php", function(data) {
            $("#cod_arch_show").html(data);
            $("#cod_arch").val(data);
        });

        dialogNewArch.dialog("open");
    });

});
