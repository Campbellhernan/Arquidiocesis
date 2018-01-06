  $(function() {
    var dialogNewUsuario, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      //emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      login = $( "#login" ),
	  rol = $( "#rol" ),
	  
      allFields = $( [] ).add( login ).add( rol ),
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
 
    function createUsuario() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
       valid = valid && checkLength( login, "Login", 1, 20 );

      if ( valid ) {
		
		$.get("guardarUsuario.php?"+$("#form_usuario_new").serialize(), function(){
			$("#mostrarUsuarios").empty();
			$("#mostrarUsuarios").load("procesarUsuario.php");
		});
		
        dialogNewUsuario.dialog( "close" );
      }
      return valid;
    }
 
    dialogNewUsuario = $( "#dialog-new-usuario" ).dialog({
      autoOpen: false,
      height: 500,
      width: 700,
      modal: true,
      buttons: {
        "Guardar cambios": createUsuario,
        Cancelar: function() {
          dialogNewUsuario.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialogNewUsuario.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      createUsuario();
    });
	
    $( "#create-usuario" ).button().on( "click", function(event) {
	  event.preventDefault();
	  
      dialogNewUsuario.dialog( "open" );
    });
  });