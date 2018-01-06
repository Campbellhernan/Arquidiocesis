$(function() {
    $.get("obtenerFilasPPInm.php", function(data) {
        $('#filasPPInm').val(data);
    });

    $('#filasPPInm').change(function() {
        $("#mostrarInmuebles").load("procesarInm.php?filasPPInm=" + $(this).val(), function() {
	  		initMap();
		});
    });

});
