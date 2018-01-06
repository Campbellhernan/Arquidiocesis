  $(function() {
    var dialogEditUsuario, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      //emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      rol_edit = $( "#rol_edit" ),
	  
      allFields = $( [] ).add( rol_edit ),
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
 
    function updateUsuario() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
		//valid = valid && checkLength( nom_fund_edit, "Nombre", 1, 200 );

      if ( valid ) {
        //hacemos la petición ajax 
		var enlace = "actualizarUsuario.php?"+$("#form_usuario_edit").serialize();
        $.ajax({
            url: enlace,
            success: function(data){
				$("#mostrarUsuarios").empty();
				$("#mostrarUsuarios").load("procesarUsuario.php?edit_usuario=1");
            },
            //si ha ocurrido un error
            error: function(){
                //message = $("<span class='error'>Ha ocurrido un error.</span>");
                //showMessage(message);
				alert('Ocurrio un error');
            }
        });
		//FIN ADD
		
        dialogEditUsuario.dialog( "close" );
      }
      return valid;
    }
 
    dialogEditUsuario = $( "#dialog-edit-usuario" ).dialog({
      autoOpen: false,
      height: 500,
      width: 700,
      modal: true,
      buttons: {
        "Guardar cambios": updateUsuario,
        Cancelar: function() {
          dialogEditUsuario.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialogEditUsuario.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      updateUsuario();
    });
	
    $( "#mostrarUsuarios" ).on( "click", ".edit_usuario", function(event) {
	  event.preventDefault();
	  
	  $.getJSON("enviarDatosDeUsuario.php?login="+$(this).data('usuario'), function(data){
		  $("#login_edit").text(data.login);
		  $("#login_hidden").val(data.login);
		  $("#rol_edit").val(data.rol);
	  });
	  
      dialogEditUsuario.dialog( "open" );
    });
  });