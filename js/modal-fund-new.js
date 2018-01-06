  $(function() {
    var dialogNewFund, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      //emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      nom_fund = $( "#nom_fund" ),
	  
      allFields = $( [] ).add( nom_fund ),
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
 
    function createFund() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
        valid = valid && checkLength( nom_fund, "Nombre", 1, 200 );

      if ( valid ) {
		
		$.get("guardarFund.php?"+$("#form_fund_new").serialize(), function(){
			$("#mostrarFundaciones").empty();
			$("#mostrarFundaciones").load("procesarFund.php");
		});
		
        dialogNewFund.dialog( "close" );
      }
      return valid;
    }
 
    dialogNewFund = $( "#dialog-new-fundacion" ).dialog({
      autoOpen: false,
      height: 500,
      width: 700,
      modal: true,
      buttons: {
        "Guardar cambios": createFund,
        Cancelar: function() {
          dialogNewFund.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialogNewFund.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      createFund();
    });
	
    $( "#create-fund" ).button().on( "click", function(event) {
	  event.preventDefault();
	  
      dialogNewFund.dialog( "open" );
    });
  });