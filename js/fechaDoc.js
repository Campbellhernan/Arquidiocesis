$(function() {
	//Array para dar formato en español
	$.datepicker.regional['es'] =
	{
		closeText: 'Cerrar',
		prevText: 'Previo',
		nextText: 'Próximo',
		monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio',
		'Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
		monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun',
		'Jul','Ago','Sep','Oct','Nov','Dic'],
		monthStatus: 'Ver otro mes', yearStatus: 'Ver otro año',
		dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
		dayNamesShort: ['Dom','Lun','Mar','Mie','Jue','Vie','Sáb'],
		dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sa'],
		dateFormat: 'dd/mm/yy',
		firstDay: 0,
		initStatus: 'Selecciona la fecha', isRTL: false
	};

	$.datepicker.setDefaults($.datepicker.regional['es']);

	$("#desdePicker").datepicker({
	    changeMonth: true,
	    changeYear: true,
	    yearRange: "1400:-c+00",
	    maxDate: "+0m +0d",
	    altField: "#desde",
	    altFormat: "yy-mm-dd"
	}).keyup(function(e) {
	    if (e.keyCode == 8 || e.keyCode == 46) {
	        $.datepicker._clearDate(this);
	    }
	});

	$( "#hastaPicker" ).datepicker({
      	changeMonth: true,
      	changeYear: true,
	  	yearRange: "1400:-c+00",
	  	maxDate: "+0m +0d",
	  	altField: "#hasta",
	  	altFormat: "yy-mm-dd"
	}).keyup(function(e) {
		if(e.keyCode == 8 || e.keyCode == 46) {
			$.datepicker._clearDate(this);
		}
	});

	$("#fechaPicker").datepicker({
  		changeMonth: true,
      	changeYear: true,
	  	yearRange: "1400:-c+00",
	  	maxDate: "+0m +0d",
	  	altField: "#fecha",
	  	altFormat: "yy-mm-dd"
    });

	$("#fecha_edit").datepicker({
      	changeMonth: true,
      	changeYear: true,
	  	yearRange: "1400:-c+00",
	  	maxDate: "+0m +0d",
	  	altField: "#fecha_edit_hidden",
	  	altFormat: "yy-mm-dd"
    });

	$("#fechaDoc").datepicker({
		changeMonth: true,
      	changeYear: true,
	  	yearRange: "1400:-c+00",
	  	maxDate: "+0m +0d",
	  	altField: "#fecha_doc",
	  	altFormat: "yy-mm-dd"
    });

	$("#fechaDocEdit").datepicker({
  		changeMonth: true,
      	changeYear: true,
	  	yearRange: "1400:-c+00",
	  	maxDate: "+0m +0d",
	  	altField: "#fecha_doc_edit",
	  	altFormat: "yy-mm-dd"
    });
});
