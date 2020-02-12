$( document ).ready(function() {
        
 
        funcion1();
        funcion2();
});

document.getElementById('boton').onclick = function(){
    
    
        funcion1();
        funcion2();
};


function funcion1 (){

    fetch('https://randomuser.me/api')
        .then(data => data.json())
        .then(data => {




            document.getElementById('imagen').src = data.results[0].picture.large;
            document.getElementById('nombre-us').innerHTML = data.results[0].name.first;
            //document.getElementById('comentario').innerHTML = "<blockquote> Excelete servicio *****</blockquote>";
        })





}
function funcion2(){
   
    
   
    
    $.post('./js/cambiarcomentario.php',{ Id:1},function(e){
                        

                        $("#comentario").text(e);
                       
                        
				});
    
    //document.getElementById('comentario').innerHTML = "<blockquote> Excelete servicio *****</blockquote>";
    
}






