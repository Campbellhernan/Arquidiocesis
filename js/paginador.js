$(document).ready(function() {
    $('.paginate').on('click', function(event){
        //$('#content').html('<div><img src="images/loading.gif" width="70px" height="70px"/></div>');
		event.preventDefault();
        var page = $(this).data('numpage');
		
		$.get("listaInmuebles.php?numPage="+page, function(data){
			$("#lista").empty().html(data);
		});	
    });              
});