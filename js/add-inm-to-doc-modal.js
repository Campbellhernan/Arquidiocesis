$(function() {
	var form; 
	var id_doc;
	
	function Datos(id_doc, ids_inms) {
		this.id_doc = id_doc;
		
		this.ids_inms = ids_inms;
	}
 
	$( "#add-inm-to-doc" ).dialog({
		autoOpen: false,
		height: 250,
		width: 400,
		modal: true,
		buttons: {
			Cancelar: function() {
			  $( "#add-inm-to-doc" ).dialog( "close" );
			}
		},
		close: function() {
			//form[ 0 ].reset();
			//allFields.removeClass( "ui-state-error" );
		}
    });
 
    /*form = $( "#add-inm-to-doc" ).find( "form" ).on( "submit", function( event ) {
		event.preventDefault();
		//addUser();
    });*/
	
    $( "#mostrarDocumentos" ).on( "click", ".new-inm-to-doc", function(event) {
		event.preventDefault();
		id_doc = $(this).data('doc');
	
		//$("#inms-news-to-doc-form").hide();
		$( "#add-inm-to-doc" ).dialog( "open" );
    });
	
	$("#btn-inms-news-to-doc-tagsinput").click(function(){
		var ids_inms = $("#inms-news-to-doc-tagsinput").tagsinput('items');

		console.log(ids_inms);
		var obj = new Datos(id_doc, ids_inms);
		//obj.ids_inms = ids_inms;
		//obj.id_doc = id_doc;
		
		$.post("add-inms-to-doc-tagsinput.php", obj, function(){
			alert("Añadidos correctamente");
		});
	});
});