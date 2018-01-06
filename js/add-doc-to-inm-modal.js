$(function() {
	var form; 
	var id_inm;
	
	function Datos(id_inm, ids_docs) {
		this.id_inm = id_inm;
		
		this.ids_docs = ids_docs;
	}
 
	$( "#add-doc-to-inm" ).dialog({
		autoOpen: false,
		height: 250,
		width: 400,
		modal: true,
		buttons: {
			Cancelar: function() {
			  $( "#add-doc-to-inm" ).dialog( "close" );
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
	
    $( "#mostrarInmuebles" ).on( "click", ".new-doc-to-inm", function(event) {
		event.preventDefault();
		id_inm = $(this).data('inm');
	
		//$("#inms-news-to-doc-form").hide();
		$( "#add-doc-to-inm" ).dialog( "open" );
    });
	
	$("#btn-docs-news-to-inm-tagsinput").click(function(){
		var ids_docs = $("#docs-news-to-inm-tagsinput").tagsinput('items');
		var obj = new Datos(id_inm, ids_docs);
		//obj.ids_inms = ids_inms;
		//obj.id_doc = id_doc;
		
		$.post("add-docs-to-inm-tagsinput.php", obj, function(){
			alert("Añadidos correctamente");
		});
	});
});