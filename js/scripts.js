//script correspondiente a la pagina carritodecompras.php
var inicio=function () {
	$(".cantidad").keyup(function(e){
        //primero verificamos que el valor ingresado no sea vacio
		if($(this).val()!=''){
			if(e.keyCode==13){
				var id=$(this).attr('data-id');
				var precio=$(this).attr('data-precio');
				var cantidad=$(this).val();//almacenamos el valor que actualmente esta en el DOM
				$(this).parentsUntil('.producto').find('.subtotal').text('Subtotal: '+(precio*cantidad));//navego por el DOM hasta encontrar la clase producto, apartir de ahí busco la clase subtotal y le cambio su texto
				$.post('./js/modificarDatos.php',{ Id:id,Precio:precio,Cantidad:cantidad // los parametros que le envio
				},function(e){
						$("#total").text('Total: '+e);
				});
			}
		}
	});
//--------------------------------eliminar producto--------
    $(".elimina").click(function(e){
        e.preventDefault();//previene la opcion por defecto que seria recargar la página
        var id=$(this).attr('data-id');
        $(this).parentsUntil('.producto').remove();//eliminamos el producto del archivo HTML esto no afectara a la variable de session por lo que deberemos ,eliminar el producto haciendo una peticion con ajax
       /* alert(id); opcion para verificar que esta tomando el script*/
     //--------------Petición AJAX----------------------------------------------
        $.post('./js/eliminar.php',{
            Id:id
        },function(a){
            if(a=='0'){
				location.href="./carritodecompras.php";
            }
        });   
        
    })
    
    
    
}
$(document).on('ready',inicio);

