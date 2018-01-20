$( function() {
    var availableTags = [];

    $.ajax({
        url: 'obtenerDirecciones.php',
        type: 'GET',
        dataType: 'json',
        success: function(data){
            availableTags = data.direcciones;
            $( "#direccion_busqueda" ).autocomplete({
                source: availableTags
            });
        },
        error: function(data){
            console.log(data);
        }
    });
      

  } );