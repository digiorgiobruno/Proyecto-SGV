//Script correspondiente al login
/*eventos con addEventListener ,tener en cuenta que estos no funcionan para ciertas versiones antiguas*/



function loseventos()
{
    
    var op1=document.getElementById("op1");/*guardamos titulo iniciar sesion en op1 */
    var op2=document.getElementById("op2");/*guardamos titulo crear usuario en op2 */
    /*ponemos un evento a escuchar,que si se hace click ahi se llama a showlogin*/
    var form1= document.getElementById("form1");
    var form2= document.getElementById("form2");
    var mensaje =document.getElementsByClassName("mensaje");
    var testimonio = document.getElementById("testimonio");
    
    //var sgva1=document.getElementById("sgva");
    
    //sgva1.addEventListener("click",funsgv,false);
    
    op1.addEventListener("click",showcuser,false);
     /*ponemos un evento a escuchar,que si se hace click ahi se llama a showcuser*/
    op2.addEventListener("click",showlogin,false);
    
    
}



function showlogin()
{

    /*oculto form2 y muestro form1*/
    /*alert("presionaste form1");*/
    funcionMenu1();
    //no sirve preguntar por que
    funcionMensaje();
   
    
    
}

    function funcionMenu1(){
        form2.style.display="none";
        form1.style.display="block";
    }
    function funcionMensaje(){
        
        testimonio.style.display="none";
        mensaje.style.display="none";
       
                    }

function showcuser()

{   /*oculto form1 y muestro form2*/
   /* alert("presionaste form2");*/
  funcionMenu2();
     funcionMensaje();
   
}

   function funcionMenu2(){
      form1.style.display="none"; 
    form2.style.display="block";
    }

/*eventos que al cargar la ventana llaman a una funcion*/
window.onload=loseventos();
//window.addEventListener("load",loseventos,false);


//-------------------Validacion visual agregando una clase al elemento seleccionado usando la funcion className y los eventos onblur y onkeyup--- 

var elementoh=document.getElementById("h1");

function revisar(elemento){
				    
                    if(elemento.value==''){
                            elemento.className='error';
                    }else{
                            elemento.className='input';}
                }

function validar(){

//----------------Validacion no visual usando alert(no cambia el class del DOM)------------------------------------------------------------    
    var nombre,password,correo,usuario;
    nombre = document.getElementById("nombre");  revisar(nombre);
    usuario = document.getElementById("usuario"); revisar(usuario);
    password = document.getElementById("password"); revisar(password); 
    correo = document.getElementById("correo"); revisar(correo);
   
    if(nombre.value===""||usuario.value===""||password.value===""||correo.value===""){
       alert("Todos los campos son obligatorios");
       return false;
       }
    
    if(nombre.length>10){
       alert("el nombre ingresado excede la logitud permitida");
        return false;
       }
    
    expresion=/^\w+([\.\+\-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,4})+$/;
    
    if(!expresion.test(correo.value)){
        alert("correo erroneo");
        return false;
        }
    
}



function validarLog(){

//----------------Validacion no visual usando alert------------------------------------------------------------    
    var password,usuario;
//obatengo el elemnto usuario y password usando document objects ,si altero las carectiristicas de estos objetos tambien se modifican las los elementos html,por ejemplo aca modificaremos la clase para poder visualizar cambio de color en los inputs
    userlog = document.getElementById("userlog");
    revisar(userlog);
    passlog = document.getElementById("passlog");
    revisar(passlog); 
   
       if(userlog.value===""){
           alert("Todos los campos son obligatorios");
           return false;
       }
    
       if(passlog.value===""){
            alert("Todos los campos son obligatorios");
            return false;
       }
    
    
    if(userlog.length>10){
       alert("el nombre ingresado excede la logitud permitida");
        return false;
       }
    

    
}

