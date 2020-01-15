<?php
if(isset($_POST['usuario'])&&isset($_POST['password'])){
include("../conexion.php");
//almaceno las variables enviadas por  metodo post 
$nombre = $_POST['nombre'];
$usuario = $_POST['usuario'];
$password = md5($_POST['password']);//preguntar si esta bien
$mail = $_POST['mail'];
//realizamos una consulta con mysqly_query 
//consulta SELECT  (columna) FROM (tabla) WHERE (condicion) ;

$solicitud="SELECT  User FROM tusuario WHERE User='$usuario'";//codigo sql
$resultado = mysqli_query($conexion,$solicitud);
//guardamos el resultado de la consulta en un array con array fetch
$fila = mysqli_fetch_array($resultado);
//control de preexistencia de usuario
if(mysqli_num_rows($resultado))
{
	echo "Nombre de usuario no disponible"; 
//-----llamamos al formulario de nuevo----------------
    header("location: ../index.php?opcion=1&nombre=$nombre&mail=$mail");
}else{ 
	//POSIBLE MEJORA recibir los demas datos aqui para minimizar procesamiento
	echo "usuario  disponible";
	$solicitud ="INSERT INTO Tusuario (Name,User,Mail,Pass) VALUES('$nombre','$usuario','$mail','$password') ";
	$resultado = mysqli_query($conexion,$solicitud);//consulta para insertar elementos , en el argumento de la funcion van los datos de conexion y un string con la consulta,esta ultima esta en lenguage sql
	
//inicio sesion y luego almaceno las variables como variables de sesion
	session_start();
	$_SESSION['Nombre']=$nombre;
	$_SESSION['Usuario']=$usuario;
	$_SESSION['Password']=$password;
	$_SESSION['Mail']=$mail;
    
    //creamos un array para guardar todos los datos
    $arreglo[]=array(       'Nombre'=>$nombre,
							'Usuario'=>$usuario,
							'Password'=>$password,
							'Mail'=>$mail );
    
    $_SESSION['Datos']=$arreglo;//no se por que no sirve
    
	header("location: ../menuuser.php");
    
	}

}else{echo "si no ingresas usuario y contraseña no puedes acceder a este sitio loquillo";}


//echo $fila['User'] ; mostrar el nombre del usuario obtenido con fetch


//-------------mostrar cantidad de filas que encuentra la encuesta, funcion sirve para los condicionales----
//echo mysqli_num_rows($resultado);

//var_dump($resultado); //-----> tira todo lo que esta dentro del objeto resultado;


//$fila = mysqli_fetch_array($resultado);







//header("location: index.php");*/
?>