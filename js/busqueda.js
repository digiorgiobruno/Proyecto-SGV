
function buscar_datos(Consulta){
      console.log( "ready!" );
	$.ajax({
		url: 'buscar.php' ,
		type: 'POST' ,
		dataType: 'html',
		data: {consulta: Consulta},
	})
	.done(function(respuesta){
		$(".productos-contenedor").html(respuesta);
	})
	.fail(function(){
		console.log("error");
	});
}


$(document).on('keyup','#caja_busqueda', function(){
	var valor = $(this).val();
	if (valor != "") {
		buscar_datos(valor);
	}else{
		buscar_datos();
	}
});

$(document).ready( buscar_datos(Consulta));


