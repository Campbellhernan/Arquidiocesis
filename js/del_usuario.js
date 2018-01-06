$(function(){
	var usuario;
	$( "#mostrarUsuarios" ).on( "click", ".del_usuario", function(event) {
	  event.preventDefault();
	  
	  //var band = confirm("esta seguro de eliminar?");
	  usuario = $(this).data('usuario');
	  $("#dialog-confirm").dialog("open");
    });
	
	$( "#dialog-confirm" ).dialog({
	  autoOpen: false,
      resizable: false,
      height: "auto",
      width: 400,
      modal: true,
      buttons: {
        "Aceptar": function() {
			$.get("del_usuario.php?login="+usuario, function(data){
				$("#mostrarUsuarios").empty();
				$("#mostrarUsuarios").load("procesarUsuario.php?edit_usuario=1");
			});
			$( this ).dialog( "close" );
        },
        Cancelar: function() {
          $( this ).dialog( "close" );
        }
      }
    });
	
});