<?php
include("conexion.php");
//almaceno las variables enviadas por  metodo post 
$usuario = $_POST['usuario'];
//realizamos una consulta con mysqly_query 
//consulta SELECT  (columna) FROM (tabla) WHERE (condicion) ;
$solicitud="SELECT  User FROM tusuario WHERE User='$usuario'";//codigo sql
$resultado = mysqli_query($conexion,$solicitud);
//guardamos el resultado de la consulta en un array con array fetch
$fila = mysqli_fetch_array($resultado);
//control de preexistencia de usuario
if(mysqli_num_rows($resultado))
		{

			echo "Ingrese password"; 
			include("formpass.php");
			//$password = md5($_POST['password']);
		
		}else{ 

			echo "usuario no encontrado";
			include("formuser.php");
		
			}




//echo $fila['User'] ; mostrar el nombre del usuario obtenido con fetch


//-------------mostrar cantidad de filas que encuentra la encuesta, funcion sirve para los condicionales----
//echo mysqli_num_rows($resultado);

//var_dump($resultado); //-----> tira todo lo que esta dentro del objeto resultado;


//$fila = mysqli_fetch_array($resultado);







//header("location: index.php");*/
?>