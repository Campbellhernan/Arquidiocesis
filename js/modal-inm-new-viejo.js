  $(function() {
    var dialog, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      archiprestazgo = $( "#archiprestazgo" ),
      parroquia = $( "#parroquia" ),
      direccion = $( "#direccion" ),
	  mod_adq	= $("#mod_adq"),
	  metraje	= $("#metraje"),
	  tipo_inm	= $("#tipo_inm"),
	  linderos	= $("#linderos"),
	  descripcion	= $("#descripcion"),
	  
      allFields = $( [] ).add( archiprestazgo ).add( parroquia ).add( direccion ).add( mod_adq ).add( metraje ).add( tipo_inm ).add( linderos ).add( descripcion ),
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
 
    function addUser() {
		var valid = true;
		allFields.removeClass( "ui-state-error" );
		
		valid = valid && checkLength( direccion, "Direccion", 3, 16 );
		valid = valid && checkLength( mod_adq, "Modo de Adquisicion", 3, 16 );
		valid = valid && checkLength( metraje, "Metraje", 3, 16 );
		valid = valid && checkLength( tipo_inm, "Tipo de Inmueble", 3, 16 );
		valid = valid && checkLength( linderos, "Linderos", 3, 80 );
		valid = valid && checkLength( descripcion, "Descripcion", 3, 80 );
		
		$("#dialog-form").animate({ scrollTop: 0 }, 50);
      /*valid = valid && checkLength( password, "password", 5, 16 );
 
      valid = valid && checkRegexp( name, /^[a-z]([0-9a-z_\s])+$/i, "Username may consist of a-z, 0-9, underscores, spaces and must begin with a letter." );
      valid = valid && checkRegexp( email, emailRegex, "eg. ui@jquery.com" );
      valid = valid && checkRegexp( password, /^([0-9a-zA-Z])+$/, "Password field only allow : a-z 0-9" );
	  */
      if ( valid ) {
		console.log($("#form1").serialize());
        $.get("guardarInm.php?"+$("#form1").serialize(), function(){
			$("#lista").empty();
			$("#lista").load("listaInmuebles.php");
		});
		
        dialog.dialog( "close" );
      }
      return valid;
    }
 
    dialog = $( "#dialog-form" ).dialog({
      autoOpen: false,
      height: 500,
      width: 700,
      modal: true,
      buttons: {
        "Crear nuevo inmueble": addUser,
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
 
    $( "#create-inm" ).button().on( "click", function() {
      dialog.dialog( "open" );
    });
  });