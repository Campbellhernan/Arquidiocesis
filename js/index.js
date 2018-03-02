$(function(){
	var desdePicker = $("#desdePicker");
	var hastaPicker = $("#hastaPicker");
	var errorBusqDoc = $("#errorBusqDoc");
	var errorBusqInm = $("#errorBusqInm");
	var archiprestazgo_busqueda = $("#archiprestazgo_busqueda");
	var parroquia_busqueda = $("#parroquia_busqueda");
	var direccion_busqueda = $("#direccion_busqueda");

	var sub_inmuebles_added;//pendiente

	$("#buscarDoc").on("click", function (){
		errorBusqDoc.text("");
		if(fechaValida()){
			$.get("procesar.php?"+$("#form1").serialize(), function(data){
				$("#mostrarDocumentos").empty().html(data);
			});
		}
	});

	function fechaValida(){
		if( (desdePicker.val() != '') && (hastaPicker.val() != '') ) {
			var desde = desdePicker.datepicker('getDate').getDate();
			var hasta = hastaPicker.datepicker('getDate').getDate();

			if(desde > hasta) {
				errorBusqDoc.text("Rango de fecha invalida");
				return false;
			}
		}
		return true;
	}

	$("#ver_todos_doc").click(function(){
		$.get("procesar.php", function(data){
			$("#mostrarDocumentos").empty().html(data);
		});
	});
	//$("#busquedaDocumento").hide();
	/*$.getJSON("devolverAbrirBusqDoc.php", function(data){
		if(data.mantAb)
		{
			$("#busquedaDocumento").show();
		}
	});*/

	/*$("#abrirBusquedaDocumento").click(function(){

	});*/

	$("#buscarInm").on("click", function () {
		errorBusqInm.text("");
		if(propietarioValido()) {
			$.get("procesarInm.php?"+$("#form2").serialize(), function(data) {
				$("#mostrarInmuebles").empty().html(data);
				initMap();
			});
		}
	});
	$('body').on("click", ".hijo_inm",function (event) {
		event.preventDefault();
		var getUrl = window.location;
		var baseUrl = getUrl .protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
		window.open(baseUrl + '/pages/index.php?id_inm=' + $(this).data('hijo_inm'));
		return false;
	});
	function propietarioValido() {
		if ((archiprestazgo_busqueda.val() == "ningun" && direccion_busqueda.val() == '')) {
			errorBusqInm.text("Debe seleccionar algo en el campo Archiprestazgo o Direccion");
			return false;
		}
		return true;
	}

	$("#ver_todos_inm").click(function(){
		$.get("procesarInm.php", function(data){
			$("#mostrarInmuebles").empty().html(data);
			initMap();
		});
	});
	//$("#busquedaDocumento").hide();
	/*$.getJSON("devolverAbrirBusqInm.php", function(data){
		if(data.mantAb)
		{
			$("#busquedaInmueble").show();
		}
	});*/

	/*$("#abrirBusquedaInmueble").click(function(){

	});*/
  
    $("#remove_sub_inmueble_edit_select").click(function() {
        $("#sub_inmuebles_edit").empty();
        $("#contador_hijos_edit").val(-1);
        $("#ultimo_contador_hijos").val(-1);
    });
    //added
    $("#remove_sub_inmueble_select").click(function() {
        $("#sub_inmuebles").empty();
        $("#contador_hijos").val(-1);
        $("#ultimo_contador_hijos").val(-1);
    });
    //obtengo la accion de agregar del boton y agrego otro option al select
    $("#btn-add-to-select-sub-inm").click(function(){
    	//console.log("entro");
    	var to_append;

        var count = parseInt($("#contador_hijos").val());
        //console.log("Valor 1: " + count);
        var count = parseInt(count) + 1;
        //console.log("Valor 2: " + count);
        $("#contador_hijos").val(parseInt(count));
        $("#ultimo_contador_hijos").val(parseInt(count));
        //console.log("Valor 3: " + $("#contador_hijos").val(count));

        $.get("selectSubInmuebles.php", function(data) {
            $("#sub_inmuebles").append("<select id=\"sub_inmueble_select_"+count+"\" name=\"sub_inmueble_select["+count+"]\" class=\"form-control\">\n" +
                "                       <option value=\"ningun\">Seleccionar</option>"
                + data + "</select> <span id=\"sub_inmueble_select_remove_"+count+"\" class='eliminar_hijo_on_creation' data-inm='" + count + "' style='margin-left: 15px;margin-top: 4px;cursor: pointer;'><img src='../papelera.jpg' width='24px' height='24px' alt='Eliminar Inmueble'></span>");
        // <span class='eliminar_hijo' data-inm='" + desincorporaciones[j].id_inm + "' style='margin-left: 15px;margin-top: 4px;cursor: pointer;'><img src='../papelera.jpg' width='24px' height='24px' alt='Eliminar Inmueble'></span>
        });


        // $("#sub_inmuebles").append("</select>");

		/*$.get("procesarInm.php", function(data){
			$("#mostrarInmuebles").empty().html(data);
			initMap();
		});*/
	});

    //obtengo la accion de agregar del boton y agrego otro option al select
    $("#btn-add-to-select-sub-inm-edit").click(function(){
       // console.log("entro");
        var to_append;

        var count = parseInt($("#contador_hijos_edit").val());
        //console.log("Valor 1: " + count);
        var count = parseInt(count) + 1;
        //console.log("Valor 2: " + count);
        $("#contador_hijos_edit").val(parseInt(count));
        //console.log("Valor 3: " + $("#contador_hijos_edit").val(count));

        $.get("selectSubInmuebles.php", function(data) {
            $("#sub_inmuebles_edit").append("<div style='display: flex;margin-bottom: 10px;'><select id=\"sub_inmueble_select_edit_"+count+"\" name=\"sub_inmueble_select_edit_"+count+"\" class=\"form-control\">\n" +
                "                       <option value=\"ningun\">Seleccionar</option>"
                + data + "</select> <span id=\"sub_inmueble_edit_select_remove_"+count+"\" class='eliminar_hijo_on_edition' data-inm='" + count + "' style='margin-left: 15px;margin-top: 4px;cursor: pointer;'><img src='../papelera.jpg' width='24px' height='24px' alt='Eliminar Inmueble'></span></div>");
        });


        // $("#sub_inmuebles").append("</select>");

        /*$.get("procesarInm.php", function(data){
            $("#mostrarInmuebles").empty().html(data);
            initMap();
        });*/
    });
    
});
