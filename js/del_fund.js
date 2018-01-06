$(function(){
	$("a[name='del_fund']").click(function(event){
		event.preventDefault();
		$.get("del_fund.php?id_fund="+$(this).data('fund'), function(){
			$("#lista").empty();
			$("#lista").load("listaFundaciones.php");
		});

	});
});