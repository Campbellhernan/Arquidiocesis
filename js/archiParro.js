$(function(){
		var parroquia = $("#parroquia");
		var parroquia_busqueda = $("#parroquia_busqueda");
		var parroquia_edit = $("#parroquia_edit");
		$("#archiprestazgo").on("change", function(){

			var enlace;
			var arch_val = $("#archiprestazgo").val();
			parroquia.empty().html("<option value='ningun'>Seleccionar...</option>");

			if( (arch_val != 'ningun') && (arch_val != '-1') )
			{
				if(arch_val == '0')
				{
					enlace = "obtSelectFunds.php";
					$.ajax({
						url: enlace,
						success: function(result){
							parroquia.append(result);
						}
					});
				}
				else
				{
					enlace = "obtSelectParros.php?id_archif="+$("#archiprestazgo").val();
					$.ajax({
						url: enlace,
						success: function(result){
							parroquia.append(result);
						}
					});
				}
			}

		});

		$("#archiprestazgo_busqueda").on("change", function() {
			var enlace;
			var arch_val = $("#archiprestazgo_busqueda").val();
			parroquia_busqueda.empty().html("<option value='ningun'>Seleccionar...</option>");

			if( (arch_val != 'ningun') && (arch_val != '-1')) {
				if(arch_val == '0') {
					enlace = "obtSelectFunds.php";
					$.ajax({
						url: enlace,
						success: function(result){
							parroquia_busqueda.append(result);
						}
					});
				} else {
					enlace = "obtSelectParros.php?id_archif="+$("#archiprestazgo_busqueda").val();
					$.ajax({
						url: enlace,
						success: function(result) {
							parroquia_busqueda.append(result);
						}
					});
				}
			}
		});

		$("#archiprestazgo_edit").on("change", function() {

			var enlace;
			var arch_val = $("#archiprestazgo_edit").val();
			parroquia_edit.empty().html("<option value='ningun'>Seleccionar...</option>");

			if( (arch_val != 'ningun') && (arch_val != '-1') )
			{
				if(arch_val == '0')
				{
					enlace = "obtSelectFunds.php";
					$.ajax({
						url: enlace,
						success: function(result){
							parroquia_edit.append(result);
						}
					});
				}
				else
				{
					enlace = "obtSelectParros.php?id_archif="+$("#archiprestazgo_edit").val();
					$.ajax({
						url: enlace,
						success: function(result){
							parroquia_edit.append(result);
						}
					});
				}
			}

		});

	$("#archiprestazgo_edit, #parroquia_edit").each(function (key, select) {
        $(select).on("change", function () {
            var archiprestazgo = $("#archiprestazgo_edit").val();
            var parroquia = $("#parroquia_edit").val();
            $.get("next_code_inmueble.php?archiprestazgo=" + archiprestazgo + "&parroquia=" + parroquia, function(data) {
				$("#id_cod_edit").html(data);
                $("#cod_inm_edit").val(data);
            });
        });
    });
});
