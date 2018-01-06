$(function() {
    $("#mostrarInmuebles").on("click", ".paginarInm", function(event) {
        event.preventDefault();

        var page = $(this).data('numpage');

        $("#mostrarInmuebles").load("procesarInm.php?numPage=" + page, function() {
	  		initMap();
		});
    });
});
