  $(function() {
    var dialogEditFund, form,
 
      // From http://www.whatwg.org/specs/web-apps/current-work/multipage/states-of-the-type-attribute.html#e-mail-state-%28type=email%29
      //emailRegex = /^[a-zA-Z0-9.!#$%&'*+\/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$/,
      nom_fund_edit = $( "#nom_fund_edit" ),
	  
      allFields = $( [] ).add( nom_fund_edit ),
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
 
    function updateFund() {
      var valid = true;
      allFields.removeClass( "ui-state-error" );
 
		valid = valid && checkLength( nom_fund_edit, "Nombre", 1, 200 );

      if ( valid ) {
        //hacemos la petición ajax 
		var enlace = "actualizarFund.php?"+$("#form_fund_edit").serialize();
        $.ajax({
            url: enlace,
            success: function(data){
				$("#mostrarFundaciones").empty();
				$("#mostrarFundaciones").load("procesarFund.php?edit_fund=1");
            },
            //si ha ocurrido un error
            error: function(){
                //message = $("<span class='error'>Ha ocurrido un error.</span>");
                //showMessage(message);
				alert('Ocurrio un error');
            }
        });
		//FIN ADD
		
        dialogEditFund.dialog( "close" );
      }
      return valid;
    }
 
    dialogEditFund = $( "#dialog-edit-fundacion" ).dialog({
      autoOpen: false,
      height: 500,
      width: 700,
      modal: true,
      buttons: {
        "Guardar cambios": updateFund,
        Cancelar: function() {
          dialogEditFund.dialog( "close" );
        }
      },
      close: function() {
        form[ 0 ].reset();
        allFields.removeClass( "ui-state-error" );
      }
    });
 
    form = dialogEditFund.find( "form" ).on( "submit", function( event ) {
      event.preventDefault();
      updateFund();
    });
	
    $( "#mostrarFundaciones" ).on( "click", ".edit_fund", function(event) {
	  event.preventDefault();
	  
	  $.getJSON("enviarDatosDeFund.php?id_fund="+$(this).data('fund'), function(data){
		  $("#id_fund_edit").text(data.id_fund);
		  $("#id_fund_hidden").val(data.id_fund);
		  $("#nom_fund_edit").val(data.nom_fund);
	  });
	  
      dialogEditFund.dialog( "open" );
    });
  });